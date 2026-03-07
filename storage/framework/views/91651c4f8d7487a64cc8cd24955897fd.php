

<?php $__env->startSection('title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited'); ?>
<?php $__env->startSection('description', 'StagePass Audio Visual Limited is Kenya\'s leading events and audio-visual company — offering professional sound systems, event production, video conferencing, stage lighting, LED screens and technical event support in Nairobi and across Kenya.'); ?>

<?php $__env->startSection('structured_data'); ?>
<?php
    $logoUrl = $homepageData['settings']['site_logo_url'] ?? $homepageData['navigation']['logo_url'] ?? asset('uploads/StagePass-LOGO-y.png');
?>
<script type="application/ld+json">
<?php echo json_encode([
    '<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'StagePass Audio Visual Limited',
    'url' => 'https://stagepass.co.ke',
    'logo' => $logoUrl,
    'image' => $logoUrl,
    'description' => 'StagePass Audio Visual Limited provides professional audio visual, sound engineering, stage lighting, LED screens, and event production services across Kenya.',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Jacaranda Close, Ridgeways',
        'addressLocality' => 'Nairobi',
        'addressRegion' => 'Nairobi',
        'addressCountry' => 'KE'
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => -1.2210922,
        'longitude' => 36.8443046
    ],
    'areaServed' => [['@type' => 'Country', 'name' => 'Kenya']],
    'priceRange' => '$$',
    'telephone' => '+254 729 171 351',
    'email' => 'info@stagepass.co.ke',
    'sameAs' => [
        'https://facebook.com/stagepass',
        'https://twitter.com/stagepass',
        'https://linkedin.com/company/stagepass'
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-900">
    <?php
        $heroData = $homepageData['hero'] ?? null;
        if ($heroData && !is_array($heroData)) {
            $heroData = (array) $heroData;
        }
    ?>
    <main id="home" class="relative">
        <?php echo $__env->make('website.partials.hero-video', ['data' => $heroData], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>

    <?php echo $__env->make('website.partials.about', ['data' => $homepageData['about'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('website.partials.services', ['data' => $homepageData['services'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('website.partials.stats-video', ['data' => $homepageData['stats'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('website.partials.industries', ['data' => $homepageData['industries'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('website.partials.portfolio', ['data' => $homepageData['portfolio'] ?? null, 'portfolioSource' => $homepageData['settings']['portfolio_source'] ?? 'database'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('website.partials.clients', ['data' => $homepageData['clients'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('website.partials.contact', ['data' => $homepageData['contact'] ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projects\stagepassapi\resources\views/home-with-video.blade.php ENDPATH**/ ?>