<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

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
        // Note: In Laravel 12 with Symfony Mailer, SSL options are configured via the 'stream' 
        // configuration in config/mail.php. The stream options are automatically applied by Symfony Mailer.
        // 
        // If you need to programmatically configure SSL options, you can extend the mail manager
        // and configure the transport's stream context. However, the config/mail.php approach
        // should work for most cases.
    }
}
