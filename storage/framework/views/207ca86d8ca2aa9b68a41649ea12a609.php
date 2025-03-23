

<?php $__env->startSection('page_title'); ?>
Pending Orders - Admin
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order Management</h2>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User ID</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total Price</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-100 transition duration-300">
                    <td class="px-4 py-2 text-center"><?php echo e($order->id); ?></td>
                    <td class="px-4 py-2 text-center"><?php echo e($order->user_id); ?></td>
                    <td class="px-4 py-2 text-center"><?php echo e($order->shipping_phone_number); ?></td>
                    <td class="px-4 py-2 text-center"><?php echo e($order->product->product_name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 text-center"><?php echo e($order->quantity); ?></td>
                    <td class="px-4 py-2 text-center font-bold text-green-600">฿<?php echo e(number_format($order->total_price, 2)); ?></td>
                    <td class="px-4 py-2 text-center">
                        <span class="px-2 py-1 rounded-lg text-white text-sm 
                        <?php if($order->order_status == 'pending'): ?> bg-yellow-500
                        <?php elseif($order->order_status == 'confirmed'): ?> bg-blue-500
                        <?php elseif($order->order_status == 'shipping'): ?> bg-purple-500
                        <?php elseif($order->order_status == 'delivered'): ?> bg-green-500
                        <?php else: ?> bg-red-500 <?php endif; ?>">
                            <?php echo e(ucfirst($order->order_status)); ?>

                        </span>
                    </td>
                    <td class="px-4 py-2 text-center">
                        <?php if($order->order_status == 'pending'): ?>
                            <form action="<?php echo e(route('admin.orders.confirm', $order->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                    ✅ ยืนยัน
                                </button>
                            </form>
                            <form action="<?php echo e(route('admin.orders.cancel', $order->id)); ?>" method="POST" class="inline-block ml-2">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                    ❌ ยกเลิก
                                </button>
                            </form>
                        <?php elseif($order->order_status == 'confirmed'): ?>
                            <form action="<?php echo e(route('admin.orders.shipping', $order->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <button type="submit" class="bg-purple-500 text-white px-3 py-1 rounded hover:bg-purple-700 transition">
                                    🚚 กำลังจัดส่ง
                                </button>
                            </form>
                        <?php elseif($order->order_status == 'shipping'): ?>
                            <form action="<?php echo e(route('admin.orders.deliver', $order->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                                    📦 ส่งมอบแล้ว
                                </button>
                            </form>
                        <?php else: ?>
                            <span class="text-gray-500">ดำเนินการแล้ว</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/admin/pendingorders.blade.php ENDPATH**/ ?>