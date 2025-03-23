
<?php $__env->startSection('main-content'); ?>

<script src="https://cdn.tailwindcss.com"></script>

<section class="container mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200 w-full h-full">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">บัญชีผู้ใช้</h2>
            <ul class="space-y-3">
                <li>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center text-gray-700 hover:text-yellow-500 transition">
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.121 17.804A4 4 0 016 16h12a4 4 0 01.879 1.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                        </svg>
                        ประวัติส่วนตัว
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('pendingorder')); ?>" class="flex items-center text-gray-700 hover:text-yellow-500 transition">
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h18v6H3V3zm0 9h18v6H3v-6zm0 9h18v-3H3v3z" />
                        </svg>
                        สินค้าที่จะได้รับ
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('history')); ?>" class="flex items-center text-gray-700 hover:text-yellow-500 transition">
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ประวัติการสั่งซื้อสินค้า
                    </a>
                </li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="flex items-center text-gray-700 hover:text-red-500 transition">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="flex items-center w-full text-left focus:outline-none">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H4a3 3 0 01-3-3V7a3 3 0 013-3h6a3 3 0 013 3v1" />
                            </svg>
                            ออกจากระบบ
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Profile Content -->
        <div class="col-span-3 bg-white shadow-xl rounded-2xl p-8 border border-gray-200 w-full">
            <?php echo $__env->yieldContent('profilecontent'); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/user_template/layouts/userprofile_template.blade.php ENDPATH**/ ?>