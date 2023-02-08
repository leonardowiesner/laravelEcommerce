<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){

        return view ('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(){ 

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:1'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);  //verifica las condiciones del array 

        if (request()->status == 'available' && request()->stock ==0){
            // PARA VERIFICAR SI EL STOCK ES MAYOR A 0 
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock');
        }
        
        $product = Product::create(request()->all());
        // El redirect para hacer que el usuario vuelva a la ruta especificada 
        return redirect()
            ->route('products.index')
            ->withSuccess("'The new product with id {$product->id} was created'");
    }

    public function show($product){

        $product = Product::findOrFail ($product);
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit($product){
        return view ('products.edit')->with([
            'product' => Product::findOrFail($product), 
        ]);

    }

    public function update($product){
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:1'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);  //verifica las condiciones del array 
        $product = Product::findOrFail($product);

        $product->update(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }
    // eliminar un producto
    public function destroy($product){
        $product = Product::findOrFail($product);

        $product->delete();

        return redirect()
        ->route('products.index')
        ->withSuccess("The product with id {$product->id} was removed");

    }

}
