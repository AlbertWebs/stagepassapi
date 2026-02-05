<?php

namespace App\Mail\Transport;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;
use App\Mail\Stream\CustomSocketStream;

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
        
        // Create custom stream with SSL options if needed
        $stream = null;
        if (!empty($sslOptions)) {
            $customStream = new CustomSocketStream();
            $customStream->setHost($host);
            $customStream->setPort($port);
            $customStream->setStreamOptions(['ssl' => $sslOptions]);
            $stream = $customStream;
            
            \Log::info('Using custom socket stream with SSL options', [
                'mailer' => $mailer,
                'host' => $host,
                'ssl_options' => $sslOptions
            ]);
        }
        
        // Create transport with custom stream (or default if no SSL options)
        $transport = new EsmtpTransport($host, $port, false, null, null, $stream);
        
        if ($username && $password) {
            $transport->setUsername($username);
            $transport->setPassword($password);
        }
        
        // Fallback: if we didn't use custom stream, set options on default stream
        if (empty($stream) && !empty($sslOptions)) {
            $defaultStream = $transport->getStream();
            if ($defaultStream instanceof SocketStream) {
                $defaultStream->setStreamOptions(['ssl' => $sslOptions]);
            }
        }
        
        return $transport;
    }
    
    public function supports(Dsn $dsn): bool
    {
        return 'smtp' === $dsn->getScheme();
    }
}
