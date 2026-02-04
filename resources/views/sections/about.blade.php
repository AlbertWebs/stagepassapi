@php
    $section = $data['section'] ?? null;
    $highlights = $data['highlights'] ?? [];
    $badgeLabel = $section['badge_label'] ?? 'About Us';
    $title = $section['title'] ?? 'Who We Are';
    $descriptionPrimary = $section['description_primary'] ?? 'StagePass Audio-Visual Limited is an integrated technical, consulting, planning, design and implementation provider for professional events based in Nairobi and operating within Africa.';
    $descriptionSecondary = $section['description_secondary'] ?? 'We specialize in rentals of Audio-Visual technology including Sound, Screens, Lighting, Content Management, Digital and Interactive technology and scenic design.';
    $imageUrl = $section['image_url'] ?? asset('uploads/banners/visionsp.jpg');
    $statValue = $section['stat_value'] ?? '2362+';
    $statLabel = $section['stat_label'] ?? 'Successful Events';
    $visionTitle = $section['vision_title'] ?? 'Our Vision';
    $visionText = $section['vision_text'] ?? "TO BE AFRICA'S REVOLUTIONARY EVENTS TECHNOLOGY EXPERTS";
@endphp

<!-- Section Divider -->
<div class="h-12 bg-gradient-to-b from-white to-gray-50 relative">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-[#172455] to-transparent"></div>
</div>

<section id="about" class="py-8 md:py-16 bg-gradient-to-b from-gray-50 via-white to-gray-50 relative overflow-hidden">
    <div class="absolute top-20 left-0 w-[600px] h-[600px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slow"></div>
    
    <div class="container mx-auto px-4 lg:px-12 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center animate-fade-in-up">
            <!-- Left - Image -->
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500">
                    <img src="{{ $imageUrl }}" alt="Event Production" class="w-full h-[300px] md:h-[550px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#172455]/70 to-transparent"></div>
                </div>
                
                <!-- Floating stat card -->
                <div class="absolute -bottom-4 -right-4 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl shadow-2xl p-4 max-w-xs animate-float">
                    <div class="text-center">
                        <div class="text-3xl md:text-5xl font-black text-white">{{ $statValue }}</div>
                        <div class="text-white font-bold mt-2">{{ $statLabel }}</div>
                    </div>
                </div>
            </div>

            <!-- Right - Content -->
            <div class="space-y-8 animate-fade-in-right">
                <div>
                    <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
                    <h2 class="text-4xl lg:text-5xl font-black text-[#172455] mt-6 leading-tight">{{ $title }}</h2>
                    <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mt-4"></div>
                </div>

                <p class="text-xl text-gray-700 leading-relaxed font-medium">{{ $descriptionPrimary }}</p>
                <p class="text-xl text-gray-700 leading-relaxed font-medium">{{ $descriptionSecondary }}</p>

                <div class="grid grid-cols-2 gap-4 pt-4">
                    @foreach($highlights as $highlight)
                        <div class="flex items-start space-x-3 group">
                            <svg class="text-yellow-500 flex-shrink-0 group-hover:scale-125 transition-transform w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700 font-semibold text-sm">{{ $highlight['text'] ?? '' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Vision Section -->
        <div class="mt-16 md:mt-32 text-center animate-fade-in-up">
            <div class="max-w-5xl mx-auto bg-gradient-to-br from-[#172455] to-[#1e3a8a] rounded-3xl p-8 md:p-16 shadow-2xl relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 to-transparent"></div>
                <svg class="mx-auto text-yellow-400 mb-6 animate-bounce-slow w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke-width="2"></circle>
                    <circle cx="12" cy="12" r="6" stroke-width="2"></circle>
                    <circle cx="12" cy="12" r="2" stroke-width="2"></circle>
                </svg>
                <h3 class="text-2xl md:text-3xl font-bold text-yellow-400 mb-4 md:mb-6">{{ $visionTitle }}</h3>
                <p class="text-2xl md:text-4xl lg:text-5xl font-black text-white leading-tight">{{ $visionText }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="h-24 bg-gradient-to-b from-white to-gray-50 relative">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
</div>
