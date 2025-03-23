<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // กำหนดชื่อ Table

    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'total_price',
        'shipping_phone_number', 'shipping_city', 'shipping_postal_code',
        'address', 'district', 'province', 'order_status',
        'payment_id', 'payment_status'
    ];

    // เชื่อมกับ User (ผู้ใช้ที่ทำการสั่งซื้อ)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // เชื่อมกับ Product (สินค้าที่สั่งซื้อ)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
