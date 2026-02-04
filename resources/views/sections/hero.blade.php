@php
    $headline = $data['headline'] ?? 'We Create the Most Engaging Events in the World Using Technology';
    $backgroundVideo = $data['background_video_url'] ?? asset('uploads/video/ceo.mp4');
    $posterImage = $data['poster_image_url'] ?? null;
@endphp

<section id="home" class="relative h-[56.25vw] md:h-screen flex items-center justify-center overflow-hidden bg-gray-900 text-white -mt-[4.25rem] md:mt-0" style="padding-top: 4.25rem; min-height: calc(100vh - 10rem);">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        @if($posterImage)
            <img
                src="{{ $posterImage }}"
                alt="Hero background"
                class="w-full h-full object-cover hero-poster"
                id="hero-poster"
            />
        @endif
        
        <video
            id="hero-video"
            loop
            autoplay
            muted
            playsinline
            preload="metadata"
            @if($posterImage)
            poster="{{ $posterImage }}"
            @endif
            class="w-full h-full object-cover hero-video"
            style="opacity: 0; transition: opacity 0.5s ease-in-out;"
        >
            <source src="{{ $backgroundVideo }}" type="video/mp4">
        </video>
        
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-4 transition-opacity duration-1000" id="hero-content">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none mb-6 text-white uppercase" id="hero-text">
            {{ $headline }}
        </h1>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('hero-video');
    const poster = document.getElementById('hero-poster');
    const heroText = document.getElementById('hero-text');
    const fullText = '{{ addslashes($headline) }}';
    
    // Typing animation
    let i = 0;
    heroText.textContent = '';
    
    setTimeout(() => {
        const typingInterval = setInterval(() => {
            if (i < fullText.length) {
                heroText.textContent += fullText.charAt(i);
                i++;
            } else {
                clearInterval(typingInterval);
                setTimeout(() => {
                    document.getElementById('hero-content').style.opacity = '0.25';
                }, 5000);
            }
        }, 70);
    }, 200);
    
    // Video loading
    if (video) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    video.src = '{{ $backgroundVideo }}';
                    video.load();
                    video.play().catch(() => {});
                    
                    video.addEventListener('loadeddata', () => {
                        video.style.opacity = '1';
                        if (poster) poster.style.opacity = '0';
                    });
                    
                    observer.disconnect();
                }
            });
        }, { threshold: 0.1 });
        
        observer.observe(video.closest('section'));
    }
});
</script>
