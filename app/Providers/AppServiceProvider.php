<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\MailManager;
use Swift_SmtpTransport;
use App\Mail\Transport\SmtpTransportWithSsl;

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
            // Extend the mail manager to use our custom transport with SSL configured
            $this->app->resolving(MailManager::class, function (MailManager $mailManager) {
                $mailManager->extend('smtp', function (array $config) {
                    // Create custom transport with SSL options configured from the start
                    $host = $config['host'] ?? config('mail.mailers.smtp.host', '127.0.0.1');
                    $port = $config['port'] ?? config('mail.mailers.smtp.port', 2525);
                    $encryption = $config['encryption'] ?? config('mail.mailers.smtp.encryption');
                    
                    $transport = new SmtpTransportWithSsl($host, $port, $encryption);
                    
                    // Set credentials
                    if (isset($config['username'])) {
                        $transport->setUsername($config['username']);
                    } elseif (config('mail.mailers.smtp.username')) {
                        $transport->setUsername(config('mail.mailers.smtp.username'));
                    }
                    
                    if (isset($config['password'])) {
                        $transport->setPassword($config['password']);
                    } elseif (config('mail.mailers.smtp.password')) {
                        $transport->setPassword(config('mail.mailers.smtp.password'));
                    }
                    
                    return $transport;
                });
            });
            
            // Also configure SSL when mailer is resolved (as a fallback)
            $this->app->afterResolving('mail.manager', function () {
                $this->configureMailSsl();
            });
        }
    }

    /**
     * Configure SSL options for SMTP transport (fallback method)
     */
    private function configureMailSsl(): void
    {
        try {
            $swiftMailer = Mail::getSwiftMailer();
            if (!$swiftMailer) {
                return;
            }

            $transport = $swiftMailer->getTransport();
            if ($transport instanceof Swift_SmtpTransport && !($transport instanceof SmtpTransportWithSsl)) {
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
                    \Log::info('Mail SSL: Stream options configured in boot() fallback', [
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
