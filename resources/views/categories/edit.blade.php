@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 m-0">Edit Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
  </div>

<form method="post" action="{{ route('categories.update', $category) }}" class="row g-3">
    @csrf
    @method('PUT')
    <div class="col-12 col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="form-control" required>
        @error('slug')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </div>
</form>
@endsection


