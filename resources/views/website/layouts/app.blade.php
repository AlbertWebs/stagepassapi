@php
    $faviconUrl = \Illuminate\Support\Facades\DB::table('site_settings')->where('key', 'favicon_url')->value('value');
    if (!empty($faviconUrl)) {
        $faviconUrl = str_starts_with($faviconUrl, 'http') ? $faviconUrl : asset($faviconUrl);
    } else {
        $faviconUrl = asset('favicon.ico');
    }
    $faviconType = str_ends_with(strtolower($faviconUrl), '.ico') ? 'image/x-icon' : 'image/png';
    
    // Get homepage data if not provided
    $homepageData = $homepageData ?? [];
    $isPage = $isPage ?? false;
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="{{ $faviconType }}" href="{{ $faviconUrl }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#172455" />
    <link rel="manifest" href="{{ route('manifest') }}" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-title" content="StagePass" />
    <link rel="apple-touch-icon" href="{{ $faviconUrl }}" />
    
    <!-- Primary SEO -->
    <title>@yield('title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')</title>
    <meta name="description" content="@yield('description', 'StagePass Audio Visual Limited is Kenya\'s leading events and audio-visual company — offering professional sound systems, event production, video conferencing, stage lighting, LED screens and technical event support in Nairobi and across Kenya.')">
    <meta name="keywords" content="@yield('keywords', 'audio visual company Kenya, AV company Nairobi, event production Kenya, sound systems Kenya, stage lighting Kenya, video conferencing Kenya, event technology Kenya, professional event services Kenya')">
    <meta name="author" content="StagePass Audio Visual Limited">
    <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Language & Region -->
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
    <meta property="og:description" content="@yield('og_description', 'Kenya\'s trusted Audio Visual & Event Production company — professional sound engineering, staging, LED screens, event technology and conferencing solutions.')">
    <meta property="og:image" content="@yield('og_image', asset('uploads/StagePass-LOGO-y.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('twitter_title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Events & Audio Visual production company in Kenya — sound systems, staging, lighting, LED screens, conferencing & event technology.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('uploads/StagePass-LOGO-y.png'))">
    <meta name="twitter:site" content="@stagepass">
    <meta name="twitter:creator" content="@stagepass">

    <!-- Structured Data -->
    @hasSection('structured_data')
        @yield('structured_data')
    @endif

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        html { scroll-behavior: smooth; }
        
        @keyframes border-pulse {
            0%, 100% { border-color: #f59e0b; box-shadow: 0 0 0px 0px rgba(245, 158, 11, 0.7); }
            50% { border-color: #eab308; box-shadow: 0 0 0px 4px rgba(245, 158, 11, 0); }
        }
        .animate-border-pulse { animation: border-pulse 2s infinite; }
        
        @keyframes fade-in { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 0.6s ease-out; }
        
        @keyframes fade-in-up { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out; }
        
        @keyframes fade-in-left { from { opacity: 0; transform: translateX(-40px); } to { opacity: 1; transform: translateX(0); } }
        .animate-fade-in-left { animation: fade-in-left 0.8s ease-out; }
        
        @keyframes fade-in-right { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }
        .animate-fade-in-right { animation: fade-in-right 0.8s ease-out; }
        
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
        .animate-float { animation: float 3s ease-in-out infinite; }
        
        @keyframes float-enhanced { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-30px) scale(1.1); } }
        .animate-float-enhanced { animation: float-enhanced 4s ease-in-out infinite; }
        
        @keyframes spin-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .animate-spin-slow { animation: spin-slow 20s linear infinite; }
        
        @keyframes spin-slower { from { transform: rotate(360deg); } to { transform: rotate(0deg); } }
        .animate-spin-slower { animation: spin-slower 30s linear infinite; }
        
        @keyframes spin-reverse { from { transform: rotate(0deg); } to { transform: rotate(-360deg); } }
        .animate-spin-reverse { animation: spin-reverse 25s linear infinite; }
        
        @keyframes spin-very-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .animate-spin-very-slow { animation: spin-very-slow 60s linear infinite; }
        
        @keyframes pulse-slow { 0%, 100% { opacity: 0.3; transform: scale(1); } 50% { opacity: 0.5; transform: scale(1.05); } }
        .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
        
        @keyframes pulse-slower { 0%, 100% { opacity: 0.2; transform: scale(1); } 50% { opacity: 0.4; transform: scale(1.1); } }
        .animate-pulse-slower { animation: pulse-slower 6s ease-in-out infinite; }
        
        @keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 30px rgba(234, 179, 8, 0.3); } 50% { box-shadow: 0 0 60px rgba(234, 179, 8, 0.6); } }
        .animate-pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
        
        @keyframes bounce-slow { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .animate-bounce-slow { animation: bounce-slow 2s ease-in-out infinite; }
        
        @keyframes gradient-x { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        .animate-gradient-x { background-size: 200% 200%; animation: gradient-x 3s ease infinite; }
        
        @keyframes text-reveal { from { opacity: 0; transform: translateY(20px); letter-spacing: 0.2em; } to { opacity: 1; transform: translateY(0); letter-spacing: normal; } }
        .animate-text-reveal { animation: text-reveal 1s ease-out; }
        
        @keyframes slide-in-left { from { opacity: 0; transform: translateX(-100px); } to { opacity: 1; transform: translateX(0); } }
        .animate-slide-in-left { animation: slide-in-left 0.8s ease-out; }
        
        @keyframes slide-in-right { from { opacity: 0; transform: translateX(100px); } to { opacity: 1; transform: translateX(0); } }
        .animate-slide-in-right { animation: slide-in-right 0.8s ease-out; }
        
        @keyframes scale-in { 0% { opacity: 0; transform: scale(0.5); } 50% { transform: scale(1.1); } 100% { opacity: 1; transform: scale(1); } }
        .animate-scale-in { animation: scale-in 1s ease-out; }
        
        @keyframes shimmer { 0% { transform: translateX(-100%) translateY(0) skewX(-12deg); } 100% { transform: translateX(200%) translateY(0) skewX(-12deg); } }
        .animate-shimmer { animation: shimmer 3s infinite; }
        
        @keyframes slide-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slide-up { animation: slide-up 0.4s ease-out; }
        
        .animation-delay-200 { animation-delay: 0.2s; }
        .animation-delay-400 { animation-delay: 0.4s; }
        .animation-delay-500 { animation-delay: 0.5s; }
        .animation-delay-600 { animation-delay: 0.6s; }
        .animation-delay-800 { animation-delay: 0.8s; }
        .animation-delay-1000 { animation-delay: 1s; }
        .animation-delay-1500 { animation-delay: 1.5s; }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-900">
    @include('website.partials.navbar', ['data' => $homepageData['navigation'] ?? null, 'isPage' => $isPage])
    
    <main>
        @yield('content')
    </main>
    
    @include('website.partials.footer', ['data' => $homepageData['footer'] ?? null])
    @include('website.partials.quote-modal')
    @include('website.partials.bottom-navbar', ['data' => $homepageData['navigation']['bottom_links'] ?? null, 'isPage' => $isPage])
    
    <!-- Scroll to top button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-[#172455] rounded-full flex items-center justify-center shadow-2xl hover:shadow-yellow-500/50 transition-all duration-300 hover:scale-110 z-50 group animate-bounce-slow">
        <svg class="w-7 h-7 font-bold group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
    
    <script>
        const API_BASE_URL = '{{ url('/') }}';
        
        // Intersection Observer for scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = { threshold: 0.1, rootMargin: '0px' };
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('[data-observe]').forEach(el => observer.observe(el));
        });
    </script>
    
    @stack('scripts')
</body>
</html>
