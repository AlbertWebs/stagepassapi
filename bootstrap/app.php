<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Set SSL stream context options EARLY for SMTP connections behind proxy
// This is needed for cPanel servers where proxy intercepts SMTP connections
if (getenv('MAIL_VERIFY_PEER_NAME') === 'false' || getenv('MAIL_VERIFY_PEER_NAME') === '0') {
    $sslOptions = [
        'verify_peer_name' => false,
        'verify_peer' => (getenv('MAIL_VERIFY_PEER') === 'false' || getenv('MAIL_VERIFY_PEER') === '0') ? false : true,
    ];
    
    $peerName = getenv('MAIL_PEER_NAME');
    if ($peerName) {
        $sslOptions['peer_name'] = $peerName;
    }
    
    if (!empty($sslOptions)) {
        $currentContext = stream_context_get_default();
        $currentOptions = stream_context_get_options($currentContext);
        $newOptions = array_merge_recursive($currentOptions, ['ssl' => $sslOptions]);
        stream_context_set_default($newOptions);
    }
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
