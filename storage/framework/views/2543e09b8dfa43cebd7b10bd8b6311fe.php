<?php
    $data = $data ?? null;
    $headline = is_array($data) ? ($data['headline'] ?? 'We Create the Most Engaging Events in the World Using Technology') : ($data->headline ?? 'We Create the Most Engaging Events in the World Using Technology');
    $vimeoUrl = 'https://player.vimeo.com/video/1175144955?badge=0&autopause=0&player_id=0&app_id=58479&autoplay=1&muted=1&loop=1&background=1';
    $videoFallbackImage = asset('uploads/hero.jpeg');
?>
<section id="home" class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0" style="padding-top: 4.25rem;">
    <div class="absolute inset-x-0 top-0 w-full h-screen overflow-hidden">
        <div id="hero-video-preloader" class="absolute inset-0 z-20 flex items-center justify-center bg-gray-900/80 transition-opacity duration-500">
            <div class="flex flex-col items-center gap-4">
                <span class="hero-loader-spinner" aria-hidden="true"></span>
                <span class="hero-scroll-label tracking-[0.08em] uppercase text-white/90">Loading....</span>
            </div>
        </div>
        <img id="hero-video-fallback" src="<?php echo e($videoFallbackImage); ?>" alt="" class="absolute inset-0 w-full h-full object-cover hidden" aria-hidden="true">
        <div class="absolute inset-0 w-full h-full" style="pointer-events: none;">
            <iframe id="hero-vimeo-player" src="<?php echo e($vimeoUrl); ?>" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 border-0" style="width: max(100vw, 177.78vh); height: max(100vh, 56.25vw);" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" title="stagepass-audio-visual-safaricom-ceo-awade"></iframe>
        </div>
        <div class="absolute inset-0 bg-black/35" aria-hidden="true" style="pointer-events: none;"></div>
        <div class="absolute inset-0 hero-cinematic-vignette" aria-hidden="true" style="pointer-events: none;"></div>
    </div>
    <div class="relative z-30 flex flex-col items-center justify-center min-h-screen text-center px-4 sm:px-6">
        <div id="hero-text-block" class="max-w-4xl mx-auto transition-all duration-[2s] ease-out">
            <h1 id="hero-headline" class="hero-headline" data-full-headline="<?php echo e($headline); ?>"><?php echo e($headline); ?></h1>
            <div class="mt-5 sm:mt-6 h-0.5 w-16 sm:w-20 bg-yellow-400 rounded-full mx-auto opacity-0 animate-hero-fade-up" aria-hidden="true" style="animation-delay: 0.3s; animation-fill-mode: forwards;"></div>
            <p id="hero-subheadline" class="hero-subheadline mt-4 sm:mt-5">Creative Solutions · Technical Excellence</p>
        </div>
        <a href="#about" class="hero-cta absolute bottom-8 left-1/2 -translate-x-1/2 inline-flex flex-col items-center gap-1 text-white hover:text-white transition-opacity duration-200 group opacity-0 animate-hero-fade-up" style="animation-delay: 0.65s; animation-fill-mode: forwards;" aria-label="Scroll to about">
            <span class="hero-scroll-label tracking-[0.25em] uppercase">Scroll</span>
            <svg class="hero-scroll-arrow text-white/80 group-hover:text-white animate-bounce group-hover:animate-none" width="24" height="28" viewBox="0 0 24 28" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 4v20M6 14l6 6 6-6"/></svg>
        </a>
    </div>
    <style>
        .hero-headline {
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-style: normal;
            font-weight: 800;
            color: rgb(255, 255, 255);
            font-size: 60px;
            line-height: 60px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.45), 0 12px 40px rgba(0, 0, 0, 0.35), 0 0 26px rgba(250, 204, 21, 0.16);
        }
        @media (max-width: 1023px) {
            .hero-headline { font-size: clamp(28px, 6vw, 48px); line-height: 1.1; }
        }
        .hero-subheadline {
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-style: normal;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.95);
            font-size: 20px;
            line-height: 28px;
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 1.1s cubic-bezier(0.22, 1, 0.36, 1), transform 1.1s cubic-bezier(0.22, 1, 0.36, 1);
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.45);
        }
        .hero-subheadline.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .hero-scroll-label {
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-style: normal;
            font-weight: 600;
            color: rgb(255, 255, 255);
            font-size: 14px;
            line-height: 20px;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.5);
        }
        .hero-body-text {
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-style: normal;
            font-weight: 400;
            color: rgb(255, 255, 255);
            font-size: 16px;
            line-height: 24px;
        }
        @keyframes hero-fade-up {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-hero-fade-up {
            animation: hero-fade-up 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        #hero-text-block.hero-text-dim {
            opacity: 0.2;
        }
        #hero-text-block {
            filter: drop-shadow(0 8px 24px rgba(0, 0, 0, 0.35));
        }
        .hero-cta {
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.55);
        }
        .hero-cta::before {
            content: "";
            position: absolute;
            inset: -10px -12px;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.12) 0%, transparent 70%);
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.25s ease, transform 0.25s ease;
            pointer-events: none;
        }
        .hero-cta:hover::before {
            opacity: 1;
            transform: scale(1);
        }
        .hero-cinematic-vignette {
            background:
                radial-gradient(120% 90% at 50% 20%, rgba(0, 0, 0, 0) 35%, rgba(0, 0, 0, 0.2) 78%, rgba(0, 0, 0, 0.4) 100%),
                linear-gradient(to bottom, rgba(0, 0, 0, 0.18) 0%, rgba(0, 0, 0, 0.04) 30%, rgba(0, 0, 0, 0.28) 100%);
            mix-blend-mode: normal;
        }
        @keyframes hero-accent-pulse {
            0%, 100% { box-shadow: 0 0 0 rgba(250, 204, 21, 0.0), 0 0 16px rgba(250, 204, 21, 0.18); }
            50% { box-shadow: 0 0 0 rgba(250, 204, 21, 0.0), 0 0 26px rgba(250, 204, 21, 0.35); }
        }
        #hero-text-block > div[aria-hidden="true"] {
            animation: hero-accent-pulse 2.8s ease-in-out infinite;
        }
        .hero-loader-spinner {
            width: 54px;
            height: 54px;
            border-radius: 9999px;
            border: 3px solid rgba(255, 255, 255, 0.25);
            border-top-color: rgb(250, 204, 21);
            animation: hero-spin 0.9s linear infinite;
        }
        .hero-headline.is-typing {
            border-right: 3px solid rgba(250, 204, 21, 0.95);
            white-space: normal;
            animation: hero-caret-blink 0.8s step-end infinite;
        }
        @keyframes hero-caret-blink {
            0%, 49% { border-right-color: rgba(250, 204, 21, 0.95); }
            50%, 100% { border-right-color: transparent; }
        }
        @keyframes hero-spin {
            to { transform: rotate(360deg); }
        }
    </style>
    <script>
    (function(){
        var block = document.getElementById('hero-text-block');
        var headline = document.getElementById('hero-headline');
        var subheadline = document.getElementById('hero-subheadline');
        var preloader = document.getElementById('hero-video-preloader');
        var vimeo = document.getElementById('hero-vimeo-player');
        if (!block) return;
        function hidePreloader() {
            if (!preloader) return;
            preloader.style.opacity = '0';
            preloader.style.pointerEvents = 'none';
            setTimeout(function(){ preloader.style.display = 'none'; }, 500);
        }
        if (vimeo) {
            function bindVimeoReady() {
                if (!(window.Vimeo && window.Vimeo.Player)) return false;
                try {
                    var player = new window.Vimeo.Player(vimeo);
                    var resolved = false;
                    function hideOnce() {
                        if (resolved) return;
                        resolved = true;
                        hidePreloader();
                    }
                    player.on('play', hideOnce);
                    player.on('playing', hideOnce);
                    player.on('loaded', function() {
                        setTimeout(hideOnce, 250);
                    });
                    return true;
                } catch (e) {
                    return false;
                }
            }
            if (!bindVimeoReady()) {
                var existingVimeoScript = document.querySelector('script[data-vimeo-player-api]');
                if (!existingVimeoScript) {
                    var s = document.createElement('script');
                    s.src = 'https://player.vimeo.com/api/player.js';
                    s.async = true;
                    s.setAttribute('data-vimeo-player-api', '1');
                    s.onload = bindVimeoReady;
                    document.head.appendChild(s);
                } else {
                    existingVimeoScript.addEventListener('load', bindVimeoReady, { once: true });
                }
            }
        }
        // Fallback so loader never hangs indefinitely.
        setTimeout(hidePreloader, 7000);
        if (!headline) return;
        var fullText = headline.getAttribute('data-full-headline') || headline.textContent || '';
        var i = 0;
        headline.textContent = '';
        headline.classList.add('is-typing');
        function typeNext() {
            if (i < fullText.length) {
                headline.textContent += fullText.charAt(i);
                i += 1;
                setTimeout(typeNext, 52);
                return;
            }
            headline.classList.remove('is-typing');
            if (subheadline) {
                setTimeout(function(){ subheadline.classList.add('is-visible'); }, 220);
            }
            setTimeout(function(){
                block.classList.add('hero-text-dim');
            }, 10000);
        }
        setTimeout(typeNext, 3000);
    })();
    </script>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/hero-video.blade.php ENDPATH**/ ?>