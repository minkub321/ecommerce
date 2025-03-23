<?php
     use App\Http\Controllers\Admin\DashboardController;   
     use App\Http\Controllers\Admin\CategoryController;   
     use App\Http\Controllers\Admin\SubCategoryController;   
     use App\Http\Controllers\Admin\OrderController;   
     use App\Http\Controllers\Admin\ProductController;   
     use App\Http\Controllers\HomeController;   
     use App\Http\Controllers\ClientController;   
     use App\Models\Product;
     use Illuminate\Support\Facades\Auth;
     use App\Http\Controllers\ProfileController;
     use App\Http\Controllers\PaymentController;
     use Illuminate\Support\Facades\Route;



Route::controller(HomeController::class)->group(function (){
    Route::get('/','Index')->name('Home');
});
Route::controller(ClientController::class)->group(function (){
    Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}','SigleProduct')->name('singleproduct');
    Route::get('/add-to-cart','AddToCart')->name('addtocart'); 
    Route::get('/new-release','NewRelease')->name('newrelease');

});


Route::middleware(['auth','role:user'])->group(function (){
    Route::controller(ClientController::class)->group(function (){
        Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
        Route::get('/product-details/{id}/{slug}','SigleProduct')->name('singleproduct');
        Route::get('/add-to-cart','AddToCart')->name('addtocart');
        Route::post('/add-product-to-card','AddProductToCart')->name('addproducttocart');
        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/Shipping-address','GetShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address','AddShippingAddress')->name('addshippingaddress');
        Route::post('/place-order','PlaceOrder')->name('placeorder');
        Route::get('/All-Product','Producting')->name('producting');
        Route::get('/user-profile/pending-orders','PendingOrders')->name('pendingorder');
        Route::get('/user-profile/history','History')->name('history');
        Route::get('/todays-deal','TodaysDeal')->name('todaysdeal');
        Route::get('/custom-service','CustomerService')->name('customersevice');
        Route::get('/remove-cart-item/{id}','RemoveCartItem')->name('removeitem');
        Route::post('/cancelorder', [ClientController::class, 'CancelOrder'])->name('cancelorder');
      
     

        Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
        Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

       

        
    });
    
  });



  


  
  
  Route::get('/Homepage', function () {
      $user = Auth::user(); // ดึงข้อมูลผู้ใช้ที่ล็อกอิน
      if ($user->hasRole('admin')) { 
       
        return redirect()->route('admindashboard');
      }
  
      $allproducts = Product::all(); // ดึงข้อมูลทั้งหมดจากตาราง products
      return redirect()->route('Home');
     
  })->middleware(['auth', 'verified'])->name('homepage');
  
  // เส้นทางสำหรับ Admin Dashboard
 
 




Route::middleware(['auth','role:admin'])->group(function (){
Route::controller(DashboardController::class)->group(function(){

    Route::get('/admin/dashboard','Index')->name('admindashboard');

  


});




Route::controller(CategoryController::class)->group(function(){

    Route::get('/admin/all-category','Index')->name('allcategory');
    Route::get('/admin/add-category','AddCategory')->name('addcategory');
    Route::post('/admin/store-category','StoreCategory')->name('storecategory');
    Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory');
    Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');
    Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory');

});
Route::controller(SubCategoryController::class)->group(function(){

    Route::get('/admin/all-subcategory','Index')->name('allsubcategory');
    Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory');
    Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCat')->name('editsubcat');
           Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
           Route::post('/admin/update-subcategory', 'UpdateSubCat')->name('updatesubcat');

});
Route::controller(ProductController::class)->group(function(){

    Route::get('/admin/all-product','Index')->name('allproducts');
    Route::get('/admin/add-product','AddProduct')->name('addproducts');

   Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
     Route::get('/admin/edit-product-img/{id}','EditProductimg')->name('editproductimg');
  Route::post('/admin/update-product-img', 'UpdateProductimg')->name('updateproductimg');
  Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
  Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
  Route::get('/admin/delete-product/{id}', 'Deleteproduct')->name('deleteproduct');
});



Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/pending-orders', [OrderController::class, 'Index'])->name('pendingorders');
    Route::put('/admin/orders/confirm/{id}',  'confirmOrder')->name('admin.orders.confirm');
    Route::put('/admin/orders/cancel/{id}', 'cancelOrder')->name('admin.orders.cancel');
    Route::put('/admin/orders/shipping/{id}', 'shippingOrder')->name('admin.orders.shipping');
    Route::put('/admin/orders/deliver/{id}', 'deliverOrder')->name('admin.orders.deliver');
});
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
