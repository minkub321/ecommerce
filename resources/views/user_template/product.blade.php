@extends('user_template.layouts.template')
@section('main-content')
<script src="https://cdn.tailwindcss.com"></script>

<section class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
        <!-- รูปภาพสินค้า -->
        <div
            class="bg-white shadow-lg rounded-lg flex items-center justify-center border border-gray-200 w-full h-full">
            <img src="{{ asset($product->product_img) }}" alt="รูปภาพสินค้า"
                class="max-w-full max-h-64 object-contain p-4">
        </div>

        <!-- รายละเอียดสินค้า -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 w-full">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $product->product_name }}</h2>
            <p class="text-red-500 font-bold text-lg mt-2">฿{{ $product->price }}</p>
            <p class="text-gray-600 mt-4 leading-relaxed">{{ $product->product_long_des }}</p>

            <!-- ข้อมูลหมวดหมู่ -->
            <div class="bg-gray-100 p-4 mt-6 rounded-lg shadow-inner">
                <p class="text-gray-700"><strong>หมวดหมู่:</strong> {{ $product->product_category_name }}</p>
                <p class="text-gray-700"><strong>หมวดหมู่ย่อย:</strong> {{ $product->product_subcategory_name }}</p>
                <p class="text-gray-700"><strong>จำนวนคงเหลือ:</strong> {{ $product->quantity }} ชิ้น</p>
            </div>
            <br>

            <!-- ปุ่มเพิ่มลงตะกร้า -->
            <form action="{{ route('addproducttocart') }}" method="POST"
                class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="{{ $product->price }}" name="price">

                <!-- จำนวนที่ต้องการซื้อ -->
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700 font-semibold mb-2">จำนวนที่ต้องการซื้อ</label>
                    <input type="number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none"
                        min="1" value="1" name="quantity" required>
                </div>

                <button type="submit"
                    class="w-full bg-yellow-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-yellow-600 transition-all shadow-md">
                    🛒 เพิ่มลงตะกร้า
                </button>
            </form>
        </div>
    </div>
</section>

<!-- สินค้าที่เกี่ยวข้อง -->
<section id="best-sellers" class="best-sellers product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
            <h4 class="text-uppercase">สินค้าใกล้เคียง</h4>
        </div>

        <div class="swiper product-swiper open-up" data-aos="zoom-out">
            <div class="swiper-wrapper d-flex">
                @foreach ($related_products as $product)
                <div class="swiper-slide">
                    <div class="product-item image-zoom-effect link-effect">
                        <div class="image-holder">
                            <a href="{{route('singleproduct',[$product->id,$product->slug])}}">
                                <img src="{{ asset($product->product_img) }}" alt="categories"
                                    class="product-image img-fluid"
                                    style="width: 300px; height: 300px; object-fit: cover; border-radius: 10px;">
                            </a>

                            <a href="{{route('singleproduct',[$product->id,$product->slug])}}"
                                class="btn-icon btn-wishlist">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <use xlink:href="#heart"></use>
                                </svg>
                            </a>

                            <div class="product-content">
                                <h5 class="text-uppercase fs-5 mt-3">
                                    <a href="{{route('singleproduct',[$product->id,$product->slug])}}">
                                        {{ $product->product_name }}
                                    </a>
                                </h5>

                                <span>฿{{ $product->price }}</span>

                                <form action="{{ route('addproducttocart') }}" method="POST"
                                    class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->quantity }}" name="quantity">

                                    <button type="submit"
                                        class="w-full bg-yellow-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-yellow-600 transition-all shadow-md">
                                        🛒 เพิ่มลงตะกร้า
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>

        <!-- ลูกศรเลื่อนสไลด์ -->
        <div class="icon-arrow icon-arrow-left absolute top-1/2 left-4 -translate-y-1/2 z-10 cursor-pointer transition-transform duration-300 hover:scale-110 active:scale-95">
  <button class="flex items-center justify-center w-12 h-12 bg-purple-600 text-white rounded-full shadow-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
    </svg>
  </button>
</div>

<!-- Arrow Right -->
<div class="icon-arrow icon-arrow-right absolute top-1/2 right-4 -translate-y-1/2 z-10 cursor-pointer transition-transform duration-300 hover:scale-110 active:scale-95">
  <button class="flex items-center justify-center w-12 h-12 bg-purple-600 text-white rounded-full shadow-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
    </svg>
  </button>
</div>
    </div>
</section>
@endsection
