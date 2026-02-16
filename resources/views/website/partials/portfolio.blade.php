@php
    $data = $data ?? null;
    $portfolioSource = $portfolioSource ?? 'database';
    $section = null;
    $galleryItems = null;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $galleryItems = $data['items'] ?? null;
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $galleryItems = $data->items ?? null;
    }

    $galleryItems = $galleryItems ?? collect([
        (object)['type' => 'image', 'thumbnail' => asset('uploads/portfolio/1.jpg'), 'title' => 'Corporate Event 2024'],
        (object)['type' => 'image', 'thumbnail' => asset('uploads/portfolio/2.jpg'), 'title' => 'Concert Production'],
        (object)['type' => 'image', 'thumbnail' => asset('uploads/portfolio/3.jpg'), 'title' => 'Festival Setup'],
    ]);

    $badgeLabel = is_array($section) ? ($section['badge_label'] ?? 'Our Work') : ($section->badge_label ?? 'Our Work');
    $title = is_array($section) ? ($section['title'] ?? 'Portfolio Gallery') : ($section->title ?? 'Portfolio Gallery');
    $description = is_array($section) ? ($section['description'] ?? 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.') : ($section->description ?? 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.');
@endphp
<section x-data="{ isImageModalOpen: false, isYouTubeModalOpen: false, isVideoModalOpen: false, currentImageUrl: '', currentImageTitle: '', currentYouTubeId: '', currentVideoUrl: '', currentVideoTitle: '' }"
         id="portfolio" 
         class="py-16 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-20 right-0 w-[600px] h-[600px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Header - Hidden on mobile, visible on desktop -->
        <div class="hidden md:block text-center mb-10">
            <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
            <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8">{{ $title }}</h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-8"></div>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto font-medium">{{ $description }}</p>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($galleryItems as $index => $item)
                @php
                    // Handle both array and object data
                    if (is_array($item)) {
                        $itemType = $item['type'] ?? '';
                        $itemTitle = $item['title'] ?? 'Portfolio Item';
                        $thumbnail = $item['thumbnail'] ?? '';
                        $youtubeId = $item['youtube_id'] ?? null;
                        $mediaUrl = $item['media_url'] ?? $thumbnail;
                    } else {
                        $itemType = $item->type ?? '';
                        $itemTitle = $item->title ?? 'Portfolio Item';
                        $thumbnail = $item->thumbnail ?? '';
                        $youtubeId = $item->youtube_id ?? null;
                        $mediaUrl = $item->media_url ?? $thumbnail;
                    }
                    $isVideo = $itemType === 'video';
                    
                    if ($isVideo && $youtubeId) {
                        $clickHandler = "currentYouTubeId = " . json_encode($youtubeId) . "; isYouTubeModalOpen = true;";
                    } elseif ($isVideo) {
                        $clickHandler = "currentVideoUrl = " . json_encode($mediaUrl) . "; currentVideoTitle = " . json_encode($itemTitle) . "; isVideoModalOpen = true;";
                    } else {
                        $clickHandler = "currentImageUrl = " . json_encode($mediaUrl) . "; currentImageTitle = " . json_encode($itemTitle) . "; isImageModalOpen = true;";
                    }
                @endphp
                <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 cursor-pointer aspect-[4/3]"
                     style="animation-delay: {{ $index * 100 }}ms"
                     @click="{!! $clickHandler !!}">
                    <img src="{{ $thumbnail }}" 
                         alt="{{ $itemTitle }} - StagePass Audio Visual Portfolio" 
                         class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700" 
                         loading="lazy" width="400" height="300" />
                    @if($isVideo)
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
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
    
    <!-- YouTube Modal -->
    <div x-show="isYouTubeModalOpen" 
         @click.away="isYouTubeModalOpen = false"
         @keydown.escape.window="isYouTubeModalOpen = false"
         x-transition
         class="fixed inset-0 bg-black/80 flex items-center justify-center z-[99999] p-4"
         style="display: none;">
        <div @click.stop class="max-w-5xl w-full">
            <button @click="isYouTubeModalOpen = false" class="absolute top-4 right-4 text-white text-3xl z-50">×</button>
            <div class="aspect-video">
                <iframe :src="'https://www.youtube.com/embed/' + currentYouTubeId" class="w-full h-full rounded-lg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
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
            <video :src="currentVideoUrl" controls class="w-full rounded-lg" x-text="currentVideoTitle"></video>
            <p class="text-white text-center mt-4 text-xl font-bold" x-text="currentVideoTitle"></p>
        </div>
    </div>
</section>
