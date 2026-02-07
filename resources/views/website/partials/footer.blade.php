@php
    $data = $data ?? null;
    $homepageData = $homepageData ?? [];
    $isHomepage = request()->path() === '/';
    
    // Get section data (handle both array and object)
    $section = null;
    if ($data) {
        $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    }
    
    // Get social links
    $socialLinks = null;
    if ($data) {
        $socialLinks = is_array($data) ? ($data['social_links'] ?? null) : ($data->social_links ?? null);
    }
    $socialLinks = $socialLinks ?? [
        ['platform' => 'Facebook', 'url' => '#'],
        ['platform' => 'Twitter', 'url' => '#'],
        ['platform' => 'Instagram', 'url' => '#'],
        ['platform' => 'Linkedin', 'url' => '#'],
        ['platform' => 'Youtube', 'url' => '#'],
    ];
    
    // Get quick links
    $quickLinksData = null;
    if ($data) {
        $quickLinksData = is_array($data) ? ($data['quick_links'] ?? null) : ($data->quick_links ?? null);
    }
    $quickLinks = ($isHomepage && $quickLinksData && count($quickLinksData)) 
        ? collect($quickLinksData)->map(function($link) {
            $linkArray = is_array($link) ? $link : (array)$link;
            return array_merge($linkArray, ['isPage' => str_starts_with($linkArray['href'] ?? '', '/')]);
        })->toArray()
        : [
            ['label' => 'About Us', 'href' => $isHomepage ? '#about' : '/about', 'isPage' => !$isHomepage],
            ['label' => 'Services', 'href' => $isHomepage ? '#services' : '/services', 'isPage' => !$isHomepage],
            ['label' => 'Our Work', 'href' => $isHomepage ? '#portfolio' : '/our-work', 'isPage' => !$isHomepage],
            ['label' => 'Industries', 'href' => $isHomepage ? '#industries' : '/industries', 'isPage' => !$isHomepage],
            ['label' => 'Contact', 'href' => $isHomepage ? '#contact' : '/contact', 'isPage' => !$isHomepage],
        ];
    
    $moreLinks = [
        ['label' => 'Terms & Conditions', 'href' => '/terms-and-conditions', 'isPage' => true],
        ['label' => 'Privacy Policy', 'href' => '/privacy', 'isPage' => true],
        ['label' => 'Get AV Quote', 'href' => '#quote', 'isPage' => false, 'isQuote' => true],
    ];
    
    // Get service items
    $serviceItems = null;
    if ($data) {
        $serviceItems = is_array($data) ? ($data['service_items'] ?? null) : ($data->service_items ?? null);
    }
    $serviceItems = $serviceItems ?? [
        ['label' => 'Full Production'],
        ['label' => 'Visual & Screens'],
        ['label' => 'Staging Services'],
        ['label' => 'Lighting Design'],
        ['label' => 'Audio Systems'],
        ['label' => 'Equipment Rentals'],
    ];
    
    // Get logo URL - prioritize from footer section, then settings, then default
    $logoUrl = null;
    if ($section) {
        $logoUrl = is_array($section) ? ($section['logo_url'] ?? null) : ($section->logo_url ?? null);
    }
    if (!$logoUrl && isset($homepageData['settings']['site_logo_url'])) {
        $logoUrl = $homepageData['settings']['site_logo_url'];
    }
    $logoUrl = $logoUrl ?? asset('uploads/StagePass-LOGO-y.png');
    
    // Get description and copyright
    $description = null;
    if ($section) {
        $description = is_array($section) ? ($section['description'] ?? null) : ($section->description ?? null);
    }
    $description = $description ?? "Africa's premier audio-visual and event technology provider, delivering excellence through innovation and expertise.";
    
    $copyright = null;
    if ($section) {
        $copyright = is_array($section) ? ($section['copyright'] ?? null) : ($section->copyright ?? null);
    }
    $copyright = $copyright ?? '© ' . date('Y') . ' StagePass Audio Visual Limited. All rights reserved. | Creative Solutions | Technical Excellence';
