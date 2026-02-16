<?php
    $homepageData = $homepageData ?? [];
    $instagramItems = $instagramItems ?? [];
    $isLoading = $isLoading ?? false;
    $error = $error ?? '';
?>


<?php $__env->startSection('title', 'Portfolio — StagePass Audio Visual Limited'); ?>
<?php $__env->startSection('description', 'Explore our portfolio of professional audio visual projects, event productions, and creative solutions. See how we bring events to life with cutting-edge technology.'); ?>
<?php $__env->startSection('keywords', 'portfolio, audio visual projects, event production portfolio, stagepass portfolio, AV projects Kenya'); ?>

<?php $__env->startSection('structured_data'); ?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Portfolio - StagePass Audio Visual",
    "description": "Explore our portfolio of professional audio visual projects and event productions",
    "url": "https://stagepass.co.ke/portfolio"
}
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white">
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-7xl px-6">
            <?php echo $__env->make('website.partials.breadcrumb', ['items' => [['label' => 'Portfolio', 'path' => '/portfolio']]], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="bg-gradient-to-b from-gray-100 via-gray-50 to-white py-16">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="text-center mb-12">
                <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">Our Portfolio</span>
                <h1 class="text-4xl lg:text-6xl font-black text-[#172455] mt-6 mb-6">Our <span class="text-yellow-500">Work</span></h1>
                <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-8"></div>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto font-medium">Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.</p>
            </div>
        </div>
    </div>

    <!-- Portfolio Gallery -->
    <section class="py-16 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
        <div class="absolute top-20 right-0 w-[600px] h-[600px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
        
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <?php if($isLoading): ?>
                <div class="text-center text-gray-600 font-medium py-12">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-yellow-600 mb-4"></div>
                    <p>Loading Instagram feed...</p>
                </div>
            <?php endif; ?>

            <?php if($error): ?>
                <div class="text-center text-red-600 font-medium py-12 bg-red-50 rounded-lg border border-red-200"><?php echo e($error); ?></div>
            <?php endif; ?>

            <?php if(!$isLoading && !$error && count($instagramItems) === 0): ?>
                <div class="text-center text-gray-600 font-medium py-12">
                    <p>No Instagram posts available yet.</p>
                    <p class="text-sm mt-2">Please check back later.</p>
                </div>
            <?php endif; ?>

            <?php if(!$isLoading && !$error && count($instagramItems) > 0): ?>
                <div x-data="{ isImageModalOpen: false, isVideoModalOpen: false, currentImageUrl: '', currentImageTitle: '', currentVideoUrl: '', currentVideoTitle: '' }">
                    <div class="mb-8 text-center">
                        <p class="text-gray-600">Showing <span class="font-bold text-[#172455]"><?php echo e(count($instagramItems)); ?></span> posts from Instagram</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        <?php $__currentLoopData = $instagramItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $isVideo = ($item['media_type'] ?? $item->media_type ?? '') === 'VIDEO';
                                $itemTitle = $item['caption'] ?? $item->caption ?? 'Instagram Post';
                                $thumbnail = $isVideo 
                                    ? ($item['thumbnail_url'] ?? $item->thumbnail_url ?? $item['media_url'] ?? $item->media_url ?? '')
                                    : ($item['media_url'] ?? $item->media_url ?? '');
                                $mediaUrl = $item['media_url'] ?? $item->media_url ?? '';
                                $permalink = $item['permalink'] ?? $item->permalink ?? null;
                            ?>
                            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 cursor-pointer aspect-[4/3]"
                                 style="animation-delay: <?php echo e($index * 50); ?>ms"
                                 @click="<?php echo e($isVideo ? "currentVideoUrl = " . json_encode($mediaUrl) . "; currentVideoTitle = " . json_encode($itemTitle) . "; isVideoModalOpen = true;" : "currentImageUrl = " . json_encode($mediaUrl) . "; currentImageTitle = " . json_encode($itemTitle) . "; isImageModalOpen = true;"); ?>">
                                <img src="<?php echo e($thumbnail); ?>" 
                                     alt="<?php echo e($itemTitle); ?> - StagePass Audio Visual Portfolio" 
                                     class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700" 
                                     loading="lazy" width="400" height="300" />
                                
                                <!-- Gradient overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[#172455]/90 via-[#172455]/50 to-transparent opacity-60 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                <!-- Play button for videos -->
                                <?php if($isVideo): ?>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center transform scale-0 group-hover:scale-100 transition-transform duration-500 shadow-2xl">
                                            <svg class="w-10 h-10 text-white ml-1" fill="white" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Title overlay -->
                                <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <h3 class="text-white font-bold text-lg line-clamp-2"><?php echo e($itemTitle); ?></h3>
                                    <div class="h-1 w-12 bg-yellow-400 mt-2"></div>
                                </div>

                                <!-- View on Instagram link -->
                                <?php if($permalink): ?>
                                    <a href="<?php echo e($permalink); ?>" 
                                       target="_blank" 
                                       rel="noopener noreferrer" 
                                       class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-white/90 hover:bg-white rounded-full p-2"
                                       @click.stop
                                       title="View on Instagram">
                                        <svg class="w-5 h-5 text-[#172455]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <!-- Image Modal -->
                    <div x-show="isImageModalOpen" 
                         @click.away="isImageModalOpen = false"
                         @keydown.escape.window="isImageModalOpen = false"
                         x-transition
                         class="fixed inset-0 bg-black/80 flex items-center justify-center z-[99999] p-4"
                         style="display: none;">
                        <div @click.stop class="max-w-5xl w-full">
                            <button @click="isImageModalOpen = false" class="absolute top-4 right-4 text-white text-3xl z-50">×</button>
                            <img :src="currentImageUrl" :alt="currentImageTitle" class="w-full h-auto rounded-lg" />
                            <p class="text-white text-center mt-4 text-xl font-bold" x-text="currentImageTitle"></p>
                        </div>
                    </div>
                    
                    <!-- Video Modal -->
                    <div x-show="isVideoModalOpen" 
                         @click.away="isVideoModalOpen = false"
                         @keydown.escape.window="isVideoModalOpen = false"
                         x-transition
                         class="fixed inset-0 bg-black/80 flex items-center justify-center z-[99999] p-4"
                         style="display: none;">
                        <div @click.stop class="max-w-5xl w-full">
                            <button @click="isVideoModalOpen = false" class="absolute top-4 right-4 text-white text-3xl z-50">×</button>
                            <video :src="currentVideoUrl" controls class="w-full rounded-lg"></video>
                            <p class="text-white text-center mt-4 text-xl font-bold" x-text="currentVideoTitle"></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projects\stagepassapi\resources\views/website/pages/portfolio.blade.php ENDPATH**/ ?>