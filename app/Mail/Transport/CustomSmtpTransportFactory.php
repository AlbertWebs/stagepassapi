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
        
        // Get SSL options from config
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
        
        // Create transport
        $transport = new EsmtpTransport($host, $port, false);
        
        if ($username && $password) {
            $transport->setUsername($username);
            $transport->setPassword($password);
        }
        
        // Set SSL options on the stream BEFORE it's initialized
        // This must be done before any connection is attempted
        if (!empty($sslOptions)) {
            try {
                $stream = $transport->getStream();
                if ($stream instanceof SocketStream) {
                    // Set stream options before initialization
                    $stream->setStreamOptions(['ssl' => $sslOptions]);
                    \Log::info('SSL options set on SMTP stream', [
                        'mailer' => $mailer,
                        'host' => $host,
                        'port' => $port,
                        'ssl_options' => $sslOptions,
                    ]);
                }
            } catch (\Exception $e) {
                \Log::warning('Failed to set SSL options on SMTP stream', [
                    'error' => $e->getMessage(),
                    'mailer' => $mailer,
                ]);
            }
        }
        
        return $transport;
    }
    
    public function supports(Dsn $dsn): bool
    {
        return 'smtp' === $dsn->getScheme();
    }
}