@endphp
<footer x-data="{ isVisible: false }" 
        x-intersect="isVisible = true"
        class="bg-gradient-to-br from-[#172455] via-[#1e3a8a] to-[#172455] text-white relative overflow-hidden">
    <!-- Rainbow gradient bar -->
    <div class="h-3 bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x"></div>
    
    <!-- Animated background elements -->
    <div class="absolute top-20 right-20 w-96 h-96 bg-yellow-500 rounded-full blur-3xl opacity-10 animate-pulse-slow"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-yellow-500 rounded-full blur-3xl opacity-10 animate-pulse-slower"></div>
    
    <div :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
         class="container mx-auto px-6 lg:px-12 py-20 relative z-10 transition-all duration-1000 transform">
        <div :class="isVisible ? 'animate-fade-in-up' : 'opacity-0'"
             class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Column 1 - Brand -->
            <div class="space-y-6">
                <img src="{{ $logoUrl }}" alt="StagePass Logo" class="h-12 w-auto object-contain brightness-0 invert" />
                <p class="text-gray-300 text-sm leading-relaxed font-medium">{{ $description }}</p>
                <div class="flex space-x-3">
                    @foreach($socialLinks as $link)
                        <a href="{{ $link['url'] ?? $link->url ?? '#' }}" 
                           class="w-12 h-12 bg-white/10 hover:bg-gradient-to-br hover:from-yellow-400 hover:to-yellow-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            @if(($link['platform'] ?? $link->platform ?? '') === 'Facebook')
                                <svg class="w-5 h-5 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            @elseif(($link['platform'] ?? $link->platform ?? '') === 'Twitter')
                                <svg class="w-5 h-5 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            @elseif(($link['platform'] ?? $link->platform ?? '') === 'Instagram')
                                <svg class="w-5 h-5 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            @elseif(($link['platform'] ?? $link->platform ?? '') === 'Linkedin')
                                <svg class="w-5 h-5 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            @elseif(($link['platform'] ?? $link->platform ?? '') === 'Youtube')
                                <svg class="w-5 h-5 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            @else
                                <svg class="w-5 h-5 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Column 2 - Quick Links -->
            <div>
                <h3 class="text-xl font-black mb-6 text-yellow-400">Quick Links</h3>
                <ul class="space-y-3">
                    @foreach($quickLinks as $link)
                        <li>
                            @if(($link['isPage'] ?? $link->isPage ?? false))
                                <a href="{{ $link['href'] ?? $link->href ?? '#' }}" class="text-gray-300 hover:text-yellow-400 transition-colors font-medium flex items-center">
                                    <span class="mr-2">→</span> {{ $link['label'] ?? $link->label ?? '' }}
                                </a>
                            @else
                                <a href="{{ $link['href'] ?? $link->href ?? '#' }}" class="text-gray-300 hover:text-yellow-400 transition-colors font-medium flex items-center">
                                    <span class="mr-2">→</span> {{ $link['label'] ?? $link->label ?? '' }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 3 - Resources -->
            <div>
                <h3 class="text-xl font-black mb-6 text-yellow-400">Resources</h3>
                <ul class="space-y-3">
                    @foreach($moreLinks as $link)
                        <li>
                            @if(($link['isQuote'] ?? false))
                                <button @click="document.dispatchEvent(new CustomEvent('open-quote-modal'))" class="text-gray-300 hover:text-yellow-400 transition-colors font-medium flex items-center w-full text-left">
                                    <span class="mr-2">→</span> {{ $link['label'] }}
                                </button>
                            @elseif(($link['isPage'] ?? false))
                                <a href="{{ $link['href'] }}" class="text-gray-300 hover:text-yellow-400 transition-colors font-medium flex items-center">
                                    <span class="mr-2">→</span> {{ $link['label'] }}
                                </a>
                            @else
                                <a href="{{ $link['href'] }}" class="text-gray-300 hover:text-yellow-400 transition-colors font-medium flex items-center">
                                    <span class="mr-2">→</span> {{ $link['label'] }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 4 - Our Services -->
            <div>
                <h3 class="text-xl font-black mb-6 text-yellow-400">Our Services</h3>
                <ul class="space-y-3">
                    @foreach($serviceItems as $item)
                        <li class="text-gray-300 font-medium text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                            {{ $item['label'] ?? $item->label ?? '' }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div :class="isVisible ? 'animate-fade-in-up' : 'opacity-0'"
             class="pt-8 border-t border-white/10 text-center" style="transition-delay: 300ms;">
            <div class="text-gray-400 text-sm font-medium">{{ $copyright }}</div>
        </div>
    </div>
</footer>
