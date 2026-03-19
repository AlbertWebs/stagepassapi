@php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

try {
    $faviconUrl = DB::table('site_settings')
        ->where('key', 'favicon_url')
        ->value('value');
} catch (\Throwable $e) {
    $faviconUrl = null;
}

if (!empty($faviconUrl)) {
    $faviconUrl = Str::startsWith($faviconUrl, ['http://', 'https://'])
        ? $faviconUrl
        : (file_exists(public_path($faviconUrl)) ? asset($faviconUrl) : null);
}
if (empty($faviconUrl)) {
    $faviconUrl = asset('favicon.ico');
}

$faviconType = Str::endsWith(strtolower($faviconUrl), '.ico')
    ? 'image/x-icon'
    : 'image/png';

$homepageData = $homepageData ?? [];
$isPage = $isPage ?? false;

$defaultLogo =
    $homepageData['settings']['site_logo_url'] ??
    $homepageData['navigation']['logo_url'] ??
    asset('uploads/StagePass-LOGO-y.png');
@endphp


<!doctype html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
<meta charset="utf-8" />

<link rel="icon" type="{{ $faviconType }}" href="{{ $faviconUrl }}">
<link rel="apple-touch-icon" href="{{ $faviconUrl }}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#172455">
<link rel="manifest" href="{{ route('manifest') }}">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="StagePass">

<!-- SEO -->
<title>@yield('title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')</title>

<meta name="description"
      content="@yield('description', 'StagePass Audio Visual Limited is Kenya\'s leading events and audio-visual company — offering professional sound systems, event production, video conferencing, stage lighting, LED screens and technical event support in Nairobi and across Kenya.')">

<meta name="keywords"
      content="@yield('keywords', 'audio visual company Kenya, AV company Nairobi, event production Kenya, sound systems Kenya, stage lighting Kenya, video conferencing Kenya, event technology Kenya, professional event services Kenya')">

<meta name="author" content="StagePass Audio Visual Limited">
<meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Geo -->
<meta name="language" content="English">
<meta name="geo.region" content="KE-110">
<meta name="geo.placename" content="Nairobi">
<meta name="geo.position" content="-1.2210922;36.8443046">
<meta name="ICBM" content="-1.2210922, 36.8443046">

<link rel="alternate" hreflang="en-KE" href="https://stagepass.co.ke">
<link rel="alternate" hreflang="x-default" href="https://stagepass.co.ke">

<!-- Open Graph -->
<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:site_name" content="StagePass Audio Visual Limited">
<meta property="og:locale" content="en_KE">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('og_title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')">
<meta property="og:description"
      content="@yield('og_description', 'Kenya\'s trusted Audio Visual & Event Production company — professional sound engineering, staging, LED screens, event technology and conferencing solutions.')">
<meta property="og:image" content="@yield('og_image', $defaultLogo)">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="@yield('twitter_title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')">
<meta name="twitter:description"
      content="@yield('twitter_description', 'Events & Audio Visual production company in Kenya — sound systems, staging, lighting, LED screens, conferencing & event technology.')">
<meta name="twitter:image" content="@yield('twitter_image', $defaultLogo)">
<meta name="twitter:site" content="@stagepass">
<meta name="twitter:creator" content="@stagepass">

{{-- Structured data slot --}}
@yield('structured_data')

