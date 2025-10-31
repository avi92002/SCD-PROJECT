@extends('layouts.app')

@section('content')
<div class="row g-4">
  <div class="col-12 col-lg-8">
    @php
      $raw = $product->image_url;
      $isExternal = \Illuminate\Support\Str::startsWith($raw, ['http://','https://']);
      $src = $isExternal ? $raw : asset(ltrim($raw ?? '', '/'));
    @endphp
    <img src="{{ $src ?: asset('images/placeholder-product.svg') }}"
         class="img-fluid rounded mb-3" alt="{{ $product->name }}"
         loading="lazy"
         onerror="this.onerror=null;this.src='{{ asset('images/placeholder-product.svg') }}';">
    <h1 class="h3">{{ $product->name }}</h1>
    <div class="text-muted mb-2">Slug: {{ $product->slug }}</div>
    <div class="mb-3"><span class="badge bg-secondary">{{ $product->category?->name }}</span></div>
    <p class="lead">${{ number_format($product->price, 2) }}</p>
    <p>{{ $product->description }}</p>
  </div>
  <div class="col-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <div class="mb-2"><strong>Stock:</strong> {{ $product->stock }}</div>
        <div class="d-flex gap-2">
          <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-primary">Edit</a>
          <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


