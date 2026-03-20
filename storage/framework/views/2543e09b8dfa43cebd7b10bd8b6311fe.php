<?php
    $data = $data ?? null;
    $headline = is_array($data) ? ($data['headline'] ?? 'We Create the Most Engaging Events in the World Using Technology') : ($data->headline ?? 'We Create the Most Engaging Events in the World Using Technology');
    $priorityYoutube = 'https://www.youtube.com/watch?v=Ki9C3r4mD4M';
    $videoUrl = $priorityYoutube;
    $isYoutube = preg_match('#(?:youtube\.com/watch\?v=|youtu\.be/)([a-zA-Z0-9_-]+)#', $videoUrl, $yt) ? $yt[1] : null;
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
        <?php if($isYoutube): ?>
        <div class="absolute inset-0 w-full h-full" style="pointer-events: none;">
            <div id="hero-youtube-player" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 border-0" data-youtube-video-id="<?php echo e($isYoutube); ?>" style="width: max(100vw, 177.78vh); height: max(100vh, 56.25vw);"></div>
        </div>
        <?php else: ?>
        <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto" aria-hidden="true" id="hero-video" disablePictureInPicture
            src="<?php echo e($videoUrl); ?>">
            <source src="<?php echo e($videoUrl); ?>" type="video/mp4">
        </video>
        <div id="hero-play-overlay" class="absolute inset-0 z-10 flex items-center justify-center bg-black/50 transition-opacity duration-500 cursor-pointer" role="button" tabindex="0" aria-label="Click to play video">
            <div class="flex flex-col items-center gap-4 text-white">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-white/80 flex items-center justify-center hover:bg-white/10 transition-colors">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 ml-1 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                </div>
                <span class="text-sm sm:text-base font-semibold tracking-wide">Click to play video</span>
            </div>
        </div>
        <?php endif; ?>
        <div class="absolute inset-0 bg-black/35" aria-hidden="true" style="pointer-events: none;"></div>
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
        if (!block) return;
        function hidePreloader() {
            if (!preloader) return;
            preloader.style.opacity = '0';
            preloader.style.pointerEvents = 'none';
            setTimeout(function(){ preloader.style.display = 'none'; }, 500);
        }
        window.addEventListener('hero-video-ready', hidePreloader, { once: true });
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
<?php if(!$isYoutube): ?>
<script>
(function(){
    var v = document.getElementById('hero-video');
    var overlay = document.getElementById('hero-play-overlay');
    var fallback = document.getElementById('hero-video-fallback');
    var preloader = document.getElementById('hero-video-preloader');
    if (!v) return;
    function hidePreloader() {
        if (!preloader) return;
        preloader.style.opacity = '0';
        preloader.style.pointerEvents = 'none';
        setTimeout(function(){ preloader.style.display = 'none'; }, 500);
    }
    function useFallbackImage() {
        if (fallback) { fallback.classList.remove('hidden'); fallback.classList.add('block'); }
        v.style.display = 'none';
        if (overlay) overlay.style.display = 'none';
        hidePreloader();
    }
    v.addEventListener('error', useFallbackImage);
    v.muted = true;
    v.playsInline = true;
    v.setAttribute('playsinline', ''); v.setAttribute('webkit-playsinline', '');
    v.controls = false;
    function hideOverlay() {
        if (overlay) { overlay.style.opacity = '0'; overlay.style.pointerEvents = 'none'; }
    }
    v.addEventListener('loadeddata', hidePreloader);
    v.addEventListener('canplay', hidePreloader);
    v.addEventListener('playing', hideOverlay);
    v.addEventListener('playing', hidePreloader);
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
<?php endif; ?>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/hero-video.blade.php ENDPATH**/ ?>