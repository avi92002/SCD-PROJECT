@extends('layouts.app')

@section('content')
<section class="hero position-relative overflow-hidden rounded-4 p-4 p-md-5 mb-5 text-white" style="background: linear-gradient(120deg, #0d6efd, #6610f2);">
  <div class="row align-items-center g-4">
    <div class="col-12 col-lg-6">
      <h1 class="display-6 fw-bold mb-3">Premium Bike Spare Parts</h1>
      <p class="lead mb-4">Everything you need to keep your ride smooth and fast. Discover quality parts, unbeatable prices, and trusted brands.</p>
      <div class="d-flex gap-2">
        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Shop Products</a>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-light btn-lg">Browse Categories</a>
      </div>
    </div>
    <div class="col-12 col-lg-6 text-center">
      <img class="img-fluid hero-illustration"
           src="https://images.unsplash.com/photo-1517940310602-75bcce8ed2f6?q=80&w=1400&auto=format&fit=crop"
           alt="Bike parts"
           loading="lazy"
           onerror="this.onerror=null;this.src='{{ asset('images/placeholder-product.svg') }}';">
    </div>
  </div>
</section>

<section class="mb-5">
  <h2 class="h4 mb-3">Featured Products</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
    @forelse($featuredProducts as $product)
      <div class="col">
        <div class="card h-100 shadow-sm">
          @php
            $raw = $product->image_url;
            $isExternal = \Illuminate\Support\Str::startsWith($raw, ['http://','https://']);
            $src = $isExternal ? $raw : asset(ltrim($raw ?? '', '/'));
          @endphp
          <img src="{{ $src ?: asset('images/placeholder-product.svg') }}"
               class="card-img-top object-fit-cover" style="height: 180px;" alt="{{ $product->name }}"
               loading="lazy"
               onerror="this.onerror=null;this.src='{{ asset('images/placeholder-product.svg') }}';">
          <div class="card-body d-flex flex-column">
            <h3 class="h6 mb-1">{{ $product->name }}</h3>
            <div class="text-muted small mb-2">{{ $product->category?->name }}</div>
            <div class="mt-auto d-flex justify-content-between align-items-center">
              <span class="fw-semibold">${{ number_format($product->price, 2) }}</span>
              <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col"><div class="text-muted">No featured products yet.</div></div>
    @endforelse
  </div>
</section>

<section>
  <h2 class="h4 mb-3">Top Categories</h2>
  <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">
    @forelse($topCategories as $category)
      <div class="col">
        <a href="{{ route('products.index', ['category_id' => $category->id]) }}" class="text-decoration-none">
          <div class="border rounded-3 p-3 text-center hover-lift bg-white">
            <div class="fw-semibold">{{ $category->name }}</div>
          </div>
        </a>
      </div>
    @empty
      <div class="col"><div class="text-muted">No categories yet.</div></div>
    @endforelse
  </div>
</section>
@endsection


