<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Swift_SmtpTransport;

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
            // Configure SSL options if needed (before sending email)
            // This ensures SSL is configured even if AppServiceProvider hasn't run yet
            $this->configureMailSsl();
            
            $toEmail = $request->input('to_email');
            $subject = $request->input('subject');
            $message = $request->input('message');
            $includeBcc = $request->has('include_bcc');

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

    /**
     * Configure SSL options for SMTP transport to handle certificate issues
     */
    private function configureMailSsl(): void
    {
        if (config('mail.default') !== 'smtp') {
            return;
        }

        try {
            // Get the SwiftMailer instance
            $swiftMailer = Mail::getSwiftMailer();
            if (!$swiftMailer) {
                return;
            }

            $transport = $swiftMailer->getTransport();
            if ($transport instanceof Swift_SmtpTransport) {
                $streamOptions = [];
                
                // Disable SSL verification if configured (for testing only)
                $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
                if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                    $streamOptions['ssl']['verify_peer_name'] = false;
                    $verifyPeer = env('MAIL_VERIFY_PEER');
                    $streamOptions['ssl']['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
                }
                
                // Set custom peer name if provided (to match actual certificate CN)
                if ($peerName = env('MAIL_PEER_NAME')) {
                    $streamOptions['ssl']['peer_name'] = $peerName;
                }
                
                if (!empty($streamOptions)) {
                    $transport->setStreamOptions($streamOptions);
                }
            }
        } catch (\Exception $e) {
            // Silently fail - SSL configuration is optional
            Log::debug('Could not configure mail SSL options', ['error' => $e->getMessage()]);
        }
    }
}
