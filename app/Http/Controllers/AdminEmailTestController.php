<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AdminEmailTestController extends Controller
{
    public function index()
    {
        return view('admin.email-test', [
            'sectionKey' => 'email-test',
        ]);
    }

    public function test(Request $request): RedirectResponse
    {
        $request->validate([
            'to_email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            $toEmail = $request->input('to_email');
            $subject = $request->input('subject');
            $message = $request->input('message');
            $includeBcc = $request->has('include_bcc');

            // Log current mail configuration and SSL settings
            $mailConfig = config('mail.mailers.smtp');
            $sslConfig = $mailConfig['stream']['ssl'] ?? [];
            $defaultContext = stream_context_get_default();
            $defaultSslOptions = $defaultContext ? stream_context_get_options($defaultContext)['ssl'] ?? [] : [];
            
            Log::info('Email test: Current mail and SSL configuration', [
                'mail_host' => $mailConfig['host'] ?? 'not set',
                'mail_port' => $mailConfig['port'] ?? 'not set',
                'config_ssl' => $sslConfig,
                'default_context_ssl' => $defaultSslOptions,
                'env_verify_peer_name' => env('MAIL_VERIFY_PEER_NAME'),
                'env_verify_peer' => env('MAIL_VERIFY_PEER'),
                'env_peer_name' => env('MAIL_PEER_NAME'),
            ]);

            $emailBody = "This is a test email from StagePass Admin Panel.\n\n";
            $emailBody .= "Message:\n{$message}\n\n";
            $emailBody .= "Sent at: " . now()->format('Y-m-d H:i:s') . "\n";
            $emailBody .= "From: " . config('mail.from.address') . "\n";

            Mail::raw($emailBody, function ($mail) use ($toEmail, $subject, $includeBcc) {
                $mail->to($toEmail)
                    ->subject($subject)
                    ->from(config('mail.from.address'), config('mail.from.name', 'StagePass Admin'));
                
                if ($includeBcc) {
                    $mail->bcc('albertmuhatia@gmail.com');
                }
            });

            Log::info('Test email sent successfully', [
                'to' => $toEmail,
                'subject' => $subject,
            ]);

            return back()->with('status', "Test email sent successfully to {$toEmail}!");
        } catch (\Exception $e) {
            Log::error('Failed to send test email', [
                'error' => $e->getMessage(),
                'to' => $request->input('to_email'),
                'trace' => $e->getTraceAsString(),
            ]);

            $errorMessage = $e->getMessage();
            
            // Provide helpful guidance for SSL certificate errors
            if (str_contains($errorMessage, 'certificate') || str_contains($errorMessage, 'SSL') || str_contains($errorMessage, 'TLS')) {
                $errorMessage .= "\n\nTip: If you're experiencing SSL certificate issues, you can temporarily disable SSL verification by adding this to your .env file:\n";
                $errorMessage .= "MAIL_VERIFY_PEER_NAME=false\n";
                $errorMessage .= "MAIL_VERIFY_PEER=false\n\n";
                $errorMessage .= "Note: This is not recommended for production. For production, ensure your SMTP server's certificate matches the expected hostname.";
            }

            return back()->with('error', 'Failed to send test email: ' . $errorMessage);
        }
    }

}
