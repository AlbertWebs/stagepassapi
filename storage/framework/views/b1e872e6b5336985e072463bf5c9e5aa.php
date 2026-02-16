<?php
    $data = $data ?? null;
    $homepageData = $homepageData ?? [];
    $isPage = $isPage ?? false;
    
    // Get logo URL - prioritize from navigation, then settings, then default
    $logoUrl = null;
    if ($data) {
        $logoUrl = is_array($data) ? ($data['logo_url'] ?? null) : ($data->logo_url ?? null);
    }
    if (!$logoUrl && isset($homepageData['settings']['site_logo_url'])) {
        $logoUrl = $homepageData['settings']['site_logo_url'];
    }
    $logoUrl = $logoUrl ?? asset('uploads/StagePass-LOGO-y.png');
    
    // Get CTA label
    $ctaLabel = null;
    if ($data) {
        $ctaLabel = is_array($data) ? ($data['cta_label'] ?? null) : ($data->cta_label ?? null);
    }
    $ctaLabel = $ctaLabel ?? 'Get AV Quote';
    
    // Build nav links
    if ($isPage) {
        $navLinks = [
            ['label' => 'Home', 'href' => '/', 'isLink' => true],
            ['label' => 'About Us', 'href' => '/about', 'isLink' => true],
            ['label' => 'Services', 'href' => '/services', 'isLink' => true],
            ['label' => 'Our Work', 'href' => '/our-work', 'isLink' => true],
            ['label' => 'Industries', 'href' => '/industries', 'isLink' => true],
            ['label' => 'Contact Us', 'href' => '/contact', 'isLink' => true],
        ];
    } else {
        $links = null;
        if ($data) {
            $links = is_array($data) ? ($data['links'] ?? null) : ($data->links ?? null);
        }
        $navLinks = $links ?? [
            ['label' => 'Home', 'href' => '#home'],
            ['label' => 'About Us', 'href' => '#about'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Our Work', 'href' => '#portfolio'],
            ['label' => 'Industries', 'href' => '#industries'],
            ['label' => 'Contact Us', 'href' => '#contact'],
        ];
    }
    
    // Ensure $navLinks is always an array
    if (!is_array($navLinks)) {
        $navLinks = [];
    }
    
    $currentPath = $isPage ? request()->path() : '#home';
    if ($currentPath === '/') $currentPath = '/';
?>
<?php
    $sections = [];
    if (is_array($navLinks)) {
        $sections = array_map(function($link) {
            $href = is_array($link) ? ($link['href'] ?? '') : ($link->href ?? '');
            return ltrim($href, '#');
        }, $navLinks);
    }
    $sectionsJson = json_encode($sections);
    $isPageJs = $isPage ? 'true' : 'false';
    $currentPathJson = json_encode($currentPath);
?>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('navbar', () => ({
        isScrolled: <?php echo e($isPageJs); ?>,
        isMobileMenuOpen: false,
        activeLink: <?php echo $currentPathJson; ?>,
        init() {
            if (!<?php echo e($isPageJs); ?>) {
                const handleScroll = () => {
                    this.isScrolled = window.scrollY > 50;
                    const sections = <?php echo $sectionsJson; ?>;
                    const currentActive = sections.find(href => {
                        const section = document.getElementById(href);
                        if (!section) return false;
                        const rect = section.getBoundingClientRect();
                        return rect.top <= 100 && rect.bottom >= 100;
                    });
                    if (currentActive) this.activeLink = '#' + currentActive;
                };
                handleScroll();
                window.addEventListener('scroll', handleScroll);
            } else {
                this.activeLink = <?php echo $currentPathJson; ?>;
                this.isScrolled = true;
            }
        }
    }));
});
</script>

