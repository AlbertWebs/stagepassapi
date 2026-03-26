<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
?>

<section class="relative py-20 overflow-hidden" style="background: radial-gradient(circle at 20% 20%, #eef2ff 0%, #fff7ed 45%, #f8fafc 100%);">
    <div class="absolute inset-0 opacity-30 pointer-events-none" style="background-image: radial-gradient(#94a3b8 0.8px, transparent 0.8px); background-size: 22px 22px;"></div>
    <div class="container relative z-10 mx-auto px-6 lg:px-12">
        <h2 class="text-center text-3xl lg:text-5xl font-black text-slate-900"><?php echo e($title); ?></h2>
        <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? ''); ?>
                <article class="rounded-2xl bg-white/85 backdrop-blur p-6 shadow-lg shadow-slate-200/60 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-11 w-11 rounded-xl bg-amber-400/20 text-amber-700 grid place-items-center font-bold">✦</div>
                    <h3 class="mt-4 text-lg lg:text-xl font-bold text-slate-900"><?php echo e($name); ?></h3>
                    <p class="mt-2 text-sm text-slate-600">Tailored strategy, implementation, and support for this sector.</p>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/IndustriesOption4.blade.php ENDPATH**/ ?>