<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List of products</h1>

    @if (empty($products))
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
                </tr>

                @endforeach
                <tr>
                    <td>1</td>
                    <td>Shampoo</td>
                    <td>Best shampoo ever</td>

                </tr>
            </tbody>
        </table>
    </div>
    @endif

</body>
</html>