@php
    $section = $data['section'] ?? null;
    $items = $data['items'] ?? [];
    $badgeLabel = $section['badge_label'] ?? 'Our Work';
    $title = $section['title'] ?? 'Portfolio';
    $description = $section['description'] ?? 'See our latest projects and events.';
    $portfolioSource = $portfolioSource ?? 'instagram';
@endphp

<section id="portfolio" class="py-16 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-12 animate-fade-in-up">
            <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
            <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8">{{ $title }}</h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-8"></div>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto font-medium">{{ $description }}</p>
        </div>
        
        @if($portfolioSource === 'instagram')
            <div id="instagram-portfolio" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Instagram items will be loaded via JavaScript -->
            </div>
            <script>
                fetch('{{ url("/api/portfolio/instagram") }}?limit=50')
                    .then(res => res.json())
                    .then(data => {
                        const container = document.getElementById('instagram-portfolio');
                        if (data.data && data.data.length) {
                            container.innerHTML = data.data.map(item => `
                                <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                                    <img src="${item.media_url}" alt="${item.caption || 'Portfolio item'}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                            `).join('');
                        }
                    })
                    .catch(err => console.error('Failed to load Instagram portfolio:', err));
            </script>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($items as $item)
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <img src="{{ $item['image_url'] ?? '' }}" alt="{{ $item['title'] ?? 'Portfolio item' }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        @if($item['title'])
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
