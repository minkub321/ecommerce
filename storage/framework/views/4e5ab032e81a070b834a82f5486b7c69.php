<div class="bg-white border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
  <div class="position-relative">
    <a href="<?php echo e(route('singleproduct', [$product->id, $product->slug])); ?>">
      <img src="<?php echo e(asset($product->product_img)); ?>"
           alt="<?php echo e($product->product_name); ?>"
           class="img-fluid w-100"
           style="height: 250px; object-fit: cover; border-radius: .5rem .5rem 0 0;">
    </a>
    <a href="#" class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
      <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
        <use xlink:href="#heart"></use>
      </svg>
    </a>
  </div>

  <div class="p-3">
    <h5 class="text-uppercase fs-6 mb-1">
      <a href="<?php echo e(route('singleproduct', [$product->id, $product->slug])); ?>" class="text-dark text-decoration-none">
        <?php echo e($product->product_name); ?>

      </a>
    </h5>
    <p class="text-muted small mb-2">💰 <?php echo e(number_format($product->price)); ?> บาท</p>
    <p class="text-muted small mb-3">📦 คงเหลือ: <?php echo e($product->quantity); ?> ชิ้น</p>

    <form action="<?php echo e(route('addproducttocart')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
      <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
      <input type="hidden" name="quantity" value="1">
      <button type="submit" class="btn btn-warning w-100 fw-bold">
        🛒 เพิ่มใส่ตะกร้า
      </button>
    </form>
  </div>
</div>
<?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/user_template/includes/product-card.blade.php ENDPATH**/ ?>