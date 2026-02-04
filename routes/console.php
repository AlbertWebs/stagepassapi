<?php

use App\Console\Commands\FetchInstagramMedia;
use App\Console\Commands\SendInstagramStatusEmail;
use App\Console\Commands\UpdateEventsStat;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command(FetchInstagramMedia::class)
    ->hourly()
    ->withoutOverlapping()
    ->onOneServer();

// Update Events stat automatically - runs on the 1st of each month at 3:00 AM
Schedule::command(UpdateEventsStat::class)
    ->monthlyOn(1, '03:00')
    ->withoutOverlapping()
    ->onOneServer();

// Send Instagram status email daily at midnight if fetching is working correctly
Schedule::command(SendInstagramStatusEmail::class)
    ->dailyAt('00:00')
    ->withoutOverlapping()
    ->onOneServer();
