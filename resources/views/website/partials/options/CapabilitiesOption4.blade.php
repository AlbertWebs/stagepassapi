@php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
@endphp

<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-4">
                <h2 class="text-3xl lg:text-5xl font-black text-slate-900">{{ $title }}</h2>
                <p class="mt-4 text-slate-600">Large icon split layout with strong readability and hierarchy.</p>
            </div>
            <div class="lg:col-span-8 space-y-4">
                @foreach($items as $item)
                    @php
                        $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                        $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    @endphp
                    <article class="group rounded-2xl border border-slate-200 bg-white p-6 lg:p-7 transition-all duration-300 hover:border-amber-400 hover:shadow-lg">
                        <div class="grid grid-cols-[56px_1fr] lg:grid-cols-[72px_1fr] gap-4 lg:gap-6">
                            <div class="h-14 w-14 lg:h-18 lg:w-18 rounded-2xl bg-slate-900 text-amber-300 grid place-items-center text-2xl transition-colors duration-300 group-hover:bg-amber-400 group-hover:text-slate-900">◆</div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900">{{ $titleItem }}</h3>
                                <p class="mt-2 text-sm lg:text-base text-slate-600">{{ $desc }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
