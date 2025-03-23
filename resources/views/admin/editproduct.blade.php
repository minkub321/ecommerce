@extends('admin.layouts.template')

@section('page_title')
Edit Products - Single Page
@endsection

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-3xl bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Edit Product</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
    <input type="hidden" name="id" value="{{$productinfo->id}}">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT NAME</label>
                <input type="text" name="product_name" value="{{$productinfo->product_name}}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT PRICE</label>
                    <input type="number" name="price"value="{{$productinfo->price}}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        
                </div>
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT QUANTITY</label>
                    <input type="number" name="quantity" value="{{$productinfo->quantity}}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT SHORT DESCRIPTION</label>
                <textarea name="product_short_des"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="2" required>  {{$productinfo->product_short_des}}</textarea>
            </div>

            <div class="mt-4">
                <label class="block text-gray-600 text-sm font-medium mb-2">PRODUCT LONG DESCRIPTION</label>
                <textarea name="product_long_des"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4" required>   {{$productinfo->product_long_des}}</textarea>
            </div>

           


            <button type="submit" class="w-full bg-blue-600 text-white py-2 mt-4 rounded-md hover:bg-blue-700">
                update Product
            </button>
        </form>
    </div>
</div>

@endsection
