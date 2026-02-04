<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Submit contact form with spam protection
     */
    public function submit(Request $request): JsonResponse
    {
        // Rate limiting: 5 submissions per hour per IP
        $key = 'contact_form:' . $request->ip();
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
            'phone' => ['required', 'string', 'max:50'],
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
            Log::warning('Spam detected via honeypot', [
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
            Log::warning('Contact form submitted too quickly', [
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
                Log::warning('Spam pattern detected in contact form', [
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

        // Check for disposable email domains (optional - you can add more)
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
            // Save to database
            DB::table('contact_messages')->insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $message,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Increment rate limiter on success
            RateLimiter::hit($key);

            Log::info('Contact form submitted successfully', [
                'email' => $email,
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We\'ll get back to you within 24 hours.',
            ], 200)->header('Access-Control-Allow-Origin', '*');
        } catch (\Exception $e) {
            Log::error('Error saving contact message', [
                'error' => $e->getMessage(),
                'ip' => $request->ip(),
            ]);
            
            RateLimiter::hit($key);
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later.',
            ], 500)->header('Access-Control-Allow-Origin', '*');
        }
    }
}
