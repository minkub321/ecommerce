@extends('user_template.layouts.template')
@section('main-content')


<section class="py-5" x-data="{ selected: 'all' }">
  <div class="container">


    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
      <h2 class="text-uppercase mb-3">
        {{ $category->category_name }} ({{ $products->count() }})
      </h2>
      <div class="d-flex align-items-center gap-2">
        <label class="form-label me-2 fw-semibold">กรองหมวดย่อย:</label>
        <select class="form-select w-auto" x-model="selected">
          <option value="all">📦 ทั้งหมด</option>
          @foreach ($groupedSubcategories as $subName => $items)
            <option :value="'{{ e($subName) }}'">{{ $subName }}</option>
          @endforeach
        </select>
      </div>
    </div>

   
    <div x-show="selected === 'all'" x-cloak>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($products as $product)
          <div class="col">
            @include('user_template.includes.product-card', ['product' => $product])
          </div>
        @endforeach
      </div>
    </div>

  
    @foreach ($groupedSubcategories as $subName => $items)
      <div x-show="selected === '{{ $subName }}'" x-cloak>
        <h5 class="text-muted fw-bold mb-4 border-bottom pb-2">{{ $subName }}</h5>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          @foreach ($items as $product)
            <div class="col">
              @include('user_template.includes.product-card', ['product' => $product])
            </div>
          @endforeach
        </div>
      </div>
    @endforeach

  </div>
</section>


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


<style>
  [x-cloak] { display: none !important; }
</style>

@endsection
