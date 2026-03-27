<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section)
        ? ($section['subtitle'] ?? 'Explore the industries we support—each with tailored AV strategy, implementation, and on-site excellence.')
        : ($section->subtitle ?? 'Explore the industries we support—each with tailored AV strategy, implementation, and on-site excellence.');
?>

<section class="py-20 bg-white">
    <style>
        .ind5-card {
            border-color: rgba(23, 36, 85, 0.14);
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
        }
        .ind5-card:hover {
            transform: translateY(-4px);
            border-color: rgba(245, 158, 11, 0.45);
            box-shadow: 0 18px 42px rgba(2, 6, 23, 0.10);
        }
        .ind5-card:focus-within {
            border-color: rgba(245, 158, 11, 0.55);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.18), 0 18px 42px rgba(2, 6, 23, 0.10);
        }
        .ind5-toggle {
            transition: transform .25s ease, color .2s ease;
        }
        .ind5-card:hover .ind5-toggle { transform: rotate(45deg); }
        .ind5-desc {
            transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
        }
        @media (prefers-reduced-motion: reduce) {
            .ind5-card,
            .ind5-toggle,
            .ind5-desc { transition: none; }
        }
    </style>
    <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto text-center">
            <p class="inline-flex items-center rounded-full border border-[#172455]/20 bg-[#172455]/5 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.2em] text-[#172455]">
                Industries
            </p>
            <h2 class="mt-4 text-3xl lg:text-5xl font-black text-[#172455] text-center"><?php echo e($title); ?></h2>
            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-[#172455] to-amber-500 mx-auto"></div>
            <p class="mt-5 text-slate-600 text-base lg:text-lg"><?php echo e($subtitle); ?></p>
        </div>
        <div class="mt-10 grid md:grid-cols-2 gap-4">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                ?>
                <article class="ind5-card group rounded-2xl border bg-white/80 backdrop-blur p-6">
                    <div class="flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <h3 class="text-lg lg:text-xl font-semibold text-slate-900 truncate"><?php echo e($name); ?></h3>
                            <p class="mt-1 text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Hover to expand</p>
                        </div>
                        <span class="ind5-toggle text-slate-400 group-hover:text-[#172455]">+</span>
                    </div>
                    <p class="ind5-desc max-h-0 overflow-hidden opacity-0 mt-0 text-sm lg:text-base text-slate-600 transition-all duration-500 group-hover:max-h-32 group-hover:opacity-100 group-hover:mt-4">
                        <?php echo e($desc); ?>

                    </p>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/IndustriesOption5.blade.php ENDPATH**/ ?>