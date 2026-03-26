<?php $option = (int) ($option ?? 1); ?>

<?php if($option === 2): ?>
    <?php echo $__env->make('website.partials.options.IndustriesOption2', ['data' => $data ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php elseif($option === 3): ?>
    <?php echo $__env->make('website.partials.options.IndustriesOption3', ['data' => $data ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php elseif($option === 4): ?>
    <?php echo $__env->make('website.partials.options.IndustriesOption4', ['data' => $data ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php elseif($option === 5): ?>
    <?php echo $__env->make('website.partials.options.IndustriesOption5', ['data' => $data ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('website.partials.options.IndustriesOption1', ['data' => $data ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/industries-options-switch.blade.php ENDPATH**/ ?>