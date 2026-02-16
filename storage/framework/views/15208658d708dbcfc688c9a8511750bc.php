

<?php
$homepageData = $homepageData ?? [];
$pageData = $pageData ?? null;
$loadError = $loadError ?? null;

$page = null;
if ($pageData && isset($pageData['page'])) {
    $page = $pageData['page'];
}

/* Pre-compute safe values for Blade sections */
$pageTitle = ($page && isset($page['title']) && $page['title']) ? $page['title'] : 'About Us';

$pageDescription =
    ($page && isset($page['meta_description']) && $page['meta_description'])
    ? $page['meta_description']
    : "Learn about StagePass Audio Visual Limited, Kenya's leading events and audio-visual company providing professional sound systems, event production, video conferencing, and technical event support.";

$pageKeywords =
    ($page && isset($page['meta_keywords']) && $page['meta_keywords'])
    ? $page['meta_keywords']
    : 'about StagePass, audio visual company Kenya, event production company, AV services Nairobi';

$pageOgImage =
    ($page && isset($page['og_image']) && $page['og_image'])
    ? $page['og_image']
    : asset('uploads/StagePass-LOGO-y.png');
?>


<?php $__env->startSection('title', $pageTitle . ' - StagePass Audio Visual Limited | Professional AV Services in Kenya'); ?>
<?php $__env->startSection('description', $pageDescription); ?>
<?php $__env->startSection('keywords', $pageKeywords); ?>
<?php $__env->startSection('og_image', $pageOgImage); ?>


<?php $__env->startSection('structured_data'); ?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "About Us - StagePass Audio Visual Limited",
    "description": "Learn about StagePass Audio Visual Limited, Kenya's leading events and audio-visual company providing professional sound systems, event production, and technical event support.",
    "url": "https://stagepass.co.ke/about",
    "mainEntity": {
        "@type": "Organization",
        "name": "StagePass Audio Visual Limited",
        "description": "Professional audio visual and event production company in Kenya"
    }
}
</script>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white">

    <?php if($loadError): ?>
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20">
            <?php echo e($loadError); ?>

        </div>
    <?php endif; ?>

    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            <?php echo $__env->make('website.partials.breadcrumb', [
                'items' => [
                    ['label' => 'About', 'path' => '/about']
                ]
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <!-- Homepage About Section -->
    <?php echo $__env->make('website.partials.about', [
        'data' => $homepageData['about'] ?? null
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Page-specific content -->
    <?php if($page): ?>
        <main class="mx-auto max-w-4xl px-6 py-16">

            <?php if(!empty($page['hero_title'])): ?>
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-4">
                    <?php echo e($page['hero_title']); ?>

                </h1>
            <?php endif; ?>

            <?php if(!empty($page['hero_subtitle'])): ?>
                <p class="text-lg text-gray-600 mb-8">
                    <?php echo e($page['hero_subtitle']); ?>

                </p>
            <?php endif; ?>

            <?php if(!empty($page['image_url'])): ?>
                <div class="mb-8">
                    <img
                        src="<?php echo e($page['image_url']); ?>"
                        alt="<?php echo e($page['hero_title'] ?? 'About'); ?>"
                        class="w-full rounded-lg shadow-lg">
                </div>
            <?php endif; ?>

            <?php if(!empty($page['content'])): ?>
                <div class="prose prose-lg max-w-none text-gray-700 leading-7">
                    <?php echo $page['content']; ?>

                </div>
            <?php endif; ?>

        </main>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projects\stagepassapi\resources\views/website/pages/about.blade.php ENDPATH**/ ?>