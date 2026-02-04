@php
    $section = $data['section'] ?? null;
    $items = $data['items'] ?? [];
    $badgeLabel = $section['badge_label'] ?? 'Our Capabilities';
    $title = $section['title'] ?? 'One-Stop-Solution For All Your AV Services';
    $description = $section['description'] ?? 'From concept to set-up to on-site support, we are there every step of the way to provide you with the exceptional product and service you deserve.';
    $peopleTitle = $section['people_title'] ?? 'Our People';
    $peopleDescription = $section['people_description'] ?? "While we've got the most trusted audiovisual, staging and lighting brands available to you, it is our unparalleled team that will exceed your expectations.";
@endphp

<section id="services" class="py-0 md:py-0 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[700px] h-[700px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-[700px] h-[700px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slower"></div>
    
    <div class="container mx-auto px-4 lg:px-12 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-4xl mx-auto pt-12 md:pt-16 mb-6 md:mb-10 animate-fade-in-up">
            <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-4 leading-tight">{{ $title }}</h2>
            <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-4"></div>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto font-medium">{{ $description }}</p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($items as $index => $service)
                @php
                    $gradient = $service['gradient'] ?? ($index % 2 === 0 ? 'from-yellow-400 to-yellow-600' : 'from-[#172455] to-[#1e3a8a]');
                @endphp
                <div class="group bg-white border-2 border-gray-200 rounded-3xl p-8 hover:shadow-2xl hover:border-transparent transition-all duration-500 hover:-translate-y-3 cursor-pointer relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br {{ $gradient }} opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br {{ $gradient }} rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-125 group-hover:rotate-6 transition-all duration-500 shadow-xl">
                            @php
                                $iconName = $service['icon'] ?? 'Box';
                            @endphp
                            @if($iconName === 'Box' || $iconName === 'Package')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            @elseif($iconName === 'Monitor')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            @elseif($iconName === 'Radio')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                            @elseif($iconName === 'Lightbulb')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                            @elseif($iconName === 'Grid3x3')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            @elseif($iconName === 'Palette')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                            @elseif($iconName === 'Volume2')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M6.343 6.343l-.707-.707a1 1 0 00-1.414 1.414l.707.707a4.978 4.978 0 010 7.071l-.707.707a1 1 0 101.414 1.414l.707-.707a6.978 6.978 0 000-9.899z"></path></svg>
                            @elseif($iconName === 'PenTool')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            @else
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-black text-[#172455] mb-4 group-hover:text-white transition-colors duration-300">{{ $service['title'] ?? '' }}</h3>
                        <p class="text-gray-700 leading-relaxed font-medium group-hover:text-white transition-colors duration-300">{{ $service['description'] ?? '' }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Our People Section -->
        <div class="mt-8 md:mt-16 mb-8 bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 md:p-16 border-2 border-gray-100 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-200 rounded-full blur-3xl opacity-30"></div>
            <div class="text-center max-w-3xl mx-auto relative z-10">
                <h3 class="text-3xl md:text-4xl font-black text-[#172455] mb-4 md:mb-6">{{ $peopleTitle }}</h3>
                <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-6"></div>
                <p class="text-lg md:text-2xl text-gray-700 leading-relaxed font-medium">{{ $peopleDescription }}</p>
            </div>
        </div>
    </div>
    
    <!-- Rainbow gradient bar -->
    <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x"></div>
</section>
