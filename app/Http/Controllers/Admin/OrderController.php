<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index()
    {
        $orders = Order::with('product')->get();
        return view('admin.pendingorders', compact('orders'));
    }

    // ✅ ยืนยันคำสั่งซื้อ
    public function confirmOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['order_status' => 'confirmed']);

        return redirect()->route('pendingorders')->with('success', 'ออเดอร์ได้รับการยืนยันแล้ว!');
    }

    // ❌ ยกเลิกคำสั่งซื้อ
    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['order_status' => 'cancelled']);

        return redirect()->route('pendingorders')->with('error', 'ออเดอร์ถูกยกเลิกแล้ว!');
    }
    public function shippingOrder($id)
{
    $order = Order::findOrFail($id);
    $order->update(['order_status' => 'shipping']);

    return redirect()->route('pendingorders')->with('success', 'ออเดอร์กำลังจัดส่ง!');
}

public function deliverOrder($id)
{
    $order = Order::findOrFail($id);

    // ตรวจสอบว่าสินค้ามีอยู่ในระบบหรือไม่
    if (!$order->product) {
        return redirect()->route('pendingorders')->with('error', '❌ ไม่พบสินค้าในระบบ!');
    }

    $product = $order->product;

    // ตรวจสอบว่ามี stock เพียงพอที่จะหักหรือไม่
    if ($product->quantity >= $order->quantity) {
        $product->quantity -= $order->quantity; // ลดจำนวนสินค้าใน stock
        $product->save(); // บันทึกข้อมูล
    } else {
        return redirect()->route('pendingorders')->with('error', '❌ สินค้าไม่เพียงพอสำหรับออเดอร์นี้!');
    }

    // อัปเดตสถานะออเดอร์เป็น delivered
    $order->update(['order_status' => 'delivered']);

    return redirect()->route('pendingorders')->with('success', '✅ ออเดอร์ถูกส่งมอบแล้ว และสินค้าถูกหักจากสต็อก!');
}



}
