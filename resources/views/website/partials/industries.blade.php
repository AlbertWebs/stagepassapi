@php
    $data = $data ?? null;
    $section = null;
    $items = null;
    $showAll = $showAll ?? false;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $items = $data['items'] ?? null;
        if (isset($data['showAll'])) {
            $showAll = (bool) $data['showAll'];
        }
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $items = $data->items ?? null;
        if (isset($data->showAll)) {
            $showAll = (bool) $data->showAll;
        }
    }
@endphp

@php
    
    $industryData = $items ?? collect([
        (object)['title' => 'Corporate & Business Events', 'icon_name' => 'Building2', 'description' => 'Professional audio-visual solutions for corporate gatherings, conferences, and business events.'],
        (object)['title' => 'Entertainment & Live Shows', 'icon_name' => 'Music', 'description' => 'Immersive audio-visual experiences for concerts, festivals, and live performances.'],
        (object)['title' => 'Exhibitions & Trade Shows', 'icon_name' => 'Clapperboard', 'description' => 'Engaging displays and interactive solutions for exhibitions and trade shows.'],
        (object)['title' => 'Education & Training', 'icon_name' => 'Building2', 'description' => 'Comprehensive AV solutions for educational institutions and training centers.'],
        (object)['title' => 'Religious Institutions', 'icon_name' => 'Building2', 'description' => 'Professional AV systems for worship services, conferences, and religious events.'],
        (object)['title' => 'Hospitality & Tourism', 'icon_name' => 'Gem', 'description' => 'Elegant AV solutions for hotels, resorts, and destination events.'],
        (object)['title' => 'Healthcare & Medical', 'icon_name' => 'Building2', 'description' => 'Specialized AV solutions for medical conferences and healthcare facilities.'],
        (object)['title' => 'Government & Public Sector', 'icon_name' => 'Building2', 'description' => 'Large-scale AV solutions for government functions and public events.'],
        (object)['title' => 'Retail & Brand Experiences', 'icon_name' => 'Palette', 'description' => 'Dynamic displays and interactive experiences for retail and brand activations.'],
        (object)['title' => 'Media, Film & Broadcasting', 'icon_name' => 'Clapperboard', 'description' => 'Professional studio and broadcast solutions for media production.'],
    ]);
    
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.') : ($section->subtitle ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.');
    
    $industryDataDisplay = $showAll ? collect($industryData) : collect($industryData)->take(9);
    $hasMoreIndustries = !$showAll && count($industryData) > 9;
    
    function getIconSvg($iconName) {
        $icons = [
            'Music' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>',
            'Building2' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>',
            'Palette' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>',
            'Theater' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>',
            'Gem' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>',
            'Clapperboard' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>',
            'Trophy' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>',
            'Handshake' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>',
        ];
        return $icons[$iconName] ?? $icons['Building2'];
    }
