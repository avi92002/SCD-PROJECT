@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 m-0">Shopping Cart</h1>
    @if(count($products) > 0)
        <form action="{{ route('cart.clear') }}" method="post" onsubmit="return confirm('Clear entire cart?');">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Clear Cart</button>
        </form>
    @endif
</div>

@if(count($products) > 0)
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @php
                                    $raw = $item['product']->image_url;
                                    $isExternal = \Illuminate\Support\Str::startsWith($raw, ['http://','https://']);
                                    $src = $isExternal ? $raw : asset(ltrim($raw ?? '', '/'));
                                @endphp
                                <img src="{{ $src ?: asset('images/placeholder-product.svg') }}" 
                                     alt="{{ $item['product']->name }}" 
                                     style="width: 80px; height: 80px; object-fit: cover;" 
                                     class="rounded">
                                <div>
                                    <h6 class="mb-0">{{ $item['product']->name }}</h6>
                                    <small class="text-muted">{{ $item['product']->category?->name }}</small>
                                </div>
                            </div>
                        </td>
                        <td>${{ number_format($item['product']->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item['product']) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}" class="form-control form-control-sm" style="width: 80px;" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td class="fw-semibold">${{ number_format($item['subtotal'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['product']) }}" method="post" onsubmit="return confirm('Remove from cart?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total:</td>
                    <td class="fw-bold fs-5">${{ number_format($total, 2) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Continue Shopping</a>
        <button class="btn btn-primary" disabled>Checkout (Coming Soon)</button>
    </div>
@else
    <div class="text-center py-5">
        <p class="text-muted mb-3">Your cart is empty!</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Browse Products</a>
    </div>
@endif
@endsection


