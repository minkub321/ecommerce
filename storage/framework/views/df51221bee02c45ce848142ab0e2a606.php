

<?php $__env->startSection('profilecontent'); ?>
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">🛒 Pending Orders</h2>

    <!-- Alert Message -->
    <?php if(session()->has('message')): ?>
    <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-6 flex items-center gap-2">
        ✅ <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>

    <!-- Table Container -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 border-b">Product ID</th>
                    <th class="py-3 px-4 border-b text-center">Total Price</th>
                    <th class="py-3 px-4 border-b text-center">Status</th>
                    <th class="py-3 px-4 border-b text-center">Ordered At</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 divide-y divide-gray-200">
                <?php if($pending_order->isEmpty()): ?>
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500 font-semibold">🚫 No pending orders found.</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $pending_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 border-b"><?php echo e($order->product_id); ?></td>
                    <td class="py-3 px-4 border-b text-green-600 font-bold text-center">
                        $<?php echo e(number_format($order->total_price, 2)); ?>

                    </td>
                    <td class="py-3 px-4 border-b text-center">
                        <span class="px-2 py-1 rounded-lg text-white text-sm 
                        <?php if($order->order_status == 'Pending'): ?> bg-yellow-500
                        <?php elseif($order->order_status == 'Confirmed'): ?> bg-blue-500
                        <?php elseif($order->order_status == 'Shipping'): ?> bg-purple-500
                        <?php elseif($order->order_status == 'Delivered'): ?> bg-green-500
                        <?php else: ?> bg-red-500 <?php endif; ?>">
                            <?php echo e(ucfirst($order->order_status)); ?>

                        </span>
                    </td>
                    <td class="py-3 px-4 border-b text-gray-500 text-center">
                        <?php echo e($order->created_at->format('d M Y H:i')); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.userprofile_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/user_template/pendingorder.blade.php ENDPATH**/ ?>