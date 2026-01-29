<?php

use App\Console\Commands\FetchInstagramMedia;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command(FetchInstagramMedia::class)
    ->dailyAt('02:00')
    ->withoutOverlapping()
    ->onOneServer();
