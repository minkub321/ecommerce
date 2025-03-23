
<?php $__env->startSection('page_title'); ?>
Add category -siglepage
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
addcate
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Add New Category</h2>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>
        <form action="<?php echo e(route('storecategory')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="flex justify-between items-center mb-4">
                <label class="block text-gray-600 text-sm font-medium" for="category">
                    CATEGORY NAME
                </label>
                <span class="text-gray-400 text-sm">Input information</span>
            </div>
            <input type="text" id="category_name" name="category_name" placeholder="Enter category name"
                class="w-full border border-purple-300 focus:ring-2 focus:ring-purple-400 focus:border-purple-400 rounded-lg px-4 py-3 outline-none text-lg" required>
            <button type="submit"
                class="mt-6 bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition w-full sm:w-auto">
                Add Category
            </button>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/admin/addcategory.blade.php ENDPATH**/ ?>