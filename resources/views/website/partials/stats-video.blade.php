@php
    $data = $data ?? [];
    $section = $data['section'] ?? null;
    $items = $data['items'] ?? [
        (object)['icon' => 'Package', 'value' => '43,234', 'label' => 'AV Equipment'],
        (object)['icon' => 'Users', 'value' => '421', 'label' => 'Happy Clients'],
        (object)['icon' => 'Calendar', 'value' => '2,362', 'label' => 'Events'],
    ];
    $videoUrl = is_array($section) ? ($section['background_video_url'] ?? null) : ($section->background_video_url ?? null);
@endphp
<section id="stats-video-section" class="relative min-h-[70vh] md:min-h-screen flex items-center justify-center overflow-hidden text-white py-16">
    <div class="absolute inset-0">
        @if($videoUrl)
        <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto" aria-hidden="true" id="stats-video" disablePictureInPicture src="{{ $videoUrl }}">
            <source src="{{ $videoUrl }}" type="video/mp4">
        </video>
        <div id="stats-play-overlay" class="absolute inset-0 z-20 flex items-center justify-center bg-[#172455]/60 transition-opacity duration-500 cursor-pointer" role="button" tabindex="0" aria-label="Click to play video">
            <div class="flex flex-col items-center gap-3 text-white">
                <div class="w-16 h-16 rounded-full border-2 border-white/80 flex items-center justify-center hover:bg-white/10 transition-colors">
                    <svg class="w-8 h-8 ml-0.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </div>
                <span class="text-sm font-semibold">Click to play video</span>
            </div>
        </div>
        @endif
        <div class="absolute inset-0 {{ $videoUrl ? 'bg-[#172455]/70' : 'bg-[#172455]' }}"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            @foreach($items as $stat)
            @php
                $icon = is_array($stat) ? ($stat['icon'] ?? 'Package') : ($stat->icon ?? 'Package');
                $value = is_array($stat) ? ($stat['value'] ?? '') : ($stat->value ?? '');
                $label = is_array($stat) ? ($stat['label'] ?? '') : ($stat->label ?? '');
            @endphp
            <div>
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-yellow-500 text-white mb-4">
                    @if($icon === 'Users')
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    @elseif($icon === 'Calendar')
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @else
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    @endif
                </div>
                <div class="text-5xl md:text-6xl font-bold text-yellow-400">{{ $value }}</div>
                <div class="text-xl font-semibold mt-2">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@if($videoUrl)
<script>
(function(){
    var v = document.getElementById('stats-video');
    var overlay = document.getElementById('stats-play-overlay');
    if (!v) return;
    v.muted = true;
    v.playsInline = true;
    v.setAttribute('playsinline', '');
    v.setAttribute('webkit-playsinline', '');
    v.controls = false;
    function hideOverlay() {
        if (overlay) {
            overlay.style.opacity = '0';
            overlay.style.pointerEvents = 'none';
        }
    }
    v.addEventListener('playing', hideOverlay);
    function tryPlay() {
        v.muted = true;
        v.play().then(hideOverlay).catch(function(){});
    }
    tryPlay();
    v.addEventListener('loadeddata', tryPlay);
    v.addEventListener('canplay', tryPlay);
    if (overlay) {
        overlay.addEventListener('click', function() {
            v.muted = true;
            v.play().then(hideOverlay).catch(function(){});
        });
        overlay.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                v.muted = true;
                v.play().then(hideOverlay).catch(function(){});
            }
        });
    }
})();
</script>
@endif
