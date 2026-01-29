@extends('admin.layout')

@section('page_title', $sectionLabel)
@section('page_subtitle', 'Create, update, and manage content records.')

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

    <div class="space-y-8">
        @foreach ($tables as $table)
            @php
                $inputColumns = $table['input_columns'] ?? [];
                $records = $table['records'] ?? collect();
                $isSingle = !empty($table['single']);
                $noCreate = !empty($table['no_create']);
                $noUpdate = !empty($table['no_update']);
                $summaryColumns = array_slice($inputColumns, 0, 3);
            @endphp

            <section class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-white">{{ $table['label'] ?? $table['name'] }}</h2>
                        <p class="text-sm text-slate-400">Manage records for this data table.</p>
                    </div>
                    <div class="text-xs text-slate-500">
                        Table: {{ $table['name'] }}
                    </div>
                </div>

                @if ($isSingle)
                    @php
                        $record = $records->first();
                        $action = $record
                            ? route('admin.section.update', ['sectionKey' => $sectionKey, 'table' => $table['name'], 'id' => $record->id])
                            : route('admin.section.store', ['sectionKey' => $sectionKey, 'table' => $table['name']]);
                    @endphp
                    <form method="POST" action="{{ $action }}" class="mt-6 space-y-4">
                        @csrf
                        @if ($record)
                            @method('PUT')
                        @endif
                        <div class="grid gap-4 md:grid-cols-2">
                            @foreach ($inputColumns as $column)
                                @php
                                    $columnLower = strtolower($column);
                                    $type = $table['column_types'][$column] ?? 'string';
                                    $value = old($column, $record->{$column} ?? '');
                                    if (is_array($value)) {
                                        $value = json_encode($value);
                                    }
                                    $isTextarea = in_array($type, ['text', 'json'], true)
                                        || str_contains($columnLower, 'description')
                                        || str_contains($columnLower, 'message')
                                        || str_contains($columnLower, 'caption')
                                        || str_contains($columnLower, 'subtitle');
                                    $isDateTime = in_array($type, ['datetime', 'timestamp'], true);
                                    $inputType = in_array($type, ['integer', 'bigint', 'float', 'decimal'], true) ? 'number' : 'text';
                                    if ($isDateTime && $value) {
                                        $value = \Illuminate\Support\Carbon::parse($value)->format('Y-m-d\TH:i');
                                        $inputType = 'datetime-local';
                                    }
                                @endphp
                                <div class="md:col-span-{{ $isTextarea ? '2' : '1' }}">
                                    <label class="text-sm text-slate-400">{{ \Illuminate\Support\Str::headline($column) }}</label>
                                    @if ($isTextarea)
                                        <textarea name="{{ $column }}" rows="3" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100">{{ $value }}</textarea>
                                    @else
                                        <input type="{{ $inputType }}" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        @if (!$noUpdate)
                            <button class="px-5 py-2.5 rounded-full bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                                {{ $record ? 'Save Changes' : 'Create Record' }}
                            </button>
                        @endif
                    </form>
                @else
                    @if (!$noCreate)
                        <div class="mt-6 rounded-xl border border-slate-800 p-5">
                            <h3 class="text-sm font-semibold text-white">Add new record</h3>
                            <form method="POST" action="{{ route('admin.section.store', ['sectionKey' => $sectionKey, 'table' => $table['name']]) }}" class="mt-4 space-y-4">
                                @csrf
                                <div class="grid gap-4 md:grid-cols-2">
                                    @foreach ($inputColumns as $column)
                                        @php
                                            $columnLower = strtolower($column);
                                            $type = $table['column_types'][$column] ?? 'string';
                                            $value = old($column, '');
                                            $isTextarea = in_array($type, ['text', 'json'], true)
                                                || str_contains($columnLower, 'description')
                                                || str_contains($columnLower, 'message')
                                                || str_contains($columnLower, 'caption')
                                                || str_contains($columnLower, 'subtitle');
                                            $isDateTime = in_array($type, ['datetime', 'timestamp'], true);
                                            $inputType = in_array($type, ['integer', 'bigint', 'float', 'decimal'], true) ? 'number' : 'text';
                                            if ($isDateTime && $value) {
                                                $value = \Illuminate\Support\Carbon::parse($value)->format('Y-m-d\TH:i');
                                                $inputType = 'datetime-local';
                                            }
                                        @endphp
                                        <div class="md:col-span-{{ $isTextarea ? '2' : '1' }}">
                                            <label class="text-sm text-slate-400">{{ \Illuminate\Support\Str::headline($column) }}</label>
                                            @if ($isTextarea)
                                                <textarea name="{{ $column }}" rows="3" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100">{{ $value }}</textarea>
                                            @else
                                                <input type="{{ $inputType }}" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <button class="px-5 py-2.5 rounded-full bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                                    Create Record
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="mt-6 overflow-hidden rounded-xl border border-slate-800">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-900">
                                <tr class="text-slate-400">
                                    <th class="px-4 py-3 font-semibold">ID</th>
                                    @foreach ($summaryColumns as $column)
                                        <th class="px-4 py-3 font-semibold">{{ \Illuminate\Support\Str::headline($column) }}</th>
                                    @endforeach
                                    <th class="px-4 py-3 font-semibold">Updated</th>
                                    <th class="px-4 py-3 font-semibold text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($records as $record)
                                    <tr class="border-t border-slate-800">
                                        <td class="px-4 py-4 text-white">{{ $record->id }}</td>
                                        @foreach ($summaryColumns as $column)
                                            <td class="px-4 py-4 text-slate-300">
                                                {{ \Illuminate\Support\Str::limit((string) ($record->{$column} ?? ''), 60) }}
                                            </td>
                                        @endforeach
                                        <td class="px-4 py-4 text-slate-500">
                                            {{ $record->updated_at ?? '—' }}
                                        </td>
                                        <td class="px-4 py-4 text-right">
                                            <div class="flex flex-col items-end gap-2">
                                                @if (!$noUpdate)
                                                    <details class="w-full max-w-xl">
                                                        <summary class="cursor-pointer text-xs rounded-full bg-slate-800 px-3 py-1.5 text-slate-200 hover:bg-slate-700 inline-flex">
                                                            Edit
                                                        </summary>
                                                        <form method="POST" action="{{ route('admin.section.update', ['sectionKey' => $sectionKey, 'table' => $table['name'], 'id' => $record->id]) }}" class="mt-4 space-y-4 text-left">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid gap-4 md:grid-cols-2">
                                                                @foreach ($inputColumns as $column)
                                                                    @php
                                                                        $columnLower = strtolower($column);
                                                                        $type = $table['column_types'][$column] ?? 'string';
                                                                        $value = old($column, $record->{$column} ?? '');
                                                                        if (is_array($value)) {
                                                                            $value = json_encode($value);
                                                                        }
                                                                        $isTextarea = in_array($type, ['text', 'json'], true)
                                                                            || str_contains($columnLower, 'description')
                                                                            || str_contains($columnLower, 'message')
                                                                            || str_contains($columnLower, 'caption')
                                                                            || str_contains($columnLower, 'subtitle');
                                                                        $isDateTime = in_array($type, ['datetime', 'timestamp'], true);
                                                                        $inputType = in_array($type, ['integer', 'bigint', 'float', 'decimal'], true) ? 'number' : 'text';
                                                                        if ($isDateTime && $value) {
                                                                            $value = \Illuminate\Support\Carbon::parse($value)->format('Y-m-d\TH:i');
                                                                            $inputType = 'datetime-local';
                                                                        }
                                                                    @endphp
                                                                    <div class="md:col-span-{{ $isTextarea ? '2' : '1' }}">
                                                                        <label class="text-sm text-slate-400">{{ \Illuminate\Support\Str::headline($column) }}</label>
                                                                        @if ($isTextarea)
                                                                            <textarea name="{{ $column }}" rows="3" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100">{{ $value }}</textarea>
                                                                        @else
                                                                            <input type="{{ $inputType }}" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <button class="px-4 py-2 rounded-full bg-yellow-500 text-slate-900 text-xs font-semibold hover:bg-yellow-400 transition">
                                                                Save
                                                            </button>
                                                        </form>
                                                    </details>
                                                @endif
                                                <form method="POST" action="{{ route('admin.section.delete', ['sectionKey' => $sectionKey, 'table' => $table['name'], 'id' => $record->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-3 py-1.5 text-xs rounded-full bg-red-500/20 text-red-200 hover:bg-red-500/30">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-t border-slate-800">
                                        <td class="px-4 py-4 text-slate-500" colspan="{{ 4 + count($summaryColumns) }}">
                                            No records yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>
        @endforeach
    </div>
@endsection
