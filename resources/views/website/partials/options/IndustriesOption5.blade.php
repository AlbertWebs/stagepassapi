@php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
@endphp

<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <h2 class="text-3xl lg:text-5xl font-black text-slate-900 text-center">{{ $title }}</h2>
        <div class="mt-10 grid md:grid-cols-2 gap-4">
            @foreach($items as $item)
                @php
                    $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                @endphp
                <article class="group rounded-2xl border border-slate-200 p-6 transition-all duration-300 hover:border-slate-900 hover:shadow-lg">
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-lg lg:text-xl font-semibold text-slate-900">{{ $name }}</h3>
                        <span class="text-slate-400 group-hover:text-slate-900 transition-colors duration-200">+</span>
                    </div>
                    <p class="max-h-0 overflow-hidden opacity-0 mt-0 text-sm lg:text-base text-slate-600 transition-all duration-300 group-hover:max-h-24 group-hover:opacity-100 group-hover:mt-3">
                        {{ $desc }}
                    </p>
                </article>
            @endforeach
        </div>
    </div>
</section>
