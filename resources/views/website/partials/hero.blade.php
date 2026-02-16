
@php
$data = $data ?? null;

$fullText = "We Create the Most Engaging Events in the World Using Technology";
$backgroundVideo = asset('uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4');
$thumbnailUrl = null;

if ($data) {
    // Handle both array (from JSON decode) and object (from direct DB query)
    if (is_array($data)) {
        $fullText = $data['headline'] ?? $fullText;
        $backgroundVideo = $data['background_video_url'] ?? $backgroundVideo;
        $thumbnailUrl = $data['thumbnail_url'] ?? null;
    } else {
        // Handle stdClass object
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
    'textFadeOut' => false,
    'secondTextVisible' => false,
    'secondTextDimmed' => false,
    'secondTextFadeOut' => false,
    'videoLoaded' => false,
    'videoError' => false,
    'thumbnailError' => false,
    'showThumbnail' => true,
    'videoCanPlay' => false,
    'videoFadeIn' => false,
    'fullText' => $fullText,
    'backgroundVideo' => $backgroundVideo,
    'thumbnailUrl' => $thumbnailUrl,
    'isAnimating' => false,
    'typingInterval' => null,
    'startTimeout' => null,
    'dimmingTimeout' => null,
    'fadeOutTimeout' => null,
    'secondTextTimeout' => null,
    'secondTextDimmingTimeout' => null,
    'secondTextFadeOutTimeout' => null,
    'thumbnailTimeout' => null,
]);

$xInitJs = "
// Reset video states
videoLoaded = false;
videoError = false;
thumbnailError = false;
showThumbnail = true;
videoCanPlay = false;
videoFadeIn = false;

// Clear any existing thumbnail timer
if (thumbnailTimeout) {
    clearTimeout(thumbnailTimeout);
    thumbnailTimeout = null;
}

    const video = \$refs.video;
    if (video) {
        const handleCanPlay = () => {
            videoCanPlay = true;
            videoError = false;
            // Don't set videoLoaded yet - wait for video to actually play
        };

        const handleError = () => {
            videoError = true;
            videoCanPlay = false;
            videoLoaded = false;
        };

        const handlePlay = () => {
            videoLoaded = true;
            // Fade-in animation is handled by the 10-second timer
        };

        video.addEventListener('canplay', handleCanPlay);
        video.addEventListener('error', handleError);
        video.addEventListener('play', handlePlay);

        // Set loading strategy for faster loading
        video.load();
        
        // Preload video more aggressively
        if (video.readyState < 2) {
            video.preload = 'auto';
        }

        // Show thumbnail for 10 seconds, then start video with fade animation
        thumbnailTimeout = setTimeout(() => {
            // Check if video element still exists and is ready to play
            if (video) {
                // Check if video has an error
                if (video.error) {
                    videoError = true;
                    return;
                }
                // Check if video is ready to play (readyState 3 = HAVE_FUTURE_DATA, 4 = HAVE_ENOUGH_DATA)
                if (video.readyState >= 3) {
                    // Video is ready, start playing
                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise.then(() => {
                            // Video started playing, trigger fade animations
                            setTimeout(() => {
                                videoFadeIn = true;
                                // Fade out thumbnail after a brief moment
                                setTimeout(() => {
                                    showThumbnail = false;
                                }, 100);
                            }, 50);
                        }).catch((err) => {
                            console.error('Error playing video:', err);
                            videoError = true;
                        });
                    }
                } else {
                    // Video not ready yet, wait for canplay event
                    const handleCanPlayAfterDelay = () => {
                        if (video && !video.error) {
                            const playPromise = video.play();
                            if (playPromise !== undefined) {
                                playPromise.then(() => {
                                    // Video started playing, trigger fade animations
                                    setTimeout(() => {
                                        videoFadeIn = true;
                                        // Fade out thumbnail after a brief moment
                                        setTimeout(() => {
                                            showThumbnail = false;
                                        }, 100);
                                    }, 50);
                                }).catch((err) => {
                                    console.error('Error playing video:', err);
                                    videoError = true;
                                });
                            }
                        }
                        if (video) {
                            video.removeEventListener('canplay', handleCanPlayAfterDelay);
                        }
                    };
                    if (video) {
                        video.addEventListener('canplay', handleCanPlayAfterDelay);
                    }
                }
            }
        }, 10000); // 10 seconds delay
    }

if (isAnimating) return;

