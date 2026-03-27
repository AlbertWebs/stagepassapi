<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $subtitle = is_array($section)
        ? ($section['subtitle'] ?? 'Hover reveal cards: minimal first glance, richer detail on interaction.')
        : ($section->subtitle ?? 'Hover reveal cards: minimal first glance, richer detail on interaction.');

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

<section class="relative py-20 bg-white overflow-hidden">
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
            border-color: rgba(23, 36, 85, 0.14);
            box-shadow: 0 12px 28px rgba(2, 6, 23, 0.06);
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
        }
        .cap5-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 158, 11, 0.45);
            box-shadow: 0 22px 50px rgba(2, 6, 23, 0.12);
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
        }
        .cap5-card:hover .cap5-topcopy {
            background: rgba(2,6,23,0.15);
            border-color: rgba(255,255,255,0.18);
            box-shadow: 0 16px 34px rgba(0,0,0,0.22);
        }
        .cap5-title {
            text-shadow: 0 1px 0 rgba(255,255,255,0.25);
        }
        .cap5-card:hover .cap5-title {
            text-shadow: 0 10px 28px rgba(0,0,0,0.35);
        }
        @media (prefers-reduced-motion: reduce) {
            .cap5-card,
            .cap5-overlay,
            .cap5-photo,
            .cap5-scrim { transition: none !important; }
        }
    </style>
    <div class="cap5-bg-blob cap5-blob-1" aria-hidden="true"></div>
    <div class="cap5-bg-blob cap5-blob-2" aria-hidden="true"></div>
    <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto text-center">
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
                <article class="cap5-card group relative rounded-2xl border bg-white p-6 h-64 overflow-hidden transition-all duration-300">
                    <div class="cap5-photo" style="background-image: url('<?php echo e($bg); ?>');" aria-hidden="true"></div>
                    <div class="cap5-scrim" aria-hidden="true"></div>
                    <div class="cap5-overlay absolute inset-0 bg-gradient-to-br from-[#0b1436] to-slate-900 translate-y-[82%] group-hover:translate-y-0 transition-transform duration-500"></div>
                    <div class="relative z-10 h-full flex flex-col">
                        <div class="text-slate-900 group-hover:text-white transition-colors duration-300">
                            <div class="cap5-topcopy">
                                <h3 class="cap5-title text-xl font-black leading-snug line-clamp-2 text-[#172455] group-hover:text-white transition-colors duration-300"><?php echo e($titleItem); ?></h3>
                                <p class="mt-2 text-sm font-semibold text-slate-700/90 group-hover:text-slate-100 transition-colors duration-300">Hover to explore</p>
                            </div>
                        </div>
                        <div class="mt-auto text-sm lg:text-base text-white/0 group-hover:text-white/90 transition-colors duration-300">
                            <?php echo e($desc); ?>

                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/CapabilitiesOption5.blade.php ENDPATH**/ ?>