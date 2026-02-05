<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure SSL options for SMTP to handle certificate mismatch issues
        // This only applies custom SSL options if explicitly configured in .env
        // For Gmail and other properly configured SMTP servers, default SSL verification is used
        if (config('mail.default') === 'smtp') {
            $sslOptions = [];
            
            // Only set peer name if explicitly provided (for certificate mismatch issues)
            $peerName = env('MAIL_PEER_NAME');
            if ($peerName) {
                $sslOptions['peer_name'] = $peerName;
            }
            
            // Only disable SSL verification if explicitly configured (not recommended for production)
            $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
            if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                $sslOptions['verify_peer_name'] = false;
                $verifyPeer = env('MAIL_VERIFY_PEER');
                $sslOptions['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
            }
            
            // Only apply SSL options if they were explicitly set
            if (!empty($sslOptions)) {
                // Set default SSL context options for all stream operations
                $defaultContext = stream_context_get_default(['ssl' => $sslOptions]);
                stream_context_set_default(['ssl' => array_merge(
                    stream_context_get_options($defaultContext)['ssl'] ?? [],
                    $sslOptions
                )]);
                
                \Log::info('Mail SSL: Custom SSL options applied', [
                    'peer_name' => $peerName ?? 'not set',
                    'verify_peer_name' => $sslOptions['verify_peer_name'] ?? 'not set',
                    'verify_peer' => $sslOptions['verify_peer'] ?? 'not set',
                ]);
            }
        }
    }
}