if (startTimeout) clearTimeout(startTimeout);
if (typingInterval) clearInterval(typingInterval);
if (dimmingTimeout) clearTimeout(dimmingTimeout);
if (fadeOutTimeout) clearTimeout(fadeOutTimeout);
if (secondTextTimeout) clearTimeout(secondTextTimeout);
if (secondTextDimmingTimeout) clearTimeout(secondTextDimmingTimeout);
if (secondTextFadeOutTimeout) clearTimeout(secondTextFadeOutTimeout);

typedText = '';
textVisible = false;
textDimmed = false;
textFadeOut = false;
secondTextVisible = false;
secondTextDimmed = false;
secondTextFadeOut = false;
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

// Start fade-out-down animation after 10 seconds from component mount
fadeOutTimeout = setTimeout(() => {
    textFadeOut = true;
    // Start second text fade-in animation 10 seconds after first text starts fading out (20 seconds total)
    secondTextTimeout = setTimeout(() => {
        secondTextVisible = true;
        // Start dimming second text after 5 seconds of being fully visible
        secondTextDimmingTimeout = setTimeout(() => {
            secondTextDimmed = true;
        }, 5000);
        // Start second text fade-out 20 seconds after it starts appearing
        secondTextFadeOutTimeout = setTimeout(() => {
            secondTextFadeOut = true;
        }, 20000);
    }, 10000);
}, 10000);
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
        <!-- Thumbnail/Poster Image - Shows for 10 seconds before video starts, fades out when video starts -->
        <div
            x-show="showThumbnail && thumbnailUrl && !thumbnailError"
            :style="videoFadeIn ? 'opacity: 0; transition: opacity 2s ease-in-out;' : 'opacity: 1;'"
            class="absolute inset-0 w-full h-full z-10 pointer-events-none"
        >
            <img
                :src="thumbnailUrl"
                alt="Hero background"
                class="w-full h-full object-cover"
                @error="thumbnailError = true"
            />
        </div>

        <!-- Fallback gradient if no thumbnail or thumbnail failed to load -->
        <div
            x-show="(!videoLoaded || videoError) && (!thumbnailUrl || thumbnailError)"
            class="absolute inset-0 bg-gradient-to-br from-gray-800 via-gray-900 to-black"
        ></div>

        <!-- Video - Starts playing after 10 seconds with smooth fade-in -->
        <video
            x-ref="video"
            :src="backgroundVideo"
            loop
            muted
            playsinline
            preload="auto"
            :poster="thumbnailUrl"
            class="w-full h-full object-cover"
            :style="(videoFadeIn && videoLoaded && !videoError ? 'opacity: 1; transition: opacity 2s ease-in-out; z-index: 5;' : 'opacity: 0; transition: none; z-index: 0;') + ' position: absolute; top: 0; left: 0; width: 100%; height: 100%;'"
        ></video>

        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>

    <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
        <!-- First Text - Main headline -->
        <div
            :style="textFadeOut ? 'opacity: 0; transform: translateY(100px); transition: opacity 10s ease-in-out, transform 10s ease-in-out;' : (textVisible ? (textDimmed ? 'opacity: 0.25;' : 'opacity: 1;') : 'opacity: 0;') + ' transition: ' + (textFadeOut ? 'opacity 10s ease-in-out, transform 10s ease-in-out' : 'opacity 1s ease-in-out, transform 0s ease-in-out')"
        >
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none mb-6 text-white uppercase">
                <span x-text="typedText"></span>
            </h1>
        </div>

        <!-- Second Text - Subtitle -->
        <div
            class="absolute inset-0 flex items-center justify-center"
            :style="secondTextFadeOut ? 'opacity: 0; transform: translateY(100px); transition: opacity 10s ease-in-out, transform 10s ease-in-out;' : (secondTextVisible ? (secondTextDimmed ? 'opacity: 0.25;' : 'opacity: 1;') : 'opacity: 0; transform: translateY(100px);') + ' transition: ' + (secondTextFadeOut ? 'opacity 10s ease-in-out, transform 10s ease-in-out' : (secondTextVisible ? 'opacity 10s ease-in-out, transform 10s ease-in-out' : 'opacity 0s ease-in-out, transform 0s ease-in-out')) + '; pointer-events: none;'"
        >
            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none text-white uppercase">
                Home of Creative Solutions and Technical Excellence
            </h2>
        </div>
    </div>
</section>
@endverbatim