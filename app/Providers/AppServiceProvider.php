<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
            $sslOptions = [
                'verify_peer_name' => false,
                'verify_peer' => (env('MAIL_VERIFY_PEER') === false || env('MAIL_VERIFY_PEER') === 'false' || env('MAIL_VERIFY_PEER') === '0') ? false : true,
            ];
            
            $peerName = env('MAIL_PEER_NAME');
            if ($peerName) {
                $sslOptions['peer_name'] = $peerName;
            }
            
            // Set default stream context with SSL options
            $currentContext = stream_context_get_default();
            $currentOptions = $currentContext ? stream_context_get_options($currentContext) : [];
            $newOptions = array_merge_recursive($currentOptions, ['ssl' => $sslOptions]);
            stream_context_set_default($newOptions);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
