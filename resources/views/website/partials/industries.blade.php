@php
    $data = $data ?? null;
    $section = $data->section ?? null;
    
    $industryData = $data->items ?? collect([
        (object)['title' => 'Concerts', 'icon_name' => 'Music', 'description' => 'From intimate acoustic sets to large-scale music festivals, we deliver immersive audio-visual experiences.'],
        (object)['title' => 'Corporate Events', 'icon_name' => 'Building2', 'description' => 'Professional presentations, conferences, and corporate gatherings require precision and reliability.'],
        (object)['title' => 'Fashion', 'icon_name' => 'Palette', 'description' => 'Fashion shows demand elegance and sophistication.'],
        (object)['title' => 'Theater & Dance', 'icon_name' => 'Theater', 'description' => 'Theatrical productions and dance performances need nuanced audio-visual support.'],
        (object)['title' => 'Gala Dinners', 'icon_name' => 'Gem', 'description' => 'Elegant events deserve elegant solutions.'],
        (object)['title' => 'Trade shows', 'icon_name' => 'Clapperboard', 'description' => 'Make your brand stand out at trade shows and exhibitions.'],
        (object)['title' => 'Sporting Events', 'icon_name' => 'Trophy', 'description' => 'From local tournaments to major sporting events.'],
        (object)['title' => 'Nonprofit Events', 'icon_name' => 'Handshake', 'description' => 'Supporting meaningful causes with impactful presentations.'],
    ]);
    
    $title = $section->title ?? 'Our Industries';
    $subtitle = $section->subtitle ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.';
    
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
    isVisible: false, 
    selectedIndustry: null, 
    isModalOpen: false,
    handleCardTap(industry) {
        this.selectedIndustry = industry;
        this.isModalOpen = true;
    }
}"
x-intersect="isVisible = true"
id="industries" 
class="py-20 bg-gradient-to-b from-gray-100 via-gray-50 to-white">
    <div :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
         class="container mx-auto px-6 lg:px-12 transition-all duration-1000 transform">
        <div :class="isVisible ? 'animate-fade-in-up' : 'opacity-0'"
             class="text-center mb-14">
            <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">Industries</span>
            <h2 class="text-4xl lg:text-6xl font-black text-[#172455] mb-4 mt-6">
                @if(str_contains($title, 'Industries'))
                    {{ str_replace('Industries', '', $title) }}<span class="text-yellow-500">Industries</span>
                @else
                    {{ $title }}
                @endif
            </h2>
            <p class="text-lg md:text-xl text-gray-700 max-w-3xl mx-auto">{{ $subtitle }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($industryData as $index => $industry)
                @php
                    $iconName = $industry->icon_name ?? $industry['icon_name'] ?? 'Building2';
                    $iconUrl = $industry->icon_url ?? $industry['icon_url'] ?? null;
                    $overlayDescription = $industry->overlay_description ?? $industry['overlay_description'] ?? null;
                @endphp
                <div :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                     class="transition-all duration-1000 transform"
                     style="transition-delay: {{ $index * 100 }}ms">
                    <!-- Desktop: Hover overlay -->
                    <div class="relative h-72 rounded-2xl overflow-hidden group transition-all duration-500 transform hover:-translate-y-3 hover:shadow-2xl hover:shadow-yellow-500/20 bg-white/80 backdrop-blur border border-yellow-100 hidden md:block cursor-pointer"
                         @mouseenter="selectedIndustry = @js($industry)"
                         @mouseleave="selectedIndustry = null">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 via-white to-blue-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute -top-10 -right-10 h-32 w-32 rounded-full bg-yellow-200/40 blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                        
                        <!-- Front of the card -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-6 rounded-2xl transition-transform duration-500 group-hover:scale-95">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform duration-500">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $industry->title ?? $industry['title'] ?? '' }}" class="h-10 w-10 object-contain" />
                                @else
                                    <svg class="text-yellow-300 w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! getIconSvg($iconName) !!}
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-2xl font-extrabold text-[#172455] mt-6 text-center">{{ $industry->title ?? $industry['title'] ?? '' }}</h3>
                            <p class="text-sm text-gray-500 mt-2 text-center">Tailored event solutions</p>
                        </div>

                        <!-- Hover Overlay with Details -->
                        <div :class="selectedIndustry && selectedIndustry.title === '{{ $industry->title ?? $industry['title'] ?? '' }}' ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 pointer-events-none'"
                             class="absolute inset-0 bg-gradient-to-br from-[#172455] to-[#1e3a8a] text-white p-6 rounded-2xl flex flex-col justify-center items-center transition-all duration-500 overflow-y-auto">
                            @if($iconUrl)
                                <img src="{{ $iconUrl }}" alt="{{ $industry->title ?? $industry['title'] ?? '' }}" class="h-12 w-12 object-contain mb-4" />
                            @else
                                <svg class="text-yellow-400 mb-4 w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! getIconSvg($iconName) !!}
                                </svg>
                            @endif
                            <h3 class="font-bold text-yellow-400 text-xl mb-3 text-center">{{ $industry->title ?? $industry['title'] ?? '' }}</h3>
                            @if($overlayDescription)
                                <div class="text-sm text-slate-200 text-center leading-relaxed prose prose-invert prose-sm max-w-none">{!! $overlayDescription !!}</div>
                            @else
                                <p class="text-sm text-slate-200 text-center leading-relaxed line-clamp-4">{{ $industry->description ?? $industry['description'] ?? '' }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Mobile: Tap to open modal -->
                    <div class="relative h-72 rounded-2xl overflow-hidden group transition-all duration-500 transform active:scale-95 bg-white/80 backdrop-blur border border-yellow-100 block md:hidden cursor-pointer"
                         @click="handleCardTap(@js($industry))">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 via-white to-blue-50 opacity-0 group-active:opacity-100 transition-opacity duration-200"></div>
                        <div class="absolute -top-10 -right-10 h-32 w-32 rounded-full bg-yellow-200/40 blur-2xl"></div>
                        
                        <!-- Front of the card -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-6 rounded-2xl">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] flex items-center justify-center shadow-2xl">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $industry->title ?? $industry['title'] ?? '' }}" class="h-10 w-10 object-contain" />
                                @else
                                    <svg class="text-yellow-300 w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! getIconSvg($iconName) !!}
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-2xl font-extrabold text-[#172455] mt-6 text-center">{{ $industry->title ?? $industry['title'] ?? '' }}</h3>
                            <p class="text-sm text-gray-500 mt-2 text-center">Tap for details</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                <template x-if="selectedIndustry && selectedIndustry.iconUrl">
                    <img :src="selectedIndustry.iconUrl" :alt="selectedIndustry.title" class="h-16 w-16 object-contain" />
                </template>
                <template x-if="selectedIndustry && !selectedIndustry.iconUrl">
                    <svg class="text-yellow-400 w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </template>
            </div>
            <h3 class="text-2xl font-bold text-[#172455] text-center mb-4" x-text="selectedIndustry && selectedIndustry.title"></h3>
            <div class="text-gray-600 text-center mt-4 leading-relaxed prose prose-sm max-w-none text-left">
                <template x-if="selectedIndustry && selectedIndustry.overlayDescription">
                    <div x-html="selectedIndustry.overlayDescription"></div>
                </template>
                <template x-if="selectedIndustry && !selectedIndustry.overlayDescription">
                    <p x-text="selectedIndustry && selectedIndustry.description"></p>
                </template>
            </div>
        </div>
    </div>
</section>
