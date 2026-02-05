<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email {to=albertmuhatia@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $toEmail = $this->argument('to');
        
        $this->info('Testing email configuration...');
        $mailer = config('mail.default');
        $this->line('Mail Driver: ' . $mailer);
        
        $mailerConfig = config("mail.mailers.{$mailer}", []);
        if (!empty($mailerConfig)) {
            $this->line('Mail Host: ' . ($mailerConfig['host'] ?? 'N/A'));
            $this->line('Mail Port: ' . ($mailerConfig['port'] ?? 'N/A'));
            $this->line('Mail Username: ' . ($mailerConfig['username'] ?? 'N/A'));
        }
        
        $this->line('Mail From: ' . config('mail.from.address'));
        
        $sslConfig = $mailerConfig['stream']['ssl'] ?? [];
        if (!empty($sslConfig)) {
            $this->line('SSL Config: ' . json_encode($sslConfig));
        }
        
        $this->newLine();
        $this->info("Attempting to send test email to: {$toEmail}");
        
        try {
            $emailBody = "This is a test email from StagePass API.\n\n";
            $emailBody .= "Sent at: " . now()->format('Y-m-d H:i:s') . "\n";
            $emailBody .= "From: " . config('mail.from.address') . "\n";
            $emailBody .= "Mailer: " . config('mail.default') . "\n";
            
            Mail::raw($emailBody, function ($mail) use ($toEmail) {
                $mail->to($toEmail)
                    ->subject('StagePass API - Test Email')
                    ->from(config('mail.from.address'), config('mail.from.name', 'StagePass Admin'));
            });
            
            $this->info('✓ Email sent successfully!');
            $this->newLine();
            $this->line('Email Details:');
            $this->line('  To: ' . $toEmail);
            $this->line('  From: ' . config('mail.from.address'));
            $this->line('  Subject: StagePass API - Test Email');
            $this->newLine();
            $this->warn('⚠ If you don\'t receive the email:');
            $this->line('  1. Check your spam/junk folder');
            $this->line('  2. Verify the "From" address matches your Gmail account');
            $this->line('  3. Check Gmail security settings (Less secure app access)');
            $this->line('  4. Verify SPF/DKIM records for your domain');
            
            Log::info('Test email sent successfully via command', [
                'to' => $toEmail,
                'from' => config('mail.from.address'),
                'mailer' => config('mail.default'),
            ]);
            return 0;
        } catch (\Exception $e) {
            $this->error('✗ Failed to send email: ' . $e->getMessage());
            $this->newLine();
            $this->line('Error Details:');
            $this->line($e->getTraceAsString());
            
            Log::error('Test email failed via command', [
                'error' => $e->getMessage(),
                'to' => $toEmail,
                'trace' => $e->getTraceAsString(),
            ]);
            
            return 1;
        }
    }
}
