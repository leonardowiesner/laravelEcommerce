@extends('layouts.master')
{{-- la herenia de layouts master nos permite tener una estructura head y body unica para todas las blades
mejorando la modularidad del proyecto --}}

@section('content')
<h1>List of products</h1>

    <a class="btn btn-success" href="{{ route('products.create')}}">Create</a>
    {{-- verificar si la lista de productos esta vacia --}}
    @empty ($products)
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            {{-- por cada elemento que tenemos en producto vamos a mostrar un elemento en la tabla --}}
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                        <a class="btn btn-link" href="{{ route('products.show', ['product' => $product->id]) }}">Show</a>
                        
                        <a class="btn btn-link" href="{{route('products.edit', ['product' => $product->id])}}">Edit</a>

                        <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty
@endsection
