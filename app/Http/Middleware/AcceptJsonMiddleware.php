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
            $contentType = $request->header('Content-Type', '');
            
            // If no content type is set, default to application/json
            if (empty($contentType) && $request->isMethod('POST')) {
                $request->headers->set('Content-Type', 'application/json');
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

        return $next($request);
    }
}
