@php
    $data = $data ?? null;
    $section = null;
    $stats = null;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $stats = $data['items'] ?? null;
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $stats = $data->items ?? null;
    }

    $stats = $stats ?? collect([
        (object)['icon' => 'Package', 'value' => '43,234', 'label' => 'AV Equipment'],
        (object)['icon' => 'Users', 'value' => '421', 'label' => 'Happy Clients'],
        (object)['icon' => 'Calendar', 'value' => '2,362', 'label' => 'Events'],
    ]);

    $backgroundVideo = is_array($section) ? ($section['background_video_url'] ?? '') : ($section->background_video_url ?? '');
@endphp
<section class="py-16 h-[50vh] md:h-screen relative overflow-hidden text-white">
    <!-- Background Video -->
    @if($backgroundVideo)
        <video class="absolute inset-0 w-full h-full object-cover" src="{{ $backgroundVideo }}" autoplay loop muted playsinline></video>
    @endif

    <!-- Optional dark overlay for contrast -->
    <div class="absolute inset-0 bg-[#172455]/70"></div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 lg:px-12 relative z-10 h-full flex items-center justify-center">
        <div class="grid md:grid-cols-3 gap-12 hidden md:grid w-full">
            @foreach($stats as $index => $stat)
                @php
                    $iconName = $stat->icon ?? $stat['icon'] ?? 'Package';
                @endphp
                <div class="text-center group animate-fade-in-up" style="animation-delay: {{ $index * 200 }}ms">
                    <div class="inline-flex items-center justify-center w-28 h-28 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full mb-8 group-hover:scale-125 transition-all duration-500 shadow-2xl group-hover:shadow-yellow-500/50 group-hover:rotate-12">
                        @if($iconName === 'Package')
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        @elseif($iconName === 'Users')
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        @elseif($iconName === 'Calendar')
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        @else
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        @endif
                    </div>

                    <div class="text-6xl lg:text-7xl font-black text-yellow-400 mb-4 group-hover:scale-110 transition-transform duration-300">
                        {{ $stat->value ?? $stat['value'] ?? '' }}
                    </div>

                    <div class="text-2xl text-white font-bold">
                        {{ $stat->label ?? $stat['label'] ?? '' }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
