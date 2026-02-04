@php
    $section = $data['section'] ?? null;
    $items = $data['items'] ?? [];
    $badgeLabel = $section['badge_label'] ?? 'Industries';
    $title = $section['title'] ?? 'Our Industries';
    $subtitle = $section['subtitle'] ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.';
    
    // Icon mapping
    $iconMap = [
        'Concerts' => 'Music',
        'Corporate Events' => 'Building2',
        'Fashion' => 'Palette',
        'Theater & Dance' => 'Theater',
        'Gala Dinners' => 'Gem',
        'Trade shows' => 'Clapperboard',
        'Sporting Events' => 'Trophy',
        'Nonprofit Events' => 'Handshake',
    ];
@endphp

<section id="industries" class="py-20 bg-gradient-to-b from-gray-100 via-gray-50 to-white relative overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-14 animate-fade-in-up">
            <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
            <h2 class="text-4xl lg:text-6xl font-black text-[#172455] mb-4 mt-6">
                @if(str_contains($title, 'Industries'))
                    @php
                        $parts = explode('Industries', $title, 2);
                    @endphp
                    {{ $parts[0] }}<span class="text-yellow-500">Industries</span>{{ $parts[1] ?? '' }}
                @else
                    {{ $title }}
                @endif
            </h2>
            <p class="text-lg md:text-xl text-gray-700 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($items as $index => $item)
                @php
                    $iconName = $item['icon_name'] ?? $item['icon'] ?? $iconMap[$item['title'] ?? ''] ?? 'Building2';
                    $iconUrl = $item['icon_url'] ?? null;
                @endphp
                <div class="flip-card relative h-72 rounded-2xl overflow-hidden group transition-all duration-500 transform hover:-translate-y-3 hover:shadow-2xl hover:shadow-yellow-500/20 bg-white/80 backdrop-blur border border-yellow-100" style="transition-delay: {{ $index * 100 }}ms;">
                    <div class="absolute -top-10 -right-10 h-32 w-32 rounded-full bg-yellow-200/40 blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                    
                    <div class="flip-card-inner">
                        <!-- Front of the card -->
                        <div class="flip-card-front absolute inset-0 flex flex-col items-center justify-center p-6 rounded-2xl">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform duration-500">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $item['title'] ?? '' }}" class="h-10 w-10 object-contain" />
                                @else
                                    @if($iconName === 'Music')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                                    @elseif($iconName === 'Building2')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    @elseif($iconName === 'Palette')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                    @elseif($iconName === 'Theater')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @elseif($iconName === 'Gem')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                    @elseif($iconName === 'Clapperboard')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    @elseif($iconName === 'Trophy')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                    @elseif($iconName === 'Handshake')
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    @else
                                        <svg class="w-9 h-9 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    @endif
                                @endif
                            </div>
                            <h3 class="text-2xl font-extrabold text-[#172455] mt-6 text-center">{{ $item['title'] ?? '' }}</h3>
                            <p class="text-sm text-gray-500 mt-2 text-center">Tailored event solutions</p>
                        </div>
                        
                        <!-- Back of the card -->
                        <div class="flip-card-back absolute inset-0 bg-[#172455] text-white p-6 rounded-2xl flex flex-col items-center justify-center">
                            @if($iconUrl)
                                <img src="{{ $iconUrl }}" alt="{{ $item['title'] ?? '' }}" class="h-12 w-12 object-contain" />
                            @else
                                @if($iconName === 'Music')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                                @elseif($iconName === 'Building2')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                @elseif($iconName === 'Palette')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                @elseif($iconName === 'Theater')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @elseif($iconName === 'Gem')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                @elseif($iconName === 'Clapperboard')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                @elseif($iconName === 'Trophy')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                @elseif($iconName === 'Handshake')
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                @else
                                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                @endif
                            @endif
                            <p class="font-bold text-yellow-400 mt-4 text-lg">{{ $item['title'] ?? '' }}</p>
                            <p class="text-xs text-slate-300 mt-2 text-center">Excellence • Precision • Creativity</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

