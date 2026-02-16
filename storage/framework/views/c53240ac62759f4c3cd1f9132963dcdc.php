<?php
    $data = $data ?? null;
    $section = null;
    $clientLogos = null;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $clientLogos = $data['logos'] ?? null;
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $clientLogos = $data->logos ?? null;
    }

    $clientLogos = $clientLogos ?? collect([
        (object)['logo_path' => asset('uploads/clients/WEB-LOGOS-01.jpg'), 'alt_text' => 'Client logo'],
        (object)['logo_path' => asset('uploads/clients/WEB-LOGOS-02.jpg'), 'alt_text' => 'Client logo'],
        (object)['logo_path' => asset('uploads/clients/WEB-LOGOS-03.jpg'), 'alt_text' => 'Client logo'],
        (object)['logo_path' => asset('uploads/clients/WEB-LOGOS-04.jpg'), 'alt_text' => 'Client logo'],
        (object)['logo_path' => asset('uploads/clients/WEB-LOGOS-05.jpg'), 'alt_text' => 'Client logo'],
    ]);

    $badgeLabel = is_array($section) ? ($section['badge_label'] ?? 'The Power Behind Us') : ($section->badge_label ?? 'The Power Behind Us');
    $title = is_array($section) ? ($section['title'] ?? 'Our Clients') : ($section->title ?? 'Our Clients');
    $description = is_array($section) ? ($section['description'] ?? 'With forward-thinking brands and organizations that demand reliability, creativity, and flawless execution. From corporate leaders to global innovators, our clients trust us to elevate their events.') : ($section->description ?? 'With forward-thinking brands and organizations that demand reliability, creativity, and flawless execution. From corporate leaders to global innovators, our clients trust us to elevate their events.');
?>
<div class="h-12 bg-gradient-to-b from-white to-gray-50 relative">
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-[#172455] to-transparent"></div>
</div>

<section x-data="{ headerVisible: false }"
         class="py-8 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slow"></div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Header -->
        <div class="text-center mb-10"
             x-intersect.threshold.0.1="headerVisible = true"
             :class="headerVisible ? 'animate-fade-in-up' : ''"
             style="opacity: 1;">
            <span class="inline-block text-sm font-bold text-yellow-600 tracking-wider uppercase bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-100 px-4 py-2 rounded-full shadow-lg shadow-yellow-200/50 border border-yellow-200/50"><?php echo e($badgeLabel); ?></span>
            <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8 drop-shadow-sm"><?php echo e($title); ?></h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-600 rounded-full mx-auto mb-8 shadow-lg shadow-yellow-500/30"></div>
            <p class="text-xl text-gray-700 max-w-4xl mx-auto font-medium drop-shadow-sm"><?php echo e($description); ?></p>
        </div>

        <!-- Clients Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
            <?php
                $totalItems = count($clientLogos);
                $itemsPerRow = 5; // lg:grid-cols-5
                $itemsInLastRow = $totalItems % $itemsPerRow;
            ?>
            <?php $__currentLoopData = $clientLogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $isLastRow = $index >= $totalItems - $itemsInLastRow;
                    $isIncompleteLastRow = $itemsInLastRow > 0 && $itemsInLastRow < $itemsPerRow;
                    $positionInLastRow = $isLastRow ? $index - ($totalItems - $itemsInLastRow) : -1;
                    
                    // For 3 items in last row, center them by starting at column 2
                    $gridColumnClass = '';
                    if ($isLastRow && $isIncompleteLastRow && $itemsInLastRow === 3 && $positionInLastRow === 0) {
                        $gridColumnClass = 'lg:col-start-2';
                    }
                ?>
                <div class="rounded-2xl p-[3px] bg-gradient-to-br from-yellow-400 via-orange-500 to-yellow-600 hover:from-yellow-300 hover:via-orange-400 hover:to-yellow-500 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-yellow-500/30 ring-2 ring-white/50 cursor-pointer group <?php echo e($gridColumnClass); ?>"
                     style="animation-delay: <?php echo e($index * 50); ?>ms">
                    <div class="bg-white rounded-2xl p-2 flex items-center justify-center h-full hover:shadow-xl shadow-lg shadow-gray-200/30 transition-all duration-500">
                        <div class="w-full h-24 flex items-center justify-center">
                            <img src="<?php echo e($logo->logo_path ?? $logo['logo_path'] ?? ''); ?>" 
                                 alt="<?php echo e($logo->alt_text ?? $logo['alt_text'] ?? 'Client logo'); ?>" 
                                 class="max-w-full max-h-full object-contain group-hover:scale-110 transition-transform duration-500" 
                                 loading="lazy" width="200" height="100" />
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<div class="h-12 bg-gradient-to-b from-white to-gray-50 relative">
    <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
</div>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/clients.blade.php ENDPATH**/ ?>