@php
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

    const stopLoading = () => videoLoading = false;
    const startLoading = () => videoLoading = true;
    const setError = () => {
        videoLoading = false;
        videoError = true;
    };

    video.addEventListener('canplay', stopLoading);
    video.addEventListener('canplaythrough', stopLoading);
    video.addEventListener('loadeddata', stopLoading);
    video.addEventListener('playing', stopLoading);
    video.addEventListener('waiting', startLoading);
    video.addEventListener('error', setError);

    if (video.readyState >= 3) videoLoading = false;
}, 100);

// Text animation timeline
fadeInTimeout = setTimeout(() => {
    textVisible = true;

    dimTimeout = setTimeout(() => {
        textDimmed = true;

        fadeOutTimeout = setTimeout(() => {
            textFadeOut = true;
        }, 20000);

    }, 2000);

}, 500);
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
            x-ref="video"
            src="{{ $backgroundVideo }}"
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
            :style="
                textFadeOut
                    ? 'opacity: 0; transition: opacity 2s ease-in-out;'
                    : (
                        textVisible
                            ? (
                                textDimmed
                                    ? 'opacity: 0.25; transition: opacity 1s ease-in-out;'
                                    : 'opacity: 1; transition: opacity 2s ease-in-out;'
                              )
                            : 'opacity: 0;'
                      )
            "
            class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none mb-6 text-white uppercase">
            {{ $fullText }}
        </h1>
    </div>

</section>
