

<?php $__env->startSection('page_title'); ?>
Add Products - Single Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Add New Product</h2>

        <?php if($errors->any()): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?php echo e(route('storeproduct')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT NAME</label>
                <input type="text" name="product_name" placeholder="Enter product name"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT PRICE</label>
                    <input type="number" name="price" placeholder="Enter price"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT QUANTITY</label>
                    <input type="number" name="quantity" placeholder="Enter quantity"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT SHORT DESCRIPTION</label>
                <textarea name="product_short_des"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="2" required></textarea>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT LONG DESCRIPTION</label>
                <textarea name="product_long_des"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4" required></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">SELECT CATEGORY</label>
                    <select name="product_category_id"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option>Select a category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">SELECT SUB CATEGORY</label>
                    <select name="product_subcategory_id"
    class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    <option value="">Select a subcategory</option>
    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->subcategory_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

                </div>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">UPLOAD PRODUCT IMAGE</label>
                <input type="file" name="product_img"
                    class="w-full border rounded-md p-2" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 mt-4 rounded-md hover:bg-blue-700">
                Add Product
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/admin/addproducts.blade.php ENDPATH**/ ?>