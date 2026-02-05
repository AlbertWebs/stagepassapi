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
        $this->line('Mail Driver: ' . config('mail.default'));
        $this->line('Mail Host: ' . config('mail.mailers.smtp.host'));
        $this->line('Mail Port: ' . config('mail.mailers.smtp.port'));
        $this->line('Mail From: ' . config('mail.from.address'));
        
        $sslConfig = config('mail.mailers.smtp.stream.ssl', []);
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
            Log::info('Test email sent successfully via command', ['to' => $toEmail]);
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
