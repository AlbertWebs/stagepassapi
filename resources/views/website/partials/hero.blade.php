@php
$data = $data ?? null;

$fullText = "We Create the Most Engaging Events in the World Using Technology";
$backgroundVideo = asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4');
$posterImage = asset('images/video-fallback.jpg'); // optional fallback image

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
    'showPlayPrompt' => false,
    'fullText' => $fullText,
]);

$xInitJs = "
setTimeout(() => {
    const video = document.getElementById('hero-video') || \$refs.video;
    if (!video) return;

    const markLoaded = () => {
        videoLoading = false;
        videoLoaded = true;
        videoError = false;
        showPlayPrompt = false;

        setTimeout(() => {
            textVisible = true;

            setTimeout(() => {
                textDimmed = true;

                setTimeout(() => {
                    textFadeOut = true;
                }, 30000);

            }, 5000);

        }, 5000);
    };

    const checkReady = () => {
        if (video.readyState >= 2 && video.currentTime > 0) {
            markLoaded();
        }
    };

    video.muted = true;
    video.setAttribute('playsinline', '');
    video.setAttribute('webkit-playsinline', '');
    if (typeof video.playsInline !== 'undefined') video.playsInline = true;

    const tryPlay = () => {
        if (video.paused) {
            video.play().then(() => { showPlayPrompt = false; }).catch(() => {});
        }
    };

    video.addEventListener('loadedmetadata', checkReady);
    video.addEventListener('timeupdate', checkReady);
    video.addEventListener('playing', markLoaded);
    video.addEventListener('loadeddata', tryPlay);
    video.addEventListener('canplay', tryPlay);
    video.addEventListener('canplaythrough', tryPlay);
    video.addEventListener('error', () => {
        videoLoading = false;
        videoError = true;
    });

    tryPlay();
    setTimeout(tryPlay, 400);
    setTimeout(tryPlay, 1200);

    var isSafari = (navigator.userAgent.includes('Safari') && !navigator.userAgent.includes('Chrome')) || (navigator.vendor && navigator.vendor.includes('Apple'));
    if (isSafari) {
        showPlayPrompt = true;
    } else {
        setTimeout(() => {
            if (video.paused) showPlayPrompt = true;
        }, 1500);
    }

    setTimeout(() => {
        if (videoLoading) markLoaded();
    }, 6000);
}, 150);
";
@endphp

<section x-data='{!! $xDataJson !!}'
         x-init="{!! $xInitJs !!}"
         class="relative h-[56.25vw] md:h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0"
         style="padding-top: 4.25rem; min-height: calc(100vh - 10rem);">

    <!-- Background -->
    <div class="absolute inset-0 z-0">

        <!-- Video -->
        <video
            id="hero-video"
            x-ref="video"
            autoplay
            muted
            loop
            playsinline
            webkit-playsinline
            preload="auto"
            poster="{{ $posterImage }}"
            class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ $backgroundVideo }}" type="video/mp4">
        </video>

        <!-- Preloader -->
        <div x-cloak x-show="videoLoading && !showPlayPrompt"
             x-transition
             class="absolute inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-20">
            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-yellow-500"></div>
            </div>
        </div>

        <!-- Safari / Mac: click-to-play when autoplay is blocked -->
        <div x-cloak
             x-show="showPlayPrompt"
             x-transition
             @click="
                 const v = document.getElementById('hero-video');
                 if (v) {
                   v.muted = true;
                   v.play().then(function() { showPlayPrompt = false; }).catch(function() {});
                 }
                 showPlayPrompt = false;
             "
             class="absolute inset-0 z-20 flex items-center justify-center bg-black/50 cursor-pointer group">
            <div class="text-center px-6 py-4 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 group-hover:bg-white/20 transition-colors">
                <svg class="w-16 h-16 md:w-20 md:h-20 text-white mx-auto mb-2 opacity-90" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
                <p class="text-white font-semibold text-sm md:text-base">Click to play video</p>
            </div>
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
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
            class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none mb-6 text-white uppercase drop-shadow-2xl">
        </h1>
    </div>

    <!-- Down Arrow -->
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
