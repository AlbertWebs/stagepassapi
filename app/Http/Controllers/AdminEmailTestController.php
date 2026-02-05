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
            ]);

            return back()->with('error', 'Failed to send test email: ' . $e->getMessage());
        }
    }
}
