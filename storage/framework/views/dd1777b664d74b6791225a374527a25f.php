<?php
    $data = $data ?? [];
    $section = $data['section'] ?? null;
    $items = $data['items'] ?? [
        (object)['icon' => 'Package', 'value' => '43,234', 'label' => 'AV Equipment'],
        (object)['icon' => 'Users', 'value' => '421', 'label' => 'Happy Clients'],
        (object)['icon' => 'Calendar', 'value' => '2,362', 'label' => 'Events'],
    ];
    $videoUrl = is_array($section) ? ($section['background_video_url'] ?? null) : ($section->background_video_url ?? null);
?>
<section id="stats-video-section" class="relative min-h-[70vh] md:min-h-screen flex items-center justify-center overflow-hidden text-white py-16">
    <div class="absolute inset-0">
        <?php if($videoUrl): ?>
        <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="<?php echo e($videoUrl); ?>" type="video/mp4">
        </video>
        <?php endif; ?>
        <div class="absolute inset-0 <?php echo e($videoUrl ? 'bg-[#172455]/70' : 'bg-[#172455]'); ?>"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $icon = is_array($stat) ? ($stat['icon'] ?? 'Package') : ($stat->icon ?? 'Package');
                $value = is_array($stat) ? ($stat['value'] ?? '') : ($stat->value ?? '');
                $label = is_array($stat) ? ($stat['label'] ?? '') : ($stat->label ?? '');
            ?>
            <div>
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-yellow-500 text-white mb-4">
                    <?php if($icon === 'Users'): ?>
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <?php elseif($icon === 'Calendar'): ?>
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <?php else: ?>
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <?php endif; ?>
                </div>
                <div class="text-5xl md:text-6xl font-bold text-yellow-400"><?php echo e($value); ?></div>
                <div class="text-xl font-semibold mt-2"><?php echo e($label); ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php if($videoUrl): ?>
<script>(function(){var v=document.querySelector('#stats-video-section video');if(v)v.play().catch(function(){});})();</script>
<?php endif; ?>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/stats-video.blade.php ENDPATH**/ ?>