@php
    $data = $data ?? null;
    
    // Handle both array (from JSON decode) and object (from direct DB query)
    $section = null;
    $highlights = null;
    if ($data) {
        if (is_array($data)) {
            $section = $data['section'] ?? null;
            $highlights = $data['highlights'] ?? null;
        } else {
            $section = $data->section ?? null;
            $highlights = $data->highlights ?? null;
        }
    }
    
    // Default highlights if none provided
    if (!$highlights) {
        $highlights = collect([
            (object)['text' => 'Integrated technical consulting'],
            (object)['text' => 'Professional event planning & design'],
            (object)['text' => 'Complete implementation support'],
            (object)['text' => 'Africa-wide operations'],
        ]);
    }
    
    // Extract section properties (handle both array and object)
    $badgeLabel = null;
    $title = null;
    $descriptionPrimary = null;
    $descriptionSecondary = null;
    $imageUrl = null;
    $statValue = null;
    $statLabel = null;
    $visionTitle = null;
    $visionText = null;
    $peopleTitle = null;
    $peopleDescription = null;
    
    if ($section) {
        if (is_array($section)) {
            $badgeLabel = $section['badge_label'] ?? null;
            $title = $section['title'] ?? null;
            $descriptionPrimary = $section['description_primary'] ?? null;
            $descriptionSecondary = $section['description_secondary'] ?? null;
            $imageUrl = $section['image_url'] ?? null;
            $statValue = $section['stat_value'] ?? null;
            $statLabel = $section['stat_label'] ?? null;
            $visionTitle = $section['vision_title'] ?? null;
            $visionText = $section['vision_text'] ?? null;
            $peopleTitle = $section['people_title'] ?? null;
            $peopleDescription = $section['people_description'] ?? null;
        } else {
            $badgeLabel = $section->badge_label ?? null;
            $title = $section->title ?? null;
            $descriptionPrimary = $section->description_primary ?? null;
            $descriptionSecondary = $section->description_secondary ?? null;
            $imageUrl = $section->image_url ?? null;
            $statValue = $section->stat_value ?? null;
            $statLabel = $section->stat_label ?? null;
            $visionTitle = $section->vision_title ?? null;
            $visionText = $section->vision_text ?? null;
            $peopleTitle = $section->people_title ?? null;
            $peopleDescription = $section->people_description ?? null;
        }
    }
    
    // Set defaults
    $badgeLabel = $badgeLabel ?? 'About Us';
    $title = $title ?? 'Who We Are';
    $descriptionPrimary = $descriptionPrimary ?? 'StagePass Audio-Visual Limited is an integrated technical, consulting, planning, design and implementation provider for professional events based in Nairobi and operating within Africa.';
    $descriptionSecondary = $descriptionSecondary ?? '';
    $imageUrl = $imageUrl ?? asset('uploads/banners/visionsp.jpg');
    $statValue = $statValue ?? '2362+';
    $statLabel = $statLabel ?? 'Successful Events';
    $visionTitle = $visionTitle ?? 'Our Vision';
    $visionText = $visionText ?? "TO BE AFRICA'S REVOLUTIONARY EVENTS TECHNOLOGY EXPERTS";
    $peopleTitle = $peopleTitle ?? 'Our People';
    $peopleDescription = $peopleDescription ?? "While we've got the most trusted audiovisual, staging and lighting brands available to you, it is our unparalleled team that will exceed your expectations.";
@endphp
<div class="h-12 bg-gradient-to-b from-white to-gray-50 relative">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-[#172455] to-transparent"></div>
</div>

<section x-data="{ isVisible: false }" 
         x-intersect="isVisible = true"
         id="about" 
         class="py-8 md:py-16 bg-gradient-to-b from-gray-50 via-white to-gray-50 relative overflow-hidden">
    <div class="absolute top-20 left-0 w-[600px] h-[600px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slow"></div>
    
    <div :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
         class="container mx-auto px-4 lg:px-12 relative z-10 transition-all duration-1000 transform">
        <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center animate-fade-in-up">
            <!-- Left - Image -->
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500">
                    <img src="{{ $imageUrl }}" alt="StagePass Audio Visual - Professional event production and AV services in Kenya" 
                         class="w-full h-[300px] md:h-[550px] object-cover" loading="lazy" width="800" height="600" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#172455]/70 to-transparent"></div>
                </div>
                
                <!-- Floating stat card -->
                <div class="absolute -bottom-4 -right-4 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl shadow-2xl p-4 max-w-xs animate-float">
                    <div class="text-center">
                        <div class="text-3xl md:text-5xl font-black text-white">{{ $statValue }}</div>
                        <div class="text-white font-bold mt-2">{{ $statLabel }}</div>
                    </div>
                </div>
                
                <!-- Floating award icon -->
                <div class="absolute -top-6 -left-6 bg-gradient-to-br from-[#172455] to-[#1e3a8a] rounded-2xl shadow-2xl p-6 animate-float animation-delay-1000">
                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
            </div>

            <!-- Right - Content -->
            <div class="space-y-8 animate-fade-in-right">
                <div>
                    <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
                    <h2 class="text-4xl lg:text-5xl font-black text-[#172455] mt-6 leading-tight">{{ $title }}</h2>
                    <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mt-4"></div>
                </div>

                <div class="text-xl text-gray-700 leading-relaxed font-medium">{!! $descriptionPrimary !!}</div>

                @if($descriptionSecondary)
                    <div class="text-lg text-gray-700 leading-relaxed">{!! $descriptionSecondary !!}</div>
                @endif

                <div class="grid grid-cols-2 gap-4 pt-4">
                    @foreach($highlights as $item)
                        <div class="flex items-start space-x-3 group">
                            <svg class="text-yellow-500 flex-shrink-0 group-hover:scale-125 transition-transform w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700 font-semibold text-sm">{{ $item->text ?? $item['text'] ?? '' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Vision Section -->
        <div class="mt-16 md:mt-32 text-center animate-fade-in-up">
            <div class="max-w-5xl mx-auto bg-gradient-to-br from-[#172455] to-[#1e3a8a] rounded-3xl p-8 md:p-16 shadow-2xl relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 to-transparent"></div>
                <svg class="mx-auto text-yellow-400 mb-6 animate-bounce-slow w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <circle cx="12" cy="12" r="6"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
                <h3 class="text-2xl md:text-3xl font-bold text-yellow-400 mb-4 md:mb-6">{{ $visionTitle }}</h3>
                <p class="text-2xl md:text-4xl lg:text-5xl font-black text-white leading-tight">{{ $visionText }}</p>
            </div>
        </div>

        <!-- Our People Section -->
        @if($peopleTitle && $peopleDescription)
        <div class="mt-8 md:mt-16 mb-8 text-center animate-fade-in-up">
            <div class="max-w-5xl mx-auto bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 md:p-16 border-2 border-gray-100 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-200 rounded-full blur-3xl opacity-30"></div>
                <div class="text-center max-w-3xl mx-auto relative z-10">
                    <h3 class="text-3xl md:text-4xl font-black text-[#172455] mb-4 md:mb-6">{{ $peopleTitle }}</h3>
                    <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-6"></div>
                    <p class="text-lg md:text-2xl text-gray-700 leading-relaxed font-medium">{{ $peopleDescription }}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<div class="h-24 bg-gradient-to-b from-white to-gray-50 relative">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
</div>
