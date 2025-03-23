

<?php $__env->startSection('profilecontent'); ?>
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">📜 Order History</h2>

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
                    <th class="py-3 px-4 border-b">Order ID</th>
                    <th class="py-3 px-4 border-b">Product ID</th>
                    <th class="py-3 px-4 border-b text-center">Total Price</th>
                    <th class="py-3 px-4 border-b text-center">Delivered At</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 divide-y divide-gray-200">
                <?php if($delivered_orders->isEmpty()): ?>
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500 font-semibold">🚫 No order history found.</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $delivered_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 border-b"><?php echo e($order->id); ?></td>
                    <td class="py-3 px-4 border-b"><?php echo e($order->product_id); ?></td>
                    <td class="py-3 px-4 border-b text-green-600 font-bold text-center">
                        $<?php echo e(number_format($order->total_price, 2)); ?>

                    </td>
                    <td class="py-3 px-4 border-b text-gray-500 text-center">
                 
                        <?php echo e($order->updated_at->format('d M Y H:i')); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.userprofile_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/user_template/history.blade.php ENDPATH**/ ?>