<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;
use App\Mail\Transport\CustomSmtpTransportFactory;

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
        // Register custom SMTP transport factory to ensure SSL options are applied
        if (config('mail.default') === 'smtp') {
            $this->app->afterResolving(MailManager::class, function (MailManager $mailManager) {
                // Use a static flag to prevent infinite recursion
                static $extending = false;
                
                $mailManager->extend('smtp', function (array $config) use ($mailManager, &$extending) {
                    if ($extending) {
                        // If we're already extending, use the default factory to avoid recursion
                        return null; // Let Laravel use default
                    }
                    
                    $extending = true;
                    
                    try {
                        // Use custom factory to create transport with SSL options
                        $factory = new CustomSmtpTransportFactory();
                        
                        // Create DSN with properly URL-encoded credentials
                        $username = rawurlencode($config['username'] ?? '');
                        $password = rawurlencode($config['password'] ?? '');
                        $host = $config['host'] ?? '127.0.0.1';
                        $port = $config['port'] ?? 587;
                        
                        $dsn = \Symfony\Component\Mailer\Transport\Dsn::fromString(
                            sprintf('smtp://%s:%s@%s:%d', $username, $password, $host, $port)
                        );
                        
                        return $factory->create($dsn);
                    } finally {
                        $extending = false;
                    }
                });
            });
        }
    }
}
