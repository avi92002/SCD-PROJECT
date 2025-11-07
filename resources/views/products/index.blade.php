@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 m-0">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
  </div>

<form method="get" action="{{ route('products.index') }}" class="row g-2 mb-4">
    <div class="col-12 col-md-6">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search by name or description">
    </div>
    <div class="col-12 col-md-4">
        <select name="category_id" class="form-select">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category_id')==$category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-2 d-grid">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </form>

<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
  @forelse($products as $product)
    <div class="col">
      <div class="card h-100 shadow-sm product-card">
        @php
          $raw = $product->image_url;
          $isExternal = \Illuminate\Support\Str::startsWith($raw, ['http://','https://']);
          $src = $isExternal ? $raw : asset(ltrim($raw ?? '', '/'));
        @endphp
        <img src="{{ $src ?: asset('images/placeholder-product.svg') }}?v={{ time() }}"
             class="card-img-top object-fit-cover" alt="{{ $product->name }}" style="height: 200px;"
             loading="lazy"
             onerror="this.onerror=null;this.src='{{ asset('images/placeholder-product.svg') }}';">
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <h2 class="h6 card-title mb-0"><a class="text-decoration-none" href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h2>
            <span class="badge text-bg-secondary">{{ $product->category?->name }}</span>
          </div>
          <p class="text-muted small mb-2">{{ $product->slug }}</p>
          @if($product->description)
            <details class="small mb-2"><summary>Details</summary><div class="mt-1">{{ \Illuminate\Support\Str::limit($product->description, 160) }}</div></details>
          @endif
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <div class="h6 mb-0">${{ number_format($product->price, 2) }}</div>
            <div class="text-muted small">Stock: {{ $product->stock }}</div>
          </div>
        </div>
        <div class="card-footer bg-white d-flex gap-2 justify-content-between">
          <form action="{{ route('cart.add', $product) }}" method="post" class="d-inline">
            @csrf
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn btn-sm btn-success" @if($product->stock < 1) disabled @endif>
              Add to Cart
            </button>
          </form>
          <div class="d-flex gap-2">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="post" onsubmit="return confirm('Delete this product?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div class="col"><div class="text-center text-muted">No products found</div></div>
  @endforelse
</div>

<div class="mt-4">{{ $products->links() }}</div>
@endsection


