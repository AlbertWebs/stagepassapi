<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl">
            <h2 class="text-3xl lg:text-5xl font-black text-slate-900"><?php echo e($title); ?></h2>
            <p class="mt-4 text-slate-600">Hover reveal cards: minimal first glance, richer detail on interaction.</p>
        </div>
        <div class="mt-10 grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                ?>
                <article class="group relative rounded-2xl border border-slate-200 bg-white p-6 h-64 overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 to-slate-800 translate-y-[82%] group-hover:translate-y-0 transition-transform duration-300"></div>
                    <div class="relative z-10 h-full flex flex-col">
                        <div class="text-slate-900 group-hover:text-white transition-colors duration-300">
                            <h3 class="text-xl font-bold"><?php echo e($titleItem); ?></h3>
                            <p class="mt-2 text-sm text-slate-500 group-hover:text-slate-200 transition-colors duration-300">Hover to explore</p>
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