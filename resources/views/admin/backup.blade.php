@extends('admin.layout')

@section('page_title', 'Backup')
@section('page_subtitle', 'Manage database and asset backups.')

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
        <h2 class="text-xl font-bold text-white">Database Backup</h2>
        <p class="text-sm text-slate-400 mt-2">Create a snapshot of the SQLite database.</p>
        <form method="POST" action="{{ route('admin.backup.run') }}" class="mt-6">
            @csrf
            <button class="px-4 py-2 rounded-full bg-yellow-500 text-slate-900 font-semibold hover:bg-yellow-400 transition">
                Run Backup
            </button>
        </form>

        <div class="mt-8">
            <h3 class="text-sm font-semibold text-white">Backup History</h3>
            <div class="mt-4 overflow-hidden rounded-xl border border-slate-800">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-900">
                        <tr class="text-slate-400">
                            <th class="px-4 py-3 font-semibold">File</th>
                            <th class="px-4 py-3 font-semibold">Size</th>
                            <th class="px-4 py-3 font-semibold">Last Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($backups as $backup)
                            <tr class="border-t border-slate-800">
                                <td class="px-4 py-4 text-white">{{ $backup['name'] }}</td>
                                <td class="px-4 py-4 text-slate-300">{{ number_format($backup['size'] / 1024, 1) }} KB</td>
                                <td class="px-4 py-4 text-slate-500">
                                    {{ \Illuminate\Support\Carbon::createFromTimestamp($backup['last_modified'])->toDayDateTimeString() }}
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-slate-800">
                                <td class="px-4 py-4 text-slate-500" colspan="3">
                                    No backups created yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
