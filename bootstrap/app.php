<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Set SSL stream context options VERY EARLY for SMTP connections behind proxy
// This is needed for cPanel servers where proxy intercepts SMTP connections
// Set it at the PHP level before Laravel even starts
$verifyPeerName = getenv('MAIL_VERIFY_PEER_NAME');
if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
    $sslOptions = [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ];
    
    $peerName = getenv('MAIL_PEER_NAME');
    if ($peerName) {
        $sslOptions['peer_name'] = $peerName;
    }
    
    // Set default stream context - this will be used by all stream operations
    stream_context_set_default([
        'ssl' => $sslOptions
    ]);
    
    // Also set for http and https contexts
    stream_context_set_default([
        'http' => [],
        'https' => ['ssl' => $sslOptions],
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
