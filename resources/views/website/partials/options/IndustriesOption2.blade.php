@php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'Industry-focused solutions designed for measurable outcomes.') : ($section->subtitle ?? 'Industry-focused solutions designed for measurable outcomes.');

    function industriesOption2Icon(string $name): string {
        $n = strtolower($name);
        if (str_contains($n, 'corporate') || str_contains($n, 'business')) {
            // Briefcase
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 7V6a2 2 0 012-2h0a2 2 0 012 2v1m-9 3h14m-14 0v7a2 2 0 002 2h10a2 2 0 002-2v-7m-14 0V9a2 2 0 012-2h10a2 2 0 012 2v1"></path>';
        }
        if (str_contains($n, 'entertainment') || str_contains($n, 'live') || str_contains($n, 'concert')) {
            // Music
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>';
        }
        if (str_contains($n, 'exhibition') || str_contains($n, 'trade') || str_contains($n, 'media') || str_contains($n, 'film') || str_contains($n, 'broadcast')) {
            // Clapperboard
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>';
        }
        if (str_contains($n, 'education') || str_contains($n, 'training')) {
            // Graduation cap
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M22 10L12 5 2 10l10 5 10-5zM6 12v4c0 1.7 2.7 3 6 3s6-1.3 6-3v-4M22 10v6"></path>';
        }
        if (str_contains($n, 'religious') || str_contains($n, 'institution')) {
            // Chapel
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v4M10 5h4M5 10l7-5 7 5v10a2 2 0 01-2 2H7a2 2 0 01-2-2V10zM9 22v-6h6v6"></path>';
        }
        if (str_contains($n, 'healthcare') || str_contains($n, 'medical')) {
            // Medical cross in circle
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v8M8 12h8"></path><circle cx="12" cy="12" r="9" stroke-width="1.8"></circle>';
        }
        if (str_contains($n, 'government') || str_contains($n, 'public sector')) {
            // Landmark
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 22h18M5 22V10l7-4 7 4v12M8 14v5M12 14v5M16 14v5M3 10h18M12 3v3"></path>';
        }
        if (str_contains($n, 'hospitality') || str_contains($n, 'tourism')) {
            // Sparkle/gem
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>';
        }
        if (str_contains($n, 'retail') || str_contains($n, 'brand')) {
            // Palette
            return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>';
        }
        // Fallback
        return '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>';
    }

    function industriesOption2Media(string $name, ?string $imageUrl): array {
        $n = strtolower($name);
        $videoUrl = null;
        $img = $imageUrl;

        if (str_contains($n, 'corporate') || str_contains($n, 'business')) {
            $img = asset('uploads/backgrounds/coporate.webp');
        } elseif (str_contains($n, 'entertainment') || str_contains($n, 'live show') || str_contains($n, 'live shows')) {
            $videoUrl = 'https://player.vimeo.com/video/1177450080?badge=0&autopause=0&player_id=0&app_id=58479&autoplay=1&muted=1&loop=1&background=1';
            $img = asset('uploads/backgrounds/liveshow.webp');
        } elseif (str_contains($n, 'exhibition') || str_contains($n, 'trade show') || str_contains($n, 'trade shows')) {
            $img = asset('uploads/backgrounds/trade.webp');
        } elseif (str_contains($n, 'education') || str_contains($n, 'training')) {
            $img = asset('uploads/backgrounds/training.webp');
        } elseif (str_contains($n, 'religious') || str_contains($n, 'institution')) {
            $img = asset('uploads/backgrounds/religiouss.webp');
        } elseif (str_contains($n, 'media') || str_contains($n, 'film') || str_contains($n, 'broadcast')) {
            $img = asset('uploads/backgrounds/tourism.webp');
        } elseif (str_contains($n, 'hospitality') || str_contains($n, 'tourism')) {
            $img = asset('uploads/backgrounds/tour.webp');
        } elseif (str_contains($n, 'healthcare') || str_contains($n, 'medical')) {
            $img = asset('uploads/backgrounds/health.webp');
        } elseif (str_contains($n, 'government') || str_contains($n, 'public sector')) {
            $img = asset('uploads/backgrounds/gov.webp');
        } elseif (str_contains($n, 'retail') || str_contains($n, 'brand')) {
            $img = asset('uploads/backgrounds/brand.webp');
        }

        return ['image' => $img, 'video' => $videoUrl];
    }
@endphp

