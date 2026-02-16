<?php
$data = $data ?? null;

$fullText = "We Create the Most Engaging Events in the World Using Technology";
$backgroundVideo = asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4');

if ($data) {
    if (is_array($data)) {
        $fullText = $data['headline'] ?? $fullText;
        $backgroundVideo = $data['background_video_url'] ?? $backgroundVideo;
    } else {
        $fullText = $data->headline ?? $fullText;
        $backgroundVideo = $data->background_video_url ?? $backgroundVideo;
    }
}

$xDataJson = json_encode([
    'textVisible' => false,
    'textDimmed' => false,
    'textFadeOut' => false,
    'videoLoading' => true,
    'videoError' => false,
    'videoLoaded' => false,
    'fullText' => $fullText,
    'fadeInTimeout' => null,
    'dimTimeout' => null,
    'fadeOutTimeout' => null,
]);

$xInitJs = "
// Attach video listeners safely
setTimeout(() => {
    const video = \$refs.video;
    if (!video) return;

    const handleVideoLoaded = () => {
        videoLoading = false;
        videoLoaded = true;
        videoError = false;
        
        // Once video is loaded, wait 5 seconds then start fading in text
        fadeInTimeout = setTimeout(() => {
            textVisible = true;
            
            // After fade-in completes (5 seconds), become almost transparent
            dimTimeout = setTimeout(() => {
                textDimmed = true;
                
                // Stay dimmed for 30 seconds, then fade out
                fadeOutTimeout = setTimeout(() => {
                    textFadeOut = true;
                }, 30000); // 30 seconds
            }, 5000); // 5 seconds after fade-in starts (when fade-in completes)
        }, 5000); // 5 seconds after video loads
    };
    
    const startLoading = () => videoLoading = true;
    const setError = () => {
        videoLoading = false;
        videoError = true;
    };

    video.addEventListener('canplay', handleVideoLoaded);
    video.addEventListener('canplaythrough', handleVideoLoaded);
    video.addEventListener('loadeddata', handleVideoLoaded);
    video.addEventListener('playing', handleVideoLoaded);
    video.addEventListener('waiting', startLoading);
    video.addEventListener('error', setError);

    // Check if video is already loaded
    if (video.readyState >= 3) {
        handleVideoLoaded();
    }
}, 100);
";
?>


<section x-data='<?php echo $xDataJson; ?>'
         x-init="<?php echo $xInitJs; ?>"
         class="relative h-[56.25vw] md:h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0"
         style="padding-top: 4.25rem; min-height: calc(100vh - 10rem);">

    <!-- Background -->
    <div class="absolute inset-0 z-0">

        <!-- Video -->
        <video
            x-ref="video"
            src="<?php echo e($backgroundVideo); ?>"
            loop
            autoplay
            muted
            playsinline
            preload="auto"
            class="absolute inset-0 w-full h-full object-cover">
        </video>

        <!-- Preloader -->
        <div x-show="videoLoading"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-20">

            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-yellow-500 mb-4"></div>
                
            </div>

        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>


    <!-- Content -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
        <h1
            x-show="videoLoaded"
            x-text="videoLoaded ? fullText : ''"
            :style="
                textFadeOut
                    ? 'opacity: 0; transition: opacity 5s ease-in-out;'
                    : (
                        textDimmed
                            ? 'opacity: 0.15; transition: opacity 1s ease-in-out;'
                            : (
                                textVisible
                                    ? 'opacity: 1; transition: opacity 5s ease-in-out;'
                                    : 'opacity: 0;'
                              )
                      )
            "
            class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none mb-6 text-white uppercase">
        </h1>
    </div>

    <!-- Down Arrow with Tagline -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 text-center">
        <p class="text-white text-sm md:text-base font-bold mb-3 tracking-wide">
            Creative Solutions<br> Technical Excellence
        </p>
        <a href="#about" class="inline-block animate-bounce">
            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
    </div>

</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/hero.blade.php ENDPATH**/ ?>