<!-- Tailwind (for production: use PostCSS or Tailwind CLI - https://tailwindcss.com/docs/installation) -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine: Intersect plugin first, then core (required for x-intersect) -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    @keyframes bounce-slow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    .animate-bounce-slow {
        animation: bounce-slow 2s ease-in-out infinite;
    }
    
    /* Scroll animations */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fade-in-left {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fade-in-right {
        from {
            opacity: 0;
            transform: translateX(40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
    
    .animate-fade-in-left {
        animation: fade-in-left 0.8s ease-out forwards;
    }
    
    .animate-fade-in-right {
        animation: fade-in-right 0.8s ease-out forwards;
    }
    
    /* Initial hidden state for scroll animations */
    .scroll-animate {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.3s ease-out, transform 0.3s ease-out;
    }
    
    .scroll-animate.animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* WOW-style scroll animations: use class="wow" data-wow="fade-up" (or fade-in, fade-left, fade-right, zoom-in) */
    .wow {
        opacity: 0;
    }
    .wow.wow-visible { opacity: 1; }
    .wow[data-wow="fade-up"] { transform: translateY(36px); }
    .wow.wow-visible[data-wow="fade-up"] { animation: fade-in-up 0.7s ease-out forwards; }
    .wow[data-wow="fade-in"] { transform: none; }
    .wow.wow-visible[data-wow="fade-in"] { animation: wow-fade-in 0.7s ease-out forwards; }
    .wow[data-wow="fade-left"] { transform: translateX(-36px); }
    .wow.wow-visible[data-wow="fade-left"] { animation: fade-in-left 0.7s ease-out forwards; }
    .wow[data-wow="fade-right"] { transform: translateX(36px); }
    .wow.wow-visible[data-wow="fade-right"] { animation: fade-in-right 0.7s ease-out forwards; }
    .wow[data-wow="zoom-in"] { transform: scale(0.92); }
    .wow.wow-visible[data-wow="zoom-in"] { animation: wow-zoom-in 0.6s ease-out forwards; }
    @keyframes wow-fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes wow-zoom-in {
        from { opacity: 0; transform: scale(0.92); }
        to { opacity: 1; transform: scale(1); }
    }

    /* Industries section: dramatic floating shapes */
    @keyframes industries-shape-float-1 {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 1; }
        25% { transform: translate(20px, -25px) scale(1.03); opacity: 0.95; }
        50% { transform: translate(-15px, 20px) scale(0.98); opacity: 1; }
        75% { transform: translate(10px, 15px) scale(1.02); opacity: 0.92; }
    }
    @keyframes industries-shape-float-2 {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 1; }
        33% { transform: translate(-25px, 15px) scale(1.04); opacity: 0.9; }
        66% { transform: translate(18px, -20px) scale(0.97); opacity: 1; }
    }
    @keyframes industries-shape-float-3 {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 1; }
        40% { transform: translate(15px, 25px) scale(1.02); opacity: 0.93; }
        80% { transform: translate(-20px, -15px) scale(0.99); opacity: 1; }
    }
    @keyframes industries-shape-float-4 {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 1; }
        50% { transform: translate(-12px, -22px) scale(1.05); opacity: 0.88; }
    }
    @keyframes industries-shape-float-5 {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 1; }
        50% { transform: translate(8px, -12px) scale(1.02); opacity: 0.92; }
    }
    @keyframes industries-shape-float-6 {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 1; }
        50% { transform: translate(-8px, 10px) scale(0.98); opacity: 0.94; }
    }
    @keyframes industries-shape-float-7 {
        0%, 100% { transform: translate(0, 0) scale(1) rotate(0deg); opacity: 1; }
        25% { transform: translate(12px, -18px) scale(1.04) rotate(2deg); opacity: 0.95; }
        50% { transform: translate(-15px, 12px) scale(0.97) rotate(-1deg); opacity: 1; }
        75% { transform: translate(-8px, -15px) scale(1.03) rotate(1deg); opacity: 0.92; }
    }
    .industries-shape-1 { animation: industries-shape-float-1 18s ease-in-out infinite; }
    .industries-shape-2 { animation: industries-shape-float-2 22s ease-in-out infinite; animation-delay: -4s; }
    .industries-shape-3 { animation: industries-shape-float-3 20s ease-in-out infinite; animation-delay: -8s; }
    .industries-shape-4 { animation: industries-shape-float-4 16s ease-in-out infinite; animation-delay: -2s; }
    .industries-shape-5 { animation: industries-shape-float-5 19s ease-in-out infinite; animation-delay: -5s; }
    .industries-shape-6 { animation: industries-shape-float-6 21s ease-in-out infinite; animation-delay: -11s; }
    .industries-shape-7 { animation: industries-shape-float-7 14s ease-in-out infinite; animation-delay: -3s; }
