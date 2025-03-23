

<?php $__env->startSection('page_title'); ?>
Edit Products - Single Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Edit Product</h2>

        <?php if($errors->any()): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?php echo e(route('updateproduct')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
    <input type="hidden" name="id" value="<?php echo e($productinfo->id); ?>">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT NAME</label>
                <input type="text" name="product_name" value="<?php echo e($productinfo->product_name); ?>"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT PRICE</label>
                    <input type="number" name="price"value="<?php echo e($productinfo->price); ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        
                </div>
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT QUANTITY</label>
                    <input type="number" name="quantity" value="<?php echo e($productinfo->quantity); ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT SHORT DESCRIPTION</label>
                <textarea name="product_short_des"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="2" required>  <?php echo e($productinfo->product_short_des); ?></textarea>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT LONG DESCRIPTION</label>
                <textarea name="product_long_des"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4" required>   <?php echo e($productinfo->product_long_des); ?></textarea>
            </div>

           


            <button type="submit" class="w-full bg-blue-600 text-white py-2 mt-4 rounded-md hover:bg-blue-700">
                update Product
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/admin/editproduct.blade.php ENDPATH**/ ?>