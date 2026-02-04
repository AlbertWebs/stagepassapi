@extends('admin.layout')

@section('page_title', 'Cron Jobs')
@section('page_subtitle', 'Monitor scheduled tasks and their execution history.')

@section('content')
    <div class="space-y-6">
        @if (session('status'))
            <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('status') }}
            </div>
        @endif

        <!-- Scheduled Tasks Overview -->
        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <h2 class="text-xl font-bold text-white mb-6">Scheduled Tasks</h2>
            
            <div class="grid gap-4 md:grid-cols-3">
                @foreach ($scheduledTasks as $task)
                    <div class="rounded-xl border border-slate-800 bg-slate-950/60 p-5">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h3 class="text-base font-bold text-white mb-1">{{ $task['command'] }}</h3>
                                <p class="text-xs text-slate-400 mb-2">{{ $task['description'] }}</p>
                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $task['schedule'] }}</span>
                                </div>
                            </div>
                            @if($task['last_run'])
                                @if($task['last_run']->status === 'success')
                                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                @elseif($task['last_run']->status === 'failed')
                                    <div class="w-2 h-2 rounded-full bg-red-500"></div>
                                @else
                                    <div class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></div>
                                @endif
                            @endif
                        </div>
                        
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Total Runs</span>
                                <span class="text-slate-200 font-semibold">{{ $task['total_runs'] }}</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Success</span>
                                <span class="text-emerald-400 font-semibold">{{ $task['success_count'] }}</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Failed</span>
                                <span class="text-red-400 font-semibold">{{ $task['failed_count'] }}</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Success Rate</span>
                                <span class="text-slate-200 font-semibold">{{ $task['success_rate'] }}%</span>
                            </div>
                            @if($task['last_run'])
                                <div class="pt-2 border-t border-slate-800">
                                    <div class="text-xs text-slate-500">
                                        Last run: {{ \Carbon\Carbon::parse($task['last_run']->created_at)->diffForHumans() }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Execution History -->
        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-white">Execution History</h2>
                <div class="text-sm text-slate-400">
                    Showing last 100 executions
                </div>
            </div>

            @if($executions->isEmpty())
                <div class="text-center py-12">
                    <svg class="w-12 h-12 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-slate-400">No execution history yet. Cron jobs will appear here once they run.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-slate-800">
                                <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Command</th>
                                <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Duration</th>
                                <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Output</th>
                                <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Error</th>
                                <th class="text-left py-3 px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Executed</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach ($executions as $execution)
                                <tr class="hover:bg-slate-900/40 transition-colors">
                                    <td class="py-3 px-4">
                                        <div class="text-sm font-semibold text-slate-200">{{ $execution->command }}</div>
                                        @if($execution->description)
                                            <div class="text-xs text-slate-500 mt-1">{{ $execution->description }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($execution->status === 'success')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                                Success
                                            </span>
                                        @elseif($execution->status === 'failed')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-300">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                                Failed
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-300">
                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5 animate-pulse"></span>
                                                Running
                                            </span>
                                        @endif
                                        @if($execution->exit_code !== null)
                                            <div class="text-xs text-slate-500 mt-1">Exit: {{ $execution->exit_code }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($execution->duration_ms)
                                            <span class="text-sm text-slate-300">{{ number_format($execution->duration_ms) }}ms</span>
                                        @else
                                            <span class="text-sm text-slate-500">—</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($execution->output)
                                            <details class="cursor-pointer">
                                                <summary class="text-xs text-slate-400 hover:text-slate-300">View output</summary>
                                                <pre class="mt-2 text-xs text-slate-500 bg-slate-950 p-2 rounded border border-slate-800 max-h-32 overflow-auto">{{ $execution->output }}</pre>
                                            </details>
                                        @else
                                            <span class="text-sm text-slate-500">—</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($execution->error)
                                            <details class="cursor-pointer">
                                                <summary class="text-xs text-red-400 hover:text-red-300">View error</summary>
                                                <pre class="mt-2 text-xs text-red-400 bg-slate-950 p-2 rounded border border-red-500/20 max-h-32 overflow-auto">{{ $execution->error }}</pre>
                                            </details>
                                        @else
                                            <span class="text-sm text-slate-500">—</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="text-sm text-slate-300">{{ \Carbon\Carbon::parse($execution->created_at)->format('M d, Y H:i:s') }}</div>
                                        <div class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($execution->created_at)->diffForHumans() }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