</style>

@stack('styles')
</head>
<body class="bg-white">
    @include('website.partials.navbar', ['homepageData' => $homepageData, 'isPage' => $isPage])
    
    <main>
        @yield('content')
    </main>
    
    @include('website.partials.footer', ['data' => $homepageData['footer'] ?? null, 'homepageData' => $homepageData])
    @include('website.partials.quote-modal')
    @include('website.partials.bottom-navbar', ['homepageData' => $homepageData, 'isPage' => $isPage])
    
    <!-- Scripts -->
    <script>
        // API Base URL
        const API_BASE_URL = '{{ url('/') }}';
        
        // WOW-style scroll animations (Intersection Observer)
        document.addEventListener('DOMContentLoaded', function() {
            const wowEls = document.querySelectorAll('.wow');
            if (!wowEls.length) return;
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (!entry.isIntersecting) return;
                    var el = entry.target;
                    var delay = parseInt(el.getAttribute('data-wow-delay') || '0', 10);
                    if (delay) {
                        setTimeout(function() {
                            el.classList.add('wow-visible');
                        }, delay);
                    } else {
                        el.classList.add('wow-visible');
                    }
                    observer.unobserve(el);
                });
            }, { rootMargin: '0px 0px -40px 0px', threshold: 0.1 });
            wowEls.forEach(function(el) { observer.observe(el); });
        });
        
        // Navbar scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('nav');
            if (navbar) {
                let isScrolled = false;
                
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50 && !isScrolled) {
                        navbar.classList.add('scrolled');
                        isScrolled = true;
                    } else if (window.scrollY <= 50 && isScrolled) {
                        navbar.classList.remove('scrolled');
                        isScrolled = false;
                    }
                });
            }
        });
    </script>
    
    @stack('scripts')
    <script>
    (function(){
        var containers = document.querySelectorAll('[data-youtube-video-id]');
        if (!containers.length) return;
        if (window.YT && window.YT.Player) {
            initPlayers();
            return;
        }
        var tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        var first = document.getElementsByTagName('script')[0];
        first.parentNode.insertBefore(tag, first);
        window.onYouTubeIframeAPIReady = function() {
            initPlayers();
        };
        function forceHighestQuality(player) {
            try {
                var q = player.getAvailableQualityLevels && player.getAvailableQualityLevels();
                if (q && q.length) {
                    player.setPlaybackQuality(q[0]);
                    return;
                }
                player.setPlaybackQuality('hd1080');
            } catch (err) {}
        }
        function initPlayers() {
            containers.forEach(function(el) {
                var id = el.id;
                var videoId = el.getAttribute('data-youtube-video-id');
                if (!id || !videoId) return;
                new YT.Player(id, {
                    videoId: videoId,
                    playerVars: {
                        autoplay: 1,
                        mute: 1,
                        controls: 0,
                        rel: 0,
                        modestbranding: 1,
                        loop: 1,
                        playlist: videoId,
                        playsinline: 1,
                        showinfo: 0,
                        disablekb: 1,
                        fs: 0,
                        iv_load_policy: 3,
                        hd: 1
                    },
                    events: {
                        onReady: function(e) {
                            forceHighestQuality(e.target);
                        },
                        onStateChange: function(e) {
                            if (e.data === YT.PlayerState.PLAYING) {
                                forceHighestQuality(e.target);
                                setTimeout(function() { forceHighestQuality(e.target); }, 1500);
                            }
                        }
                    }
                });
            });
        }
    })();
    </script>
</body>
</html>


