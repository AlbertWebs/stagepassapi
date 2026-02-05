<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
            'math_answer' => ['required', 'integer'],
            'math_challenge' => ['required', 'string'],
            'honeypot' => ['nullable', 'string'], // Must be empty (checked separately)
            'form_timestamp' => ['required', 'integer'], // Time-based validation
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

        // Arithmetic captcha validation
        $mathChallenge = $request->input('math_challenge');
        $mathAnswer = (int) $request->input('math_answer');
        
        // Parse challenge (format: "a+b" or "a-b")
        if (preg_match('/^(\d+)\s*([+\-])\s*(\d+)$/', $mathChallenge, $matches)) {
            $a = (int) $matches[1];
            $operator = $matches[2];
            $b = (int) $matches[3];
            
            $expectedAnswer = $operator === '+' ? ($a + $b) : ($a - $b);
            
            if ($mathAnswer !== $expectedAnswer) {
                RateLimiter::hit($key);
                return response()->json([
                    'success' => false,
                    'message' => 'Math challenge answer is incorrect. Please try again.',
                ], 422)->header('Access-Control-Allow-Origin', '*');
            }
        } else {
            RateLimiter::hit($key);
            return response()->json([
                'success' => false,
                'message' => 'Invalid math challenge format.',
            ], 422)->header('Access-Control-Allow-Origin', '*');
        }

        // Time-based validation: form must be submitted within reasonable time (5 seconds to 1 hour)
        $formTimestamp = (int) $request->input('form_timestamp');
        $currentTime = time();
        $timeDiff = $currentTime - $formTimestamp;
        
        if ($timeDiff < 5) {
            // Submitted too quickly (likely automated)
            Log::warning('Quote form submitted too quickly', [
                'ip' => $request->ip(),
                'time_diff' => $timeDiff,
            ]);
            RateLimiter::hit($key);
            return response()->json([
                'success' => false,
                'message' => 'Form submitted too quickly. Please take your time.',
            ], 422)->header('Access-Control-Allow-Origin', '*');
        }
        
        if ($timeDiff > 3600) {
            // Form is too old (1 hour)
            RateLimiter::hit($key);
            return response()->json([
                'success' => false,
                'message' => 'Form session expired. Please refresh and try again.',
            ], 422)->header('Access-Control-Allow-Origin', '*');
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
                // Build insert data
                $insertData = [
                    'name' => $name,
                    'email' => $email,
                    'message' => $message,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                
                // Only include phone if column exists (for backward compatibility)
                if (Schema::hasColumn('quote_requests', 'phone')) {
                    $insertData['phone'] = $phone;
                }
                
                DB::table('quote_requests')->insert($insertData);
            } catch (\Exception $dbException) {
                // If error is about missing column, try without phone
                if (str_contains($dbException->getMessage(), 'phone') || 
                    str_contains($dbException->getMessage(), 'Unknown column') ||
                    str_contains($dbException->getMessage(), 'does not exist')) {
                    try {
                        DB::table('quote_requests')->insert([
                            'name' => $name,
                            'email' => $email,
                            'message' => $message,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        Log::info('Quote request saved without phone column (migration may not be run)', [
                            'email' => $email,
                        ]);
                    } catch (\Exception $retryException) {
                        Log::error('Database error saving quote request (retry failed)', [
                            'error' => $retryException->getMessage(),
                            'trace' => $retryException->getTraceAsString(),
                            'data' => [
                                'name' => $name,
                                'email' => $email,
                                'phone' => $phone,
                                'message_length' => strlen($message),
                            ],
                        ]);
                        throw $retryException;
                    }
                } else {
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
            ], 500)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept, Origin')
                ->header('Access-Control-Allow-Credentials', 'true');
        }
    }
}
