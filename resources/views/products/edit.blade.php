@extends('layouts.master')
{{-- la herenia de layouts master nos permite tener una estructura head y body unica para todas las blades
mejorando la modularidad del proyecto --}}

@section('content')
<h1>Edit a product</h1>
<form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
    {{-- medida de proteccion para el formulario para que las solicitudes (post, get, patch) solo vengan del mismo programa  --}}
    @csrf
    @method('PUT')
    <div class="form-row">
        <label>Title</label>
        <input class="form-control" type="text" name="title" value="{{ $product->title 
        }}"required>
    </div>
    <div class="form-row">
        <label>Description</label>
        <input class="form-control" type="text" name="description" value="{{ $product->description }}"required>
    </div>
    <div class="form-row">
        <label>Price</label>
        <input class="form-control" type="number" min="1.00" step="0.01" name="price"
        value="{{ $product->price }}" required>
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input class="form-control" type="number" min="0" name="stock" value="{{ $product->stock }}"required>
    </div>

    <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status" required>
            <option {{ $product->status == 'available' ? 'selected' : '' </option>}} value="available">Available</option>
            <option {{ $product->status == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
    </div>
</form>

@endsection