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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure SSL options for SMTP to handle certificate mismatch issues
        // This fixes the "Peer certificate CN did not match expected CN" error
        if (config('mail.default') === 'smtp') {
            // Configure SSL after mailer is resolved
            $this->app->afterResolving('mail.manager', function () {
                try {
                    $swiftMailer = Mail::getSwiftMailer();
                    if ($swiftMailer) {
                        $transport = $swiftMailer->getTransport();
                        if ($transport instanceof Swift_SmtpTransport) {
                            $streamOptions = [];
                            
                            // Disable SSL verification if configured (for testing only)
                            $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
                            if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                                $streamOptions['ssl']['verify_peer_name'] = false;
                                $verifyPeer = env('MAIL_VERIFY_PEER');
                                $streamOptions['ssl']['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
                            }
                            
                            // Set custom peer name if provided (to match actual certificate CN)
                            if ($peerName = env('MAIL_PEER_NAME')) {
                                $streamOptions['ssl']['peer_name'] = $peerName;
                            }
                            
                            if (!empty($streamOptions)) {
                                $transport->setStreamOptions($streamOptions);
                            }
                        }
                    }
                } catch (\Exception $e) {
                    // Silently fail - SSL configuration is optional
                }
            });
        }
    }
}
