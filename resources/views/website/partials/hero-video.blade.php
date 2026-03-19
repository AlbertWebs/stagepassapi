@php
    $data = $data ?? null;
    $headline = is_array($data) ? ($data['headline'] ?? 'We Create the Most Engaging Events in the World Using Technology') : ($data->headline ?? 'We Create the Most Engaging Events in the World Using Technology');
    $priorityYoutube = 'https://www.youtube.com/watch?v=Ki9C3r4mD4M';
    $videoUrl = $priorityYoutube;
    $isYoutube = preg_match('#(?:youtube\.com/watch\?v=|youtu\.be/)([a-zA-Z0-9_-]+)#', $videoUrl, $yt) ? $yt[1] : null;
    $videoFallbackImage = asset('uploads/hero.jpeg');
@endphp
<section id="home" class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0" style="padding-top: 4.25rem;">
    <div class="absolute inset-x-0 top-0 w-full h-screen overflow-hidden">
        <img id="hero-video-fallback" src="{{ $videoFallbackImage }}" alt="" class="absolute inset-0 w-full h-full object-cover hidden" aria-hidden="true">
        @if($isYoutube)
        {{-- YouTube embed: no controls, no branding, autoplay muted loop, scaled to cover so no chrome visible --}}
        <div class="absolute inset-0 w-full h-full" style="pointer-events: none;">
            <iframe
                id="hero-youtube"
                src="https://www.youtube.com/embed/{{ $isYoutube }}?autoplay=1&mute=1&controls=0&rel=0&modestbranding=1&loop=1&playlist={{ $isYoutube }}&playsinline=1&showinfo=0&disablekb=1&fs=0&iv_load_policy=3"
                class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 border-0"
                style="width: max(100vw, 177.78vh); height: max(100vh, 56.25vw);"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                title="Background video"
                aria-hidden="true"></iframe>
        </div>
        @else
        <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto" aria-hidden="true" id="hero-video" disablePictureInPicture
            src="{{ $videoUrl }}">
            <source src="{{ $videoUrl }}" type="video/mp4">
        </video>
        <div id="hero-play-overlay" class="absolute inset-0 z-10 flex items-center justify-center bg-black/50 transition-opacity duration-500 cursor-pointer" role="button" tabindex="0" aria-label="Click to play video">
            <div class="flex flex-col items-center gap-4 text-white">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-white/80 flex items-center justify-center hover:bg-white/10 transition-colors">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 ml-1 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                </div>
                <span class="text-sm sm:text-base font-semibold tracking-wide">Click to play video</span>
            </div>
        </div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/45 to-black/80" aria-hidden="true" style="pointer-events: none;"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/30 via-transparent to-black/30" aria-hidden="true" style="pointer-events: none;"></div>
        <div class="absolute inset-0 opacity-60" style="background: radial-gradient(ellipse 80% 50% at 50% 50%, transparent 0%, rgba(0,0,0,0.6) 100%); pointer-events: none;" aria-hidden="true"></div>
    </div>
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-center px-4 sm:px-6">
        <div id="hero-text-block" class="max-w-4xl mx-auto transition-all duration-[1.8s] ease-out">
            <p class="hero-badge text-amber-400/95 text-xs sm:text-sm font-bold tracking-[0.3em] uppercase mb-4 sm:mb-5 opacity-0 animate-hero-fade-up" style="animation-delay: 0.1s; animation-fill-mode: forwards;">Events · Technology · Excellence</p>
            <h1 class="hero-headline text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black leading-[1.05] tracking-tight text-white opacity-0 animate-hero-fade-up drop-shadow-[0_2px_20px_rgba(0,0,0,0.6)]" style="animation-delay: 0.25s; animation-fill-mode: forwards; text-shadow: 0 0 40px rgba(0,0,0,0.4);">{{ $headline }}</h1>
            <div class="mt-6 sm:mt-8 h-1.5 w-20 sm:w-28 bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 rounded-full mx-auto opacity-0 animate-hero-fade-up shadow-[0_0_20px_rgba(251,191,36,0.5)]" aria-hidden="true" style="animation-delay: 0.45s; animation-fill-mode: forwards;"></div>
            <p class="mt-6 sm:mt-8 text-lg sm:text-xl md:text-2xl text-white/95 font-semibold tracking-wide opacity-0 animate-hero-fade-up drop-shadow-[0_1px_8px_rgba(0,0,0,0.5)]" style="animation-delay: 0.6s; animation-fill-mode: forwards;">Creative Solutions · Technical Excellence</p>
        </div>
        <a href="#about" class="hero-cta absolute bottom-10 left-1/2 -translate-x-1/2 inline-flex flex-col items-center gap-1.5 text-white/80 hover:text-white transition-all duration-300 hover:scale-105 group opacity-0 animate-hero-fade-up" style="animation-delay: 0.85s; animation-fill-mode: forwards;" aria-label="Scroll to about">
            <span class="text-xs sm:text-sm font-semibold tracking-wider uppercase">Scroll</span>
            <span class="text-lg sm:text-xl leading-none animate-bounce group-hover:animate-none">↓</span>
        </a>
    </div>
    <style>
        @keyframes hero-fade-up {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-hero-fade-up {
            animation: hero-fade-up 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        #hero-text-block.hero-text-out {
            opacity: 0;
            transform: translateY(-12px);
            pointer-events: none;
        }
    </style>
    <script>
    (function(){
        var block = document.getElementById('hero-text-block');
        if (!block) return;
        setTimeout(function(){
            block.classList.add('hero-text-out');
        }, 10000);
    })();
    </script>
</section>
@if(!$isYoutube)
<script>
(function(){
    var v = document.getElementById('hero-video');
    var overlay = document.getElementById('hero-play-overlay');
    var fallback = document.getElementById('hero-video-fallback');
    if (!v) return;
    function useFallbackImage() {
        if (fallback) { fallback.classList.remove('hidden'); fallback.classList.add('block'); }
        v.style.display = 'none';
        if (overlay) overlay.style.display = 'none';
    }
    v.addEventListener('error', useFallbackImage);
    v.muted = true;
    v.playsInline = true;
    v.setAttribute('playsinline', ''); v.setAttribute('webkit-playsinline', '');
    v.controls = false;
    function hideOverlay() {
        if (overlay) { overlay.style.opacity = '0'; overlay.style.pointerEvents = 'none'; }
    }
    v.addEventListener('playing', hideOverlay);
    function tryPlay() {
        v.muted = true;
        v.play().then(hideOverlay).catch(function(){});
    }
    tryPlay();
    v.addEventListener('loadeddata', tryPlay);
    v.addEventListener('canplay', tryPlay);
    if (overlay) {
        overlay.addEventListener('click', function(e) { e.preventDefault(); v.muted = true; v.play().then(hideOverlay).catch(function(){}); });
        overlay.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); v.muted = true; v.play().then(hideOverlay).catch(function(){}); }
        });
    }
})();
</script>
@endif
