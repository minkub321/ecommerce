<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('page_title'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white text-gray-900 p-5 border-r hidden md:block">
            <h1 class="text-xl font-bold mb-6 text-indigo-600">เเดชบอร์ด</h1>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="<?php echo e(route('admindashboard')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('admindashboard') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>🏠</span>
                            <span>เเดชบอร์ด</span>
                        </a>
                    </li>

                    <li class="text-gray-500 text-sm font-semibold mt-4">หมวดหมู่</li> 
                    <li>
                        <a href="<?php echo e(route('addcategory')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('addcategory') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>🏡</span>
                            <span>เพิ่มหมวดหมู่</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('allcategory')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('allcategory') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>🏡</span>
                            <span>หมวดหมู่ทั้งหมด</span>
                        </a>
                    </li>
                    
                    <li class="text-gray-500 text-sm font-semibold mt-4">หมวดหมู่ย่อย</li>
                    <li>
                        <a href="<?php echo e(route('addsubcategory')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('addsubcategory') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>📂</span>
                            <span>เพิ่มหมวดหมู่ย่อย</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('allsubcategory')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('allsubcategory') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>📂</span>
                            <span>หมวดหมู่ย่อยทั้งหมด</span>
                        </a>
                    </li>

                    <li class="text-gray-500 text-sm font-semibold mt-4">ผลิตภัณฑ์</li>
                    <li>
                        <a href="<?php echo e(route('addproducts')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('addproducts') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>📦</span>
                            <span>เพิ่มสินค้า</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('allproducts')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('allproducts') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>📦</span>
                            <span>สินค้าทั้งหมด</span>
                        </a>
                    </li>
                    
                    <li class="text-gray-500 text-sm font-semibold mt-4">คำสั่งซื้อ</li>
                    <li>
                        <a href="<?php echo e(route('pendingorders')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('pendingorders') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>📑</span>
                            <span>คำสั่งซื้อที่รอดำเนินการ</span>
                        </a>
                    </li>
                    
                    <li class="text-gray-500 text-sm font-semibold mt-4">ผู้ใช้</li>
                    
                    <li>
                        <a href="<?php echo e(route('profile.edit')); ?>"
                           class="flex items-center space-x-2 py-2 px-4 rounded-lg 
                                  <?php echo e(request()->routeIs('profile.edit') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'hover:bg-gray-200'); ?>">
                            <span>👤</span>
                            <span>ประวัติ</span>
                        </a>
                    </li>
                    <li>
                  
                        <a href="<?php echo e(route('logout')); ?>" class="block px-4 py-2 text-red-600 hover:bg-gray-100"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           ออกจากระบบ
                        </a>
                        <a href="<?php echo e(route('Home')); ?>" class="block px-4 py-2 text-blue-600 hover:bg-gray-100"
                          >
                          กลับสู่หน้าเเรก
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main>
         <?php echo $__env->yieldContent('content'); ?>  
        </main>
    </div>
</body>
</html><?php /**PATH C:\Laravel\www\ecommerce\resources\views/admin/layouts/template.blade.php ENDPATH**/ ?>