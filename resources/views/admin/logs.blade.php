@extends('admin.layout')

@section('page_title', 'System Logs')
@section('page_subtitle', 'Recent entries from the application log.')

@section('content')
    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
        <h2 class="text-xl font-bold text-white">Log Tail</h2>
        <p class="text-sm text-slate-400 mt-2">Showing the last 200 lines from {{ $logPath }}.</p>

        <div class="mt-6 rounded-xl border border-slate-800 bg-slate-950 p-4 text-xs text-slate-200 font-mono overflow-auto max-h-[520px]">
            @if (empty($logLines))
                <div class="text-slate-500">No logs found.</div>
            @else
                @foreach ($logLines as $line)
                    <div class="whitespace-pre-wrap">{{ $line }}</div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
