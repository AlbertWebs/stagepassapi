<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Set SSL stream context options EARLY for SMTP connections behind proxy
        // This ensures SSL options are applied before any mail connection is attempted
        $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
        if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
            // Disable OpenSSL CA verification at PHP ini level as fallback
            ini_set('openssl.cafile', '');
            ini_set('openssl.capath', '');
            
            $sslOptions = [
                'verify_peer' => 0, // Use 0 instead of false for stream context
                'verify_peer_name' => 0, // Use 0 instead of false for stream context
                'allow_self_signed' => 1,
            ];
            
            $peerName = env('MAIL_PEER_NAME');
            if ($peerName) {
                $sslOptions['peer_name'] = $peerName;
            }
            
            // Set default stream context with SSL options
            stream_context_set_default(['ssl' => $sslOptions]);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ensure SSL context is set before any mail operations
        // This is a fallback in case bootstrap/app.php didn't run
        if (config('mail.default') === 'smtp') {
            $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
            if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                ini_set('openssl.cafile', '');
                ini_set('openssl.capath', '');
                
                $sslOptions = [
                    'verify_peer' => 0,
                    'verify_peer_name' => 0,
                    'allow_self_signed' => 1,
                ];
                
                $peerName = env('MAIL_PEER_NAME');
                if ($peerName) {
                    $sslOptions['peer_name'] = $peerName;
                }
                
                // Ensure default context is set
                stream_context_set_default(['ssl' => $sslOptions]);
            }
        }
    }
}
