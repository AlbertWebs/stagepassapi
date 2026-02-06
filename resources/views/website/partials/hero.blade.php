
@php
$data = $data ?? null;

$fullText = "We Create the Most Engaging Events in the World Using Technology";
$backgroundVideo = asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4');
$thumbnailUrl = null;

if ($data) {
    if (is_array($data)) {
        $fullText = $data['headline'] ?? $fullText;
        $backgroundVideo = $data['background_video_url'] ?? $backgroundVideo;
        $thumbnailUrl = $data['thumbnail_url'] ?? null;
    } else {
        $fullText = $data->headline ?? $fullText;
        $backgroundVideo = $data->background_video_url ?? $backgroundVideo;
        $thumbnailUrl = $data->thumbnail_url ?? null;
    }
}

if (!$thumbnailUrl) {
    $thumbnailUrl = substr($backgroundVideo, -4) === '.mp4'
        ? str_replace('.mp4', '_thumb.jpg', $backgroundVideo)
        : $backgroundVideo . '_thumb.jpg';
}

$xDataJson = json_encode([
    'typedText' => '',
    'textVisible' => false,
    'textDimmed' => false,
    'videoLoaded' => false,
    'videoError' => false,
    'thumbnailError' => false,
    'fullText' => $fullText,
    'backgroundVideo' => $backgroundVideo,
    'thumbnailUrl' => $thumbnailUrl,
    'isAnimating' => false,
    'typingInterval' => null,
    'startTimeout' => null,
    'dimmingTimeout' => null,
]);

$xInitJs = "
const video = \$refs.video;
if (video) {
    const handleCanPlay = () => { videoLoaded = true; videoError = false; };
    const handleLoadedData = () => { videoLoaded = true; };
    const handleError = () => { videoError = true; videoLoaded = false; };

    video.addEventListener('canplay', handleCanPlay);
    video.addEventListener('loadeddata', handleLoadedData);
    video.addEventListener('error', handleError);
    video.load();
    if (video.readyState < 2) video.preload = 'auto';
}

if (isAnimating) return;

if (startTimeout) clearTimeout(startTimeout);
if (typingInterval) clearInterval(typingInterval);
if (dimmingTimeout) clearTimeout(dimmingTimeout);

typedText = '';
textVisible = false;
textDimmed = false;
isAnimating = true;

startTimeout = setTimeout(() => {
    textVisible = true;
    let currentIndex = 0;

    typingInterval = setInterval(() => {
        if (currentIndex < fullText.length) {
            typedText = fullText.substring(0, currentIndex + 1);
            currentIndex++;
        } else {
            clearInterval(typingInterval);
            typingInterval = null;

            dimmingTimeout = setTimeout(() => {
                textDimmed = true;
                isAnimating = false;
            }, 5000);
        }
    }, 70);
}, 3000);
";
@endphp

@verbatim
<section
    x-data='{!! $xDataJson !!}'
    x-init="{!! $xInitJs !!}"
    class="relative h-[56.25vw] md:h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0"
    style="padding-top: 4.25rem; min-height: calc(100vh - 10rem);"
>
    <div class="absolute inset-0 z-0">
        <img
            x-show="(!videoLoaded || videoError) && thumbnailUrl && !thumbnailError"
            :src="thumbnailUrl"
            alt="Hero background"
            :class="videoLoaded ? 'opacity-0' : 'opacity-100'"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
            @error="thumbnailError = true"
        />

        <div
            x-show="(!videoLoaded || videoError) && (!thumbnailUrl || thumbnailError)"
            class="absolute inset-0 bg-gradient-to-br from-gray-800 via-gray-900 to-black"
        ></div>

        <video
            x-ref="video"
            :src="backgroundVideo"
            loop
            autoplay
            muted
            playsinline
            preload="auto"
            :poster="thumbnailUrl"
            :class="videoLoaded && !videoError ? 'opacity-100' : 'opacity-0'"
            class="w-full h-full object-cover transition-opacity duration-1000"
        ></video>

        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>

    <div
        :class="textVisible ? (textDimmed ? 'opacity-25' : 'opacity-100') : 'opacity-0'"
        class="relative z-10 text-center max-w-4xl mx-auto px-4 transition-opacity duration-1000"
    >
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none mb-6 uppercase">
            <span x-text="typedText"></span>
        </h1>
    </div>
</section>
@endverbatim