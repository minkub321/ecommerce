@extends('admin.layouts.template')

@section('page_title')
Pending Orders - Admin
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order Management</h2>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User ID</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total Price</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($orders as $order)
                <tr class="hover:bg-gray-100 transition duration-300">
                    <td class="px-4 py-2 text-center">{{ $order->id }}</td>
                    <td class="px-4 py-2 text-center">{{ $order->user_id }}</td>
                    <td class="px-4 py-2 text-center">{{ $order->shipping_phone_number }}</td>
                    <td class="px-4 py-2 text-center">{{ $order->product->product_name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 text-center">{{ $order->quantity }}</td>
                    <td class="px-4 py-2 text-center font-bold text-green-600">฿{{ number_format($order->total_price, 2) }}</td>
                    <td class="px-4 py-2 text-center">
                        <span class="px-2 py-1 rounded-lg text-white text-sm 
                        @if($order->order_status == 'pending') bg-yellow-500
                        @elseif($order->order_status == 'confirmed') bg-blue-500
                        @elseif($order->order_status == 'shipping') bg-purple-500
                        @elseif($order->order_status == 'delivered') bg-green-500
                        @else bg-red-500 @endif">
                            {{ ucfirst($order->order_status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-center">
                        @if($order->order_status == 'pending')
                            <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST" class="inline-block">
                                @csrf @method('PUT')
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                    ✅ ยืนยัน
                                </button>
                            </form>
                            <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="inline-block ml-2">
                                @csrf @method('PUT')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                    ❌ ยกเลิก
                                </button>
                            </form>
                        @elseif($order->order_status == 'confirmed')
                            <form action="{{ route('admin.orders.shipping', $order->id) }}" method="POST" class="inline-block">
                                @csrf @method('PUT')
                                <button type="submit" class="bg-purple-500 text-white px-3 py-1 rounded hover:bg-purple-700 transition">
                                    🚚 กำลังจัดส่ง
                                </button>
                            </form>
                        @elseif($order->order_status == 'shipping')
                            <form action="{{ route('admin.orders.deliver', $order->id) }}" method="POST" class="inline-block">
                                @csrf @method('PUT')
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                                    📦 ส่งมอบแล้ว
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500">ดำเนินการแล้ว</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
