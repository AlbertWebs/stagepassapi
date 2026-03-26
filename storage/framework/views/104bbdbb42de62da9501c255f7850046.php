<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $video = is_array($section) ? ($section['background_video_url'] ?? null) : ($section->background_video_url ?? null);
?>

<section class="relative py-20 overflow-hidden text-white">
    <div class="absolute inset-0 bg-slate-900"></div>
    <?php if($video): ?>
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline aria-hidden="true">
            <source src="<?php echo e($video); ?>" type="video/mp4">
        </video>
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/88 via-slate-900/72 to-black/75"></div>
    <div class="relative container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl">
            <h2 class="text-3xl lg:text-5xl font-black"><?php echo e($title); ?></h2>
            <p class="mt-4 text-slate-200">Cinematic presentation with glass cards for a premium story-driven section.</p>
        </div>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                ?>
                <article class="rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md p-7 transition duration-300 hover:-translate-y-1 hover:bg-white/15">
                    <h3 class="text-xl font-bold"><?php echo e($titleItem); ?></h3>
                    <p class="mt-3 text-white/85 text-sm lg:text-base"><?php echo e($desc); ?></p>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/CapabilitiesOption3.blade.php ENDPATH**/ ?>