<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Product;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function CategoryPage($id) {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        $groupedSubcategories = $products->groupBy('product_subcategory_name');
    
        return view('user_template.category', compact('category', 'products', 'groupedSubcategories'));
    }
    
    public function Producting()
    {
       $allproducts = Product::latest()->get();
 
       // ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
       $cart_items = [];
       if (Auth::check()) {
          $cart_items = Cart::where('user_id', Auth::id())->get();
       }
 
       // ส่ง `$cart_items` ไปยัง View
       return view('user_template.products', compact('allproducts', 'cart_items'));
    }
    

    public function SigleProduct($id){
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$subcat_id)->latest()->get();
        return view('user_template.product',compact('product','related_products'));
    }

    public function AddToCart(){
        $user_id = Auth::id(); // ✅ ดึง ID ของผู้ใช้ที่ล็อกอินอยู่
        $cart_items = Cart::where('user_id', $user_id)->get(); // ✅ กรองเฉพาะของ user นี้
        return view('user_template.addtocart', compact('cart_items'));
    }
    
    public function CancelOrder()
    {
        $userId = Auth::id();
        
        // ลบสินค้าทั้งหมดจากตะกร้าของผู้ใช้
        Cart::where('user_id', $userId)->delete();
    
        return redirect()->route('addtocart')->with('message', 'คำสั่งซื้อของคุณถูกยกเลิกแล้ว');
    }
    
    public function AddProductToCart(Request $request){
        $request->validate([
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1'
        ]);
    
        // แปลงค่า quantity ให้เป็น integer
        $product_price = (float) $request->price;
        $quantity = (int) $request->quantity;
        $price = $product_price * $quantity;
    
        Cart::insert([
            'product_id' => (int) $request->product_id,
            'user_id'=> Auth::id(),
            'quantity'=> $quantity, // ✅ ตอนนี้ quantity เป็น integer แน่นอน
            'price'=>$price
        ]);
    
        return redirect()->route('addtocart')->with('message', 'สินค้าของคุณถูกเพิ่มลงในตะกร้าเรียบร้อยแล้ว');
    }
    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'รายการของคุณถูกลบออกจากรถเข็นเรียบร้อยแล้ว');
    }

    public function GetShippingAddress() {
        $userId = Auth::id();
        $shippingAddresses = ShippingInfo::where('user_id', $userId)->get();
    
        return view('user_template.shippingaddress', compact('shippingAddresses'));
    }
    
    
    
    public function AddShippingAddress(Request $request)
    {
        $userId = Auth::id();
    
        // ✅ ถ้าเลือกที่อยู่ที่มีอยู่แล้ว ให้บันทึกค่าในเซสชันแล้ว Redirect
        if ($request->selected_address && $request->selected_address !== "new") {
            session(['selected_address' => $request->selected_address]);
            return redirect()->route('checkout')->with('message', 'เลือกที่อยู่สำเร็จ!');
        }
    
        // ✅ ถ้ากรอกที่อยู่ใหม่
        $validatedData = $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address'      => 'required|string',
            'district'     => 'required|string',
            'city'         => 'required|string',
            'province'     => 'required|string',
            'postal_code'  => 'required|string|max:10',
        ]);
    
        // ✅ บันทึกที่อยู่ใหม่
        $newAddress = ShippingInfo::create([
            'user_id'      => $userId,
            'full_name'    => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'address'      => $validatedData['address'],
            'district'     => $validatedData['district'],
            'city'         => $validatedData['city'],
            'province'     => $validatedData['province'],
            'postal_code'  => $validatedData['postal_code'],
        ]);
    
        // ✅ บันทึกที่อยู่ใหม่ไว้ในเซสชัน
        session(['selected_address' => $newAddress->id]);
    
        return redirect()->route('checkout')->with('message', 'เพิ่มที่อยู่สำเร็จ!');
    }
    
    public function Checkout()
    {
        $userId = Auth::id();
        $cart_items = Cart::where('user_id', $userId)->get();
    
        // ✅ ดึงค่าที่อยู่จากเซสชัน ถ้ามีการเลือก
        $selectedAddressId = session('selected_address', null);
    
        if ($selectedAddressId) {
            $shipping_address = ShippingInfo::where('user_id', $userId)
                ->where('id', $selectedAddressId)
                ->first();
        } else {
            $shipping_address = ShippingInfo::where('user_id', $userId)->first();
        }
    
        // ✅ คำนวณราคาสินค้าในตะกร้า
        $cart_total = $cart_items->sum(function($item) {
            return $item->quantity * $item->price;
        });
       
        return view('user_template.checkout', compact('cart_items', 'shipping_address', 'cart_total'));
    }
    
    

    public function PlaceOrder() {
        $userId = Auth::id();
        $shipping = ShippingInfo::where('user_id', $userId)->first();
        $cartItems = Cart::where('user_id', $userId)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('checkout')->with('error', 'Your cart is empty!');
        }
    
        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => $userId,
                'shipping_phone_number' => $shipping->phone_number,
                'shipping_city' => $shipping->city,
                'shipping_postal_code' => $shipping->postal_code,
                'address' => $shipping->address,
                'district' => $shipping->district,
                'province' => $shipping->province,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
                'order_status' => 'Pending',
            ]);
        }
    
        Cart::where('user_id', $userId)->delete();
       

        return redirect()->route('pendingorder')->with('message', 'Order placed successfully!');
    }
    
    
    
    
   
    public function PendingOrders() {
        $userId = Auth::id(); // ✅ ดึง ID ของผู้ใช้ที่ล็อกอิน
    
        $pending_order = Order::where('user_id', $userId) // ✅ กรองเฉพาะออเดอร์ของตัวเอง
            ->whereIn('order_status', ['Pending', 'Confirmed', 'Shipping'])
            ->latest()
            ->get();
    
        return view('user_template.pendingorder', compact('pending_order'));
    }
    
    public function History()
    {
        // ✅ ดึงเฉพาะออเดอร์ของ user ที่ล็อกอินอยู่
        $userId = Auth::id();
    
        $delivered_orders = Order::where('user_id', $userId)
            ->where('order_status', 'Delivered')
            ->latest()
            ->get();
    
        return view('user_template.history', compact('delivered_orders'));
    }
    
    public function NewRelease(){
        return view('user_template.newrelease'); 
    }
    public function TodaysDeal(){
        return view('user_template.todaysdeal'); 
    }
    public function CustomerService(){
        return view('user_template.customersevice'); 
    }

 

}
