@php
    $homepageData = $homepageData ?? [];
    $settings = $homepageData['settings'] ?? [];
    $navigation = $homepageData['navigation'] ?? null;
    // Prioritize site_logo_url from settings, then navigation logo_url, then default
    $logoUrl = $settings['site_logo_url'] ?? $navigation['logo_url'] ?? asset('uploads/StagePass-LOGO-y.png');
    $ctaLabel = $navigation['cta_label'] ?? 'Get AV Quote';
    $navLinks = $navigation['links'] ?? [
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'About Us', 'href' => '#about'],
        ['label' => 'Services', 'href' => '#services'],
        ['label' => 'Our Work', 'href' => '#portfolio'],
        ['label' => 'Industries', 'href' => '#industries'],
        ['label' => 'Contact Us', 'href' => '#contact'],
    ];
    $isPage = $isPage ?? false;
@endphp

<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-[#0f1b3d] shadow-xl border-b-2 border-[#172455]/10" id="main-navbar">
    <!-- Top accent bar -->
    <div class="h-1 md:h-2 bg-gradient-to-r from-[#172455] via-yellow-500 to-[#172455] animate-gradient-x"></div>
    
    <div class="container mx-auto px-4 lg:px-12">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <div class="flex items-center h-full group">
                @if($isPage)
                    <a href="{{ url('/') }}" class="h-full flex items-center">
                        <img 
                            src="{{ $logoUrl }}"
                            alt="StagePass Logo" 
                            class="h-full w-auto object-contain transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3"
                        />
                    </a>
                @else
                    <img 
                        src="{{ $logoUrl }}"
                        alt="StagePass Logo" 
                        class="h-full w-auto object-contain transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3"
                    />
                @endif
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                @foreach($navLinks as $index => $link)
                    @php
                        $isLink = isset($link['isLink']) ? $link['isLink'] : false;
                        $href = $link['href'] ?? '#';
                        $label = $link['label'] ?? '';
                        $linkId = 'nav-link-' . $index;
                    @endphp
                    @if($isLink || str_starts_with($href, '/'))
                        <a
                            href="{{ $href }}"
                            id="{{ $linkId }}"
                            data-href="{{ $href }}"
                            class="nav-link text-white hover:text-yellow-600 font-bold transition-colors duration-200 relative group text-base shadow-sm hover:shadow-lg hover:scale-105 transform-gpu px-3 py-2 rounded-md"
                        >
                            {{ $label }}
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white group-hover:bg-gradient-to-r group-hover:from-yellow-500 group-hover:to-yellow-600 transition-all duration-300"></span>
                            <span class="absolute top-0 left-0 w-0 h-0.5 bg-gradient-to-r from-yellow-500 to-yellow-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    @else
                        <a
                            href="{{ $href }}"
                            id="{{ $linkId }}"
                            data-href="{{ $href }}"
                            class="nav-link text-white hover:text-yellow-600 font-bold transition-colors duration-200 relative group text-base shadow-sm hover:shadow-lg hover:scale-105 transform-gpu px-3 py-2 rounded-md"
                        >
                            {{ $label }}
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white group-hover:bg-gradient-to-r group-hover:from-yellow-500 group-hover:to-yellow-600 transition-all duration-300"></span>
                            <span class="absolute top-0 left-0 w-0 h-0.5 bg-gradient-to-r from-yellow-500 to-yellow-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    @endif
                @endforeach
                <button
                    onclick="openQuoteModal()"
                    class="bg-gradient-to-r from-[#172455] to-[#1e3a8a] hover:from-[#0f1b3d] hover:to-[#172455] text-white px-6 py-3 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-110 font-bold border-2 border-yellow-500 animate-border-pulse text-sm"
                >
                    {{ $ctaLabel }}
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button
                onclick="toggleMobileMenu()"
                class="lg:hidden p-1.5 text-white hover:text-yellow-600 transition-colors"
                id="mobile-menu-btn"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="menu-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden hidden py-4 border-t border-[#172455]/10 bg-gradient-to-b from-[#0f1b3d] to-[#172455]" id="mobile-menu">
            <div class="flex flex-col space-y-4">
                @foreach($navLinks as $index => $link)
                    @php
                        $isLink = isset($link['isLink']) ? $link['isLink'] : false;
                        $href = $link['href'] ?? '#';
                        $label = $link['label'] ?? '';
                        $mobileLinkId = 'mobile-nav-link-' . $index;
                    @endphp
                    <a
                        href="{{ $href }}"
                        id="{{ $mobileLinkId }}"
                        data-href="{{ $href }}"
                        class="nav-link text-white hover:text-yellow-600 font-bold py-2 transition-colors duration-200"
                        onclick="closeMobileMenu()"
                    >
                        {{ $label }}
                    </a>
                @endforeach
                <button
                    onclick="openQuoteModal(); closeMobileMenu();"
                    class="bg-gradient-to-r from-[#172455] to-[#1e3a8a] hover:from-[#0f1b3d] hover:to-[#172455] text-white w-full rounded-full py-3 font-bold text-sm"
                >
                    {{ $ctaLabel }}
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    menu.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
}

function closeMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    menu.classList.add('hidden');
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
}

// Active link highlighting based on scroll position
(function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = Array.from(navLinks).map(link => {
        const href = link.getAttribute('data-href') || link.getAttribute('href');
        if (href && href.startsWith('#')) {
            const sectionId = href.substring(1);
            return {
                link: link,
                section: document.getElementById(sectionId),
                href: href
            };
        }
        return null;
    }).filter(item => item !== null && item.section !== null);

    function updateActiveLink() {
        const scrollPosition = window.scrollY + 100; // Offset for navbar height
        
        // Find the section currently in view
        let activeSection = null;
        for (let i = sections.length - 1; i >= 0; i--) {
            const section = sections[i].section;
            const rect = section.getBoundingClientRect();
            const sectionTop = rect.top + window.scrollY;
            const sectionBottom = sectionTop + rect.height;
            
            if (scrollPosition >= sectionTop && scrollPosition <= sectionBottom) {
                activeSection = sections[i];
                break;
            }
        }
        
        // If at the top of the page, highlight home
        if (window.scrollY < 100) {
            const homeSection = sections.find(s => s.href === '#home');
            if (homeSection) {
                activeSection = homeSection;
            }
        }
        
        // Update active states
        navLinks.forEach(link => {
            if (activeSection && link.getAttribute('data-href') === activeSection.href) {
                link.classList.add('text-yellow-500');
                link.classList.remove('text-white');
            } else {
                link.classList.remove('text-yellow-500');
                link.classList.add('text-white');
            }
        });
    }

    // Initial check
    updateActiveLink();
    
    // Update on scroll
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                updateActiveLink();
                ticking = false;
            });
            ticking = true;
        }
    });
})();
</script>
