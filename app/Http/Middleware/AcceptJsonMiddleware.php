<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcceptJsonMiddleware
{
    /**
     * Handle an incoming request.
     * 
     * This middleware ensures API routes accept various content types
     * to prevent 415 Unsupported Media Type errors.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only apply to API routes
        if ($request->is('api/*')) {
            // For GET, HEAD, OPTIONS requests, skip Content-Type processing
            // These methods don't have request bodies
            // Safari on Mac sometimes sends Content-Type on GET requests, which causes 415 errors
            if (in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'])) {
                // Always remove Content-Type header on GET/HEAD/OPTIONS to prevent Safari 415 errors
                // This must be done before Laravel validates the request
                $request->headers->remove('Content-Type');
                
                // Safari-specific handling
                $userAgent = $request->header('User-Agent', '');
                $isSafari = str_contains($userAgent, 'Safari') && !str_contains($userAgent, 'Chrome');
                
                if ($isSafari) {
                    // Safari on Mac can send problematic headers - remove them all
                    $request->headers->remove('Content-Type');
                    // Also ensure Accept header is properly set
                    if (!$request->hasHeader('Accept') || empty($request->header('Accept'))) {
                        $request->headers->set('Accept', 'application/json, text/plain, */*');
                    }
                }
                
                return $next($request);
            }
            
            // For POST, PUT, PATCH, DELETE - handle Content-Type and body parsing
            $contentType = $request->header('Content-Type', '');
            $content = $request->getContent();
            
            // Remove charset if present for comparison
            $contentTypeBase = trim(explode(';', $contentType)[0]);
            
            // If we have content but no Content-Type, or Content-Type is wrong, fix it
            if (!empty($content)) {
                // Check if content looks like JSON (starts with { or [)
                $contentTrimmed = trim($content);
                $looksLikeJson = str_starts_with($contentTrimmed, '{') || str_starts_with($contentTrimmed, '[');
                
                if ($looksLikeJson) {
                    // Content is JSON, ensure Content-Type is set correctly
                    if (empty($contentTypeBase) || $contentTypeBase !== 'application/json') {
                        // Try to parse JSON and merge into request
                        $jsonData = json_decode($content, true);
                        if (json_last_error() === JSON_ERROR_NONE && is_array($jsonData)) {
                            // Replace request data with parsed JSON
                            $request->replace($jsonData);
                        }
                        // Set correct Content-Type
                        $request->headers->set('Content-Type', 'application/json');
                    }
                } elseif (empty($contentTypeBase)) {
                    // Content doesn't look like JSON but no Content-Type set
                    // Try to parse as JSON anyway (might be valid JSON without whitespace)
                    $jsonData = json_decode($content, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($jsonData)) {
                        $request->replace($jsonData);
                        $request->headers->set('Content-Type', 'application/json');
                    } else {
                        // Not JSON, set as form-urlencoded
                        $request->headers->set('Content-Type', 'application/x-www-form-urlencoded');
                    }
                }
            } else {
                // No content, remove Content-Type header to prevent Safari 415 errors
                $request->headers->remove('Content-Type');
            }
            
            // Ensure Accept header is set for API routes
            if (!$request->hasHeader('Accept') || empty($request->header('Accept'))) {
                $request->headers->set('Accept', 'application/json, text/plain, */*');
            }
        }

        try {
            return $next($request);
        } catch (\Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException $e) {
            // Catch 415 errors and return a proper response with CORS headers for Safari
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Content type not supported. Please send application/json.',
                ], 415)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                    ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept, Origin, X-CSRF-TOKEN')
                    ->header('Access-Control-Allow-Credentials', 'true');
            }
            throw $e;
        } catch (\Exception $e) {
            // Catch any other exceptions that might cause 415 errors
            if ($request->is('api/*') && str_contains($e->getMessage(), 'Unsupported Media Type')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Content type not supported.',
                ], 415)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                    ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept, Origin, X-CSRF-TOKEN')
                    ->header('Access-Control-Allow-Credentials', 'true');
            }
            throw $e;
        }
    }
}
