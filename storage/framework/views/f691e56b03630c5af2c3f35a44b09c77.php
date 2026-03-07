<?php
    $faviconUrl = \Illuminate\Support\Facades\DB::table('site_settings')->where('key', 'favicon_url')->value('value');
    if (!empty($faviconUrl)) {
        $faviconUrl = str_starts_with($faviconUrl, 'http') ? $faviconUrl : asset($faviconUrl);
    } else {
        // Use existing favicon.ico as fallback if no custom favicon is set
        $faviconUrl = asset('favicon.ico');
    }
    $faviconType = str_ends_with(strtolower($faviconUrl), '.ico') ? 'image/x-icon' : 'image/png';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="<?php echo e($faviconType); ?>" href="<?php echo e($faviconUrl); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#172455" />
    <link rel="manifest" href="<?php echo e(route('manifest')); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-title" content="StagePass" />
    <link rel="apple-touch-icon" href="<?php echo e($faviconUrl); ?>" />
    
    <!-- Primary SEO -->
    <title><?php echo $__env->yieldContent('title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'StagePass Audio Visual Limited is Kenya\'s leading events and audio-visual company — offering professional sound systems, event production, video conferencing, stage lighting, LED screens and technical event support in Nairobi and across Kenya.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'audio visual company Kenya, AV company Nairobi, event production Kenya, sound systems Kenya, stage lighting Kenya, video conferencing Kenya, event technology Kenya, professional event services Kenya'); ?>">
    <meta name="author" content="StagePass Audio Visual Limited">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">

    <!-- Language & Region -->
    <meta name="language" content="English">
    <meta name="geo.region" content="KE-110">
    <meta name="geo.placename" content="Nairobi">
    <meta name="geo.position" content="-1.2210922;36.8443046">
    <meta name="ICBM" content="-1.2210922, 36.8443046">
    <link rel="alternate" hreflang="en-KE" href="https://stagepass.co.ke">
    <link rel="alternate" hreflang="x-default" href="https://stagepass.co.ke">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="StagePass Audio Visual Limited">
    <meta property="og:locale" content="en_KE">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', 'Kenya\'s trusted Audio Visual & Event Production company — professional sound engineering, staging, LED screens, event technology and conferencing solutions.'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('uploads/StagePass-LOGO-y.png')); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter_title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('twitter_description', 'Events & Audio Visual production company in Kenya — sound systems, staging, lighting, LED screens, conferencing & event technology.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('twitter_image', asset('uploads/StagePass-LOGO-y.png')); ?>">
    <meta name="twitter:site" content="@stagepass">
    <meta name="twitter:creator" content="@stagepass">

    <!-- Crawl Frequency -->
    <meta name="revisit-after" content="7 days">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">

    <!-- JSON-LD Schema -->
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "StagePass Audio Visual Limited",
        "url": "https://stagepass.co.ke",
        "logo": "https://stagepass.co.ke/uploads/StagePass-LOGO-y.png",
        "image": "https://stagepass.co.ke/uploads/StagePass-LOGO-y.png",
        "description": "StagePass Audio Visual Limited provides professional audio visual, sound engineering, stage lighting, LED screens, and event production services across Kenya.",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Nairobi",
            "addressCountry": "KE"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": -1.2210922,
            "longitude": 36.8443046
        },
        "areaServed": "Kenya",
        "priceRange": "$$",
        "sameAs": [
            "https://facebook.com/stagepass",
            "https://twitter.com/stagepass",
            "https://linkedin.com/company/stagepass"
        ]
    }
    </script>
    

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Styles -->
    <style>
        @keyframes border-pulse {
            0%, 100% { border-color: #f59e0b; box-shadow: 0 0 0px 0px rgba(245, 158, 11, 0.7); }
            50% { border-color: #eab308; box-shadow: 0 0 0px 4px rgba(245, 158, 11, 0); }
        }
        .animate-border-pulse { animation: border-pulse 2s infinite; }
        
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fade-in-up 1s ease-out forwards; }
        
        @keyframes slide-in-left {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in-left { animation: slide-in-left 1s ease-out forwards; }
        
        @keyframes slide-in-right {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in-right { animation: slide-in-right 1s ease-out forwards; }
        
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 3s ease infinite;
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.5; }
        }
        .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }
        
        @keyframes pulse-slower {
            0%, 100% { opacity: 0.1; }
            50% { opacity: 0.2; }
        }
        .animate-pulse-slower { animation: pulse-slower 4s ease-in-out infinite; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow { animation: bounce-slow 2s ease-in-out infinite; }
        
        .animation-delay-1000 { animation-delay: 1s; }
        
        /* 3D Flip Card Effect */
        .flip-card {
            perspective: 1000px;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.5s;
            transform-style: preserve-3d;
        }
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-900">
    <?php
        $homepageData = $homepageData ?? [];
        $isPage = $isPage ?? false;
    ?>
    <?php echo $__env->make('partials.navbar', ['homepageData' => $homepageData, 'isPage' => $isPage], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <?php echo $__env->make('partials.footer', ['homepageData' => $homepageData], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.quote-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.bottom-navbar', ['homepageData' => $homepageData, 'isPage' => $isPage], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Scripts -->
    <script>
        // API Base URL
        const API_BASE_URL = '<?php echo e(url('/')); ?>';
        
        // Navbar scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('nav');
            let isScrolled = false;
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50 && !isScrolled) {
                    navbar.classList.add('scrolled');
                    isScrolled = true;
                } else if (window.scrollY <= 50 && isScrolled) {
                    navbar.classList.remove('scrolled');
                    isScrolled = false;
                }
            });
        });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\projects\stagepassapi\resources\views/layouts/app.blade.php ENDPATH**/ ?>