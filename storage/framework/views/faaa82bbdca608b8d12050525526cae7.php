<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $itemsArray = is_array($items) ? $items : (is_iterable($items) ? iterator_to_array($items) : []);
    $totalItems = is_countable($itemsArray) ? count($itemsArray) : 0;
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.') : ($section->subtitle ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.');
    $sectionId = 'industries-option4-' . uniqid();
?>

<section id="<?php echo e($sectionId); ?>" class="relative py-20 overflow-hidden" style="background: radial-gradient(circle at 20% 20%, #eef2ff 0%, #fff7ed 45%, #f8fafc 100%);">
    <style>
        .ind4-card {
            border: 1px solid rgba(23, 36, 85, 0.10);
            background: linear-gradient(180deg, rgba(255,255,255,0.92) 0%, rgba(248,250,252,0.92) 100%);
            box-shadow: 0 14px 34px rgba(2, 6, 23, 0.08);
            transform: translateY(16px);
            opacity: 0;
            transition:
                transform .32s ease-out,
                opacity .32s ease-out,
                box-shadow .28s ease,
                border-color .28s ease,
                background .28s ease;
        }
        .ind4-card.is-visible {
            transform: translateY(0);
            opacity: 1;
        }
        .ind4-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 158, 11, 0.45);
            box-shadow: 0 22px 55px rgba(2, 6, 23, 0.12);
            background: linear-gradient(180deg, rgba(255,255,255,0.98) 0%, rgba(248,250,252,0.98) 100%);
        }
        .ind4-card:focus-within {
            border-color: rgba(245, 158, 11, 0.55);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.18), 0 22px 55px rgba(2, 6, 23, 0.12);
        }
        .ind4-underline {
            position: relative;
            overflow: hidden;
        }
        .ind4-underline::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #172455, #f59e0b);
            transform-origin: left;
            transform: scaleX(0);
            transition: transform .3s ease;
        }
        .ind4-card:hover .ind4-underline::after {
            transform: scaleX(1);
        }
        @media (prefers-reduced-motion: reduce) {
            .ind4-card { transition: none; }
        }
    </style>
    <div class="container relative z-10 mx-auto px-6 lg:px-12">
        <div class="text-center max-w-3xl mx-auto">
            <p class="inline-flex items-center rounded-full border border-[#172455]/20 bg-white/70 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.2em] text-[#172455]">
                Industries
            </p>
            <h2 class="mt-4 text-3xl lg:text-5xl font-black text-[#172455]"><?php echo e($title); ?></h2>
            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-[#172455] to-amber-500 mx-auto"></div>
            <p class="mt-5 text-base sm:text-lg text-slate-600"><?php echo e($subtitle); ?></p>
        </div>
        <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $itemsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? ''); ?>
                <?php if($totalItems > 2 && $index >= $totalItems - 2): ?>
                    <?php continue; ?>
                <?php endif; ?>
                <article class="ind4-card rounded-2xl p-6" style="transition-delay: <?php echo e($index * 40); ?>ms;">
                    <p class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#172455]/55">
                        <?php echo e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>

                    </p>
                    <h3 class="ind4-underline mt-2 text-lg lg:text-xl font-bold text-[#172455] pb-1.5"><?php echo e($name); ?></h3>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        Tailored strategy, implementation, and support for this sector.
                    </p>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($totalItems > 2): ?>
            <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-2 gap-6 max-w-3xl mx-auto">
                <?php $__currentLoopData = array_slice($itemsArray, -2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offset => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? ''); ?>
                    <?php $index = max(0, $totalItems - 2 + $offset); ?>
                    <article class="ind4-card rounded-2xl p-6" style="transition-delay: <?php echo e($index * 40); ?>ms;">
                        <p class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#172455]/55">
                            <?php echo e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>

                        </p>
                        <h3 class="ind4-underline mt-2 text-lg lg:text-xl font-bold text-[#172455] pb-1.5"><?php echo e($name); ?></h3>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            Tailored strategy, implementation, and support for this sector.
                        </p>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
    (function(){
        var section = document.getElementById(<?php echo json_encode($sectionId, 15, 512) ?>);
        if (!section) return;
        var cards = section.querySelectorAll('.ind4-card');
        if (!cards.length) return;

        function reveal() {
            cards.forEach(function(card){
                card.classList.add('is-visible');
            });
        }

        if (typeof IntersectionObserver !== 'undefined') {
            var done = false;
            var io = new IntersectionObserver(function(entries){
                entries.forEach(function(entry){
                    if (!done && entry.isIntersecting) {
                        done = true;
                        reveal();
                        io.disconnect();
                    }
                });
            }, { threshold: 0.15 });
            io.observe(section);
        } else {
            reveal();
        }
    })();
    </script>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/IndustriesOption4.blade.php ENDPATH**/ ?>