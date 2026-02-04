<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendInstagramStatusEmail extends Command
{
    protected $signature = 'instagram:send-status-email';
    protected $description = 'Send daily email notification if Instagram fetching is working correctly';

    public function handle(): int
    {
        try {
            // Check the last successful Instagram fetch
            $lastFetch = DB::table('instagram_media')
                ->orderBy('fetched_at', 'desc')
                ->first();

            if (!$lastFetch) {
                $this->warn('No Instagram media found in database. Fetch may not have run yet.');
                return Command::SUCCESS; // Don't send email if no data exists yet
            }

            $lastFetchTime = \Carbon\Carbon::parse($lastFetch->fetched_at);
            $hoursSinceLastFetch = $lastFetchTime->diffInHours(now());

            // Consider it working if last fetch was within the last 24 hours
            // Since we fetch hourly, there should be a fetch within the last 2 hours ideally
            $isWorking = $hoursSinceLastFetch <= 24;

            if ($isWorking) {
                $totalMedia = DB::table('instagram_media')->count();
                $recentMedia = DB::table('instagram_media')
                    ->where('fetched_at', '>=', now()->subDay())
                    ->count();

                $subject = 'Instagram Feed Status - All Systems Operational';
                $message = "Instagram feed fetching is working correctly.\n\n";
                $message .= "Last successful fetch: " . $lastFetchTime->format('Y-m-d H:i:s') . "\n";
                $message .= "Hours since last fetch: {$hoursSinceLastFetch}\n";
                $message .= "Total media items: {$totalMedia}\n";
                $message .= "New items in last 24 hours: {$recentMedia}\n\n";
                $message .= "The system is fetching Instagram feeds every hour as scheduled.";

                Mail::raw($message, function ($mail) use ($subject) {
                    $mail->to('albertmuhatia@gmail.com')
                        ->subject($subject)
                        ->from(config('mail.from.address'), config('mail.from.name', 'StagePass Admin'));
                });

                $this->info('Status email sent successfully to albertmuhatia@gmail.com');
            } else {
                $this->warn("Instagram fetch may not be working. Last fetch was {$hoursSinceLastFetch} hours ago.");
                // Optionally send an error email here if desired
            }

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error sending status email: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
