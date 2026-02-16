<?php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
?>


<?php $__env->startSection('title', ($pageData['page']['title'] ?? 'Our Industries') . ' - StagePass Audio Visual'); ?>
<?php $__env->startSection('description', $pageData['page']['meta_description'] ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.'); ?>
<?php $__env->startSection('keywords', $pageData['page']['meta_keywords'] ?? 'industries, event industries, corporate events, concerts, fashion shows'); ?>
<?php $__env->startSection('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png')); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white">
    <?php if($loadError): ?>
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20"><?php echo e($loadError); ?></div>
    <?php endif; ?>
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            <?php echo $__env->make('website.partials.breadcrumb', ['items' => [['label' => 'Industries', 'path' => '/industries']]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
    
    <!-- Homepage Industries Section -->
    <?php echo $__env->make('website.partials.industries', ['data' => $homepageData['industries'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Page-specific content -->
    <?php if($pageData && isset($pageData['page'])): ?>
        <main class="mx-auto max-w-4xl px-6 py-16">
            <?php if(!empty($pageData['page']['hero_title'])): ?>
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-4"><?php echo e($pageData['page']['hero_title']); ?></h1>
            <?php endif; ?>
            <?php if(!empty($pageData['page']['hero_subtitle'])): ?>
                <p class="text-lg text-gray-600 mb-8"><?php echo e($pageData['page']['hero_subtitle']); ?></p>
            <?php endif; ?>
            <?php if(!empty($pageData['page']['content'])): ?>
                <div class="prose prose-lg max-w-none text-gray-700 leading-7"><?php echo $pageData['page']['content']; ?></div>
            <?php endif; ?>
        </main>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projects\stagepassapi\resources\views/website/pages/industries.blade.php ENDPATH**/ ?>