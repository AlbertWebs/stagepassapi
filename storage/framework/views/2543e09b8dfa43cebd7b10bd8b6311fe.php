<?php
    $data = $data ?? null;
    $headline = is_array($data) ? ($data['headline'] ?? 'We Create the Most Engaging Events in the World Using Technology') : ($data->headline ?? 'We Create the Most Engaging Events in the World Using Technology');
    $videoUrl = is_array($data) ? ($data['background_video_url'] ?? asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4')) : ($data->background_video_url ?? asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4'));
?>
<section id="home" class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0" style="padding-top: 4.25rem;">
    <div class="absolute inset-x-0 top-0 w-full h-screen">
        <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="<?php echo e($videoUrl); ?>" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black/70" aria-hidden="true"></div>
    </div>
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-center px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <span class="inline-block px-4 py-2 rounded-full text-xs sm:text-sm font-bold tracking-widest uppercase text-white/90 bg-white/10 backdrop-blur-sm border border-white/20 mb-6">StagePass Audio Visual</span>
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
<script>(function(){var v=document.querySelector('#home video');if(v)v.play().catch(function(){});})();</script>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/hero-video.blade.php ENDPATH**/ ?>