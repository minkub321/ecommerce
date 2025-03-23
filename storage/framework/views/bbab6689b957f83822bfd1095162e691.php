

<?php $__env->startSection('main-content'); ?>
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">🚚 เลือกที่อยู่สำหรับจัดส่ง</h2>

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        <form action="<?php echo e(route('addshippingaddress')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- เลือกที่อยู่จากรายการที่มีอยู่ -->
            <label for="selected_address" class="block text-gray-700 font-medium mb-2">📍 เลือกที่อยู่</label>
            <select name="selected_address" id="selected_address" class="w-full px-4 py-2 border rounded-lg">
                <option value="">เลือกที่อยู่ที่บันทึกไว้</option>
                <?php $__currentLoopData = $shippingAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($address->id); ?>" <?php echo e(session('selected_address')==$address->id ? 'selected' : ''); ?>>
                    <?php echo e($address->full_name); ?> - <?php echo e($address->address); ?>, <?php echo e($address->city); ?>, <?php echo e($address->province); ?>

                    (<?php echo e($address->postal_code); ?>)
                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <option value="new">➕ เพิ่มที่อยู่ใหม่</option>
            </select>

            <!-- ฟอร์มเพิ่มที่อยู่ใหม่ -->
            <div id="new_address_form" style="display: none;">
                <div class="mb-4">
                    <label for="full_name" class="block text-gray-700 font-medium mb-2">👤 ชื่อ-นามสกุล</label>
                    <input type="text" name="full_name" id="full_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกชื่อ-นามสกุล">
                </div>

                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-700 font-medium mb-2">📞 เบอร์โทรศัพท์</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกเบอร์โทรศัพท์">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">🏠 ที่อยู่</label>
                    <textarea name="address" id="address"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกรายละเอียดในการจัดส่ง"></textarea>
                </div>

                <div class="mb-4">
                    <label for="district" class="block text-gray-700 font-medium mb-2">🏘️ ตำบล / แขวง</label>
                    <input type="text" name="district" id="district"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกตำบล / แขวง">
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-gray-700 font-medium mb-2">🏙️ อำเภอ / เขต</label>
                    <input type="text" name="city" id="city"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกอำเภอ / เขต">
                </div>

                <div class="mb-4">
                    <label for="province" class="block text-gray-700 font-medium mb-2">🌍 จังหวัด</label>
                    <input type="text" name="province" id="province"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกจังหวัด">
                </div>

                <div class="mb-4">
                    <label for="postal_code" class="block text-gray-700 font-medium mb-2">📮 รหัสไปรษณีย์</label>
                    <input type="text" name="postal_code" id="postal_code"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        placeholder="กรอกรหัสไปรษณีย์">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit"
                    class="w-full bg-indigo-500 text-white font-semibold py-3 rounded-lg hover:bg-indigo-600 transition-all">
                    ➡️ ดำเนินการต่อ
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('selected_address').addEventListener('change', function () {
        let newAddressForm = document.getElementById('new_address_form');
        if (this.value === "new") {
            newAddressForm.style.display = "block";
        } else {
            newAddressForm.style.display = "none";
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_template.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/user_template/shippingaddress.blade.php ENDPATH**/ ?>