
<?php $__env->startSection('main-content'); ?>


<section class="py-5" x-data="{ selected: 'all' }">
  <div class="container">


    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
      <h2 class="text-uppercase mb-3">
        <?php echo e($category->category_name); ?> (<?php echo e($products->count()); ?>)
      </h2>
      <div class="d-flex align-items-center gap-2">
        <label class="form-label me-2 fw-semibold">กรองหมวดย่อย:</label>
        <select class="form-select w-auto" x-model="selected">
          <option value="all">📦 ทั้งหมด</option>
          <?php $__currentLoopData = $groupedSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subName => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option :value="'<?php echo e(e($subName)); ?>'"><?php echo e($subName); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>

   
    <div x-show="selected === 'all'" x-cloak>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col">
            <?php echo $__env->make('user_template.includes.product-card', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

  
    <?php $__currentLoopData = $groupedSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subName => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div x-show="selected === '<?php echo e($subName); ?>'" x-cloak>
        <h5 class="text-muted fw-bold mb-4 border-bottom pb-2"><?php echo e($subName); ?></h5>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
              <?php echo $__env->make('user_template.includes.product-card', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
</section>


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


<style>
  [x-cloak] { display: none !important; }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_template.layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\www\ecommerce\resources\views/user_template/category.blade.php ENDPATH**/ ?>