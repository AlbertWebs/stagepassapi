@php
    $items = $items ?? [];
@endphp
<nav class="relative mb-12 overflow-hidden" aria-label="Breadcrumb">
    <!-- Solid white background layer -->
    <div class="absolute inset-0 bg-white rounded-2xl"></div>
    
    <!-- Subtle gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-50 via-white to-yellow-50 rounded-2xl opacity-60"></div>
    
    <!-- Decorative elements -->
    <div class="absolute -top-4 -left-6 w-32 h-32 bg-gradient-to-br from-yellow-200/40 to-transparent rounded-full blur-3xl"></div>
    <div class="absolute -bottom-4 -right-6 w-40 h-40 bg-gradient-to-tl from-[#172455]/20 to-transparent rounded-full blur-3xl"></div>
    
    <div class="relative flex items-center space-x-1 py-5 px-8 rounded-2xl bg-white border-2 border-gray-400 shadow-2xl">
        <!-- Home icon -->
        <a href="{{ route('home') }}" 
           class="group relative flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] text-white hover:from-[#1e3a8a] hover:to-[#172455] transition-all duration-300 shadow-md hover:shadow-xl hover:scale-110 transform-gpu"
           aria-label="Home">
            <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-yellow-400/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>
        
        @foreach($items as $index => $item)
            <!-- Separator -->
            <div class="flex items-center px-2">
                <div class="relative">
                    <div class="w-8 h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                    <div class="absolute inset-0 w-8 h-px bg-gradient-to-r from-transparent via-yellow-500/50 to-transparent animate-pulse"></div>
                </div>
                <svg class="w-3 h-3 text-yellow-500/60 mx-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
            </div>
            
            @if($index === count($items) - 1)
                <!-- Current page -->
                <div class="relative group">
                    <span class="relative z-10 px-6 py-3 text-sm font-bold text-[#172455] uppercase tracking-wider bg-gradient-to-r from-yellow-200 to-yellow-300 rounded-xl border-2 border-yellow-400/80 shadow-lg">
                        {{ $item['label'] ?? $item->label ?? '' }}
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/40 to-yellow-500/40 rounded-xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            @else
                <!-- Link -->
                <a href="{{ $item['path'] ?? $item->path ?? '#' }}" 
                   class="group relative px-5 py-2.5 text-sm font-semibold text-gray-700 hover:text-[#172455] transition-all duration-300 rounded-lg hover:bg-gradient-to-r hover:from-gray-100 hover:to-yellow-100">
                    <span class="relative z-10">{{ $item['label'] ?? $item->label ?? '' }}</span>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-yellow-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                </a>
            @endif
        @endforeach
    </div>
    
    <!-- Subtle shine effect -->
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-transparent via-white/30 to-transparent -skew-x-12 animate-shimmer pointer-events-none"></div>
</nav>
