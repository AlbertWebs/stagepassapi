@php
    $data = $data ?? null;
    $section = null;
    $services = null;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $services = $data['items'] ?? null;
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $services = $data->items ?? null;
    }

    $services = $services ?? collect([
        (object)['icon' => 'Box', 'title' => 'Full Production & Event Packages', 'description' => 'Complete event production services from start to finish, handling all technical needs.', 'gradient' => 'from-yellow-400 to-yellow-600'],
        (object)['icon' => 'Monitor', 'title' => 'Visual', 'description' => 'Stunning visual displays with cutting-edge screen technology and sharp imagery.', 'gradient' => 'from-[#172455] to-[#1e3a8a]'],
        (object)['icon' => 'Radio', 'title' => 'Staging Services', 'description' => 'Safe and creative staging solutions for any event requirement.', 'gradient' => 'from-yellow-400 to-yellow-600'],
        (object)['icon' => 'Lightbulb', 'title' => 'Lighting', 'description' => 'Intelligent lighting design that creates emotion through color, texture and movement.', 'gradient' => 'from-[#172455] to-[#1e3a8a]'],
        (object)['icon' => 'Grid3x3', 'title' => 'Rigging & Truss Services', 'description' => 'Professional rigging and truss services with legal and technical compliance.', 'gradient' => 'from-yellow-400 to-yellow-600'],
        (object)['icon' => 'Palette', 'title' => 'Graphics', 'description' => 'Eye-catching visual content including signs, posters, and printed materials.', 'gradient' => 'from-[#172455] to-[#1e3a8a]'],
        (object)['icon' => 'Volume2', 'title' => 'Audio', 'description' => 'Crystal clear sound systems with complex control and diverse inputs.', 'gradient' => 'from-yellow-400 to-yellow-600'],
        (object)['icon' => 'PenTool', 'title' => 'Design Services', 'description' => 'Flawless design planning for lighting, staging, audio and overall event aesthetics.', 'gradient' => 'from-[#172455] to-[#1e3a8a]'],
        (object)['icon' => 'Package', 'title' => 'Equipment Rentals & Sales', 'description' => 'Massive inventory of the best audiovisual technology available for rent or purchase.', 'gradient' => 'from-yellow-400 to-yellow-600'],
    ]);
    
    $badgeLabel = is_array($section) ? ($section['badge_label'] ?? 'Our Capabilities') : ($section->badge_label ?? 'Our Capabilities');
    $title = is_array($section) ? ($section['title'] ?? 'One-Stop-Solution For All Your AV Services') : ($section->title ?? 'One-Stop-Solution For All Your AV Services');
    $description = is_array($section) ? ($section['description'] ?? 'From concept to set-up to on-site support, we are there every step of the way to provide you with the exceptional product and service you deserve.') : ($section->description ?? 'From concept to set-up to on-site support, we are there every step of the way to provide you with the exceptional product and service you deserve.');
@endphp
<section id="services" 
         x-data="{ headerVisible: false, servicesVisible: [] }"
         class="py-0 md:py-0 pb-16 md:pb-24 bg-white relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-[700px] h-[700px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-[700px] h-[700px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slower"></div>
    
    <div class="container mx-auto px-4 lg:px-12 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-4xl mx-auto mb-6 md:mb-10 pt-8 md:pt-12"
             x-intersect.threshold.0.1="headerVisible = true"
             :class="headerVisible ? 'animate-fade-in-up' : ''"
             style="opacity: 1;">
            <span class="inline-block text-sm font-bold text-yellow-600 tracking-wider uppercase bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-100 px-4 py-2 rounded-full shadow-lg shadow-yellow-200/50 border border-yellow-200/50">{{ $badgeLabel }}</span>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-4 leading-tight drop-shadow-sm">{{ $title }}</h2>
            <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-600 rounded-full mx-auto mb-4 shadow-lg shadow-yellow-500/30"></div>
            <p class="text-lg md:text-xl text-gray-700 font-medium drop-shadow-sm">{{ $description }}</p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12 md:mb-16">
            @foreach($services as $index => $service)
                @php
                    $iconName = $service->icon ?? $service['icon'] ?? 'Box';
                    $gradient = $service->gradient ?? $service['gradient'] ?? 'from-yellow-400 to-yellow-600';
                @endphp
                <div class="group bg-white border-2 border-gray-200/60 rounded-3xl p-8 shadow-lg shadow-gray-200/30 hover:shadow-2xl hover:shadow-yellow-500/20 hover:border-transparent ring-2 ring-gray-100/50 hover:ring-yellow-200/50 transition-all duration-500 hover:-translate-y-3 cursor-pointer relative overflow-hidden"
                     x-intersect.threshold.0.1="servicesVisible[{{ $index }}] = true"
                     :class="servicesVisible[{{ $index }}] ? 'animate-fade-in-up' : ''"
                     style="opacity: 1;">
                    <!-- Hover gradient background -->
                    <div class="absolute inset-0 bg-gradient-to-br {{ $gradient }} opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    <div class="absolute inset-0 bg-gradient-to-br from-white/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br {{ $gradient }} rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-125 group-hover:rotate-6 transition-all duration-500 shadow-xl shadow-black/20 group-hover:shadow-2xl group-hover:shadow-black/30 ring-2 ring-white/30">
                            @if($iconName === 'Box')
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
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg>
                            @elseif($iconName === 'PenTool')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            @elseif($iconName === 'Package')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            @else
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-black text-[#172455] mb-4 group-hover:text-white transition-colors duration-300">{{ $service->title ?? $service['title'] ?? '' }}</h3>
                        <p class="text-gray-700 leading-relaxed font-medium group-hover:text-white transition-colors duration-300">{{ $service->description ?? $service['description'] ?? '' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Rainbow gradient bar with animation -->
    <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x"></div>
</section>
