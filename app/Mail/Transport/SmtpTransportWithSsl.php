<?php

namespace App\Mail\Transport;

use Swift_SmtpTransport;

class SmtpTransportWithSsl extends Swift_SmtpTransport
{
    public function __construct($host = 'localhost', $port = 25, $encryption = null)
    {
        parent::__construct($host, $port, $encryption);
        
        // Configure SSL options immediately after construction
        $this->configureSsl();
    }
    
    /**
     * Configure SSL options from environment variables
     */
    private function configureSsl(): void
    {
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
            $this->setStreamOptions($streamOptions);
            \Log::info('Mail SSL: Stream options configured in custom transport', [
                'peer_name' => $peerName ?? 'not set',
                'verify_peer_name' => $streamOptions['ssl']['verify_peer_name'] ?? 'not set',
                'verify_peer' => $streamOptions['ssl']['verify_peer'] ?? 'not set',
            ]);
        }
    }
}
