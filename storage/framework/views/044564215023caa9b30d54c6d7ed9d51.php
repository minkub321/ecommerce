

<?php $__env->startSection('main-content'); ?>
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-10">ขั้นตอนสุดท้ายในการสั่งซื้อของคุณ</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- รายละเอียดที่อยู่ -->
        <div class="md:col-span-2 bg-white shadow-lg rounded-xl p-6 border border-gray-300">
            <h3 class="text-xl font-semibold text-gray-800 mb-5">📦 ที่อยู่สำหรับจัดส่ง:</h3>
            <div class="space-y-4">
                <p class="text-gray-700"><span class="font-semibold">🌆 เมือง:</span> <?php echo e($shipping_address->city); ?></p>
                <p class="text-gray-700"><span class="font-semibold">🏙 จังหวัด:</span> <?php echo e($shipping_address->province); ?></p>
                <p class="text-gray-700"><span class="font-semibold">📍 อำเภอ/เขต:</span> <?php echo e($shipping_address->district); ?></p>
                <p class="text-gray-700"><span class="font-semibold">🏠 ที่อยู่:</span> <?php echo e($shipping_address->address); ?></p>
                <p class="text-gray-700"><span class="font-semibold">📮 รหัสไปรษณีย์:</span> <?php echo e($shipping_address->postal_code); ?></p>
                <p class="text-gray-700"><span class="font-semibold">📞 เบอร์โทร:</span> <?php echo e($shipping_address->phone_number); ?></p>
            </div>
        </div>

        <!-- รายการสินค้าสุดท้าย -->
        <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-300">
            <h3 class="text-xl font-semibold text-gray-800 mb-5">🛍️ รายการสินค้าของคุณ</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-xl">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="py-3 px-4 text-left">ชื่อสินค้า</th>
                            <th class="py-3 px-4 text-center">จำนวน</th>
                            <th class="py-3 px-4 text-center">ราคา</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $total = 0; ?>
                        <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product = App\Models\Product::find($item->product_id);
                            ?>
                            <tr>
                                <td class="py-4 px-4"><?php echo e($product->product_name); ?></td>
                                <td class="py-4 px-4 text-center font-bold"><?php echo e($item->quantity); ?></td>
                                <td class="py-4 px-4 text-center text-gray-800 font-semibold">฿<?php echo e(number_format($item->price, 2)); ?></td>
                            </tr>
                            <?php $total += $item->price; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-200 font-semibold">
                            <td colspan="2" class="py-4 px-6 text-right">รวมทั้งหมด:</td>
                            <td class="py-4 px-6 text-center text-xl font-bold text-gray-900">฿<?php echo e(number_format($total, 2)); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- ตัวเลือกการชำระเงิน -->
    <div class="flex flex-col md:flex-row justify-center items-center gap-6 mt-8">
        <form action="<?php echo e(route('payment.process')); ?>" method="POST" class="bg-white shadow-lg rounded-xl p-6 border border-gray-300 text-center">
            <?php echo csrf_field(); ?>
            <h4 class="text-lg font-semibold text-gray-800 mb-3">💳 การชำระเงินที่ปลอดภัย</h4>
            <p class="text-gray-600 mb-4">คลิกปุ่มด้านล่างเพื่อดำเนินการชำระเงิน</p>
            <span class="text-2xl font-bold text-green-600">฿<?php echo e(number_format($cart_total, 2)); ?></span>
            <input type="hidden" name="amount" value="<?php echo e($cart_total); ?>">
            <script type="text/javascript" src="https://cdn.omise.co/omise.js" 
                data-key="<?php echo e(config('services.omise.public_key')); ?>" 
                data-image="https://www.omise.co/assets/dashboard/images/omise-logo.png" 
                data-frame-label="Your Shop" 
                data-button-label="ชำระเงินตอนนี้" 
                data-amount="<?php echo e($cart_total * 100); ?>" 
                data-currency="thb">
            </script>
            <small class="block mt-3 text-gray-500">ระบบชำระเงินโดย Omise ที่ปลอดภัย</small>
        </form>

        <form action="<?php echo e(route('cancelorder')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-red-700 transition-all">
                ❌ ยกเลิกคำสั่งซื้อ
            </button>
        </form>
    </div>

    <!-- ข้อมูลเกี่ยวกับการชำระเงิน -->
    <div class="mt-8 space-y-4">
        <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 rounded-lg shadow-md">
            <h3 class="font-semibold text-lg">🚀 ฟีเจอร์ในอนาคต</h3>
            <p>ในอนาคตเราจะรองรับการชำระเงินผ่าน <span class="font-bold">โอนผ่านธนาคาร</span> และ <span class="font-bold">พร้อมเพย์</span> เพื่อความสะดวกยิ่งขึ้น 🎉</p>
        </div>

        <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded-lg shadow-md">
            <h3 class="font-semibold text-lg">💳 วิธีการชำระเงินที่รองรับ</h3>
            <p>ขณะนี้สามารถชำระเงินผ่าน <span class="font-bold">บัตรเครดิต/เดบิต</span> โดยใช้ระบบ Omise</p>
            <ul class="list-disc pl-6 mt-2">
                <li><span class="font-bold">Visa:</span> 4242 4242 4242 4242 (CVV: 123, หมดอายุ: 12/29)</li>
                <li><span class="font-bold">MasterCard:</span> 5454 5454 5454 5454 (CVV: 123, หมดอายุ: 12/29)</li>
                <li><span class="font-bold">JCB:</span> 3566 1111 1111 1113 (CVV: 123, หมดอายุ: 12/29)</li>
            </ul>
            <p class="text-sm text-gray-600 mt-2">*ใช้สำหรับโหมดทดสอบเท่านั้น การทำธุรกรรมจริงต้องใช้บัตรที่ถูกต้อง</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/user_template/checkout.blade.php ENDPATH**/ ?>