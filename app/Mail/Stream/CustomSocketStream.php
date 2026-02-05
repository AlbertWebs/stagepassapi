<?php

namespace App\Mail\Stream;

use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream as BaseSocketStream;
use Symfony\Component\Mailer\Exception\TransportException;

class CustomSocketStream extends BaseSocketStream
{
    private ?array $sslOptions = null;
    
    public function initialize(): void
    {
        // Get SSL options from config before initializing
        $mailer = config('mail.default');
        $mailerConfig = config("mail.mailers.{$mailer}", []);
        
        if (!empty($mailerConfig['stream']['ssl'])) {
            $this->sslOptions = $mailerConfig['stream']['ssl'];
        } else {
            $this->sslOptions = config('mail.mailers.smtp.stream.ssl', []);
        }
        
        // CRITICAL: Set stream context options BEFORE parent::initialize()
        // This ensures they're used when the socket is created
        if (!empty($this->sslOptions)) {
            // Set on this stream instance - parent will use these in initialize()
            $this->setStreamOptions(['ssl' => $this->sslOptions]);
            
            // Also ensure default stream context has SSL options as fallback
            $currentContext = stream_context_get_default();
            $currentOptions = $currentContext ? stream_context_get_options($currentContext) : [];
            $mergedOptions = array_merge_recursive($currentOptions, ['ssl' => $this->sslOptions]);
            stream_context_set_default($mergedOptions);
        }
        
        // Call parent initialize - it will use our stream context options via $this->streamContextOptions
        parent::initialize();
    }
    
    public function startTLS(): bool
    {
        // stream_socket_enable_crypto() uses the context that was attached when the socket was created
        // Since we set the stream context options before initialize(), the socket should have our SSL options
        // But as an extra safety measure, ensure default context is set
        if (!empty($this->sslOptions)) {
            $currentContext = stream_context_get_default();
            $currentOptions = $currentContext ? stream_context_get_options($currentContext) : [];
            $mergedOptions = array_merge_recursive($currentOptions, ['ssl' => $this->sslOptions]);
            stream_context_set_default($mergedOptions);
        }
        
        // Use parent's startTLS - the socket context should already have our SSL options
        return parent::startTLS();
    }
}
