@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 m-0">Edit Product</h1>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
  </div>

<form method="post" action="{{ route('products.update', $product) }}" class="row g-3">
    @csrf
    @method('PUT')
    <div class="col-12 col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" class="form-control" required>
        @error('slug')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Image URL</label>
        <input type="url" name="image_url" value="{{ old('image_url', $product->image_url) }}" class="form-control" placeholder="https://...">
        @error('image_url')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
        @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
        @error('price')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
        @error('stock')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id)==$category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </div>
</form>
@endsection


