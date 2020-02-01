<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <a href="{{ route('products.create') }}"  class="btn btn-info">Add New Product</a>
    <h3>Product List</h3>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Image</th>
            <th>Brand</th>
            <th>Size</th>
            <th>Color</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php $keyid=1;?>
        @foreach($products as $product)
            <tr>
                <td scope="row">{{$keyid++}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td class="d-none d-sm-table-cell">
                            <span class="font-size-sm text-muted">
                                <img src="{{ asset('/upload/'.$product->image) }}" alt=""
                                     style="width:150px;"
                                     class="img-thumbnail">
                            </span>
                </td>
                <td>{{$product->brand}}</td>
                <td>{{$product->size}}</td>
                <td>
                    <button style="background:{{$product->color}};height: 30px; width: 30px;"></button>
                </td>
                <td>{{$product->status}}</td>
                <td>
                    <a href="{{ route('products.edit',$product->id) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
