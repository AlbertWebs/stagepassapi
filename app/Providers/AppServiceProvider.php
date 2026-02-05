<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;

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
        // Ensure SSL options from config are applied to SMTP transport
        if (config('mail.default') === 'smtp' && !empty(config('mail.mailers.smtp.stream.ssl'))) {
            $this->app->afterResolving(MailManager::class, function (MailManager $mailManager) {
                $mailManager->extend('smtp', function (array $config) use ($mailManager) {
                    // Ensure SSL options from config are preserved
                    if (isset($config['stream']['ssl'])) {
                        $config['stream']['ssl'] = array_merge(
                            config('mail.mailers.smtp.stream.ssl', []),
                            $config['stream']['ssl']
                        );
                    } else {
                        $config['stream']['ssl'] = config('mail.mailers.smtp.stream.ssl', []);
                    }
                    
                    return $mailManager->createTransport($config);
                });
            });
        }
    }
}