<section id="industries" x-data="{ selectedIndustry: null, isModalOpen: false }" class="py-20 bg-slate-100">
    <style>
        @keyframes ind2Shine {
            0% { transform: translateX(-130%) skewX(-14deg); opacity: 0; }
            35% { opacity: .35; }
            100% { transform: translateX(170%) skewX(-14deg); opacity: 0; }
        }
        @keyframes ind2Float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }
        .ind2-card::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 1rem;
            background: linear-gradient(120deg, rgba(99,102,241,.28), rgba(14,165,233,.22), rgba(245,158,11,.26));
            opacity: .7;
            transition: opacity .25s ease, filter .25s ease;
            pointer-events: none;
        }
        .ind2-card:hover::before { opacity: 1; filter: brightness(1.15); }
        .ind2-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 0%, transparent 43%, rgba(255,255,255,.3) 50%, transparent 57%, transparent 100%);
            transform: translateX(-130%) skewX(-14deg);
            pointer-events: none;
        }
        .ind2-card:hover::after { animation: ind2Shine .85s ease-out; }
        .ind2-card .ind2-inner {
            transition: transform .3s ease;
            will-change: transform;
            animation: ind2Float 6s ease-in-out infinite;
        }
        .ind2-card:hover .ind2-inner { transform: translateY(-4px); }
        .ind2-card .ind2-title {
            text-shadow: 0 4px 16px rgba(0, 0, 0, 0.45);
            letter-spacing: -0.01em;
        }
        .ind2-card .ind2-desc {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.35);
        }
        .ind2-reveal {
            opacity: 0;
            transform: translateY(20px);
            transition:
                opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .ind2-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .ind2-video-cover {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 177.78%;
            height: 100%;
            min-width: 100%;
            min-height: 177.78%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            border: 0;
        }
    </style>
    <div class="container mx-auto px-6 lg:px-12">
        @php
            $itemsForRandom = is_array($items) ? $items : (is_iterable($items) ? iterator_to_array($items) : []);
            $totalItems = count($itemsForRandom);
            $randomIndustryKey = null;
            foreach ($itemsForRandom as $idx => $candidateItem) {
                $candidateTitle = is_array($candidateItem) ? ($candidateItem['title'] ?? '') : ($candidateItem->title ?? '');
                if (str_contains(strtolower($candidateTitle), 'entertainment') && str_contains(strtolower($candidateTitle), 'live')) {
                    $randomIndustryKey = $idx;
                    break;
                }
            }
            if ($randomIndustryKey === null) {
                $randomIndustryKey = $totalItems > 0 ? array_rand($itemsForRandom) : null;
            }
            $randomIndustry = $randomIndustryKey !== null ? ($itemsForRandom[$randomIndustryKey] ?? null) : null;
            $randomIndustryTitle = is_array($randomIndustry) ? ($randomIndustry['title'] ?? $title) : ($randomIndustry->title ?? $title);
            $randomIndustryDescription = is_array($randomIndustry) ? ($randomIndustry['description'] ?? null) : ($randomIndustry->description ?? null);
            $randomIndustryImage = is_array($randomIndustry) ? ($randomIndustry['image_url'] ?? null) : ($randomIndustry->image_url ?? null);
            $randomIndustryMedia = industriesOption2Media($randomIndustryTitle, $randomIndustryImage);
            $showcaseImage = $randomIndustryMedia['image'] ?? null;
            $showcaseVideoUrl = $randomIndustryMedia['video'] ?? null;
            $gridItems = $itemsForRandom;
            if ($randomIndustryKey !== null && array_key_exists($randomIndustryKey, $gridItems)) {
                unset($gridItems[$randomIndustryKey]);
            }
        @endphp
        <div class="mt-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 lg:order-2">
                <div id="industries-option2-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach(array_values($gridItems) as $idx => $item)
                        @php
                            $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                            $img = is_array($item) ? ($item['image_url'] ?? null) : ($item->image_url ?? null);
                            $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                            $overlayDescription = is_array($item) ? ($item['overlay_description'] ?? null) : ($item->overlay_description ?? null);
                            $resolvedMedia = industriesOption2Media($name, $img);
                            $img = $resolvedMedia['image'] ?? $img;
                            $videoUrl = $resolvedMedia['video'] ?? null;
                            $iconSvg = industriesOption2Icon($name);
                            $industryForJs = [
                                'title' => $name,
                                'description' => $desc ?: 'Tailored AV solutions crafted for this industry.',
                                'overlay_description' => $overlayDescription ? html_entity_decode($overlayDescription, ENT_QUOTES | ENT_HTML5, 'UTF-8') : null,
                                'image_url' => $img,
                                'icon_svg' => $iconSvg,
                            ];
                        @endphp
                        <div class="ind2-reveal" data-ind2-delay="{{ $idx * 0.1 }}">
                            <article class="ind2-card group relative h-64 rounded-2xl p-[1px] overflow-hidden transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-indigo-200/40 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70"
                                     @click="selectedIndustry = @js($industryForJs); isModalOpen = true"
                                     @keydown.enter.prevent="selectedIndustry = @js($industryForJs); isModalOpen = true"
                                     @keydown.space.prevent="selectedIndustry = @js($industryForJs); isModalOpen = true"
                                     tabindex="0"
                                     role="button"
                                     aria-label="Open industry details">
                            <div class="ind2-inner relative h-full rounded-2xl overflow-hidden bg-slate-900 border border-white/10">
                            @if($videoUrl)
                                <iframe
                                    src="{{ $videoUrl }}"
                                    class="ind2-video-cover"
                                    frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    title="{{ $name }} video background"></iframe>
                            @elseif($img)
                                <img src="{{ $img }}" alt="{{ $name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-slate-900 to-black"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1436]/95 via-[#0b1436]/55 to-black/20"></div>
                            <div class="absolute inset-0 bg-gradient-to-b from-white/12 to-transparent opacity-75 pointer-events-none"></div>
                            <div class="absolute inset-0 bg-gradient-to-br from-white/[0.06] via-transparent to-yellow-300/[0.05] opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/35 to-transparent pointer-events-none"></div>
                            <div class="relative h-full p-8 flex flex-col justify-end">
                                <h3 class="ind2-title text-white text-xl font-semibold transition-transform duration-300 group-hover:-translate-y-1">{{ $name }}</h3>
                                <p class="ind2-desc mt-2 text-sm text-gray-400 leading-relaxed line-clamp-2">
                                    {{ $desc ?: 'Tailored AV solutions crafted for this industry.' }}
                                </p>
                                <div class="mt-3 h-px w-full bg-gradient-to-r from-yellow-300/75 via-white/45 to-transparent"></div>
                            </div>
                            </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <aside class="lg:col-span-4 lg:self-end lg:order-1 space-y-4">
                <div class="max-w-md">
                    <p class="inline-flex items-center rounded-full border border-[#172455]/20 bg-[#172455]/5 px-4 py-1.5 text-xs sm:text-sm font-extrabold uppercase tracking-[0.2em] text-[#172455] shadow-sm">
                        Industries
                    </p>
                    <h3 class="mt-3 text-3xl sm:text-4xl xl:text-5xl font-black text-[#172455] leading-tight mb-2">We Serve</h3>
                    <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full  mb-6"></div>
                    <p class="text-xl text-gray-700 max-w-2xl mx-auto font-medium">
                        StagePass Audio Visual serves a wide range of industries, delivering tailored audio-visual solutions designed to meet the unique needs of each sector while ensuring seamless and reliable experiences.


                    </p>
                </div>
                <div class="rounded-2xl overflow-hidden border border-[#172455]/20 shadow-xl bg-white" style="position: static;">
                    <div class="relative h-[320px] xl:h-[420px]">
                        @if($showcaseVideoUrl)
                            <iframe
                                src="{{ $showcaseVideoUrl }}"
                                class="ind2-video-cover"
                                frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                title="{{ $randomIndustryTitle }} video background"></iframe>
                        @elseif($showcaseImage)
                            <img src="{{ $showcaseImage }}" alt="{{ $title }} showcase" class="absolute inset-0 h-full w-full object-cover">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-[#172455] via-slate-900 to-black"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0b1436]/90 via-[#172455]/50 to-transparent"></div>
                        <div class="absolute left-0 right-0 bottom-0 p-5 text-white">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-yellow-300">Sector Expertise</p>
                            <p class="mt-2 text-xl font-bold text-white">{{ $randomIndustryTitle }}</p>
                            <p class="mt-2 text-sm text-slate-100/90">{{ $randomIndustryDescription ?: "Purpose-built AV strategies aligned to each industry's operational goals." }}</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <div x-show="isModalOpen"
         x-transition.opacity.duration.250ms
         @click.self="isModalOpen = false"
         @keydown.escape.window="isModalOpen = false"
         class="fixed inset-0 z-[120] grid place-items-center bg-[#030712]/80 backdrop-blur-sm p-4 sm:p-6"
         x-cloak
         style="display: none;">
        <div class="relative w-full max-w-5xl rounded-3xl border border-[#172455]/20 bg-white shadow-2xl overflow-hidden"
             @click.stop>
            <div class="h-1.5 w-full bg-gradient-to-r from-yellow-400 via-amber-500 to-[#172455]"></div>
            <button type="button"
                    @click="isModalOpen = false"
                    class="absolute right-3 top-3 z-20 inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200/80 bg-white/95 text-slate-500 hover:text-[#172455] hover:border-[#172455]/40 transition-colors"
                    aria-label="Close industry details">
                <span class="text-lg leading-none">&times;</span>
            </button>

            <div class="grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-7 p-6 sm:p-8 lg:p-10">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-xl border border-[#172455]/20 bg-[#172455]/8 text-[#172455]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="selectedIndustry && selectedIndustry.icon_svg ? selectedIndustry.icon_svg : ''"></svg>
                    </div>
                    <h3 class="mt-4 text-2xl sm:text-3xl lg:text-4xl font-black leading-tight text-[#172455]" x-text="selectedIndustry && selectedIndustry.title"></h3>
                    <div class="mt-5 h-px w-full bg-gradient-to-r from-[#172455]/35 via-yellow-400/60 to-transparent"></div>
                    <div class="mt-5 max-h-[52vh] overflow-y-auto pr-1 text-slate-700">
                        <template x-if="selectedIndustry && selectedIndustry.overlay_description">
                            <div class="prose prose-sm sm:prose-base max-w-none text-slate-700 [&_p]:mb-3 [&_ul]:mb-3 [&_li]:mb-1 [&_strong]:text-[#172455] [&_h1]:text-[#172455] [&_h2]:text-[#172455] [&_h3]:text-[#172455]" x-html="selectedIndustry.overlay_description"></div>
                        </template>
                        <template x-if="selectedIndustry && !selectedIndustry.overlay_description">
                            <p class="text-sm sm:text-base leading-relaxed" x-text="selectedIndustry && selectedIndustry.description"></p>
                        </template>
                    </div>
                </div>

                <aside class="lg:col-span-5 relative min-h-[260px] lg:min-h-full bg-slate-950">
                    <template x-if="selectedIndustry && selectedIndustry.image_url">
                        <img :src="selectedIndustry.image_url"
                             :alt="(selectedIndustry && selectedIndustry.title ? selectedIndustry.title : 'Industry') + ' image'"
                             class="absolute inset-0 h-full w-full object-cover">
                    </template>
                    <template x-if="!selectedIndustry || !selectedIndustry.image_url">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#172455] via-slate-900 to-black"></div>
                    </template>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-[#172455]/35 to-transparent"></div>
                    <div class="absolute left-0 right-0 bottom-0 p-5 sm:p-6 text-white">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-yellow-300">Featured Industry</p>
                        <p class="mt-2 text-xl font-bold leading-tight" x-text="selectedIndustry && selectedIndustry.title"></p>
                        <p class="mt-2 text-sm text-slate-100/90 line-clamp-3" x-text="selectedIndustry && selectedIndustry.description"></p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <script>
    (function(){
        var grid = document.getElementById('industries-option2-grid');
        if (!grid) return;
        var cards = grid.querySelectorAll('.ind2-reveal');
        if (!cards.length) return;

        // Equivalent of Framer Motion viewport once behavior.
        function revealAll() {
            cards.forEach(function(card){
                var d = parseFloat(card.getAttribute('data-ind2-delay') || '0');
                card.style.transitionDelay = d + 's';
                card.classList.add('is-visible');
            });
        }

        if (typeof IntersectionObserver === 'undefined') {
            revealAll();
            return;
        }

        var done = false;
        var io = new IntersectionObserver(function(entries){
            entries.forEach(function(entry){
                if (!done && entry.isIntersecting) {
                    done = true;
                    revealAll();
                    io.disconnect();
                }
            });
        }, { threshold: 0.12 });

        io.observe(grid);
    })();
    </script>
    
</section>

<div class="h-3 w-full bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x"></div>



