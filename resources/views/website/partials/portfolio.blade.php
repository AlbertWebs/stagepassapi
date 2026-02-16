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

    // Ensure $galleryItems is a collection
    if (!$galleryItems) {
        $galleryItems = collect([
            (object)['type' => 'image', 'thumbnail' => asset('uploads/portfolio/1.jpg'), 'title' => 'Corporate Event 2024'],
            (object)['type' => 'image', 'thumbnail' => asset('uploads/portfolio/2.jpg'), 'title' => 'Concert Production'],
            (object)['type' => 'image', 'thumbnail' => asset('uploads/portfolio/3.jpg'), 'title' => 'Festival Setup'],
        ]);
    } elseif (is_array($galleryItems)) {
        $galleryItems = collect($galleryItems);
    } elseif (!($galleryItems instanceof \Illuminate\Support\Collection)) {
        $galleryItems = collect([$galleryItems]);
    }

    $badgeLabel = is_array($section) ? ($section['badge_label'] ?? 'Our Work') : ($section->badge_label ?? 'Our Work');
    $title = is_array($section) ? ($section['title'] ?? 'Portfolio Gallery') : ($section->title ?? 'Portfolio Gallery');
    $description = is_array($section) ? ($section['description'] ?? 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.') : ($section->description ?? 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.');
    
    $apiBaseUrl = url('/');
    
    // Prepare database items as JSON for Alpine.js
    $databaseItemsJson = json_encode($galleryItems->map(function($item) {
        // Handle both array and object
        if (is_array($item)) {
            return [
                'id' => $item['id'] ?? null,
                'type' => $item['type'] ?? 'image',
                'thumbnail' => $item['thumbnail'] ?? '',
                'media_url' => $item['media_url'] ?? $item['thumbnail'] ?? '',
                'title' => $item['title'] ?? 'Portfolio Item',
                'youtube_id' => $item['youtube_id'] ?? null,
            ];
        } else {
            return [
                'id' => $item->id ?? null,
                'type' => $item->type ?? 'image',
                'thumbnail' => $item->thumbnail ?? '',
                'media_url' => $item->media_url ?? $item->thumbnail ?? '',
                'title' => $item->title ?? 'Portfolio Item',
                'youtube_id' => $item->youtube_id ?? null,
            ];
        }
    })->toArray());
@endphp

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('portfolioSection', () => ({
        headerVisible: false,
        isImageModalOpen: false,
        isYouTubeModalOpen: false,
        isVideoModalOpen: false,
        currentImageUrl: '',
        currentImageTitle: '',
        currentYouTubeId: '',
        currentVideoUrl: '',
        currentVideoTitle: '',
        instagramItems: [],
        isLoadingInstagram: false,
        instagramError: '',
        portfolioSource: {!! json_encode($portfolioSource) !!},
        apiBaseUrl: {!! json_encode($apiBaseUrl) !!},
        databaseItems: {!! $databaseItemsJson !!},
        
        async loadInstagram() {
            if (this.portfolioSource !== 'instagram') {
                console.log('Portfolio source is not instagram:', this.portfolioSource);
                return;
            }
            
            console.log('Loading Instagram feed from:', `${this.apiBaseUrl}/api/portfolio/instagram?limit=50`);
            this.isLoadingInstagram = true;
            this.instagramError = '';
            
            try {
                const response = await fetch(`${this.apiBaseUrl}/api/portfolio/instagram?limit=50`);
                console.log('Instagram API response status:', response.status);
                
                if (!response.ok) {
                    const errorText = await response.text();
                    console.error('Instagram API error response:', errorText);
                    throw new Error(`Failed to load Instagram feed. Status: ${response.status}`);
                }
                
                const payload = await response.json();
                console.log('Instagram API payload:', payload);
                
                // Handle both array and object responses
                if (Array.isArray(payload)) {
                    this.instagramItems = payload;
                } else if (Array.isArray(payload?.data)) {
                    this.instagramItems = payload.data;
                } else {
                    this.instagramItems = [];
                    console.warn('Unexpected Instagram API response format:', payload);
                }
                
                console.log('Instagram items loaded:', this.instagramItems.length);
                
                if (this.instagramItems.length === 0) {
                    console.warn('No Instagram items found in response');
                }
            } catch (error) {
                console.error('Error loading Instagram feed:', error);
                this.instagramError = 'Unable to load Instagram feed right now. Please try again later.';
            } finally {
                this.isLoadingInstagram = false;
            }
        },
        
        get instagramGallery() {
            // Handle case-insensitive media_type checking
            const videos = this.instagramItems.filter(item => {
                const mediaType = (item.media_type || '').toUpperCase();
                return mediaType === 'VIDEO';
            }).slice(0, 12);
            
            const images = this.instagramItems.filter(item => {
                const mediaType = (item.media_type || '').toUpperCase();
                return mediaType !== 'VIDEO';
            }).slice(0, 12);
            
            const mapItem = (item) => {
                const mediaType = (item.media_type || '').toUpperCase();
                const isVideo = mediaType === 'VIDEO';
                return {
                    id: item.instagram_id || item.id,
                    type: isVideo ? 'video' : 'image',
                    thumbnail: isVideo 
                        ? (item.thumbnail_url || item.media_url)
                        : item.media_url,
                    media_url: item.media_url,
                    title: item.caption || 'Instagram Post',
                    permalink: item.permalink,
                };
            };
            
            return [...videos.map(mapItem), ...images.map(mapItem)];
        },
        
        init() {
            console.log('Portfolio section initialized. Source:', this.portfolioSource);
            if (this.portfolioSource === 'instagram') {
                this.loadInstagram();
            } else {
                console.log('Using database items. Count:', this.databaseItems?.length || 0);
            }
        }
    }));
});
</script>

