<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Swift_SmtpTransport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register a custom SMTP transport factory that sets SSL options from the start
        if (config('mail.default') === 'smtp') {
            $this->app->extend('swift.transport', function ($transport, $app) {
                if ($transport instanceof Swift_SmtpTransport) {
                    $streamOptions = [];
                    
                    // Set custom peer name if provided
                    $peerName = env('MAIL_PEER_NAME');
                    if ($peerName) {
                        $streamOptions['ssl']['peer_name'] = $peerName;
                    }
                    
                    // Disable SSL verification if configured
                    $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
                    if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                        $streamOptions['ssl']['verify_peer_name'] = false;
                        $verifyPeer = env('MAIL_VERIFY_PEER');
                        $streamOptions['ssl']['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
                    }
                    
                    if (!empty($streamOptions)) {
                        $transport->setStreamOptions($streamOptions);
                        \Log::info('Mail SSL: Stream options configured in register()', [
                            'peer_name' => $peerName ?? 'not set',
                            'verify_peer_name' => $streamOptions['ssl']['verify_peer_name'] ?? 'not set',
                            'verify_peer' => $streamOptions['ssl']['verify_peer'] ?? 'not set',
                        ]);
                    }
                }
                
                return $transport;
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure SSL options for SMTP to handle certificate mismatch issues
        // This fixes the "Peer certificate CN did not match expected CN" error
        if (config('mail.default') === 'smtp') {
            // Configure SSL when mailer is first resolved (before any emails are sent)
            $this->app->afterResolving('mail.manager', function () {
                $this->configureMailSsl();
            });
            
            // Also configure SSL every time Mail facade is accessed (as a safety net)
            // This ensures SSL is configured even if the mailer was created before our hook ran
            $this->app->resolving('swift.mailer', function () {
                $this->configureMailSsl();
            });
        }
    }

    /**
     * Configure SSL options for SMTP transport
     */
    private function configureMailSsl(): void
    {
        try {
            $swiftMailer = Mail::getSwiftMailer();
            if (!$swiftMailer) {
                return;
            }

            $transport = $swiftMailer->getTransport();
            if ($transport instanceof Swift_SmtpTransport) {
                $streamOptions = [];
                
                // Set custom peer name if provided (to match actual certificate CN)
                $peerName = env('MAIL_PEER_NAME');
                if ($peerName) {
                    $streamOptions['ssl']['peer_name'] = $peerName;
                }
                
                // Disable SSL verification if configured
                $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
                if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                    $streamOptions['ssl']['verify_peer_name'] = false;
                    $verifyPeer = env('MAIL_VERIFY_PEER');
                    $streamOptions['ssl']['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
                }
                
                if (!empty($streamOptions)) {
                    $transport->setStreamOptions($streamOptions);
                    \Log::info('Mail SSL: Stream options configured', [
                        'peer_name' => $peerName ?? 'not set',
                        'verify_peer_name' => $streamOptions['ssl']['verify_peer_name'] ?? 'not set',
                        'verify_peer' => $streamOptions['ssl']['verify_peer'] ?? 'not set',
                    ]);
                }
            }
        } catch (\Exception $e) {
            \Log::error('Mail SSL: Failed to configure SSL options', ['error' => $e->getMessage()]);
        }
    }
}
