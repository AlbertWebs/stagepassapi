<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateEventsStat extends Command
{
    protected $signature = 'stats:update-events';
    protected $description = 'Automatically update the Events stat by adding 1-4 events per month';

    public function handle(): int
    {
        try {
            // Find the Events stat
            $eventsStat = DB::table('stats')
                ->where('label', 'Events')
                ->first();

            if (!$eventsStat) {
                $this->error('Events stat not found in database.');
                return Command::FAILURE;
            }

            // Parse current value (remove commas and + signs)
            $currentValue = (int) str_replace([',', '+', ' '], '', $eventsStat->value);
            
            // Generate random increment between 1 and 4
            $increment = rand(1, 4);
            
            // Calculate new value
            $newValue = $currentValue + $increment;
            
            // Format with commas for display
            $formattedValue = number_format($newValue);
            
            // Update the stat
            DB::table('stats')
                ->where('id', $eventsStat->id)
                ->update([
                    'value' => $formattedValue,
                    'updated_at' => now(),
                ]);

            $this->info("Events stat updated: {$eventsStat->value} → {$formattedValue} (+{$increment})");
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error updating events stat: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
