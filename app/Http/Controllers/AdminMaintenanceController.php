<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class AdminMaintenanceController extends Controller
{
    private array $tasks = [
        'cache-clear' => 'cache:clear',
        'config-clear' => 'config:clear',
        'route-clear' => 'route:clear',
        'view-clear' => 'view:clear',
        'optimize-clear' => 'optimize:clear',
    ];

    public function index()
    {
        return view('admin.maintain', [
            'sectionKey' => 'maintain',
            'tasks' => $this->tasks,
        ]);
    }

    public function run(string $task): RedirectResponse
    {
        if (!array_key_exists($task, $this->tasks)) {
            abort(404);
        }

        $command = $this->tasks[$task];
        $exitCode = Artisan::call($command);
        $output = trim(Artisan::output());

        if ($exitCode !== 0) {
            return back()->with('error', $output ?: "Failed to run {$command}.");
        }

        return back()->with('status', $output ?: "Completed: {$command}.");
    }
}
