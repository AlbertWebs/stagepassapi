@php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $sliderId = 'industries-slider-' . uniqid();
@endphp

<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex items-end justify-between gap-4">
            <h2 class="text-3xl lg:text-5xl font-black text-slate-900">{{ $title }}</h2>
            <div class="hidden md:flex gap-2">
                <button type="button" data-prev="{{ $sliderId }}" class="h-10 w-10 rounded-full border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors duration-200">←</button>
                <button type="button" data-next="{{ $sliderId }}" class="h-10 w-10 rounded-full border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors duration-200">→</button>
            </div>
        </div>
        <div id="{{ $sliderId }}" class="mt-8 flex gap-6 overflow-x-auto snap-x snap-mandatory pb-3">
            @foreach($items as $item)
                @php $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? ''); @endphp
                <article class="snap-start shrink-0 w-[86%] sm:w-[58%] lg:w-[33%] rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-12 w-12 rounded-xl bg-slate-900 text-white grid place-items-center">▣</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">{{ $name }}</h3>
                </article>
            @endforeach
        </div>
    </div>
    <script>
    (function(){
        var id = @json($sliderId);
        var slider = document.getElementById(id);
        if (!slider) return;
        var prev = document.querySelector('[data-prev="' + id + '"]');
        var next = document.querySelector('[data-next="' + id + '"]');
        function step(dir) { slider.scrollBy({ left: dir * slider.clientWidth * 0.75, behavior: 'smooth' }); }
        if (prev) prev.addEventListener('click', function(){ step(-1); });
        if (next) next.addEventListener('click', function(){ step(1); });
    })();
    </script>
</section>
