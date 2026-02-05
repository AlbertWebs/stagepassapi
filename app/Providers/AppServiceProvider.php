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
        // Set SSL options EARLY in register() to ensure they're applied before any connections
        // This is critical for cPanel servers behind proxies
        if (env('MAIL_VERIFY_PEER_NAME') === false || env('MAIL_VERIFY_PEER_NAME') === 'false' || env('MAIL_VERIFY_PEER_NAME') === '0') {
            $sslOptions = [
                'verify_peer_name' => false,
                'verify_peer' => (env('MAIL_VERIFY_PEER') === false || env('MAIL_VERIFY_PEER') === 'false' || env('MAIL_VERIFY_PEER') === '0') ? false : true,
            ];
            
            $peerName = env('MAIL_PEER_NAME');
            if ($peerName) {
                $sslOptions['peer_name'] = $peerName;
            }
            
            // Set default stream context immediately
            $currentContext = stream_context_get_default();
            $currentOptions = stream_context_get_options($currentContext);
            $newOptions = array_merge_recursive($currentOptions, ['ssl' => $sslOptions]);
            stream_context_set_default($newOptions);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure SSL options for SMTP to handle certificate mismatch issues
        // This is needed when behind a proxy/load balancer that intercepts SMTP connections
        if (config('mail.default') === 'smtp') {
            // Extend mail manager to inject SSL options into transport
            $this->app->resolving(MailManager::class, function (MailManager $mailManager) {
                $mailManager->extend('smtp', function (array $config) use ($mailManager) {
                    // Build SSL stream context options
                    $sslOptions = [];
                    
                    $peerName = env('MAIL_PEER_NAME');
                    if ($peerName) {
                        $sslOptions['peer_name'] = $peerName;
                    }
                    
                    $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
                    if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                        $sslOptions['verify_peer_name'] = false;
                        $verifyPeer = env('MAIL_VERIFY_PEER');
                        $sslOptions['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
                    }
                    
                    // Merge SSL options into config so Symfony Mailer uses them
                    if (!empty($sslOptions)) {
                        $config['stream']['ssl'] = array_merge(
                            $config['stream']['ssl'] ?? [],
                            $sslOptions
                        );
                        
                        \Log::info('Mail SSL: SSL options merged into transport config', [
                            'peer_name' => $peerName ?? 'not set',
                            'verify_peer_name' => $sslOptions['verify_peer_name'] ?? 'not set',
                            'verify_peer' => $sslOptions['verify_peer'] ?? 'not set',
                        ]);
                    }
                    
                    // Create transport with SSL options in config
                    return $mailManager->createTransport($config);
                });
            });
            
            // Also set global stream context as fallback
            $sslOptions = [];
            
            $peerName = env('MAIL_PEER_NAME');
            if ($peerName) {
                $sslOptions['peer_name'] = $peerName;
            }
            
            $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
            if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                $sslOptions['verify_peer_name'] = false;
                $verifyPeer = env('MAIL_VERIFY_PEER');
                $sslOptions['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
            }
            
            if (!empty($sslOptions)) {
                $currentDefault = stream_context_get_default();
                $currentOptions = stream_context_get_options($currentDefault);
                $mergedOptions = array_merge_recursive($currentOptions, ['ssl' => $sslOptions]);
                stream_context_set_default($mergedOptions);
                
                \Log::info('Mail SSL: Global stream context also set in boot()', [
                    'peer_name' => $peerName ?? 'not set',
                    'verify_peer_name' => $sslOptions['verify_peer_name'] ?? 'not set',
                    'verify_peer' => $sslOptions['verify_peer'] ?? 'not set',
                ]);
            }
        }
    }
}
