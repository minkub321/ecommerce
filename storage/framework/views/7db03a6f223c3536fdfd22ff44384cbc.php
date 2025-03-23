

<?php $__env->startSection('page_title'); ?>
Edit Products Image - Single Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Add New  Products Image</h2>

        <?php if($errors->any()): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?php echo e(route('updateproductimg')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">Previous Image</label>
               <img src="<?php echo e(asset($productinfo->product_img)); ?>" alt="">
            </div>

            <input type="hidden" value="<?php echo e($productinfo->id); ?>" name="id">
           
            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">UPLOAD NEW IMAGE</label>
                <input type="file" name="product_img"
                    class="w-full border rounded-md p-2" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 mt-4 rounded-md hover:bg-blue-700">
                UPDATE PRODUCT IMAGE
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/admin/editproductimg.blade.php ENDPATH**/ ?>