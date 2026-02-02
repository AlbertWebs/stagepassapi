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
                $hasUpload = in_array($table['name'], ['navbar_settings', 'footer_settings'], true)
                    && count(array_intersect($inputColumns, ['logo_url', 'favicon_url'])) > 0;
                $hasVideoField = in_array('background_video_url', $inputColumns, true);
                $hasImageFields = count(array_intersect($inputColumns, ['og_image', 'image_url', 'logo_path', 'icon_url'])) > 0;
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

                @if ($isSingle && $table['name'] === 'hero_sections')
                    @php
                        $record = $records->first();
                        $action = $record
                            ? route('admin.section.update', ['sectionKey' => $sectionKey, 'table' => $table['name'], 'id' => $record->id])
                            : route('admin.section.store', ['sectionKey' => $sectionKey, 'table' => $table['name']]);
                        $headlineValue = old('headline', $record->headline ?? '');
                        $videoValue = old('background_video_url', $record->background_video_url ?? '');
                        $videoPreview = '';
                        if (!empty($videoValue)) {
                            $videoPreview = \Illuminate\Support\Str::startsWith($videoValue, ['http://', 'https://'])
                                ? $videoValue
                                : '/' . ltrim($videoValue, '/');
                        }
                    @endphp
                    <form method="POST" action="{{ $action }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @if ($record)
                            @method('PUT')
                        @endif
                        <div class="grid gap-6 lg:grid-cols-3">
                            <div class="lg:col-span-2 space-y-6">
                                <div class="rounded-2xl border border-slate-800 bg-slate-950/70 p-6">
                                    <h3 class="text-sm font-semibold text-white">Hero Headline</h3>
                                    <p class="mt-1 text-xs text-slate-500">The primary headline shown on the homepage hero.</p>
                                    <textarea name="headline" rows="4" class="mt-4 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-3 text-base text-slate-100">{{ $headlineValue }}</textarea>
                                </div>

                                <div class="rounded-2xl border border-slate-800 bg-slate-950/70 p-6 space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-sm font-semibold text-white">Background Video</h3>
                                            <p class="mt-1 text-xs text-slate-500">Add a hosted URL or upload a video file.</p>
                                        </div>
                                        <span class="text-xs text-slate-500">MP4 preferred</span>
                                    </div>
                                    <div class="grid gap-4 md:grid-cols-2">
                                        <div>
                                            <label class="text-xs uppercase tracking-wide text-slate-500">Video URL</label>
                                            <input type="url" name="background_video_url" value="{{ $videoValue }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/video/ceo.mp4" />
                                        </div>
                                        <div>
                                            <label class="text-xs uppercase tracking-wide text-slate-500">Upload video</label>
                                            <input type="file" name="background_video_url_upload" accept="video/*" class="mt-2 block w-full text-sm text-slate-200" />
                                        </div>
                                    </div>
                                    @if ($videoPreview)
                                        <video class="w-full rounded-xl border border-slate-800 bg-black" src="{{ $videoPreview }}" controls preload="metadata"></video>
                                    @endif
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="rounded-2xl border border-slate-800 bg-slate-950/70 p-6">
                                    <h3 class="text-sm font-semibold text-white">Publishing</h3>
                                    <p class="mt-1 text-xs text-slate-500">Changes apply immediately on save.</p>
                                    <button class="mt-6 w-full px-5 py-3 rounded-xl bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                                        {{ $record ? 'Save Hero' : 'Create Hero' }}
                                    </button>
                                </div>
                                <div class="rounded-2xl border border-slate-800 bg-slate-950/70 p-6">
                                    <h3 class="text-sm font-semibold text-white">Tips</h3>
                                    <ul class="mt-3 text-xs text-slate-500 space-y-2">
                                        <li>Use short, bold headlines for impact.</li>
                                        <li>Keep video size optimized for fast loading.</li>
                                        <li>Muted videos autoplay better on mobile.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                @elseif ($isSingle)
                    @php
                        $record = $records->first();
                        $action = $record
                            ? route('admin.section.update', ['sectionKey' => $sectionKey, 'table' => $table['name'], 'id' => $record->id])
                            : route('admin.section.store', ['sectionKey' => $sectionKey, 'table' => $table['name']]);
                    @endphp
                    <form method="POST" action="{{ $action }}" class="mt-6 space-y-4" @if ($hasUpload || $hasVideoField || $hasImageFields) enctype="multipart/form-data" @endif>
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
                                    @if ($hasVideoField && $column === 'background_video_url')
                                        @php
                                            $previewUrl = '';
                                            if (!empty($value)) {
                                                $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                    ? $value
                                                    : '/' . ltrim($value, '/');
                                            }
                                        @endphp
                                        <div class="mt-2 space-y-4 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Video URL</label>
                                                <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/video/ceo.mp4" />
                                                <p class="mt-2 text-xs text-slate-500">Paste a hosted URL or upload a video file.</p>
                                            </div>
                                            <div class="flex items-center gap-3 text-xs text-slate-500">
                                                <span class="uppercase tracking-[0.2em]">or</span>
                                                <span class="h-px flex-1 bg-slate-800"></span>
                                            </div>
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload video</label>
                                                <input type="file" name="{{ $column }}_upload" accept="video/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                <p class="mt-1 text-xs text-slate-500">MP4 recommended. Upload replaces the URL.</p>
                                            </div>
                                            @if ($previewUrl)
                                                <video class="w-full rounded-lg border border-slate-800 bg-black" src="{{ $previewUrl }}" controls preload="metadata"></video>
                                            @endif
                                        </div>
                                    @elseif ($hasUpload && in_array($column, ['logo_url', 'favicon_url'], true))
                                        @php
                                            $previewUrl = '';
                                            if (!empty($value)) {
                                                $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                    ? $value
                                                    : '/' . ltrim($value, '/');
                                            }
                                        @endphp
                                        <div class="mt-2 flex items-center gap-4">
                                            <input type="file" name="{{ $column }}" accept="image/*" class="block w-full text-sm text-slate-200" />
                                            @if ($previewUrl)
                                                <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="h-12 w-12 rounded bg-slate-900 object-contain" />
                                            @endif
                                        </div>
                                        <input type="hidden" name="{{ $column }}" value="{{ $value }}" />
                                    @elseif ($columnLower === 'icon_url')
                                        @php
                                            $previewUrl = '';
                                            if (!empty($value)) {
                                                $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                    ? $value
                                                    : '/' . ltrim($value, '/');
                                            }
                                        @endphp
                                        <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Icon URL</label>
                                                <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://example.com/icon.svg" />
                                            </div>
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload icon</label>
                                                <input type="file" name="{{ $column }}_upload" accept="image/*,image/svg+xml" class="mt-2 block w-full text-sm text-slate-200" />
                                                <p class="mt-1 text-xs text-slate-500">Upload replaces the URL.</p>
                                            </div>
                                            @if ($previewUrl)
                                                <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="h-12 w-12 rounded bg-slate-900 object-contain" />
                                            @endif
                                        </div>
                                    @elseif ($columnLower === 'logo_path')
                                        @php
                                            $previewUrl = '';
                                            if (!empty($value)) {
                                                $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                    ? $value
                                                    : '/' . ltrim($value, '/');
                                            }
                                        @endphp
                                        <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Logo URL</label>
                                                <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/clients/logo.jpg" />
                                                <p class="mt-1 text-xs text-slate-500">Paste a hosted URL or upload an image file.</p>
                                            </div>
                                            <div class="flex items-center gap-3 text-xs text-slate-500">
                                                <span class="uppercase tracking-[0.2em]">or</span>
                                                <span class="h-px flex-1 bg-slate-800"></span>
                                            </div>
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload Logo</label>
                                                <input type="file" name="{{ $column }}_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                <p class="mt-1 text-xs text-slate-500">JPG, PNG, or WebP recommended. Upload replaces the URL.</p>
                                            </div>
                                            @if ($previewUrl)
                                                <div class="mt-3">
                                                    <p class="text-xs text-slate-500 mb-2">Preview:</p>
                                                    <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="max-w-full h-auto rounded-lg border border-slate-800 bg-slate-900 object-contain max-h-32" />
                                                </div>
                                            @endif
                                        </div>
                                    @elseif ($columnLower === 'og_image' || $columnLower === 'image_url')
                                        @php
                                            $previewUrl = '';
                                            if (!empty($value)) {
                                                $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                    ? $value
                                                    : '/' . ltrim($value, '/');
                                            }
                                        @endphp
                                        <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">{{ \Illuminate\Support\Str::headline($column) }} URL</label>
                                                <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/og-image.jpg" />
                                                <p class="mt-1 text-xs text-slate-500">Paste a hosted URL or upload an image file.</p>
                                            </div>
                                            <div class="flex items-center gap-3 text-xs text-slate-500">
                                                <span class="uppercase tracking-[0.2em]">or</span>
                                                <span class="h-px flex-1 bg-slate-800"></span>
                                            </div>
                                            <div>
                                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload {{ \Illuminate\Support\Str::headline($column) }}</label>
                                                <input type="file" name="{{ $column }}_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                <p class="mt-1 text-xs text-slate-500">JPG, PNG, or WebP recommended. Recommended size: 1200x630px for OG images.</p>
                                            </div>
                                            @if ($previewUrl)
                                                <div class="mt-3">
                                                    <p class="text-xs text-slate-500 mb-2">Preview:</p>
                                                    <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="max-w-full h-auto rounded-lg border border-slate-800 bg-slate-900 object-contain max-h-48" />
                                                </div>
                                            @endif
                                        </div>
                                    @elseif ($columnLower === 'icon_name')
                                        <input type="{{ $inputType }}" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="e.g. Music, Building2" />
                                        <p class="mt-1 text-xs text-slate-500">Use a Lucide icon name (Music, Building2, Theater).</p>
                                    @elseif ($isTextarea)
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
                            <form method="POST" action="{{ route('admin.section.store', ['sectionKey' => $sectionKey, 'table' => $table['name']]) }}" class="mt-4 space-y-4" @if ($hasUpload || $hasVideoField || $hasImageFields) enctype="multipart/form-data" @endif>
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
                                            @if ($hasVideoField && $column === 'background_video_url')
                                                <div class="mt-2 space-y-4 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Video URL</label>
                                                        <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/video/ceo.mp4" />
                                                        <p class="mt-2 text-xs text-slate-500">Paste a hosted URL or upload a video file.</p>
                                                    </div>
                                                    <div class="flex items-center gap-3 text-xs text-slate-500">
                                                        <span class="uppercase tracking-[0.2em]">or</span>
                                                        <span class="h-px flex-1 bg-slate-800"></span>
                                                    </div>
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Upload video</label>
                                                        <input type="file" name="{{ $column }}_upload" accept="video/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                        <p class="mt-1 text-xs text-slate-500">MP4 recommended. Upload replaces the URL.</p>
                                                    </div>
                                                </div>
                                            @elseif ($hasUpload && in_array($column, ['logo_url', 'favicon_url'], true))
                                                <div class="mt-2">
                                                    <input type="file" name="{{ $column }}" accept="image/*" class="block w-full text-sm text-slate-200" />
                                                </div>
                                                <input type="hidden" name="{{ $column }}" value="{{ $value }}" />
                                            @elseif ($columnLower === 'icon_url')
                                                <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Icon URL</label>
                                                        <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://example.com/icon.svg" />
                                                    </div>
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Upload icon</label>
                                                        <input type="file" name="{{ $column }}_upload" accept="image/*,image/svg+xml" class="mt-2 block w-full text-sm text-slate-200" />
                                                        <p class="mt-1 text-xs text-slate-500">Upload replaces the URL.</p>
                                                    </div>
                                                    @if (!empty($value))
                                                        <img src="{{ \Illuminate\Support\Str::startsWith($value, ['http://', 'https://']) ? $value : '/' . ltrim($value, '/') }}" alt="{{ $column }} preview" class="h-12 w-12 rounded bg-slate-900 object-contain" />
                                                    @endif
                                                </div>
                                            @elseif ($columnLower === 'logo_path')
                                                <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Logo URL</label>
                                                        <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/clients/logo.jpg" />
                                                        <p class="mt-1 text-xs text-slate-500">Paste a hosted URL or upload an image file.</p>
                                                    </div>
                                                    <div class="flex items-center gap-3 text-xs text-slate-500">
                                                        <span class="uppercase tracking-[0.2em]">or</span>
                                                        <span class="h-px flex-1 bg-slate-800"></span>
                                                    </div>
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Upload Logo</label>
                                                        <input type="file" name="{{ $column }}_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                        <p class="mt-1 text-xs text-slate-500">JPG, PNG, or WebP recommended. Upload replaces the URL.</p>
                                                    </div>
                                                </div>
                                            @elseif ($columnLower === 'og_image' || $columnLower === 'image_url')
                                                <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">{{ \Illuminate\Support\Str::headline($column) }} URL</label>
                                                        <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/og-image.jpg" />
                                                        <p class="mt-1 text-xs text-slate-500">Paste a hosted URL or upload an image file.</p>
                                                    </div>
                                                    <div class="flex items-center gap-3 text-xs text-slate-500">
                                                        <span class="uppercase tracking-[0.2em]">or</span>
                                                        <span class="h-px flex-1 bg-slate-800"></span>
                                                    </div>
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Upload {{ \Illuminate\Support\Str::headline($column) }}</label>
                                                        <input type="file" name="{{ $column }}_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                        <p class="mt-1 text-xs text-slate-500">JPG, PNG, or WebP recommended. Recommended size: 1200x630px for OG images.</p>
                                                    </div>
                                                </div>
                                            @elseif ($columnLower === 'icon_name')
                                                <input type="{{ $inputType }}" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="e.g. Music, Building2" />
                                                <p class="mt-1 text-xs text-slate-500">Use a Lucide icon name (Music, Building2, Theater).</p>
                                            @elseif ($columnLower === 'icon_url')
                                                <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Icon URL</label>
                                                        <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://example.com/icon.svg" />
                                                    </div>
                                                    <div>
                                                        <label class="text-xs uppercase tracking-wide text-slate-500">Upload icon</label>
                                                        <input type="file" name="{{ $column }}_upload" accept="image/*,image/svg+xml" class="mt-2 block w-full text-sm text-slate-200" />
                                                    </div>
                                                </div>
                                            @elseif ($columnLower === 'icon_name')
                                                <input type="{{ $inputType }}" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="e.g. Music, Building2" />
                                                <p class="mt-1 text-xs text-slate-500">Use a Lucide icon name (Music, Building2, Theater).</p>
                                            @elseif ($isTextarea)
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
                                                        <form method="POST" action="{{ route('admin.section.update', ['sectionKey' => $sectionKey, 'table' => $table['name'], 'id' => $record->id]) }}" class="mt-4 space-y-4 text-left" @if ($hasUpload || $hasVideoField || $hasImageFields) enctype="multipart/form-data" @endif>
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
                                                                        @if ($hasVideoField && $column === 'background_video_url')
                                                                            @php
                                                                                $previewUrl = '';
                                                                                if (!empty($value)) {
                                                                                    $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                                                        ? $value
                                                                                        : '/' . ltrim($value, '/');
                                                                                }
                                                                            @endphp
                                                                            <div class="mt-2 space-y-4 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                                                <div>
                                                                                    <label class="text-xs uppercase tracking-wide text-slate-500">Video URL</label>
                                                                                    <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/video/ceo.mp4" />
                                                                                    <p class="mt-2 text-xs text-slate-500">Paste a hosted URL or upload a video file.</p>
                                                                                </div>
                                                                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                                                                    <span class="uppercase tracking-[0.2em]">or</span>
                                                                                    <span class="h-px flex-1 bg-slate-800"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label class="text-xs uppercase tracking-wide text-slate-500">Upload video</label>
                                                                                    <input type="file" name="{{ $column }}_upload" accept="video/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                                                    <p class="mt-1 text-xs text-slate-500">MP4 recommended. Upload replaces the URL.</p>
                                                                                </div>
                                                                                @if ($previewUrl)
                                                                                    <video class="w-full rounded-lg border border-slate-800 bg-black" src="{{ $previewUrl }}" controls preload="metadata"></video>
                                                                                @endif
                                                                            </div>
                                                                        @elseif ($hasUpload && in_array($column, ['logo_url', 'favicon_url'], true))
                                                                            @php
                                                                                $previewUrl = '';
                                                                                if (!empty($value)) {
                                                                                    $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                                                        ? $value
                                                                                        : '/' . ltrim($value, '/');
                                                                                }
                                                                            @endphp
                                                                            <div class="mt-2 flex items-center gap-4">
                                                                                <input type="file" name="{{ $column }}" accept="image/*" class="block w-full text-sm text-slate-200" />
                                                                                @if ($previewUrl)
                                                                                    <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="h-12 w-12 rounded bg-slate-900 object-contain" />
                                                                                @endif
                                                                            </div>
                                                                            <input type="hidden" name="{{ $column }}" value="{{ $value }}" />
                                                                        @elseif (strtolower($column) === 'logo_path')
                                                                            @php
                                                                                $previewUrl = '';
                                                                                if (!empty($value)) {
                                                                                    $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                                                        ? $value
                                                                                        : '/' . ltrim($value, '/');
                                                                                }
                                                                            @endphp
                                                                            <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                                                <div>
                                                                                    <label class="text-xs uppercase tracking-wide text-slate-500">Logo URL</label>
                                                                                    <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/clients/logo.jpg" />
                                                                                    <p class="mt-1 text-xs text-slate-500">Paste a hosted URL or upload an image file.</p>
                                                                                </div>
                                                                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                                                                    <span class="uppercase tracking-[0.2em]">or</span>
                                                                                    <span class="h-px flex-1 bg-slate-800"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label class="text-xs uppercase tracking-wide text-slate-500">Upload Logo</label>
                                                                                    <input type="file" name="{{ $column }}_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                                                    <p class="mt-1 text-xs text-slate-500">JPG, PNG, or WebP recommended. Upload replaces the URL.</p>
                                                                                </div>
                                                                                @if ($previewUrl)
                                                                                    <div class="mt-3">
                                                                                        <p class="text-xs text-slate-500 mb-2">Preview:</p>
                                                                                        <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="max-w-full h-auto rounded-lg border border-slate-800 bg-slate-900 object-contain max-h-32" />
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @elseif (strtolower($column) === 'og_image' || strtolower($column) === 'image_url')
                                                                            @php
                                                                                $previewUrl = '';
                                                                                if (!empty($value)) {
                                                                                    $previewUrl = \Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])
                                                                                        ? $value
                                                                                        : '/' . ltrim($value, '/');
                                                                                }
                                                                            @endphp
                                                                            <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                                                                                <div>
                                                                                    <label class="text-xs uppercase tracking-wide text-slate-500">{{ \Illuminate\Support\Str::headline($column) }} URL</label>
                                                                                    <input type="url" name="{{ $column }}" value="{{ $value }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" placeholder="https://stagepass.co.ke/uploads/og-image.jpg" />
                                                                                    <p class="mt-1 text-xs text-slate-500">Paste a hosted URL or upload an image file.</p>
                                                                                </div>
                                                                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                                                                    <span class="uppercase tracking-[0.2em]">or</span>
                                                                                    <span class="h-px flex-1 bg-slate-800"></span>
                                                                                </div>
                                                                                <div>
                                                                                    <label class="text-xs uppercase tracking-wide text-slate-500">Upload {{ \Illuminate\Support\Str::headline($column) }}</label>
                                                                                    <input type="file" name="{{ $column }}_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200" />
                                                                                    <p class="mt-1 text-xs text-slate-500">JPG, PNG, or WebP recommended. Recommended size: 1200x630px for OG images.</p>
                                                                                </div>
                                                                                @if ($previewUrl)
                                                                                    <div class="mt-3">
                                                                                        <p class="text-xs text-slate-500 mb-2">Preview:</p>
                                                                                        <img src="{{ $previewUrl }}" alt="{{ $column }} preview" class="max-w-full h-auto rounded-lg border border-slate-800 bg-slate-900 object-contain max-h-48" />
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @elseif ($isTextarea)
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