<div x-data="navbar">
    <nav :class="(isScrolled || <?php echo e($isPageJs); ?>) ? 'bg-[#0f1b3d] shadow-xl border-b-2 border-[#172455]/10' : 'bg-[#0f1b3d] backdrop-blur-md'"
         class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <!-- Top accent bar -->
        <div class="h-1 md:h-2 bg-gradient-to-r from-[#172455] via-yellow-500 to-[#172455] animate-gradient-x"></div>
        
        <div class="container mx-auto px-4 lg:px-12">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <div class="flex items-center h-full group">
                    <?php if($isPage): ?>
                        <a href="<?php echo e(route('home')); ?>" class="h-full flex items-center">
                            <img src="<?php echo e($logoUrl); ?>" alt="StagePass Logo" class="h-full w-auto object-contain transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo e($logoUrl); ?>" alt="StagePass Logo" class="h-full w-auto object-contain transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3" />
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $linkHref = $link['href'] ?? '';
                            $isActive = $isPage 
                                ? ($currentPath === $linkHref)
                                : false;
                        ?>
                        <?php if(($link['isLink'] ?? false)): ?>
                            <a href="<?php echo e($linkHref); ?>" 
                               :class="activeLink === '<?php echo e($linkHref); ?>' ? 'text-yellow-500' : ''"
                               class="text-white hover:text-yellow-600 font-bold transition-colors duration-200 relative group text-base shadow-sm hover:shadow-lg hover:scale-105 transform-gpu px-3 py-2 rounded-md">
                                <?php echo e($link['label']); ?>

                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white group-hover:bg-gradient-to-r group-hover:from-yellow-500 group-hover:to-yellow-600 transition-all duration-300"></span>
                                <span class="absolute top-0 left-0 w-0 h-0.5 bg-gradient-to-r from-yellow-500 to-yellow-600 group-hover:w-full transition-all duration-300"></span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e($linkHref); ?>" 
                               :class="activeLink === '<?php echo e($linkHref); ?>' ? 'text-yellow-500' : ''"
                               class="text-white hover:text-yellow-600 font-bold transition-colors duration-200 relative group text-base shadow-sm hover:shadow-lg hover:scale-105 transform-gpu px-3 py-2 rounded-md">
                                <?php echo e($link['label']); ?>

                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-white group-hover:bg-gradient-to-r group-hover:from-yellow-500 group-hover:to-yellow-600 transition-all duration-300"></span>
                                <span class="absolute top-0 left-0 w-0 h-0.5 bg-gradient-to-r from-yellow-500 to-yellow-600 group-hover:w-full transition-all duration-300"></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button @click="document.dispatchEvent(new CustomEvent('open-quote-modal'))" 
                            class="bg-gradient-to-r from-[#172455] to-[#1e3a8a] hover:from-[#0f1b3d] hover:to-[#172455] text-white px-4 py-2 rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-110 font-bold border-2 border-yellow-500 animate-border-pulse text-sm">
                        <?php echo e($ctaLabel); ?>

                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" 
                        class="lg:hidden p-1.5 text-white hover:text-yellow-600 transition-colors">
                    <svg x-show="!isMobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="isMobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="isMobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-1"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-1"
                 class="lg:hidden py-4 border-t border-[#172455]/10 animate-fade-in bg-gradient-to-b from-[#0f1b3d] to-[#172455]">
                <div class="flex flex-col space-y-4">
                    <?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $linkHref = $link['href'] ?? '';
                            $isActive = $isPage 
                                ? ($currentPath === $linkHref)
                                : false;
                        ?>
                        <?php if(($link['isLink'] ?? false)): ?>
                            <a href="<?php echo e($link['href']); ?>" 
                               @click="isMobileMenuOpen = false"
                               :class="activeLink === '<?php echo e($link['href']); ?>' ? 'text-yellow-500' : ''"
                               class="text-white hover:text-yellow-600 font-bold py-2 transition-colors duration-200">
                                <?php echo e($link['label']); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e($link['href']); ?>" 
                               @click="isMobileMenuOpen = false; activeLink = '<?php echo e($link['href']); ?>'"
                               :class="activeLink === '<?php echo e($link['href']); ?>' ? 'text-yellow-500' : ''"
                               class="text-white hover:text-yellow-600 font-bold py-2 transition-colors duration-200">
                                <?php echo e($link['label']); ?>

                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button @click="document.dispatchEvent(new CustomEvent('open-quote-modal')); isMobileMenuOpen = false" 
                            class="bg-gradient-to-r from-[#172455] to-[#1e3a8a] hover:from-[#0f1b3d] hover:to-[#172455] text-white w-full rounded-full py-3 font-bold text-sm">
                        <?php echo e($ctaLabel); ?>

                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/navbar.blade.php ENDPATH**/ ?>