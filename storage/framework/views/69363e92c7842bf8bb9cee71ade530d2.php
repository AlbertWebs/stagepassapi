<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.') : ($section->subtitle ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.');
    $sliderId = 'industries-slider-' . uniqid();
?>

<section class="py-20 bg-white">
    <style>
        .ind3-card {
            border-color: rgba(23, 36, 85, 0.12);
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
        }
        .ind3-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 158, 11, 0.35);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }
        .ind3-scroll::-webkit-scrollbar { height: 8px; }
        .ind3-scroll::-webkit-scrollbar-track { background: #e2e8f0; border-radius: 9999px; }
        .ind3-scroll::-webkit-scrollbar-thumb { background: linear-gradient(90deg, #172455, #f59e0b); border-radius: 9999px; }
    </style>
    <div class="container mx-auto px-6 lg:px-12">
        <div class="flex items-end justify-between gap-4">
            <div class="max-w-3xl">
                <p class="inline-flex items-center rounded-full border border-[#172455]/20 bg-[#172455]/5 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.2em] text-[#172455]">
                    Industries
                </p>
                <h2 class="mt-4 text-3xl lg:text-5xl font-black text-[#172455]"><?php echo e($title); ?></h2>
                <p class="mt-4 text-base sm:text-lg text-slate-600"><?php echo e($subtitle); ?></p>
            </div>
            <div class="hidden md:flex gap-2">
                <button type="button" data-prev="<?php echo e($sliderId); ?>" class="h-10 w-10 rounded-full border border-[#172455]/20 text-[#172455] hover:bg-[#172455] hover:text-white transition-colors duration-200">←</button>
                <button type="button" data-next="<?php echo e($sliderId); ?>" class="h-10 w-10 rounded-full border border-[#172455]/20 text-[#172455] hover:bg-[#172455] hover:text-white transition-colors duration-200">→</button>
            </div>
        </div>
        <div class="mt-6 h-1.5 w-28 rounded-full bg-gradient-to-r from-[#172455] to-amber-500"></div>
        <div id="<?php echo e($sliderId); ?>" class="ind3-scroll mt-8 flex gap-6 overflow-x-auto snap-x snap-mandatory pb-4">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? ''); ?>
                <article class="ind3-card snap-start shrink-0 w-[86%] sm:w-[58%] lg:w-[33%] rounded-2xl border p-7 shadow-sm">
                    <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] text-amber-300 grid place-items-center shadow-sm">▣</div>
                    <h3 class="mt-4 text-xl font-bold text-[#172455]"><?php echo e($name); ?></h3>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <script>
    (function(){
        var id = <?php echo json_encode($sliderId, 15, 512) ?>;
        var slider = document.getElementById(id);
        if (!slider) return;
        var prev = document.querySelector('[data-prev="' + id + '"]');
        var next = document.querySelector('[data-next="' + id + '"]');
        function step(dir) { slider.scrollBy({ left: dir * slider.clientWidth * 0.75, behavior: 'smooth' }); }
        if (prev) prev.addEventListener('click', function(){ step(-1); });
        if (next) next.addEventListener('click', function(){ step(1); });

        // Autoplay starts immediately; reverses at edges.
        var dir = 1;
        var timer = null;
        function atEnd() {
            return slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 2;
        }
        function atStart() {
            return slider.scrollLeft <= 2;
        }
        function autoStep() {
            if (atEnd()) dir = -1;
            if (atStart()) dir = 1;
            step(dir);
        }
        function startAuto() {
            if (timer) return;
            timer = setInterval(autoStep, 3200);
        }
        function stopAuto() {
            if (!timer) return;
            clearInterval(timer);
            timer = null;
        }

        startAuto();
        slider.addEventListener('mouseenter', stopAuto);
        slider.addEventListener('mouseleave', startAuto);
        slider.addEventListener('touchstart', stopAuto, { passive: true });
        slider.addEventListener('touchend', startAuto, { passive: true });
    })();
    </script>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/IndustriesOption3.blade.php ENDPATH**/ ?>