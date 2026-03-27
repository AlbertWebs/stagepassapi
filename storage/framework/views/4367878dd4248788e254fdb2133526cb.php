<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $subtitle = is_array($section) ? ($section['description'] ?? 'Horizontal snap experience for quick service discovery.') : ($section->description ?? 'Horizontal snap experience for quick service discovery.');
    $sliderId = 'capabilities-slider-' . uniqid();
?>

<section id="services" class="relative overflow-hidden py-20 text-white">
    
    <style>
        @keyframes cap2Glow {
            0%, 100% { transform: translateY(0) scale(1); opacity: .35; }
            50% { transform: translateY(-10px) scale(1.06); opacity: .55; }
        }
        @keyframes cap2Shine {
            0% { transform: translateX(-130%) skewX(-14deg); opacity: 0; }
            35% { opacity: .28; }
            100% { transform: translateX(170%) skewX(-14deg); opacity: 0; }
        }
        .cap2-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
        }
        .cap2-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 0%, transparent 42%, rgba(255,255,255,0.2) 50%, transparent 58%, transparent 100%);
            transform: translateX(-130%) skewX(-14deg);
            pointer-events: none;
        }
        .cap2-card:hover::after { animation: cap2Shine .8s ease-out; }
    </style>
    <div class="absolute inset-0 z-0 bg-center bg-cover bg-no-repeat" style="background-image: url('<?php echo e(asset('uploads/backgrounds/bg.webp')); ?>');" aria-hidden="true"></div>
    <div class="absolute inset-0 z-0" style="background-color: rgba(2, 6, 23, 0.93);" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -top-16 -right-16 h-72 w-72 rounded-full bg-yellow-400/15 blur-3xl" style="animation: cap2Glow 8s ease-in-out infinite;"></div>
    <div class="pointer-events-none absolute -bottom-16 -left-16 h-80 w-80 rounded-full bg-indigo-500/20 blur-3xl" style="animation: cap2Glow 10s ease-in-out infinite;"></div>
    <div class="relative z-10 container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <span class="inline-flex items-center rounded-full border border-yellow-300/50 bg-yellow-500/10 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-yellow-300">Capabilities</span>
            <h2 class="mt-5 text-3xl lg:text-5xl font-black text-[#eaf0ff]"><?php echo e($title); ?></h2>
            <div class="mx-auto mt-4 h-1.5 w-24 rounded-full bg-gradient-to-r from-yellow-400 via-yellow-500 to-amber-500"></div>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto font-medium"><?php echo e($subtitle); ?></p>
            
        </div>
        <div class="mt-2 mb-4 flex items-center justify-between gap-3">
            <p class="text-xs uppercase tracking-[0.14em] text-slate-400">Explore our end-to-end AV services and solutions</p>
            <div class="hidden sm:flex items-center gap-2">
                <button type="button" data-cap-prev="<?php echo e($sliderId); ?>" class="h-9 w-9 rounded-full border border-slate-600 text-slate-200 hover:border-yellow-400 hover:text-yellow-300 transition-colors">←</button>
                <button type="button" data-cap-next="<?php echo e($sliderId); ?>" class="h-9 w-9 rounded-full border border-slate-600 text-slate-200 hover:border-yellow-400 hover:text-yellow-300 transition-colors">→</button>
            </div>
        </div>
        <div id="<?php echo e($sliderId); ?>" class="mt-4 flex gap-6 overflow-x-auto pb-4 [scrollbar-width:none] [-ms-overflow-style:none]" style="-webkit-overflow-scrolling:touch;">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    $iconName = is_array($item) ? ($item['icon'] ?? 'Box') : ($item->icon ?? 'Box');
                    $serviceMeta = ['Event Delivery', 'Live Support', 'Technical Ops', 'AV Expertise', 'System Design', 'On-Site Crew', 'Production Ready', 'Creative Build', 'Client Focus'];
                    $serviceMetaLabel = $serviceMeta[$idx % count($serviceMeta)];
                ?>
                <article class="cap2-card snap-start shrink-0 w-[84%] sm:w-[56%] lg:w-[34%] rounded-2xl border border-slate-700/70 bg-slate-900/75 p-7 transition-all duration-300 hover:scale-[1.02] hover:border-yellow-400/70 hover:shadow-xl hover:shadow-yellow-500/10">
                    <div class="flex items-center justify-between">
                        <div class="text-yellow-300 text-sm font-semibold uppercase tracking-[0.16em]">Capability</div>
                        <span class="text-[11px] font-semibold text-slate-500">0<?php echo e($idx + 1); ?></span>
                    </div>
                    <div class="mt-4 h-12 w-12 rounded-xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] ring-2 ring-yellow-300/35 text-yellow-300 grid place-items-center">
                        <?php if($iconName === 'Monitor'): ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <?php elseif($iconName === 'Lightbulb'): ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        <?php else: ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <?php endif; ?>
                    </div>
                    <h3 class="mt-4 text-2xl font-bold"><?php echo e($titleItem); ?></h3>
                    <p class="mt-4 text-slate-300 text-sm lg:text-base"><?php echo e($desc); ?></p>
                    <div class="mt-5 h-px w-full bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>
                    <div class="mt-3 flex items-center justify-between text-[11px] uppercase tracking-[0.12em] text-slate-500">
                        <span>StagePass AV</span>
                        <span class="text-yellow-300/80"><?php echo e($serviceMetaLabel); ?></span>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <script>
    (function(){
        var id = <?php echo json_encode($sliderId, 15, 512) ?>;
        var slider = document.getElementById(id);
        if (!slider) return;
        var prev = document.querySelector('[data-cap-prev="' + id + '"]');
        var next = document.querySelector('[data-cap-next="' + id + '"]');
        var pxPerSecond = 30;
        var lastTs = null;
        var rafId = null;

        // Duplicate cards once for seamless infinite marquee effect.
        var original = Array.prototype.slice.call(slider.children);
        if (!slider.dataset.duplicated) {
            original.forEach(function(node) {
                slider.appendChild(node.cloneNode(true));
            });
            slider.dataset.duplicated = '1';
        }

        function halfWidth() {
            return slider.scrollWidth / 2;
        }

        function tick(ts) {
            if (lastTs == null) lastTs = ts;
            var dt = (ts - lastTs) / 1000;
            lastTs = ts;
            var h = halfWidth();
            if (h > 0) {
                slider.scrollLeft = (slider.scrollLeft + (pxPerSecond * dt)) % h;
            }
            rafId = window.requestAnimationFrame(tick);
        }

        function jump(dir) {
            var h = halfWidth();
            slider.scrollLeft += dir * slider.clientWidth * 0.65;
            if (h > 0 && slider.scrollLeft < 0) slider.scrollLeft += h;
            if (h > 0 && slider.scrollLeft >= h) slider.scrollLeft -= h;
        }

        if (prev) prev.addEventListener('click', function(){ jump(-1); });
        if (next) next.addEventListener('click', function(){ jump(1); });

        rafId = window.requestAnimationFrame(tick);
        window.addEventListener('beforeunload', function(){
            if (rafId) window.cancelAnimationFrame(rafId);
        });
    })();
    </script>
    <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-500 via-purple-500 via-pink-500 via-red-500 via-orange-500 via-yellow-500 to-green-500 animate-gradient-x"></div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/CapabilitiesOption2.blade.php ENDPATH**/ ?>