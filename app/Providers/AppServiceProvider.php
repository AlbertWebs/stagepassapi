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
            // Configure SSL when mailer is first resolved (before any emails are sent)
            $this->app->afterResolving('mail.manager', function () {
                $this->configureMailSsl();
            });
            
            // Also configure before sending (as a fallback)
            Mail::sending(function () {
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
                // This is production-safe - we're accepting the certificate that's actually presented
                $peerName = env('MAIL_PEER_NAME');
                if ($peerName) {
                    $streamOptions['ssl']['peer_name'] = $peerName;
                    \Log::info('Mail SSL: Setting peer_name', ['peer_name' => $peerName]);
                }
                
                // Disable SSL verification if configured (for testing only - not recommended for production)
                $verifyPeerName = env('MAIL_VERIFY_PEER_NAME');
                if ($verifyPeerName === false || $verifyPeerName === 'false' || $verifyPeerName === '0') {
                    $streamOptions['ssl']['verify_peer_name'] = false;
                    $verifyPeer = env('MAIL_VERIFY_PEER');
                    $streamOptions['ssl']['verify_peer'] = ($verifyPeer === false || $verifyPeer === 'false' || $verifyPeer === '0') ? false : true;
                    \Log::info('Mail SSL: Disabling peer verification');
                }
                
                if (!empty($streamOptions)) {
                    $transport->setStreamOptions($streamOptions);
                    \Log::info('Mail SSL: Stream options configured', ['options' => $streamOptions]);
                } else {
                    \Log::debug('Mail SSL: No SSL options to configure');
                }
            }
        } catch (\Exception $e) {
            \Log::error('Mail SSL: Failed to configure SSL options', ['error' => $e->getMessage()]);
        }
    }
}
