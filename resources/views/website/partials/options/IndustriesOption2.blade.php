@php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'Industry-focused solutions designed for measurable outcomes.') : ($section->subtitle ?? 'Industry-focused solutions designed for measurable outcomes.');
@endphp

<section id="industries" class="py-20 bg-slate-100">
    <style>
        @keyframes ind2Shine {
            0% { transform: translateX(-130%) skewX(-14deg); opacity: 0; }
            35% { opacity: .35; }
            100% { transform: translateX(170%) skewX(-14deg); opacity: 0; }
        }
        .ind2-card::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 1rem;
            background: linear-gradient(120deg, rgba(99,102,241,.45), rgba(14,165,233,.4), rgba(245,158,11,.42));
            opacity: 0;
            transition: opacity .25s ease;
            pointer-events: none;
        }
        .ind2-card:hover::before { opacity: 1; }
        .ind2-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 0%, transparent 43%, rgba(255,255,255,.3) 50%, transparent 57%, transparent 100%);
            transform: translateX(-130%) skewX(-14deg);
            pointer-events: none;
        }
        .ind2-card:hover::after { animation: ind2Shine .85s ease-out; }
    </style>
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center rounded-full border border-amber-200 bg-amber-50 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-amber-700">Industries</span>
            <h2 class="mt-5 text-3xl lg:text-5xl font-black text-[#172455]">{{ $title }}</h2>
            <div class="mx-auto mt-4 h-1.5 w-24 rounded-full bg-gradient-to-r from-indigo-500 via-cyan-500 to-amber-500"></div>
            <p class="mt-5 text-base lg:text-lg text-slate-600">{{ $subtitle }}</p>
        </div>
        <div class="mt-10 grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($items as $idx => $item)
                @php
                    $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $img = is_array($item) ? ($item['image_url'] ?? null) : ($item->image_url ?? null);
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                @endphp
                <article class="ind2-card group relative h-64 rounded-2xl p-[1px] overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-indigo-200/40">
                    <div class="relative h-full rounded-2xl overflow-hidden bg-slate-900">
                    @if($img)
                        <img src="{{ $img }}" alt="{{ $name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-slate-900 to-black"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b1436]/92 via-[#0b1436]/44 to-black/15"></div>
                    <div class="absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-full border border-yellow-300/35 bg-black/30 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.14em] text-yellow-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-300"></span>
                        <span>StagePass Sector</span>
                    </div>
                    <div class="relative h-full p-6 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold transition-transform duration-300 group-hover:-translate-y-1">{{ $name }}</h3>
                        <p class="mt-2 text-sm text-white/80 line-clamp-2">
                            {{ $desc ?: 'Tailored AV solutions crafted for this industry.' }}
                        </p>
                    </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
