<div class="bg-white border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
  <div class="position-relative">
    <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">
      <img src="{{ asset($product->product_img) }}"
           alt="{{ $product->product_name }}"
           class="img-fluid w-100"
           style="height: 250px; object-fit: cover; border-radius: .5rem .5rem 0 0;">
    </a>
    <a href="#" class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
      <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
        <use xlink:href="#heart"></use>
      </svg>
    </a>
  </div>

  <div class="p-3">
    <h5 class="text-uppercase fs-6 mb-1">
      <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}" class="text-dark text-decoration-none">
        {{ $product->product_name }}
      </a>
    </h5>
    <p class="text-muted small mb-2">💰 {{ number_format($product->price) }} บาท</p>
    <p class="text-muted small mb-3">📦 คงเหลือ: {{ $product->quantity }} ชิ้น</p>

    <form action="{{ route('addproducttocart') }}" method="POST">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <input type="hidden" name="price" value="{{ $product->price }}">
      <input type="hidden" name="quantity" value="1">
      <button type="submit" class="btn btn-warning w-100 fw-bold">
        🛒 เพิ่มใส่ตะกร้า
      </button>
    </form>
  </div>
</div>