<section x-data="portfolioSection"
         id="portfolio" 
         class="py-16 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-20 right-0 w-[600px] h-[600px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Header - Hidden on mobile, visible on desktop -->
        <div class="hidden md:block text-center mb-10"
             x-intersect.threshold.0.1="headerVisible = true"
             :class="headerVisible ? 'animate-fade-in-up' : ''"
             style="opacity: 1;">
            <span class="inline-block text-sm font-bold text-yellow-600 tracking-wider uppercase bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-100 px-4 py-2 rounded-full shadow-lg shadow-yellow-200/50 border border-yellow-200/50">{{ $badgeLabel }}</span>
            <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8 drop-shadow-sm">{{ $title }}</h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-600 rounded-full mx-auto mb-8 shadow-lg shadow-yellow-500/30"></div>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto font-medium drop-shadow-sm">{{ $description }}</p>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Loading State -->
            <template x-if="portfolioSource === 'instagram' && isLoadingInstagram">
                <div class="col-span-full text-center text-gray-600 font-medium py-12">
                    Loading Instagram feed...
                </div>
            </template>
            
            <!-- Error State -->
            <template x-if="portfolioSource === 'instagram' && instagramError && !isLoadingInstagram">
                <div class="col-span-full text-center text-red-600 font-medium py-12" x-text="instagramError">
                </div>
            </template>
            
            <!-- Empty State -->
            <template x-if="portfolioSource === 'instagram' && !isLoadingInstagram && !instagramError && instagramGallery.length === 0">
                <div class="col-span-full text-center text-gray-600 font-medium py-12">
                    No Instagram posts available yet.
                </div>
            </template>
            
            <!-- Database Gallery Items (only when Instagram is NOT selected) -->
            <template x-for="(item, index) in (portfolioSource !== 'instagram' ? databaseItems : [])" :key="item.id || index">
                <div class="group relative overflow-hidden rounded-2xl shadow-xl shadow-gray-300/50 hover:shadow-2xl hover:shadow-[#172455]/30 ring-2 ring-gray-100/50 hover:ring-yellow-200/50 transition-all duration-500 cursor-pointer aspect-[4/3] hover:-translate-y-2"
                     :style="`animation-delay: ${index * 100}ms`"
                     @click="
                        if (item.type === 'video') {
                            if (item.youtube_id) {
                                currentYouTubeId = item.youtube_id;
                                isYouTubeModalOpen = true;
                            }
                        } else {
                            currentImageUrl = item.media_url || item.thumbnail;
                            currentImageTitle = item.title;
                            isImageModalOpen = true;
                        }
                     ">
                    <img :src="item.thumbnail" 
                         :alt="item.title + ' - StagePass Audio Visual Portfolio'" 
                         class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700" 
                         loading="lazy" width="400" height="300" />
                    
                    <!-- Gradient overlay - Hidden on mobile, visible on desktop -->
                    <div class="hidden md:block absolute inset-0 bg-gradient-to-t from-[#172455]/95 via-[#172455]/60 to-transparent opacity-60 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="hidden md:block absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Play button for videos -->
                    <template x-if="item.type === 'video'">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 rounded-full flex items-center justify-center transform scale-0 group-hover:scale-100 transition-transform duration-500 shadow-2xl shadow-yellow-500/50 ring-4 ring-white/50">
                                <svg class="w-10 h-10 text-white ml-1" fill="white" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </template>
                    
                    <!-- Title - Hidden on mobile, visible on desktop -->
                    <div class="hidden md:block absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        <h3 class="text-white font-bold text-lg line-clamp-2" x-text="item.title"></h3>
                        <div class="h-1 w-12 bg-yellow-400 mt-2"></div>
                    </div>
                </div>
            </template>
            
            <!-- Instagram Gallery Items (only when Instagram IS selected) -->
            <template x-for="(item, index) in (portfolioSource === 'instagram' ? instagramGallery : [])" :key="item.id || index">
                <div class="group relative overflow-hidden rounded-2xl shadow-xl shadow-gray-300/50 hover:shadow-2xl hover:shadow-[#172455]/30 ring-2 ring-gray-100/50 hover:ring-yellow-200/50 transition-all duration-500 cursor-pointer aspect-[4/3] hover:-translate-y-2"
                     :style="`animation-delay: ${index * 100}ms`"
                     @click="
                        if (item.type === 'video') {
                            currentVideoUrl = item.media_url;
                            currentVideoTitle = item.title;
                            isVideoModalOpen = true;
                        } else {
                            currentImageUrl = item.media_url;
                            currentImageTitle = item.title;
                            isImageModalOpen = true;
                        }
                     ">
                    <img :src="item.thumbnail" 
                         :alt="item.title + ' - StagePass Audio Visual Portfolio'" 
                         class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700" 
                         loading="lazy" width="400" height="300" />
                    
                    <!-- Gradient overlay - Hidden on mobile, visible on desktop -->
                    <div class="hidden md:block absolute inset-0 bg-gradient-to-t from-[#172455]/95 via-[#172455]/60 to-transparent opacity-60 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="hidden md:block absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Play button for videos -->
                    <template x-if="item.type === 'video'">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 rounded-full flex items-center justify-center transform scale-0 group-hover:scale-100 transition-transform duration-500 shadow-2xl shadow-yellow-500/50 ring-4 ring-white/50">
                                <svg class="w-10 h-10 text-white ml-1" fill="white" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </template>
                    
                    <!-- Title - Hidden on mobile, visible on desktop -->
                    <div class="hidden md:block absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                        <h3 class="text-white font-bold text-lg line-clamp-2" x-text="item.title"></h3>
                        <div class="h-1 w-12 bg-yellow-400 mt-2"></div>
                    </div>
                </div>
            </template>
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
            <button @click="isImageModalOpen = false" class="absolute top-4 right-4 text-white text-3xl z-50 hover:text-yellow-400 transition-colors">×</button>
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
            <button @click="isYouTubeModalOpen = false" class="absolute top-4 right-4 text-white text-3xl z-50 hover:text-yellow-400 transition-colors">×</button>
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
         class="fixed inset-0 bg-black/90 flex items-center justify-center z-[99999] p-4"
         style="display: none;">
        <div @click.stop class="w-[1024px] max-w-full max-h-[90vh] flex flex-col">
            <button @click="isVideoModalOpen = false" class="absolute top-4 right-4 text-white text-3xl z-50 hover:text-yellow-400 transition-colors bg-black/50 rounded-full w-10 h-10 flex items-center justify-center">×</button>
            <div class="w-full aspect-video bg-black rounded-lg overflow-hidden">
                <video :src="currentVideoUrl" controls class="w-full h-full object-contain"></video>
            </div>
            <p class="text-white text-center mt-4 text-xl font-bold" x-text="currentVideoTitle"></p>
        </div>
    </div>
</section>
