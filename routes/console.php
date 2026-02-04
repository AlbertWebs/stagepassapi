<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule Instagram media fetching every hour
Schedule::command('instagram:fetch-media')
    ->hourly()
    ->withoutOverlapping()
    ->runInBackground();

// Schedule daily status email at midnight
Schedule::command('instagram:send-status-email')
    ->dailyAt('00:00')
    ->timezone('Africa/Nairobi');

// Schedule monthly stats update (runs on the 1st of each month at 1:00 AM)
Schedule::command('stats:update-events')
    ->monthlyOn(1, '01:00')
    ->timezone('Africa/Nairobi');
