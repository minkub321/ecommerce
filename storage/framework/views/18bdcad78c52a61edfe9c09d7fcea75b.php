
<?php $__env->startSection('page_title'); ?>
All subcategory - siglepage
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-5xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">All Sub Categories</h2>
  <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">SUB CATEGORY NAME</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">CATEGORY</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">PRODUCT</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $allsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
               
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2"><?php echo e($subcategory->id); ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo e($subcategory->subcategory_name); ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo e($subcategory->category_name); ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo e($subcategory->product_count); ?></td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="<?php echo e(route('editsubcat',$subcategory->id)); ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Edit
                        </a>
                        <a href="<?php echo e(route('deletesubcat',$subcategory->id)); ?>" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600 ml-2">
                            Delete
                        </a>
                    </td>
                </tr> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/admin/allsubcategory.blade.php ENDPATH**/ ?>