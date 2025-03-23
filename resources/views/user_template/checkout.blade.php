@extends('user_template.layouts.template')

@section('main-content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Final Step to Place Your Order</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Address Details -->
        <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">📦 Product Will Send At:</h3>

            <div class="space-y-3">
                <p class="text-gray-700"><span class="font-semibold">🌆 จังหวัด/:</span> {{ $shipping_address->city }}</p>
                <p class="text-gray-700"><span class="font-semibold">🌆 อำเภอ/:</span> {{ $shipping_address->province }}</p>
                <p class="text-gray-700"><span class="font-semibold">🌆 ตำบล/:</span> {{ $shipping_address->district }}</p>
                <p class="text-gray-700"><span class="font-semibold">🌆 ซอย:</span> {{ $shipping_address->address }}</p>
                <p class="text-gray-700"><span class="font-semibold">📮 Postal Code:</span> {{ $shipping_address->postal_code }}</p>
                <p class="text-gray-700"><span class="font-semibold">📞 Phone Number:</span> {{ $shipping_address->phone_number }}</p>
            </div>
        </div>

        <!-- Final Products -->
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">🛍️ Your Final Products</h3>

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-lg shadow-sm border border-gray-300">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">Product Name</th>
                    <th class="py-3 px-4 text-center font-bold text-gray-900">Quantity</th>
                    <th class="py-3 px-4 text-center font-semibold">Price</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300 text-gray-700">
                @php $total = 0; @endphp
                @foreach ($cart_items as $item)
                    @php
                        $product = App\Models\Product::find($item->product_id);
                    @endphp
                    <tr>
                        <td class="py-3 px-4 text-left font-semibold">{{ $product->product_name }}</td>
                        <td class="py-3 px-4 text-center font-bold text-gray-900 text-lg">{{ $item->quantity }}</td>
                        <td class="py-3 px-4 text-center text-gray-800 font-semibold text-lg">
                            ${{ number_format($item->price, 2) }}
                        </td>
                    </tr>
                    @php $total += $item->price; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-gray-200 font-semibold text-lg">
                    <td colspan="2" class="py-4 px-6 text-right">Total:</td>
                    <td class="py-4 px-6 text-center text-gray-900 text-xl font-bold">
                        ${{ number_format($total, 2) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</div>
<div class="flex space-x-4">
    <!-- Place Order Button -->
    <form action="{{route('placeorder')}}" method="POST">
        @csrf
        <button type="submit" 
            class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
            🛒 Place Order
        </button>
    </form>

    <!-- Cancel Order Button -->
    <form action="{{ route('cancelorder') }}" method="POST">
    @csrf
    <button type="submit" 
        class="bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-red-700 transition">
        ❌ Cancel Order
    </button>
</form>

</div>

   
@endsection
