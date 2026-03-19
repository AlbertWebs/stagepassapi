<?php
    $data = $data ?? null;
    $section = null;
    $items = null;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $items = $data['items'] ?? null;
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $items = $data->items ?? null;
    }

    $industryData = $items ?? collect([
        (object)['title' => 'Corporate & Business Events', 'icon_name' => 'Building2', 'description' => 'Professional audio-visual solutions for corporate gatherings.'],
        (object)['title' => 'Entertainment & Live Shows', 'icon_name' => 'Music', 'description' => 'Immersive AV for concerts, festivals, and live performances.'],
        (object)['title' => 'Exhibitions & Trade Shows', 'icon_name' => 'Clapperboard', 'description' => 'Engaging displays for exhibitions and trade shows.'],
        (object)['title' => 'Education & Training', 'icon_name' => 'Building2', 'description' => 'AV solutions for education and training.'],
        (object)['title' => 'Religious Institutions', 'icon_name' => 'Building2', 'description' => 'Professional AV for worship and religious events.'],
        (object)['title' => 'Hospitality & Tourism', 'icon_name' => 'Gem', 'description' => 'Elegant AV for hotels and destination events.'],
        (object)['title' => 'Healthcare & Medical', 'icon_name' => 'Building2', 'description' => 'Specialized AV for medical and healthcare.'],
        (object)['title' => 'Government & Public Sector', 'icon_name' => 'Building2', 'description' => 'Large-scale AV for government and public events.'],
        (object)['title' => 'Retail & Brand Experiences', 'icon_name' => 'Palette', 'description' => 'Dynamic displays for retail and brand activations.'],
    ]);

    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'We serve a diverse range of industries with tailored solutions.') : ($section->subtitle ?? 'We serve a diverse range of industries with tailored solutions.');

    $display = collect($industryData)->take(9);
    $half = (int) ceil($display->count() / 2);
    $row1 = $display->take($half)->values();
    $row2 = $display->skip($half)->values();

    function getIconSvgVideo($iconName) {
        $icons = [
            'Music' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>',
            'Building2' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>',
            'Palette' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>',
            'Gem' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>',
            'Clapperboard' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>',
        ];
        return $icons[$iconName] ?? $icons['Building2'];
    }
?>
<style>
    @keyframes industries-slide-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    @keyframes industries-slide-right {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }
    .industries-track-left { animation: industries-slide-left 40s linear infinite; }
    .industries-track-right { animation: industries-slide-right 45s linear infinite; }
    .industries-row-wrap:hover .industries-track-left,
    .industries-row-wrap:hover .industries-track-right { animation-play-state: paused; }
    #industries {
        --mouse-x: 0.5;
        --mouse-y: 0.5;
    }
    .industries-bg-layer {
        position: absolute;
        inset: -20%;
        transition: opacity 0.4s ease, transform 0.35s ease-out;
        will-change: transform;
        pointer-events: none;
    }
    .industries-bg-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.5;
    }
    .industries-bg-blob-1 {
        width: 70%;
        height: 70%;
        background: radial-gradient(circle, rgba(251,191,36,0.45) 0%, rgba(245,158,11,0.2) 40%, transparent 70%);
        top: 50%;
        left: 50%;
        transform: translate(calc(-50% + (var(--mouse-x) - 0.5) * 120px), calc(-50% + (var(--mouse-y) - 0.5) * 80px));
    }
    .industries-bg-blob-2 {
        width: 55%;
        height: 55%;
        background: radial-gradient(circle, rgba(192,132,252,0.35) 0%, rgba(168,85,247,0.15) 45%, transparent 70%);
        top: 30%;
        right: 10%;
        transform: translate(calc((var(--mouse-x) - 0.5) * -90px), calc((var(--mouse-y) - 0.5) * -60px));
    }
    .industries-bg-blob-3 {
        width: 50%;
        height: 50%;
        background: radial-gradient(circle, rgba(244,63,94,0.25) 0%, rgba(236,72,153,0.1) 50%, transparent 70%);
        bottom: 15%;
        left: 20%;
        transform: translate(calc((var(--mouse-x) - 0.5) * 70px), calc((var(--mouse-y) - 0.5) * 100px));
    }
    .industries-bg-blob-4 {
        width: 45%;
        height: 45%;
        background: radial-gradient(circle, rgba(59,130,246,0.2) 0%, rgba(99,102,241,0.08) 50%, transparent 70%);
        top: 60%;
        right: 25%;
        transform: translate(calc((var(--mouse-x) - 0.5) * -50px), calc((var(--mouse-y) - 0.5) * 70px));
    }
    .industries-bg-blob-5 {
        width: 40%;
        height: 40%;
        background: radial-gradient(circle, rgba(34,197,94,0.15) 0%, transparent 60%);
        top: 20%;
        left: 15%;
        transform: translate(calc((var(--mouse-x) - 0.5) * 60px), calc((var(--mouse-y) - 0.5) * -50px));
    }