@endphp
<section x-data="{ 
    selectedIndustry: null, 
    isModalOpen: false,
    headerVisible: false,
    handleCardTap(industry) {
        this.selectedIndustry = industry;
        this.isModalOpen = true;
    }
}"
id="industries" 
class="py-20 relative overflow-hidden bg-white">
    <!-- Top-left: concentric lines (regular circles) + favicon at center -->
    <div class="absolute top-0 left-0 w-[280px] md:w-[380px] h-[220px] md:h-[300px] pointer-events-none z-0" aria-hidden="true">
        <svg class="w-full h-full" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMinYMin slice">
            <circle cx="30" cy="30" r="26" stroke="#172455" stroke-width="4" stroke-opacity="0.12"/>
            <circle cx="30" cy="30" r="44" stroke="#172455" stroke-width="3.5" stroke-opacity="0.1"/>
            <circle cx="30" cy="30" r="62" stroke="#eab308" stroke-width="3.2" stroke-opacity="0.09"/>
            <circle cx="30" cy="30" r="80" stroke="#172455" stroke-width="3" stroke-opacity="0.08"/>
            <circle cx="30" cy="30" r="98" stroke="#172455" stroke-width="2.8" stroke-opacity="0.07"/>
            <image href="https://stagepass.co.ke/uploads/favicon_1770661772_698a278c066f6.png" x="14" y="14" width="32" height="32" preserveAspectRatio="xMidYMid meet" opacity="0.5"/>
        </svg>
    </div>

    <!-- Decorative curved shapes: thin, elegant + animated -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
        <svg class="absolute w-full h-full min-w-[180%] min-h-[130%] -left-[40%] -top-[8%]" viewBox="0 0 900 700" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
            <!-- Thin elegant curves: top-left -->
            <g class="industries-shape-1" style="transform-origin: 20% 50%;">
                <path d="M -60 100 C 80 120 180 360 80 600 C 10 520 -30 280 -60 100 Z" fill="#172455" fill-opacity="0.07"/>
            </g>
            <!-- Bottom center accent -->
            <g class="industries-shape-4" style="transform-origin: 15% 85%;">
                <path d="M 80 500 C 320 460 280 700 100 740 C 30 670 40 530 80 500 Z" fill="#172455" fill-opacity="0.05"/>
            </g>
            <!-- Bottom-left: elegant arc -->
            <g class="industries-shape-5" style="transform-origin: 5% 92%;">
                <path d="M 0 580 C 0 520 90 620 160 680 C 100 720 20 660 0 580 Z" fill="#172455" fill-opacity="0.065"/>
            </g>
            <!-- Bottom-left: second thin curve -->
            <g class="industries-shape-6" style="transform-origin: 8% 88%;">
                <path d="M 0 520 C 60 480 180 560 120 700 C 50 680 0 600 0 520 Z" fill="#172455" fill-opacity="0.055"/>
            </g>
            <!-- Center: emblem (beaded collar style) – static, faint -->
            <g>
                <!-- Concentric rings (collar bands) -->
                <circle cx="450" cy="350" r="112" fill="none" stroke="#172455" stroke-width="3" stroke-opacity="0.12"/>
                <circle cx="450" cy="350" r="98" fill="none" stroke="#eab308" stroke-width="2.5" stroke-opacity="0.14"/>
                <circle cx="450" cy="350" r="84" fill="none" stroke="#172455" stroke-width="2.5" stroke-opacity="0.1"/>
                <circle cx="450" cy="350" r="70" fill="none" stroke="#eab308" stroke-width="1.5" stroke-opacity="0.12"/>
                <circle cx="450" cy="350" r="58" fill="#172455" fill-opacity="0.025"/>
                <!-- Segmented outer ring (beaded effect) -->
                <circle cx="450" cy="350" r="105" fill="none" stroke="#172455" stroke-width="1.5" stroke-opacity="0.08" stroke-dasharray="8 14"/>
                <!-- Dangling elements (bottom and sides) -->
                <path d="M 450 458 Q 438 510 450 548 Q 462 510 450 458 Z" fill="#172455" fill-opacity="0.045"/>
                <circle cx="450" cy="552" r="4" fill="#172455" fill-opacity="0.06"/>
                <path d="M 358 400 Q 332 460 352 505 Q 372 460 358 400 Z" fill="#172455" fill-opacity="0.04"/>
                <circle cx="354" cy="508" r="3.5" fill="#172455" fill-opacity="0.055"/>
                <path d="M 542 400 Q 568 460 548 505 Q 528 460 542 400 Z" fill="#172455" fill-opacity="0.04"/>
                <circle cx="546" cy="508" r="3.5" fill="#172455" fill-opacity="0.055"/>
                <path d="M 398 358 Q 368 395 382 432 Q 396 395 398 358 Z" fill="#172455" fill-opacity="0.03"/>
                <circle cx="392" cy="432" r="3" fill="#172455" fill-opacity="0.05"/>
                <path d="M 502 358 Q 532 395 518 432 Q 504 395 502 358 Z" fill="#172455" fill-opacity="0.03"/>
                <circle cx="508" cy="432" r="3" fill="#172455" fill-opacity="0.05"/>
            </g>
        </svg>
    </div>
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="text-center mb-14"
             x-intersect.threshold.0.1="headerVisible = true"
             :class="headerVisible ? 'animate-fade-in-up' : ''"
             style="opacity: 1;">
            <span class="inline-block text-sm font-bold text-yellow-600 tracking-wider uppercase bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-100 px-4 py-2 rounded-full shadow-lg shadow-yellow-200/50 border border-yellow-200/50">Industries</span>
            <h2 class="text-4xl lg:text-6xl font-black text-[#172455] mb-4 mt-6">
                @if(str_starts_with($title, 'Industries'))
                    <span class="text-yellow-500">Industries</span><span class="text-[#172455]">{{ substr($title, strlen('Industries')) }}</span>
                @elseif(str_contains($title, 'Industries'))
                    @php
                        $parts = explode('Industries', $title, 2);
                    @endphp
                    @if(count($parts) === 2)
                        <span class="text-[#172455]">{{ trim($parts[0]) }}</span><span class="text-yellow-500">Industries</span><span class="text-[#172455]">{{ $parts[1] }}</span>
                    @else
                        {{ $title }}
                    @endif
                @else
                    {{ $title }}
                @endif
            </h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-600 rounded-full mx-auto mb-6 shadow-lg shadow-yellow-500/30"></div>
            <!-- <p class="text-lg md:text-xl text-[#172455] max-w-3xl mx-auto">{{ $subtitle }}</p> -->
            <p class="text-xl text-gray-700 max-w-2xl mx-auto font-medium drop-shadow-sm">{{ $subtitle }}</p>
        </div>

        <div class="wow grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" data-wow="fade-up" data-wow-delay="150">
            @foreach($industryDataDisplay as $index => $industry)
                @php
                    // Handle both array and object data
                    if (is_array($industry)) {
                        $iconName = $industry['icon_name'] ?? 'Building2';
                        $iconUrl = $industry['icon_url'] ?? null;
                        $overlayDescription = $industry['overlay_description'] ?? null;
                        $industryTitle = $industry['title'] ?? '';
                        $industryDescription = $industry['description'] ?? '';
                    } else {
                        $iconName = $industry->icon_name ?? 'Building2';
                        $iconUrl = $industry->icon_url ?? null;
                        $overlayDescription = $industry->overlay_description ?? null;
                        $industryTitle = $industry->title ?? '';
                        $industryDescription = $industry->description ?? '';
                    }
                    
                    // Prepare industry data for Alpine.js (decode HTML entities for proper rendering)
                    $industryForJs = [
                        'title' => $industryTitle,
                        'icon_name' => $iconName,
                        'icon_url' => $iconUrl,
                        'description' => $industryDescription,
                        'overlay_description' => $overlayDescription ? html_entity_decode($overlayDescription, ENT_QUOTES | ENT_HTML5, 'UTF-8') : null, // Decode HTML entities for x-html
                    ];
                    
                    // Center incomplete last row (like React app)
                    $totalItems = count($industryDataDisplay);
                    $itemsPerRow = 3; // lg:grid-cols-3
                    $itemsInLastRow = $totalItems % $itemsPerRow;
                    $isLastRow = $index >= $totalItems - $itemsInLastRow;
                    $isIncompleteLastRow = $itemsInLastRow > 0 && $itemsInLastRow < $itemsPerRow;
                    $gridColumnClass = '';
                    if ($isLastRow && $isIncompleteLastRow && $itemsInLastRow === 1) {
                        $gridColumnClass = 'lg:col-start-2';
                    }
                @endphp
                <div class="relative w-full transition-all duration-1000 transform opacity-100 translate-y-0 {{ $gridColumnClass }}"
                     style="transition-delay: {{ $index * 100 }}ms">
                    <!-- Desktop: white card like clients -->
                    <div class="relative h-72 w-full rounded-2xl p-[3px] bg-gradient-to-br from-yellow-400 via-orange-500 to-yellow-600 hover:from-yellow-300 hover:via-orange-400 hover:to-yellow-500 group transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-yellow-500/30 ring-2 ring-white/50 hidden md:block cursor-pointer"
                         @mouseenter="selectedIndustry = @js($industryForJs)"
                         @mouseleave="selectedIndustry = null">
                        <div class="relative h-full w-full rounded-2xl overflow-hidden bg-white shadow-lg shadow-gray-200/30 hover:shadow-xl transition-all duration-500">
                        
                        <!-- Front of the card -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-6 transition-transform duration-500 group-hover:scale-95">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform duration-500">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $industryTitle }}" class="h-10 w-10 object-contain" />
                                @else
                                    <svg class="text-yellow-300 w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! getIconSvg($iconName) !!}
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-2xl font-extrabold text-[#172455] mt-6 text-center">{{ $industryTitle }}</h3>
                            <p class="text-sm text-gray-500 mt-2 text-center">Tailored event solutions</p>
                        </div>

                        <!-- Hover Overlay with Details -->
                        <div :class="selectedIndustry && selectedIndustry.title === '{{ $industryTitle }}' ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 pointer-events-none'"
                             class="absolute inset-0 bg-gradient-to-br from-[#172455] to-[#1e3a8a] text-white p-4 flex flex-col justify-start items-center transition-all duration-500 overflow-hidden">
                            <div class="flex-shrink-0">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $industryTitle }}" class="h-10 w-10 object-contain mb-2" />
                                @else
                                    <svg class="text-yellow-400 mb-2 w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! getIconSvg($iconName) !!}
                                    </svg>
                                @endif
                            </div>
                            <h3 class="font-bold text-yellow-400 text-lg mb-2 text-center flex-shrink-0">{{ $industryTitle }}</h3>
                            <div class="flex-1 overflow-hidden w-full">
                                @if($overlayDescription)
                                    <div class="text-xs text-slate-200 leading-tight prose prose-invert prose-sm max-w-none w-full [&_p]:mb-1 [&_ul]:mb-2 [&_li]:mb-0.5 [&_.services-label]:!font-bold [&_.services-label]:!text-[#172455] [&_.services-label]:underline [&_.av-needs-label]:!font-bold [&_.av-needs-label]:!text-[#172455] [&_.av-needs-label]:underline">{!! $overlayDescription !!}</div>
                                @else
                                    <p class="text-xs text-slate-200 text-center leading-tight line-clamp-6">{{ $industryDescription }}</p>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Mobile: white card like clients -->
                    <div class="relative h-72 w-full rounded-2xl p-[3px] bg-gradient-to-br from-yellow-400 via-orange-500 to-yellow-600 group transition-all duration-500 transform active:scale-95 block md:hidden cursor-pointer"
                         @click="handleCardTap(@js($industryForJs))">
                        <div class="relative h-full w-full rounded-2xl overflow-hidden bg-white shadow-lg shadow-gray-200/30">
                        
                        <!-- Front of the card -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-6">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] flex items-center justify-center shadow-2xl">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $industryTitle }}" class="h-10 w-10 object-contain" />
                                @else
                                    <svg class="text-yellow-300 w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! getIconSvg($iconName) !!}
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-2xl font-extrabold text-[#172455] mt-6 text-center">{{ $industryTitle }}</h3>
                            <p class="text-sm text-gray-500 mt-2 text-center">Tap for details</p>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(!$showAll)
        <div class="mt-12 md:mt-16 text-center">
            <a href="{{ route('industries') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-[#172455] text-white font-semibold text-sm tracking-wide hover:bg-[#0f1b3d] focus:ring-2 focus:ring-[#172455] focus:ring-offset-2 transition-all duration-200 shadow-lg shadow-[#172455]/20 hover:shadow-xl hover:shadow-[#172455]/30">
                <span>Explore more industries</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        @endif
    </div>

    <!-- Mobile Modal -->
    <div x-show="isModalOpen && selectedIndustry"
         @click.away="isModalOpen = false"
         @keydown.escape.window="isModalOpen = false"
         x-transition
         class="fixed inset-0 bg-black/80 flex items-center justify-center z-[99999] p-4 md:hidden"
         style="display: none;">
        <div @click.stop class="max-w-md bg-white rounded-2xl p-6 w-full">
            <button @click="isModalOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">×</button>
            <div class="flex items-center justify-center mb-4">
                <template x-if="selectedIndustry && selectedIndustry.icon_url">
                    <img :src="selectedIndustry.icon_url" :alt="selectedIndustry.title" class="h-16 w-16 object-contain" />
                </template>
                <template x-if="selectedIndustry && !selectedIndustry.icon_url">
                    <svg class="text-[#172455] w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </template>
            </div>
            <h3 class="text-2xl font-bold text-[#172455] text-center mb-4" x-text="selectedIndustry && selectedIndustry.title"></h3>
            <div class="text-gray-600 mt-4 leading-relaxed">
                <template x-if="selectedIndustry && selectedIndustry.overlay_description">
                    <div class="prose prose-sm max-w-none w-full [&_.services-label]:!font-bold [&_.services-label]:!text-[#172455] [&_.services-label]:underline [&_.av-needs-label]:!font-bold [&_.av-needs-label]:!text-[#172455] [&_.av-needs-label]:underline" x-html="selectedIndustry.overlay_description"></div>
                </template>
                <template x-if="selectedIndustry && !selectedIndustry.overlay_description">
                    <p class="text-center" x-text="selectedIndustry && selectedIndustry.description"></p>
                </template>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x"></div>
</section>
