

<?php $__env->startSection('page_title', 'Dashboard'); ?>
<?php $__env->startSection('page_subtitle', 'Overview of content, traffic, and updates.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Total Sections</p>
            <p class="text-3xl font-black text-white mt-2"><?php echo e($sectionCount); ?></p>
            <p class="text-xs text-emerald-400 mt-4">Section groups configured</p>
        </div>
        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Instagram Media</p>
            <p class="text-3xl font-black text-white mt-2"><?php echo e($instagramCount); ?></p>
            <p class="text-xs text-slate-400 mt-4">Stored items in library</p>
        </div>
        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Contact Messages</p>
            <p class="text-3xl font-black text-white mt-2"><?php echo e($contactCount); ?></p>
            <p class="text-xs text-slate-400 mt-4">Messages received</p>
        </div>
        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <p class="text-sm text-slate-400">Quote Requests</p>
            <p class="text-3xl font-black text-white mt-2"><?php echo e($quoteCount); ?></p>
            <p class="text-xs text-slate-400 mt-4">Requests submitted</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-white">Content Activity</h2>
                    <p class="text-sm text-slate-400">Latest updates across the site.</p>
                </div>
                <a href="<?php echo e(route('admin.logs')); ?>" class="px-4 py-2 text-sm font-semibold rounded-full bg-yellow-500 text-slate-900 hover:bg-yellow-400 transition">
                    View logs
                </a>
            </div>
            <div class="mt-6 space-y-4">
                <div class="flex items-center justify-between rounded-xl border border-slate-800 px-4 py-3">
                    <div>
                        <p class="text-sm text-white font-semibold">Hero section updated</p>
                        <p class="text-xs text-slate-500">10 minutes ago</p>
                    </div>
                    <span class="text-xs text-emerald-400">Live</span>
                </div>
                <div class="flex items-center justify-between rounded-xl border border-slate-800 px-4 py-3">
                    <div>
                        <p class="text-sm text-white font-semibold">New portfolio item synced</p>
                        <p class="text-xs text-slate-500">Today, 2:00 AM</p>
                    </div>
                    <span class="text-xs text-yellow-400">Synced</span>
                </div>
                <div class="flex items-center justify-between rounded-xl border border-slate-800 px-4 py-3">
                    <div>
                        <p class="text-sm text-white font-semibold">Footer links reviewed</p>
                        <p class="text-xs text-slate-500">Yesterday</p>
                    </div>
                    <span class="text-xs text-slate-400">Stable</span>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <h2 class="text-lg font-bold text-white">Quick Actions</h2>
            <p class="text-sm text-slate-400">Jump straight to CRUD pages.</p>
            <?php if(session('status')): ?>
                <div class="mt-4 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="mt-4 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <div class="mt-6 space-y-3">
                <a href="<?php echo e(route('admin.portfolio')); ?>" class="block rounded-xl border border-slate-800 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800/70">
                    Manage Portfolio
                </a>
                <a href="<?php echo e(route('admin.services')); ?>" class="block rounded-xl border border-slate-800 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800/70">
                    Edit Services
                </a>
                <a href="<?php echo e(route('admin.contact')); ?>" class="block rounded-xl border border-slate-800 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800/70">
                    Update Contact Info
                </a>
                <a href="<?php echo e(route('admin.footer')); ?>" class="block rounded-xl border border-slate-800 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800/70">
                    Refresh Footer
                </a>
                <form method="POST" action="<?php echo e(route('admin.instagram.fetch')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full rounded-xl border border-yellow-500/30 bg-yellow-500/10 px-4 py-3 text-sm font-semibold text-yellow-200 hover:bg-yellow-500/20">
                        Fetch Instagram Feeds
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projects\stagepassapi\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>