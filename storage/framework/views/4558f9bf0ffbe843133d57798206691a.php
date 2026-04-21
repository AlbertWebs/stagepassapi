<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $subtitle = is_array($section)
        ? ($section['subtitle'] ?? "From concept to set-up to on-site support, we're here every step of the way to deliver the exceptional product and service you deserve.")
        : ($section->subtitle ?? "From concept to set-up to on-site support, we're here every step of the way to deliver the exceptional product and service you deserve.");

    $portfolioFiles = [];
    try {
        $portfolioFiles = glob(public_path('uploads/portfolio/*.{jpg,jpeg,png,webp}'), GLOB_BRACE) ?: [];
    } catch (\Throwable $e) {
        $portfolioFiles = [];
    }
    $portfolioImages = array_values(array_map(function ($path) {
        return asset('uploads/portfolio/' . basename($path));
    }, $portfolioFiles));
    $defaultPortfolioImage = asset('uploads/portfolio/6.jpg');
?>

<section id="services" class="relative py-20 bg-white overflow-hidden">
    <style>
        .cap5-bg-blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(80px);
            opacity: .45;
            pointer-events: none;
        }
        .cap5-blob-1 {
            width: 520px;
            height: 520px;
            top: -220px;
            left: -180px;
            background: radial-gradient(circle, rgba(23,36,85,.30) 0%, transparent 68%);
        }
        .cap5-blob-2 {
            width: 560px;
            height: 560px;
            bottom: -260px;
            right: -220px;
            background: radial-gradient(circle, rgba(245,158,11,.26) 0%, transparent 70%);
        }
        @media (prefers-reduced-motion: reduce) {
            .cap5-bg-blob { filter: blur(70px); }
        }
        .cap5-card {
            position: relative;
            isolation: isolate;
            border-color: rgba(23, 36, 85, 0.14);
            box-shadow: 0 12px 28px rgba(2, 6, 23, 0.06);
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
        }
        .cap5-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(130deg, rgba(2,28,85,0.65), rgba(232,103,5,0.62), rgba(252,176,13,0.68));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: .48;
            pointer-events: none;
            transition: opacity .28s ease;
            z-index: 0;
        }
        .cap5-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 158, 11, 0.45);
            box-shadow: 0 22px 50px rgba(2, 6, 23, 0.12);
        }
        .cap5-card:hover::before {
            opacity: .95;
        }
        .cap5-card:focus-within {
            border-color: rgba(245, 158, 11, 0.55);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.18), 0 22px 50px rgba(2, 6, 23, 0.12);
        }
        .cap5-overlay {
            transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
        }
        .cap5-photo {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1.04);
            transition: transform .6s cubic-bezier(0.22, 1, 0.36, 1), filter .6s cubic-bezier(0.22, 1, 0.36, 1);
            filter: brightness(.88) saturate(.92) contrast(1.02);
        }
        .cap5-card:hover .cap5-photo {
            transform: scale(1.10);
            filter: brightness(.78) saturate(.95) contrast(1.05);
        }
        .cap5-scrim {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.65) 0%, rgba(255,255,255,0.78) 55%, rgba(255,255,255,0.92) 100%);
            transition: opacity .35s ease;
            opacity: 1;
        }
        .cap5-card:hover .cap5-scrim { opacity: 0.08; }
        .cap5-topcopy {
            position: relative;
            display: inline-block;
            width: 100%;
            min-height: 92px;
            padding: 14px 14px 12px;
            border-radius: 16px;
            background: rgba(255,255,255,0.86);
            border: 1px solid rgba(23,36,85,0.14);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 22px rgba(2,6,23,0.08);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .cap5-topcopy::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(
                120deg,
                #021c55 0%,
                #0b3f81 20%,
                #e86705 40%,
                #f1850a 58%,
                #fcb00d 78%,
                #f7b82c 100%
            );
            background-size: 240% 240%;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity .35s ease;
            pointer-events: none;
        }
        .cap5-card:hover .cap5-topcopy {
            background: rgba(2,6,23,0.15);
            border-color: rgba(255,255,255,0.18);
            box-shadow: 0 16px 34px rgba(0,0,0,0.22);
        }
        .cap5-card:hover .cap5-topcopy::before {
            opacity: 1;
            animation: cap5GradientShift 2.2s linear infinite;
        }
        @keyframes cap5GradientShift {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        .cap5-title {
            text-shadow: 0 1px 0 rgba(255,255,255,0.25);
        }
        .cap5-card:hover .cap5-title {
            text-shadow: 0 10px 28px rgba(0,0,0,0.35);
        }
        .cap5-footer {
            border-radius: 10px;
            padding: 12px 12px 14px;
            background: rgba(255,255,255,0.88);
            border: 1px solid rgba(15,23,42,0.10);
            box-shadow: 0 8px 18px rgba(15,23,42,0.14);
            color: rgba(15,23,42,0.98);
            line-height: 1.45;
            letter-spacing: 0.01em;
            font-weight: 600;
            backdrop-filter: blur(2px);
            opacity: 1;
            transform: translateY(0);
            text-shadow: none;
            min-height: calc(1.4em * 2);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .cap5-card:hover .cap5-footer {
            background: transparent;
            opacity: 0;
            transform: translateY(8px);
            min-height: 0;
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            margin: 0;
            border-width: 0;
            overflow: hidden;
        }
        .cap5-reveal {
            opacity: 0;
            transform: translateY(22px);
            transition:
                opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .cap5-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        @media (prefers-reduced-motion: reduce) {
            .cap5-card,
            .cap5-overlay,
            .cap5-photo,
            .cap5-scrim,
            .cap5-topcopy::before,
            .cap5-reveal { transition: none !important; animation: none !important; transform: none !important; opacity: 1 !important; }
        }
    </style>
    <div class="cap5-bg-blob cap5-blob-1" aria-hidden="true"></div>
    <div class="cap5-bg-blob cap5-blob-2" aria-hidden="true"></div>
    <div class="container mx-auto px-6 lg:px-12">
        <div class="cap5-reveal max-w-3xl mx-auto text-center" data-cap5-delay="0">
            <p class="inline-flex items-center rounded-full border border-[#172455]/20 bg-[#172455]/5 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.2em] text-[#172455]">
                Capabilities
            </p>
            <h2 class="mt-4 text-3xl lg:text-5xl font-black text-[#172455]"><?php echo e($title); ?></h2>
            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-[#172455] to-amber-500 mx-auto"></div>
            <p class="mt-5 text-slate-600 text-base lg:text-lg"><?php echo e($subtitle); ?></p>
        </div>
        <div class="mt-10 grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    $bg = count($portfolioImages) ? ($portfolioImages[$idx % count($portfolioImages)] ?? $defaultPortfolioImage) : $defaultPortfolioImage;
                ?>
                <div class="cap5-reveal" data-cap5-delay="<?php echo e(($idx + 1) * 0.08); ?>">
                    <article class="cap5-card group relative rounded-2xl border bg-white p-6 h-64 overflow-hidden transition-all duration-300">
                        <div class="cap5-photo" style="background-image: url('<?php echo e($bg); ?>');" aria-hidden="true"></div>
                        <div class="cap5-scrim" aria-hidden="true"></div>
                        <div class="cap5-overlay absolute inset-0 bg-gradient-to-t from-[#020617]/95 via-[#0b1436]/75 to-transparent translate-y-[70%] group-hover:translate-y-0 transition-transform duration-500"></div>
                        <div class="relative z-10 h-full flex flex-col items-center justify-center text-center gap-4">
                            <div class="w-full text-slate-900 group-hover:text-white transition-colors duration-300">
                                <div class="cap5-topcopy">
                                    <h3 class="cap5-title text-xl font-black leading-snug line-clamp-2 text-[#172455] group-hover:text-white transition-colors duration-300"><?php echo e($titleItem); ?></h3>
                                </div>
                            </div>
                            <div class="cap5-footer text-sm lg:text-base font-medium transition-all duration-300 line-clamp-2">
                                <?php echo e($desc); ?>

                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <script>
    (function() {
        var section = document.getElementById('services');
        if (!section) return;
        var reveals = section.querySelectorAll('.cap5-reveal');
        if (!reveals.length) return;

        function revealAll() {
            reveals.forEach(function(node) {
                var delay = parseFloat(node.getAttribute('data-cap5-delay') || '0');
                node.style.transitionDelay = delay + 's';
                node.classList.add('is-visible');
            });
        }

        if (typeof IntersectionObserver === 'undefined') {
            revealAll();
            return;
        }

        var shown = false;
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (!shown && entry.isIntersecting) {
                    shown = true;
                    revealAll();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.14 });

        observer.observe(section);
    })();
    </script>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/CapabilitiesOption5.blade.php ENDPATH**/ ?>