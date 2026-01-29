@extends('admin.layout')

@section('page_title', 'Maintain')
@section('page_subtitle', 'Performance tools and site maintenance.')

@section('content')
    @if (session('status'))
        <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
            {{ session('error') }}
        </div>
    @endif

    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
        <h2 class="text-xl font-bold text-white">Maintenance Tasks</h2>
        <p class="text-sm text-slate-400 mt-2">Clear caches and rebuild compiled assets.</p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @foreach ($tasks as $taskKey => $command)
                <form method="POST" action="{{ route('admin.maintain.run', ['task' => $taskKey]) }}" class="rounded-xl border border-slate-800 p-4">
                    @csrf
                    <p class="text-xs uppercase text-slate-400">{{ $command }}</p>
                    <p class="text-lg font-semibold text-white mt-2">Ready to run</p>
                    <button class="mt-4 px-4 py-2 rounded-full bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                        Run {{ $command }}
                    </button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
