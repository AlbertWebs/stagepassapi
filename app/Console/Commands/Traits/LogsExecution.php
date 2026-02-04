<?php

namespace App\Console\Commands\Traits;

use Illuminate\Support\Facades\DB;

trait LogsExecution
{
    protected function logExecution(string $command, string $description, callable $callback): int
    {
        $startTime = microtime(true);
        $startedAt = now();
        
        // Create initial log entry
        $logId = DB::table('cron_jobs')->insertGetId([
            'command' => $command,
            'description' => $description,
            'status' => 'running',
            'started_at' => $startedAt,
            'created_at' => $startedAt,
            'updated_at' => $startedAt,
        ]);

        $output = '';
        $error = '';
        $exitCode = 0;
        $status = 'success';

        try {
            $exitCode = $callback();
            
            if ($exitCode !== 0) {
                $status = 'failed';
            }
        } catch (\Exception $e) {
            $status = 'failed';
            $exitCode = 1;
            $error = $e->getMessage() . "\n" . $e->getTraceAsString();
        }

        $endTime = microtime(true);
        $durationMs = (int) (($endTime - $startTime) * 1000);
        $finishedAt = now();

        // Update log entry
        DB::table('cron_jobs')
            ->where('id', $logId)
            ->update([
                'status' => $status,
                'output' => $output ?: null,
                'error' => $error ?: null,
                'exit_code' => $exitCode,
                'finished_at' => $finishedAt,
                'duration_ms' => $durationMs,
                'updated_at' => $finishedAt,
            ]);

        return $exitCode;
    }
}
