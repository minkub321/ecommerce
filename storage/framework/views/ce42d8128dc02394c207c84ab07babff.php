
<?php $__env->startSection('main-content'); ?>

<section id="best-sellers" class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
      <h2 class="text-2xl font-bold uppercase text-gray-800">สินค้าทั้งหมด</h2>

      
      <?php $categories = App\Models\Category::latest()->get(); ?>
      <div x-data="{ open: false }" class="relative mt-4 md:mt-0">
        <button @click="open = !open"
          class="bg-yellow-500 text-white px-5 py-2 rounded-md shadow hover:bg-yellow-600 transition flex items-center gap-2">
          🗂️ หมวดหมู่สินค้า
          <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <ul x-show="open" @click.away="open = false" x-transition
          class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <a href="<?php echo e(route('category', [$category->id, $category->slug])); ?>"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 transition duration-150">
                🏷️ <?php echo e($category->category_name); ?>

              </a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php $__currentLoopData = $allproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
          <a href="<?php echo e(route('singleproduct', [$product->id, $product->slug])); ?>">
            <img src="<?php echo e(asset($product->product_img)); ?>" alt="<?php echo e($product->product_name); ?>"
              class="w-full h-60 object-cover">
          </a>
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-700 hover:text-yellow-500 transition">
              <a href="<?php echo e(route('singleproduct', [$product->id, $product->slug])); ?>">
                <?php echo e($product->product_name); ?>

              </a>
            </h3>
            <p class="text-gray-600 mt-1">💰 ราคา: <?php echo e($product->price); ?> บาท</p>
            <p class="text-gray-600">📦 คงเหลือ: <?php echo e($product->quantity); ?> ชิ้น</p>

            <form action="<?php echo e(route('addproducttocart')); ?>" method="POST" class="mt-4">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
              <input type="hidden" name="price" value="<?php echo e($product->price); ?>">

              <label for="quantity_<?php echo e($product->id); ?>"
                class="block text-sm font-medium text-gray-700 mb-1">จำนวน:</label>
              <input id="quantity_<?php echo e($product->id); ?>" type="number" name="quantity" min="1" value="1" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500 outline-none mb-3">

              <button type="submit"
                class="w-full bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition">
                🛒 หยิบใส่ตะกร้า
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/user_template/products.blade.php ENDPATH**/ ?>