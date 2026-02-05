<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteRequestController extends Controller
{
    /**
     * Submit quote request form with spam protection
     */
    public function submit(Request $request): JsonResponse
    {
        // Rate limiting: 5 submissions per hour per IP
        $key = 'quote_form:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'message' => "Too many requests. Please try again in {$seconds} seconds.",
            ], 429)->header('Access-Control-Allow-Origin', '*');
        }

        // Validate request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'honeypot' => ['nullable', 'string'], // Must be empty (checked separately)
        ]);

        if ($validator->fails()) {
            RateLimiter::hit($key);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please check your input.',
                'errors' => $validator->errors(),
            ], 422)->header('Access-Control-Allow-Origin', '*');
        }

        // Honeypot check - if filled, it's spam
        if (!empty($request->input('honeypot'))) {
            Log::warning('Spam detected via honeypot in quote form', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            RateLimiter::hit($key);
            return response()->json([
                'success' => false,
                'message' => 'Invalid submission.',
            ], 400)->header('Access-Control-Allow-Origin', '*');
        }

        // Additional spam checks
        $message = $request->input('message');
        $email = $request->input('email');
        
        // Check for common spam patterns
        $spamPatterns = [
            '/\b(buy\s+now|click\s+here|limited\s+time|act\s+now|viagra|casino|poker|loan|debt|free\s+money)\b/i',
            '/http[s]?:\/\/[^\s]+/i', // URLs in message
        ];
        
        foreach ($spamPatterns as $pattern) {
            if (preg_match($pattern, $message)) {
                Log::warning('Spam pattern detected in quote form', [
                    'ip' => $request->ip(),
                    'pattern' => $pattern,
                ]);
                RateLimiter::hit($key);
                return response()->json([
                    'success' => false,
                    'message' => 'Your message contains prohibited content.',
                ], 422)->header('Access-Control-Allow-Origin', '*');
            }
        }

        // Check for disposable email domains
        $disposableDomains = ['tempmail.com', '10minutemail.com', 'guerrillamail.com'];
        $emailDomain = substr(strrchr($email, "@"), 1);
        if (in_array(strtolower($emailDomain), $disposableDomains)) {
            RateLimiter::hit($key);
            return response()->json([
                'success' => false,
                'message' => 'Please use a valid email address.',
            ], 422)->header('Access-Control-Allow-Origin', '*');
        }

        try {
            $name = $request->input('name');
            $phone = $request->input('phone', null);
            
            // Save to database
            try {
                DB::table('quote_requests')->insert([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'message' => $message,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } catch (\Exception $dbException) {
                Log::error('Database error saving quote request', [
                    'error' => $dbException->getMessage(),
                    'trace' => $dbException->getTraceAsString(),
                    'data' => [
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'message_length' => strlen($message),
                    ],
                ]);
                throw $dbException; // Re-throw to be caught by outer catch
            }

            // Send email
            try {
                $emailBody = "New Quote Request\n\n";
                $emailBody .= "Name: {$name}\n";
                $emailBody .= "Email: {$email}\n";
                if ($phone) {
                    $emailBody .= "Phone: {$phone}\n";
                }
                $emailBody .= "\nMessage:\n{$message}\n\n";
                $emailBody .= "Submitted: " . now()->format('Y-m-d H:i:s') . "\n";
                $emailBody .= "IP Address: " . $request->ip();

                Mail::raw($emailBody, function ($mail) use ($name, $email) {
                    $mail->to('info@stagepass.co.ke')
                        ->bcc('albertmuhatia@gmail.com')
                        ->subject("New Quote Request from {$name}")
                        ->from(config('mail.from.address'), config('mail.from.name', 'StagePass Website'));
                });
            } catch (\Exception $emailException) {
                // Log email error but don't fail the request
                Log::error('Failed to send quote request email', [
                    'error' => $emailException->getMessage(),
                    'email' => $email,
                ]);
            }

            // Increment rate limiter on success
            RateLimiter::hit($key);

            Log::info('Quote request submitted successfully', [
                'email' => $email,
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your quote request! We\'ll get back to you within 24 hours.',
            ], 200)->header('Access-Control-Allow-Origin', '*');
        } catch (\Exception $e) {
            Log::error('Error saving quote request', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'ip' => $request->ip(),
                'request_data' => $request->except(['password', 'honeypot']),
            ]);
            
            RateLimiter::hit($key);
            
            // Provide more specific error message in development
            $errorMessage = 'An error occurred. Please try again later.';
            if (config('app.debug')) {
                $errorMessage .= ' Error: ' . $e->getMessage();
            }
            
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500)->header('Access-Control-Allow-Origin', '*');
        }
    }
}
