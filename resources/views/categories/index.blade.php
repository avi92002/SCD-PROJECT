@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 m-0">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
  </div>

<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
  @forelse($categories as $category)
    <div class="col">
      <div class="border rounded-3 p-3 d-flex align-items-center justify-content-between hover-lift">
        <div>
          <div class="fw-semibold">{{ $category->name }}</div>
          <div class="text-muted small">/{{ $category->slug }}</div>
        </div>
        <div class="text-nowrap">
          <a href="{{ route('products.index', ['category_id' => $category->id]) }}" class="btn btn-sm btn-outline-secondary">View</a>
          <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary">Edit</a>
        </div>
      </div>
    </div>
  @empty
    <div class="col"><div class="text-muted">No categories</div></div>
  @endforelse
</div>

<div class="mt-4">{{ $categories->links() }}</div>
@endsection


