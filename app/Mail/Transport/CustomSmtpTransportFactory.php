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
        
        $transport = new EsmtpTransport($host, $port, false);
        
        if ($username && $password) {
            $transport->setUsername($username);
            $transport->setPassword($password);
        }
        
        // Get SSL options from config - check all mailers to find the one being used
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
        
        if (!empty($sslOptions)) {
            try {
                $stream = $transport->getStream();
                if ($stream instanceof SocketStream) {
                    // Set stream options - this will be used when the socket is created
                    $stream->setStreamOptions(['ssl' => $sslOptions]);
                }
            } catch (\Exception $e) {
                \Log::warning('Failed to set SSL options on SMTP stream', [
                    'error' => $e->getMessage(),
                    'mailer' => $mailer
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
