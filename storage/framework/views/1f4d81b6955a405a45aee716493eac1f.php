
<?php $__env->startSection('page_title', 'Dashboard - Overview'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Business Overview</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4">
            <div class="text-blue-500 text-3xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h5 class="text-gray-500 text-sm">Total Users</h5>
                <p class="text-xl font-semibold text-gray-800"><?php echo e($totalUsers); ?></p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4">
            <div class="text-green-500 text-3xl">
                <i class="fas fa-box"></i>
            </div>
            <div>
                <h5 class="text-gray-500 text-sm">Total Products</h5>
                <p class="text-xl font-semibold text-gray-800"><?php echo e($totalProducts); ?></p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4">
            <div class="text-yellow-500 text-3xl">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div>
                <h5 class="text-gray-500 text-sm">Total Orders</h5>
                <p class="text-xl font-semibold text-gray-800"><?php echo e($totalOrders); ?></p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4">
            <div class="text-red-500 text-3xl">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div>
                <h5 class="text-gray-500 text-sm">Total Revenue</h5>
                <p class="text-xl font-semibold text-gray-800">$<?php echo e(number_format($totalRevenue, 2)); ?></p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4">
            <div class="text-purple-500 text-3xl">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div>
                <h5 class="text-gray-500 text-sm">Pending Orders</h5>
                <p class="text-xl font-semibold text-gray-800"><?php echo e($pendingOrders); ?></p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4">
            <div class="text-green-600 text-3xl">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <h5 class="text-gray-500 text-sm">Completed Orders</h5>
                <p class="text-xl font-semibold text-gray-800"><?php echo e($completedOrders); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>