<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'Cinematic presentation with glass cards for a premium story-driven section.') : ($section->subtitle ?? 'Cinematic presentation with glass cards for a premium story-driven section.');
    $sectionId = 'capabilities-option4-' . uniqid();
?>

<section id="<?php echo e($sectionId); ?>" class="py-20 bg-slate-50">
    <style>
        #<?php echo e($sectionId); ?> {
            --cap4-progress: 0%;
        }
        .cap4-card {
            border-color: rgba(15, 23, 42, 0.11);
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease, opacity .45s ease;
        }
        .cap4-card:hover {
            transform: translateY(-4px);
            border-color: rgba(245, 158, 11, 0.55);
            box-shadow: 0 14px 34px rgba(2, 6, 23, 0.12);
        }
        .cap4-icon {
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.18), 0 10px 20px rgba(2,6,23,.22);
            transition: transform .28s ease, background-color .28s ease, color .28s ease;
        }
        .cap4-card:hover .cap4-icon { transform: translateY(-2px) scale(1.03); }
        .cap4-reveal {
            opacity: 0;
            transform: translateY(22px);
        }
        .cap4-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
            transition: opacity .65s cubic-bezier(.22,1,.36,1), transform .65s cubic-bezier(.22,1,.36,1);
        }
        .cap4-sticky-inner {
            transform: translateY(0);
            transition: transform .18s linear;
            will-change: transform;
        }
        .cap4-progress-track {
            height: .375rem;
            width: 8rem;
            border-radius: 9999px;
            background: rgba(148, 163, 184, 0.26);
            overflow: hidden;
        }
        .cap4-progress-bar {
            height: 100%;
            width: var(--cap4-progress);
            border-radius: 9999px;
            background: linear-gradient(90deg, #172455, #f59e0b);
            transition: width .15s linear;
        }
        @media (prefers-reduced-motion: reduce) {
            .cap4-reveal,
            .cap4-reveal.is-visible,
            .cap4-sticky-inner,
            .cap4-progress-bar {
                transition: none !important;
            }
        }
    </style>
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid lg:grid-cols-12 gap-10 items-start">
            <div class="lg:col-span-4 lg:sticky lg:top-24 self-start">
                <div class="cap4-sticky-inner">
                    <p class="inline-flex items-center rounded-full border border-[#172455]/20 bg-[#172455]/5 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-[#172455]">
                        Capabilities
                    </p>
                    <h2 class="mt-4 text-3xl lg:text-5xl font-black text-[#172455] leading-tight"><?php echo e($title); ?></h2>
                    <div class="mt-4 cap4-progress-track">
                        <div class="cap4-progress-bar"></div>
                    </div>
                    <p class="mt-5 text-slate-600 text-base lg:text-lg"><?php echo e($subtitle); ?></p>
                </div>
            </div>
            <div class="lg:col-span-8 space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                        $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    ?>
                    <article class="cap4-card cap4-reveal group rounded-2xl border p-6 lg:p-7" data-cap4-delay="<?php echo e($idx * 0.08); ?>">
                        <div class="grid grid-cols-[56px_1fr] lg:grid-cols-[72px_1fr] gap-4 lg:gap-6">
                            <div class="cap4-icon h-14 w-14 lg:h-18 lg:w-18 rounded-2xl bg-slate-900 text-amber-300 grid place-items-center text-2xl transition-colors duration-300 group-hover:bg-amber-400 group-hover:text-slate-900">◆</div>
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.2em] font-bold text-[#172455]/60"><?php echo e(str_pad((string)($idx + 1), 2, '0', STR_PAD_LEFT)); ?></p>
                                <h3 class="mt-1 text-xl font-bold text-slate-900"><?php echo e($titleItem); ?></h3>
                                <p class="mt-2 text-sm lg:text-base text-slate-600 leading-relaxed"><?php echo e($desc); ?></p>
                                <div class="mt-4 h-px w-full bg-gradient-to-r from-amber-400/70 via-[#172455]/20 to-transparent"></div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <article class="cap4-card rounded-2xl border p-6 lg:p-7">
                        <h3 class="text-xl font-bold text-slate-900">Capabilities coming soon</h3>
                        <p class="mt-2 text-sm lg:text-base text-slate-600">We are preparing an updated capabilities lineup for this section.</p>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
    (function(){
        var section = document.getElementById(<?php echo json_encode($sectionId, 15, 512) ?>);
        if (!section) return;

        var cards = section.querySelectorAll('.cap4-reveal');
        var stickyInner = section.querySelector('.cap4-sticky-inner');

        function revealAll() {
            cards.forEach(function(card){
                var delay = parseFloat(card.getAttribute('data-cap4-delay') || '0');
                card.style.transitionDelay = delay + 's';
                card.classList.add('is-visible');
            });
        }

        if (typeof IntersectionObserver !== 'undefined' && cards.length) {
            var done = false;
            var io = new IntersectionObserver(function(entries){
                entries.forEach(function(entry){
                    if (!done && entry.isIntersecting) {
                        done = true;
                        revealAll();
                        io.disconnect();
                    }
                });
            }, { threshold: 0.12 });
            io.observe(section);
        } else {
            revealAll();
        }

        function updateScrollEffects() {
            var rect = section.getBoundingClientRect();
            var viewport = window.innerHeight || document.documentElement.clientHeight;
            var total = rect.height + viewport;
            var progress = Math.min(1, Math.max(0, (viewport - rect.top) / total));
            section.style.setProperty('--cap4-progress', (progress * 100).toFixed(2) + '%');

            if (stickyInner) {
                var shift = (progress - 0.5) * 10;
                stickyInner.style.transform = 'translateY(' + shift.toFixed(2) + 'px)';
            }
        }

        updateScrollEffects();
        window.addEventListener('scroll', updateScrollEffects, { passive: true });
        window.addEventListener('resize', updateScrollEffects);
    })();
    </script>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/CapabilitiesOption4.blade.php ENDPATH**/ ?>