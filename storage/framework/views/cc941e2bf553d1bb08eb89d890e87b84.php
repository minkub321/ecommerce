
<?php $__env->startSection('main-content'); ?>
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center flex items-center justify-center gap-2">
        🛒 ตะกร้าสินค้าของคุณ
    </h2>

    <?php if(session()->has('message')): ?>
    <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-4 flex items-center gap-2">
        ✅ <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>

    <div class="overflow-x-auto bg-white p-6 shadow-xl rounded-xl border border-gray-200">
        <table class="w-full rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-purple-600 to-purple-800 text-white">
                <tr>
                    <th class="py-4 px-6 text-left font-semibold">สินค้า</th>
                    <th class="py-4 px-6 text-center font-semibold">ชื่อสินค้า</th>
                    <th class="py-4 px-6 text-center font-semibold">จำนวน</th>
                    <th class="py-4 px-6 text-center font-semibold">ราคา</th>
                    <th class="py-4 px-6 text-center font-semibold">การจัดการ</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-700">
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $product = App\Models\Product::find($item->product_id);
                ?>
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="py-4 px-6 text-center">
                        <img src="<?php echo e(asset($product->product_img)); ?>" alt="<?php echo e($product->product_name); ?>"
                            class="w-20 h-20 object-cover rounded-lg shadow-md border border-gray-300">
                    </td>
                    <td class="py-4 px-6 text-gray-900 font-semibold text-center"><?php echo e($product->product_name); ?></td>
                    <td class="py-4 px-6 text-center text-gray-800 font-medium text-lg"><?php echo e($item->quantity); ?></td>
                    <td class="py-4 px-6 text-center text-green-600 font-semibold text-lg">$<?php echo e(number_format($item->price, 2)); ?></td>
                    <td class="py-4 px-6 text-center">
                        <a href="<?php echo e(route('removeitem', $item->id)); ?>"
                            class="bg-red-500 text-white px-6 py-3 rounded-full hover:bg-red-600 transition-all shadow-md font-medium flex items-center justify-center gap-2">
                            ❌ ลบสินค้า
                        </a>
                    </td>
                </tr>
                <?php $total += $item->price; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr class="bg-gray-100 font-semibold text-lg">
                    <td colspan="3" class="py-4 px-6 text-right">ราคารวมทั้งหมด:</td>
                    <td class="py-4 px-6 text-center text-green-700 text-xl font-bold">$<?php echo e(number_format($total, 2)); ?>

                    </td>
                    <td class="py-4 px-6 text-center">
                        <?php if($total > 0): ?>
                        <a href="<?php echo e(route('shippingaddress')); ?>"
                            class="bg-purple-500 text-white px-6 py-3 rounded-full hover:bg-purple-700 transition-all shadow-md font-medium text-lg flex items-center justify-center gap-2">
                            ✅ ดำเนินการชำระเงิน
                        </a>
                        <?php else: ?>
                        <a href=""
                            class="bg-gray-400 text-white px-6 py-3 rounded-full opacity-50 cursor-not-allowed text-lg flex items-center justify-center gap-2">
                            ดำเนินการชำระเงิน
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/user_template/addtocart.blade.php ENDPATH**/ ?>