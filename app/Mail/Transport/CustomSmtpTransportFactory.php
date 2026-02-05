<?php

namespace App\Mail\Transport;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;

class CustomSmtpTransportFactory implements Transport\TransportFactoryInterface
{
    public function create(Dsn $dsn): TransportInterface
    {
        $host = $dsn->getHost();
        $port = $dsn->getPort(587);
        $username = $dsn->getUser();
        $password = $dsn->getPassword();
        
        // Get SSL options from config FIRST - before creating transport
        $sslOptions = [];
        $mailer = config('mail.default');
        
        // Try to get SSL options from the current mailer config
        $mailerConfig = config("mail.mailers.{$mailer}", []);
        if (!empty($mailerConfig['stream']['ssl'])) {
            $sslOptions = $mailerConfig['stream']['ssl'];
        } else {
            // Fallback to smtp config if available
            $sslOptions = config('mail.mailers.smtp.stream.ssl', []);
        }
        
        $transport = new EsmtpTransport($host, $port, false);
        
        if ($username && $password) {
            $transport->setUsername($username);
            $transport->setPassword($password);
        }
        
        // Set SSL options on the stream BEFORE it's initialized
        if (!empty($sslOptions)) {
            try {
                // Ensure global stream context is also set as fallback
                $currentContext = stream_context_get_default();
                $currentOptions = $currentContext ? stream_context_get_options($currentContext) : [];
                $mergedOptions = array_merge_recursive($currentOptions, ['ssl' => $sslOptions]);
                stream_context_set_default($mergedOptions);
                
                // Get the stream and set options before any initialization
                $stream = $transport->getStream();
                if ($stream instanceof SocketStream) {
                    // Set stream options - these will be used when initialize() is called
                    // The options should be at the root level with 'ssl' key
                    $stream->setStreamOptions(['ssl' => $sslOptions]);
                    
                    // Verify the options were set
                    $setOptions = $stream->getStreamOptions();
                    \Log::info('SSL options set on SMTP stream', [
                        'mailer' => $mailer,
                        'host' => $host,
                        'ssl_options_set' => $sslOptions,
                        'stream_options_retrieved' => $setOptions
                    ]);
                }
            } catch (\Exception $e) {
                \Log::error('Failed to set SSL options on SMTP stream', [
                    'error' => $e->getMessage(),
                    'mailer' => $mailer,
                    'host' => $host,
                    'ssl_options' => $sslOptions,
                    'trace' => $e->getTraceAsString()
                ]);
            }
        } else {
            \Log::warning('No SSL options found for mailer', [
                'mailer' => $mailer,
                'mailer_config' => $mailerConfig ?? 'not found'
            ]);
        }
        
        return $transport;
    }
    
    public function supports(Dsn $dsn): bool
    {
        return 'smtp' === $dsn->getScheme();
    }
}
