<?php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
?>


<?php $__env->startSection('title', ($pageData['page']['title'] ?? 'Terms and Conditions') . ' - StagePass Audio Visual'); ?>
<?php $__env->startSection('description', $pageData['page']['meta_description'] ?? 'Terms and Conditions for StagePass Audio Visual Limited'); ?>
<?php $__env->startSection('keywords', $pageData['page']['meta_keywords'] ?? 'terms and conditions, terms of service, StagePass terms'); ?>
<?php $__env->startSection('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png')); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white">
    <?php if($loadError): ?>
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20"><?php echo e($loadError); ?></div>
    <?php endif; ?>
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            <?php echo $__env->make('website.partials.breadcrumb', ['items' => [['label' => 'Terms and Conditions', 'path' => '/terms-and-conditions']]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
    
    <main class="mx-auto max-w-4xl px-6 py-16">
        <?php if($pageData && isset($pageData['page'])): ?>
            <?php if(!empty($pageData['page']['hero_title'])): ?>
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-4"><?php echo e($pageData['page']['hero_title']); ?></h1>
            <?php endif; ?>
            <?php if(!empty($pageData['page']['hero_subtitle'])): ?>
                <p class="text-lg text-gray-600 mb-4"><?php echo e($pageData['page']['hero_subtitle']); ?></p>
            <?php endif; ?>
            <?php if(!empty($pageData['page']['last_updated'])): ?>
                <p class="text-sm text-gray-500 mb-8">Last updated: <?php echo e(\Carbon\Carbon::parse($pageData['page']['last_updated'])->format('F j, Y')); ?></p>
            <?php endif; ?>
            <?php if(!empty($pageData['page']['content'])): ?>
                <div class="prose prose-lg max-w-none text-gray-700 leading-7"><?php echo $pageData['page']['content']; ?></div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500">Content coming soon...</p>
            </div>
        <?php endif; ?>
    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projects\stagepassapi\resources\views/website/pages/terms.blade.php ENDPATH**/ ?>