</style>
<section id="industries"
         class="relative py-24 overflow-hidden bg-gray-900 text-white">
    <!-- Custom gradient mesh background (mouse-follow) -->
    <div class="absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
        <div class="industries-bg-layer">
            <div class="industries-bg-blob industries-bg-blob-1"></div>
            <div class="industries-bg-blob industries-bg-blob-2"></div>
            <div class="industries-bg-blob industries-bg-blob-3"></div>
            <div class="industries-bg-blob industries-bg-blob-4"></div>
            <div class="industries-bg-blob industries-bg-blob-5"></div>
        </div>
        <div class="absolute inset-0 bg-gray-900/60 pointer-events-none" aria-hidden="true"></div>
    </div>
    <div class="absolute top-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x z-10" aria-hidden="true"></div>
    <!-- Subtle grid -->
    <div class="absolute inset-0 opacity-[0.06] pointer-events-none z-10" aria-hidden="true"
         style="background-image: linear-gradient(rgba(255,255,255,.08) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.08) 1px, transparent 1px); background-size: 48px 48px;"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block text-xs font-bold text-amber-400 tracking-wider uppercase">Industries</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mt-4">
                Industries We Serve
            </h2>
            <div class="h-1 w-20 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-full mx-auto mt-4"></div>
            <p class="text-white/80 text-lg max-w-2xl mx-auto mt-4"><?php echo e($subtitle); ?></p>
        </div>

        <!-- Upper row: infinite slide left -->
        <div class="industries-row-wrap overflow-hidden mb-8">
            <div class="industries-track-left flex flex-nowrap gap-6 sm:gap-8 justify-start items-stretch w-max">
                <?php $__currentLoopData = [1, 2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $copy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $row1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $t = is_array($industry) ? ($industry['title'] ?? '') : ($industry->title ?? '');
                            $icon = is_array($industry) ? ($industry['icon_name'] ?? 'Building2') : ($industry->icon_name ?? 'Building2');
                            $iconUrl = is_array($industry) ? ($industry['icon_url'] ?? null) : ($industry->icon_url ?? null);
                        ?>
                        <div class="group flex-shrink-0 w-64 sm:w-72 md:w-80 rounded-3xl p-[1px] bg-gradient-to-br from-amber-400/40 via-amber-500/20 to-transparent shadow-lg shadow-black/20 hover:shadow-xl hover:shadow-amber-500/10 hover:from-amber-400/60 hover:via-amber-500/30 transition-all duration-300">
                            <div class="relative h-full rounded-3xl bg-gray-900/90 backdrop-blur-xl border border-white/5 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-white/[0.06] to-transparent pointer-events-none" aria-hidden="true"></div>
                                <div class="relative p-7 sm:p-8 flex flex-col">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-amber-500/40 to-yellow-600/40 flex items-center justify-center mb-5 ring-2 ring-amber-400/20 group-hover:ring-amber-400/40 group-hover:scale-105 transition-all duration-300 shadow-inner">
                                        <?php if($iconUrl): ?>
                                            <img src="<?php echo e($iconUrl); ?>" alt="" class="w-8 h-8 sm:w-10 sm:h-10 object-contain" />
                                        <?php else: ?>
                                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?php echo getIconSvgVideo($icon); ?></svg>
                                        <?php endif; ?>
                                    </div>
                                    <h3 class="text-xl font-bold text-white tracking-tight leading-snug"><?php echo e($t); ?></h3>
                                    <p class="mt-2 text-sm text-white/50 group-hover:text-white/70 transition-colors duration-300">Tailored solutions</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Lower row: infinite slide right -->
        <div class="industries-row-wrap overflow-hidden">
            <div class="industries-track-right flex flex-nowrap gap-6 sm:gap-8 justify-end items-stretch w-max">
                <?php $__currentLoopData = [1, 2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $copy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $row2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $t = is_array($industry) ? ($industry['title'] ?? '') : ($industry->title ?? '');
                            $icon = is_array($industry) ? ($industry['icon_name'] ?? 'Building2') : ($industry->icon_name ?? 'Building2');
                            $iconUrl = is_array($industry) ? ($industry['icon_url'] ?? null) : ($industry->icon_url ?? null);
                        ?>
                        <div class="group flex-shrink-0 w-64 sm:w-72 md:w-80 rounded-3xl p-[1px] bg-gradient-to-br from-amber-400/40 via-amber-500/20 to-transparent shadow-lg shadow-black/20 hover:shadow-xl hover:shadow-amber-500/10 hover:from-amber-400/60 hover:via-amber-500/30 transition-all duration-300">
                            <div class="relative h-full rounded-3xl bg-gray-900/90 backdrop-blur-xl border border-white/5 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-white/[0.06] to-transparent pointer-events-none" aria-hidden="true"></div>
                                <div class="relative p-7 sm:p-8 flex flex-col">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-amber-500/40 to-yellow-600/40 flex items-center justify-center mb-5 ring-2 ring-amber-400/20 group-hover:ring-amber-400/40 group-hover:scale-105 transition-all duration-300 shadow-inner">
                                        <?php if($iconUrl): ?>
                                            <img src="<?php echo e($iconUrl); ?>" alt="" class="w-8 h-8 sm:w-10 sm:h-10 object-contain" />
                                        <?php else: ?>
                                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?php echo getIconSvgVideo($icon); ?></svg>
                                        <?php endif; ?>
                                    </div>
                                    <h3 class="text-xl font-bold text-white tracking-tight leading-snug"><?php echo e($t); ?></h3>
                                    <p class="mt-2 text-sm text-white/50 group-hover:text-white/70 transition-colors duration-300">Tailored solutions</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <script>
    (function(){
        var section = document.getElementById('industries');
        if (!section) return;
        function onMouseMove(e) {
            var rect = section.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width;
            var y = (e.clientY - rect.top) / rect.height;
            section.style.setProperty('--mouse-x', x);
            section.style.setProperty('--mouse-y', y);
        }
        function onMouseLeave() {
            section.style.setProperty('--mouse-x', '0.5');
            section.style.setProperty('--mouse-y', '0.5');
        }
        section.addEventListener('mousemove', onMouseMove);
        section.addEventListener('mouseleave', onMouseLeave);
    })();
    </script>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/industries-video.blade.php ENDPATH**/ ?>