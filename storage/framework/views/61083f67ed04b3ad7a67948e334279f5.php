<nav class="navbar navbar-expand-lg bg-light text-uppercase fs-6 p-3 border-bottom align-items-center">
  <div class="container-fluid">
    <div class="row justify-content-between align-items-center w-100">
      <div class="col-auto">
        <a class="navbar-brand text-white" href="<?php echo e(route('Home')); ?>">
          <!-- โลโก้ -->
          <svg width="112" height="45" xmlns="http://www.w3.org/2000/svg" fill="#111">
            <!-- โลโก้ SVG -->
          </svg>
        </a>
      </div>
      <div class="col-auto">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 gap-1 gap-md-5 pe-3">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('Home')); ?>">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownShop" data-bs-toggle="dropdown">Shop</a>
                <ul class="dropdown-menu">
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <a href="<?php echo e(route('category', [$category->id, $category->slug])); ?>" class="dropdown-item"><?php echo e($category->category_name); ?></a>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-3 col-lg-auto">
        <ul class="list-unstyled d-flex m-0">
          <li class="nav-item" x-data="{ open: false }">
            <?php if(Auth::check()): ?>
              <?php $user = Auth::user(); $userRole = $user->roles()->first()->id ?? 2; ?>
              <button @click="open = !open" class="nav-link active flex items-center space-x-2">
                <span><?php echo e($user->name); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
              </button>
              <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
                <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                <?php if($userRole == 1): ?>
                <a href="<?php echo e(route('admindashboard')); ?>" class="block px-4 py-2 hover:bg-gray-100">Admin Panel</a>
                <?php else: ?>
                <a href="<?php echo e(route('history')); ?>" class="block px-4 py-2 hover:bg-gray-100">History</a>
                <?php endif; ?>
                <a href="<?php echo e(route('logout')); ?>" class="block px-4 py-2 text-red-600 hover:bg-gray-100"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
                </form>
              </div>
            <?php else: ?>
              <a class="nav-link active" href="<?php echo e(route('login')); ?>">Login</a>
            <?php endif; ?>
          </li>
          <li class="d-none d-lg-block">
            <a href="#" class="text-uppercase mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart">
              Cart <span class="cart-count">(<?php echo e($cart_items->count() ?? 0); ?>)</span>
            </a>
          </li>
          <li class="search-box mx-2">
            <a href="#search" class="search-button">
              <svg width="24" height="24"><use xlink:href="#search"></use></svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav><?php /**PATH C:\Laravel\www\ecommerce\resources\views/partials/navbar.blade.php ENDPATH**/ ?>