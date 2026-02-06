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
            
            // For POST, PUT, PATCH, DELETE - handle Content-Type
            $contentType = $request->header('Content-Type', '');
            
            // Remove charset if present for comparison
            $contentTypeBase = trim(explode(';', $contentType)[0]);
            
            // Accept multiple content types
            $acceptedTypes = [
                'application/json',
                'application/x-www-form-urlencoded',
                'multipart/form-data',
                'text/plain',
            ];
            
            // If no content type is set or it's empty, default to application/json for POST/PUT/PATCH
            if (empty($contentTypeBase) && in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                // Only set if there's actual content
                if ($request->getContent()) {
                    $request->headers->set('Content-Type', 'application/json');
                } else {
                    // No content, remove Content-Type header to prevent Safari 415 errors
                    $request->headers->remove('Content-Type');
                }
            }
            // If content type is not in accepted list but we have a body, try to parse as JSON
            elseif (!empty($contentTypeBase) && !in_array($contentTypeBase, $acceptedTypes)) {
                $content = $request->getContent();
                if (!empty($content)) {
                    // Try to parse as JSON
                    $jsonData = json_decode($content, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $request->merge($jsonData);
                        $request->headers->set('Content-Type', 'application/json');
                    } else {
                        // If not JSON, accept it anyway for API routes
                        $request->headers->set('Content-Type', 'application/json');
                    }
                } else {
                    // No content, remove the problematic Content-Type header
                    $request->headers->remove('Content-Type');
                }
            }
            
            // If content is form-urlencoded but body looks like JSON, parse it as JSON
            if (str_contains($contentType, 'application/x-www-form-urlencoded')) {
                $content = $request->getContent();
                if (!empty($content) && (str_starts_with(trim($content), '{') || str_starts_with(trim($content), '['))) {
                    // Content looks like JSON, parse it
                    $jsonData = json_decode($content, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $request->merge($jsonData);
                        $request->headers->set('Content-Type', 'application/json');
                    }
                }
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
