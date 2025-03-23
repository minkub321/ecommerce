<?php
$categories = App\Models\Category::latest()->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ecommerce</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="TemplatesJungle">
  <meta name="keywords" content="ecommerce,fashion,store">
  <meta name="description" content="Bootstrap 5 Fashion Store HTML CSS Template">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('home/css/vendor.css')); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('home/css/style.css')); ?>">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>



</head>
<script src="https://cdn.tailwindcss.com"></script>

<body class="homepage">


 

  
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
      <h4 class="text-xl font-semibold text-gray-900">🛒 ตะกร้าสินค้าของคุณ</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <?php if($cart_items->isEmpty()): ?>
        <p class="text-gray-500 text-center">รถเข็นของคุณว่างเปล่า 🛍️</p>
        <?php else: ?>
        <ul class="list-group mb-3">
          <?php $total = 0; ?>
          <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
          $product = App\Models\Product::find($item->product_id);
          $total += $item->price;
          ?>
          <li class="list-group-item flex items-center gap-4">
            <!-- Product Image -->
            <img src="<?php echo e(asset($product->product_img)); ?>" alt="<?php echo e($product->product_name); ?>"
              class="w-16 h-16 object-cover rounded-lg shadow-md border border-gray-300">

            <div class="flex-1">
              <h6 class="text-gray-900 font-medium"><?php echo e($product->product_name); ?></h6>
              <small class="text-gray-500">Quantity: <?php echo e($item->quantity); ?></small>
            </div>

            <div class="text-lg font-semibold text-green-600">$<?php echo e(number_format($item->price, 2)); ?></div>

            <!-- Remove Button -->
            <a href="<?php echo e(route('removeitem', $item->id)); ?>" class="text-red-500 hover:text-red-700 transition-all">
              ❌
            </a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <!-- Total Price & Checkout Button -->
        <div class="text-lg font-semibold flex justify-between mt-4">
          <span>Total (USD):</span>
          <span class="text-green-700 text-xl font-bold">$<?php echo e(number_format($total, 2)); ?></span>
        </div>

        <a href="<?php echo e(route('shippingaddress')); ?>"
          class="w-full btn btn-primary btn-lg mt-4 <?php echo e($total == 0 ? 'opacity-50 cursor-not-allowed' : ''); ?>" <?php echo e($total==0 ? 'disabled' : ''); ?>>
          ✅ Continue to Checkout
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg bg-light text-uppercase fs-6 p-3 border-bottom align-items-center">
    <div class="container-fluid">
      <div class="row justify-content-between align-items-center w-100">

        <div class="col-auto">
          <a class="navbar-brand text-black " href="index.html" >
            ecommerce
          </a>
        </div>

        <div class="col-auto">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
             
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 gap-1 gap-md-5 pe-3">


                <li class="nav-item ">
                  <a class="nav-link  active" href="<?php echo e(route('Home')); ?>" aria-haspopup="true"
                    aria-expanded="false">หน้าเเรก</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle z-[1000]" href="#" id="dropdownShop" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">ร้านค้า</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownShop">
                  <li>
                      <a href="<?php echo e(route('producting')); ?>"
                        class="dropdown-item item-anchor">ทั้งหมด</a>
                    </li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <a href="<?php echo e(route('category',[$category->id,$category->slug])); ?>"
                        class="dropdown-item item-anchor"><?php echo e($category->category_name); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>
                </li>

                <!-- 
                <li class="nav-item ">
                  <a class="nav-link  active" href="<?php echo e(route('newrelease')); ?>" aria-haspopup="true" aria-expanded="false">New Releases</a>                  
                </li>

                <li class="nav-item ">
                  <a class="nav-link  active" href="<?php echo e(route('todaysdeal')); ?>"   aria-haspopup="true" aria-expanded="false">Today's Deals</a>                 
                </li>

                <li class="nav-item ">
                  <a class="nav-link  active" href="<?php echo e(route('customersevice')); ?>"  aria-haspopup="true" aria-expanded="false">Customer Service</a>
                  
                </li> -->



              </ul>
            </div>
          </div>
        </div>

        <div class="col-3 col-lg-auto">
          <ul class="list-unstyled d-flex m-0">
            <li class="nav-item">
            <li class="nav-item relative" x-data="{ open: false }">
              <?php if(Auth::check()): ?>
              <?php
              $user = Auth::user();
              $userRole = $user->roles()->first()->id ?? 2; // ดึง role_id จาก role_user (ค่าเริ่มต้นเป็น 2 คือ User)
              ?>

              <!-- ปุ่มสำหรับเปิด Dropdown -->
              <button @click="open = !open" class="nav-link active flex items-center space-x-2 relative z-[1000]">
                <span><?php echo e($user->name); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Dropdown เมนู -->
              <div x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-[1000]">
                <?php if($userRole == 1): ?>
                <!-- Admin Menu -->
                <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                  ประวัติผู้ใช้
                </a>
                <a href="<?php echo e(route('admindashboard')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                แผงผู้ดูแลระบบ
                </a>


                <?php else: ?>
                <!-- User Menu -->
                <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                ประวัติผู้ใช้
                </a>
                <a href="<?php echo e(route('history')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                  การสั่งซื้อ
                </a>
                <?php endif; ?>

                <!-- Logout -->

                <a href="<?php echo e(route('logout')); ?>" class="block px-4 py-2 text-red-600 hover:bg-gray-100"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  ออกจากระบบ
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
                </form>
              </div>
              <?php else: ?>
              <!-- ถ้ายังไม่ได้ล็อกอิน แสดงปุ่ม Login -->
              <a class="nav-link active" href="<?php echo e(route('login')); ?>">
                เข้าสู่ระบบ
              </a>
              <?php endif; ?>

            </li>

            <!-- Alpine.js (ถ้ายังไม่มีในโครงการของคุณ) -->
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

            </li>
            <li class="d-none d-lg-block">
              <a href="" class="text-uppercase mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                aria-controls="offcanvasCart">
                ตะกล้าสินค้า <span class="cart-count">(<?php echo e($cart_items->count() ?? 0); ?>)</span>
              </a>
            </li>

            
          </ul>
        </div>

      </div>

    </div>
  </nav>
  <div>
    <?php echo $__env->yieldContent('main-content'); ?>
  </div>



  <footer id="footer" class="mt-5">
    <div class="container">
      <div class="row d-flex flex-wrap justify-content-between py-5">
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-001">
            <div class="footer-intro mb-4">
              <a href="index.html">
                <img src="<?php echo e(asset('home/images/main-logo.png')); ?>" alt="logo">
              </a>
            </div>
            <p>Gravida massa volutpat aenean odio. Amet, turpis erat nullam fringilla elementum diam in. Nisi, purus
              vitae, ultrices nunc. Sit ac sit suscipit hendrerit.</p>
            <div class="social-links">
              <ul class="list-unstyled d-flex flex-wrap gap-3">
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#facebook"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#twitter"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#youtube"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#pinterest"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#instagram"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-002">
            <h5 class="widget-title text-uppercase mb-4">Quick Links</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="index.html" class="item-anchor">Home</a>
              </li>
              <li class="menu-item">
                <a href="index.html" class="item-anchor">About</a>
              </li>
              <li class="menu-item">
                <a href="blog.html" class="item-anchor">Services</a>
              </li>
              <li class="menu-item">
                <a href="styles.html" class="item-anchor">Single item</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-003">
            <h5 class="widget-title text-uppercase mb-4">Help & Info</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="#" class="item-anchor">Track Your Order</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Returns + Exchanges</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Shipping + Delivery</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Contact Us</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Find us easy</a>
              </li>
              <li class="menu-item">
                <a href="index.html" class="item-anchor">Faqs</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-004 border-animation-left">
            <h5 class="widget-title text-uppercase mb-4">Contact Us</h5>
            <p>Do you have any questions or suggestions? <a href="mailto:contact@yourcompany.com"
                class="item-anchor">contact@yourcompany.com</a></p>
            <p>Do you need support? Give us a call. <a href="tel:+43 720 11 52 78" class="item-anchor">+43 720 11 52
                78</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="border-top py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex flex-wrap">
            <div class="shipping">
              <span>We ship with:</span>
              <img src="<?php echo e(asset('home/images/arct-icon.png')); ?>" alt="icon">
              <img src="<?php echo e(asset('home/images/dhl-logo.png')); ?>" alt="icon">
            </div>
            <div class="payment-option">
              <span>Payment Option:</span>
              <img src="<?php echo e(asset('home/images/visa-card.png')); ?>" alt="card">
              <img src="<?php echo e(asset('home/images/paypal-card.png')); ?>" alt="card">
              <img src="<?php echo e(asset('home/images/master-card.png')); ?>" alt="card">
            </div>
          </div>
          <div class="col-md-6 text-end">
            <p>© Copyright 2022 Kaira. All rights reserved. Design by <a href="https://templatesjungle.com"
                target="_blank">TemplatesJungle</a> Distribution By <a href="https://themewagon.com"
                target="blank">ThemeWagon</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?php echo e(asset('home/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('home/js/plugins.js')); ?>"></script>
  <script src="<?php echo e(asset('home/js/SmoothScroll.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="<?php echo e(asset('home/js/script.min.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Laravel\www\ecommercebypattarapon\resources\views/user_template/layouts/template.blade.php ENDPATH**/ ?>