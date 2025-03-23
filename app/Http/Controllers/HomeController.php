<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Cart; // นำเข้า Cart Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // นำเข้า Auth

class HomeController extends Controller
{
   public function Index()
{
    $allproducts = Product::latest()->get();

    // Top 3 best-selling products based on completed orders
    $topProductIDs = DB::table('orders')
        ->select('product_id', DB::raw('SUM(quantity) as total_sold'))
        ->whereIn('order_status', ['confirmed', 'shipping', 'delivered'])
        ->groupBy('product_id')
        ->orderByDesc('total_sold')
        ->limit(3)
        ->pluck('product_id');

    $bestSellingProducts = Product::whereIn('id', $topProductIDs)->get();

    // ดึงรายการในตะกร้าหากผู้ใช้ล็อกอิน
    $cart_items = [];
    if (Auth::check()) {
        $cart_items = Cart::where('user_id', Auth::id())->get();
    }

    return view('user_template.home', compact('allproducts', 'cart_items', 'bestSellingProducts'));
}
}
