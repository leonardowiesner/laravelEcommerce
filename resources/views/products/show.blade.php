@extends('layouts.master')
{{-- la herenia de layouts master nos permite tener una estructura head y body unica para todas las blades
mejorando la modularidad del proyecto --}}

@section('content')
    <h1>{{$product->title}} ({{$product->id}})</h1>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->stock}}</p>
    <p>{{$product->status}}</p>

@endsection
