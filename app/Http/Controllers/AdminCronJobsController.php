<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

class AdminCronJobsController extends Controller
{
    public function index()
    {
        // Get all scheduled tasks
        $scheduledTasks = [
            [
                'command' => 'instagram:fetch-media',
                'description' => 'Fetch Instagram media and store it in the database',
                'schedule' => 'Every hour',
                'timezone' => 'Africa/Nairobi',
            ],
            [
                'command' => 'instagram:send-status-email',
                'description' => 'Send daily email notification if Instagram fetching is working correctly',
                'schedule' => 'Daily at 00:00',
                'timezone' => 'Africa/Nairobi',
            ],
            [
                'command' => 'stats:update-events',
                'description' => 'Automatically update the Events stat by adding 1-4 events per month',
                'schedule' => 'Monthly on 1st at 01:00',
                'timezone' => 'Africa/Nairobi',
            ],
        ];

        // Get execution history from database
        $executions = DB::table('cron_jobs')
            ->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();

        // Group executions by command
        $executionsByCommand = $executions->groupBy('command');

        // Calculate statistics for each command
        foreach ($scheduledTasks as &$task) {
            $commandExecutions = $executionsByCommand->get($task['command'], collect());
            $task['total_runs'] = $commandExecutions->count();
            $task['success_count'] = $commandExecutions->where('status', 'success')->count();
            $task['failed_count'] = $commandExecutions->where('status', 'failed')->count();
            $task['last_run'] = $commandExecutions->first();
            $task['success_rate'] = $task['total_runs'] > 0 
                ? round(($task['success_count'] / $task['total_runs']) * 100, 1) 
                : 0;
        }

        return view('admin.cron-jobs', [
            'sectionKey' => 'cron-jobs',
            'scheduledTasks' => $scheduledTasks,
            'executions' => $executions,
        ]);
    }
}
