@extends('user_template.layouts.template')
@section('main-content')

<section id="best-sellers" class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
      <h2 class="text-2xl font-bold uppercase text-gray-800">สินค้าทั้งหมด</h2>

      {{-- Dropdown หมวดหมู่ --}}
      @php $categories = App\Models\Category::latest()->get(); @endphp
      <div x-data="{ open: false }" class="relative mt-4 md:mt-0">
        <button @click="open = !open"
          class="bg-yellow-500 text-white px-5 py-2 rounded-md shadow hover:bg-yellow-600 transition flex items-center gap-2">
          🗂️ หมวดหมู่สินค้า
          <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <ul x-show="open" @click.away="open = false" x-transition
          class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
          @foreach ($categories as $category)
            <li>
              <a href="{{ route('category', [$category->id, $category->slug]) }}"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 transition duration-150">
                🏷️ {{ $category->category_name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    {{-- Grid แสดงสินค้า --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach ($allproducts as $product)
        <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
          <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">
            <img src="{{ asset($product->product_img) }}" alt="{{ $product->product_name }}"
              class="w-full h-60 object-cover">
          </a>
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-700 hover:text-yellow-500 transition">
              <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">
                {{ $product->product_name }}
              </a>
            </h3>
            <p class="text-gray-600 mt-1">💰 ราคา: {{ $product->price }} บาท</p>
            <p class="text-gray-600">📦 คงเหลือ: {{ $product->quantity }} ชิ้น</p>

            <form action="{{ route('addproducttocart') }}" method="POST" class="mt-4">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="price" value="{{ $product->price }}">

              <label for="quantity_{{ $product->id }}"
                class="block text-sm font-medium text-gray-700 mb-1">จำนวน:</label>
              <input id="quantity_{{ $product->id }}" type="number" name="quantity" min="1" value="1" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500 outline-none mb-3">

              <button type="submit"
                class="w-full bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition">
                🛒 หยิบใส่ตะกร้า
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
