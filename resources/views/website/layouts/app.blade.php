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
        : asset($faviconUrl);
} else {
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

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine -->
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
</body>
</html>


