<?php
$data = $data ?? null;

$fullText = "We Create the Most Engaging Events in the World Using Technology";
$subtitleText = "Creative Solutions • Technical Excellence";

$heroImagePath = 'uploads/hero.jpeg';
$heroImageUrl = null;
if (file_exists(public_path($heroImagePath))) {
    $heroImageUrl = asset($heroImagePath);
} else {
    $uploads = public_path('uploads');
    if (is_dir($uploads)) {
        foreach (['hero.jpeg', 'hero.JPEG', 'hero.jpg', 'hero.JPG', 'Hero.jpeg', 'hero.png'] as $name) {
            if (file_exists($uploads . DIRECTORY_SEPARATOR . $name)) {
                $heroImageUrl = asset('uploads/' . $name);
                break;
            }
        }
    }
}

if ($data) {
    if (is_array($data)) {
        $fullText = $data['headline'] ?? $fullText;
        $subtitleText = $data['subtitle'] ?? $subtitleText;
    } else {
        $fullText = $data->headline ?? $fullText;
        $subtitleText = $data->subtitle ?? $subtitleText;
    }
}
?>

<section
    id="home"
    class="relative overflow-hidden text-white -mt-[4.25rem] md:mt-0 min-h-[70vh] md:min-h-screen"
    style="padding-top: 4.25rem;"
>
    <!-- Background image -->
    <div class="absolute inset-0 z-0 min-h-full">
        <?php if($heroImageUrl): ?>
            <img
                src="<?php echo e($heroImageUrl); ?>"
                alt=""
                class="absolute inset-0 w-full h-full object-cover object-center"
                loading="eager"
                fetchpriority="high"
            >
        <?php else: ?>
            <div class="absolute inset-0 bg-[#0b1220]" style="background: radial-gradient(1200px 600px at 30% 20%, rgba(59,130,246,0.35), transparent 60%), radial-gradient(900px 500px at 70% 60%, rgba(234,179,8,0.28), transparent 55%), #0b1220;"></div>
        <?php endif; ?>

        <!-- Overlays for readability -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/45 to-black/75"></div>
        <div class="absolute inset-0 bg-[#172455]/10 mix-blend-overlay"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 lg:px-12">
        <div class="min-h-[70vh] md:min-h-[92vh] flex items-center justify-center text-center">
            <div class="max-w-5xl">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black tracking-tight leading-[1.05] uppercase drop-shadow-2xl">
                    <?php echo e($fullText); ?>

                </h1>

                <p class="mt-5 text-sm sm:text-base md:text-lg text-white/90 font-semibold tracking-wide">
                    <?php echo e($subtitleText); ?>

                </p>

                <div class="mt-8 flex flex-row flex-wrap items-center justify-center gap-2 sm:gap-3">
                    <a href="#contact"
                       class="inline-flex items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 px-4 py-3 sm:px-7 sm:py-4 text-sm sm:text-base font-black text-[#172455] shadow-2xl shadow-yellow-500/30 hover:shadow-yellow-500/40 hover:scale-[1.02] transition-all">
                        Get AV Quote
                    </a>
                    <a href="#portfolio"
                       class="inline-flex items-center justify-center rounded-xl sm:rounded-2xl bg-white/10 ring-1 ring-white/25 px-4 py-3 sm:px-7 sm:py-4 text-sm sm:text-base font-black text-white backdrop-blur hover:bg-white/15 transition-all">
                        View Our Work
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Down Arrow -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 text-center">
        <a href="#about" class="inline-block animate-bounce">
            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
    </div>

</section><?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/hero.blade.php ENDPATH**/ ?>