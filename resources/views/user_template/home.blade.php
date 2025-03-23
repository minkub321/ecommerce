@extends('user_template.layouts.template')
@section('main-content')

<section id="best-sellers" class="bg-light py-5 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="row justify-content-center">
            <h1 class="section-title text-center mt-4 text-3xl font-bold text-gray-800" data-aos="fade-up">
                3 อันดับสินค้าขายดี
            </h1>
            <div class="col-md-6 text-center mt-2 text-gray-600" data-aos="fade-up" data-aos-delay="300">
                <p class="text-base">
                    สินค้าขายดีอันดับต้น ๆ ที่ลูกค้าเลือกซื้อบ่อยที่สุด พร้อมให้คุณจับจองแล้ววันนี้!
                </p>
            </div>
        </div>
        <div class="row mt-6">
            @if ($bestSellingProducts->count() > 0)
                <div class="swiper main-swiper py-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="swiper-wrapper d-flex border-animation-left">
                        @foreach ($bestSellingProducts->take(3) as $index => $product)
                            <div class="swiper-slide">
                                <div class="banner-item image-zoom-effect bg-white rounded-2xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                                    <div class="image-holder" style="height: 300px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                        <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">
                                            <img src="{{ asset($product->product_img) }}"
                                                alt="{{ $product->product_name }}"
                                                class="img-fluid max-h-full object-cover transition-transform duration-300 hover:scale-105">
                                        </a>
                                    </div>

                                    <div class="banner-content py-4 text-center px-4">
                                        <h5 class="element-title text-uppercase text-lg font-semibold text-gray-700 mb-2">
                                            {{ ($index + 1) . '. ' . $product->product_name }}
                                        </h5>
                                        <p class="text-gray-700 font-medium">฿{{ $product->price }}</p>
                                        <div class="btn-left mt-3">
                                        <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}" class="btn btn-warning w-100 fw-semibold shadow-sm hover:shadow-md transition-all">ดูรายระเอียดสิ้</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination mt-4"></div>
                </div>
                <div class="icon-arrow icon-arrow-left">
                    <svg width="50" height="50" viewBox="0 0 24 24" class="text-indigo-500 hover:text-indigo-700 transition duration-300">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                </div>
                <div class="icon-arrow icon-arrow-right">
                    <svg width="50" height="50" viewBox="0 0 24 24" class="text-indigo-500 hover:text-indigo-700 transition duration-300">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </div>
            @else
                <p class="text-center w-100 text-gray-500">ไม่มีสินค้าขายดี</p>
            @endif
        </div>
    </div>
</section>

@php
// จัดกลุ่มสินค้าแยกตามหมวดหมู่
$groupedProducts = $allproducts->groupBy('product_category_name');
@endphp

@foreach ($groupedProducts as $categoryName => $products)
<section class="product-carousel py-5 position-relative overflow-hidden" id="category-{{ Str::slug($categoryName) }}">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">{{ $categoryName }}</h4>
      <a href="{{ route('producting') }}" class="text-yellow-500 hover:underline font-medium">ดูสินค้าทั้งหมด</a>
    </div>

    <div class="swiper product-swiper open-up" data-aos="zoom-out">
      <div class="swiper-wrapper d-flex">
        @foreach ($products as $product)
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">
                <img src="{{ asset($product->product_img) }}" alt="{{ $product->product_name }}"
                  class="product-image img-fluid"
                  style="width: 300px; height: 300px; object-fit: cover; border-radius: 10px;">
              </a>

              <a href="#" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>

              <div class="product-content mt-3">
                <h5 class="text-uppercase fs-5">
                  <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">
                    {{ $product->product_name }}
                  </a>
                </h5>
                <p class="mb-1">💰 ราคา {{ $product->price }} บาท</p>
                <p class="mb-2">📦 คงเหลือ {{ $product->quantity }} ชิ้น</p>

                <form action="{{ route('addproducttocart') }}" method="POST"
                  class="bg-white p-3 rounded-lg shadow w-100">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="hidden" name="price" value="{{ $product->price }}">
                  <input type="hidden" name="quantity" value="1">

                  <button type="submit"
                    class="w-full bg-yellow-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-yellow-600 transition-all shadow-md">
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

    <!-- ปุ่มเลื่อน Swiper -->
    





    <!-- Arrow Left -->
<!-- Arrow Left -->
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
@endforeach


@endsection
