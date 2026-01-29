<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = config('admin.basic_user');
        $pass = config('admin.basic_pass');

        if (!$user || !$pass) {
            return response('Admin credentials are not configured.', 500);
        }

        if ($request->getUser() !== $user || $request->getPassword() !== $pass) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }

        return $next($request);
    }
}
