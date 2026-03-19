<?php
    $data = $data ?? null;
    $headline = is_array($data) ? ($data['headline'] ?? 'We Create the Most Engaging Events in the World Using Technology') : ($data->headline ?? 'We Create the Most Engaging Events in the World Using Technology');
    $videoUrl = is_array($data) ? ($data['background_video_url'] ?? asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4')) : ($data->background_video_url ?? asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4'));
?>
<section id="home" class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0" style="padding-top: 4.25rem;">
    <?php
        $videoFallbackImage = asset('uploads/hero.jpeg');
    ?>
    <div class="absolute inset-x-0 top-0 w-full h-screen">
        <img id="hero-video-fallback" src="<?php echo e($videoFallbackImage); ?>" alt="" class="absolute inset-0 w-full h-full object-cover hidden" aria-hidden="true">
        <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto" aria-hidden="true" id="hero-video" disablePictureInPicture
            src="<?php echo e($videoUrl); ?>">
            <source src="<?php echo e($videoUrl); ?>" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black/70" aria-hidden="true"></div>
        <div id="hero-play-overlay" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40 transition-opacity duration-500 cursor-pointer" role="button" tabindex="0" aria-label="Click to play video">
            <div class="flex flex-col items-center gap-4 text-white">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-white/80 flex items-center justify-center hover:bg-white/10 transition-colors">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 ml-1 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                </div>
                <span class="text-sm sm:text-base font-semibold tracking-wide">Click to play video</span>
            </div>
        </div>
    </div>
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-center px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.5)]"><?php echo e($headline); ?></h1>
            <div class="mt-6 h-1 w-16 sm:w-20 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-full mx-auto" aria-hidden="true"></div>
            <p class="mt-6 text-lg sm:text-xl text-white/95 font-semibold tracking-wide drop-shadow-[0_1px_6px_rgba(0,0,0,0.4)]">Creative Solutions · Technical Excellence</p>
        </div>
        <a href="#about" class="absolute bottom-10 left-1/2 -translate-x-1/2 inline-flex flex-col items-center gap-1.5 text-white/80 hover:text-white transition-all duration-300 hover:scale-105 group" aria-label="Scroll to about">
            <span class="text-xs sm:text-sm font-semibold tracking-wider uppercase">Scroll</span>
            <span class="text-lg sm:text-xl leading-none animate-bounce group-hover:animate-none">↓</span>
        </a>
    </div>
</section>
<script>
(function(){
    var v = document.getElementById('hero-video');
    var overlay = document.getElementById('hero-play-overlay');
    var fallback = document.getElementById('hero-video-fallback');
    if (!v) return;

    function useFallbackImage() {
        if (fallback) {
            fallback.classList.remove('hidden');
            fallback.classList.add('block');
        }
        v.style.display = 'none';
        if (overlay) overlay.style.display = 'none';
    }
    v.addEventListener('error', useFallbackImage);
    v.muted = true;
    v.playsInline = true;
    v.setAttribute('playsinline', '');
    v.setAttribute('webkit-playsinline', '');
    v.controls = false;

    function hideOverlay() {
        if (overlay) {
            overlay.style.opacity = '0';
            overlay.style.pointerEvents = 'none';
        }
    }
    function showOverlay() {
        if (overlay) {
            overlay.style.opacity = '1';
            overlay.style.pointerEvents = 'auto';
        }
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
        overlay.addEventListener('click', function() {
            v.muted = true;
            v.play().then(hideOverlay).catch(function(){});
        });
        overlay.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                v.muted = true;
                v.play().then(hideOverlay).catch(function(){});
            }
        });
    }
})();
</script>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/hero-video.blade.php ENDPATH**/ ?>