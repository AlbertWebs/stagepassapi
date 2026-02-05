<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Set SSL stream context options VERY EARLY for SMTP connections behind proxy
// This is needed for cPanel servers where proxy intercepts SMTP connections
// Set it at the PHP level before Laravel even starts
$verifyPeerName = getenv('MAIL_VERIFY_PEER_NAME');
if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
    // Disable OpenSSL CA verification at PHP ini level as fallback
    ini_set('openssl.cafile', '');
    ini_set('openssl.capath', '');
    
    $sslOptions = [
        'verify_peer' => 0, // Use 0 instead of false for stream context
        'verify_peer_name' => 0, // Use 0 instead of false for stream context
        'allow_self_signed' => 1,
    ];
    
    $peerName = getenv('MAIL_PEER_NAME');
    if ($peerName) {
        $sslOptions['peer_name'] = $peerName;
    }
    
    // Set default stream context - this will be used by all stream operations
    // IMPORTANT: This must be set before any stream_socket_client() calls
    stream_context_set_default([
        'ssl' => $sslOptions
    ]);
    
    // Also set for tcp context (SMTP uses tcp://)
    stream_context_set_default([
        'tcp' => ['ssl' => $sslOptions],
    ]);
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin.basic' => \App\Http\Middleware\AdminBasicAuth::class,
            'admin.session' => \App\Http\Middleware\AdminSessionAuth::class,
            'cors' => \App\Http\Middleware\CorsMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
