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
    <a href="{{ route('products.create') }}" >Product List</a>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" name="name" placeholder="product name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="">Product Category</label>
            <input type="text" name="category" placeholder="product category" class="form-control" >
        </div>

        <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" name="image" placeholder="product image" class="form-control" >
        </div>

        <div class="form-group">
            <label for="">Product Brand</label>
            <input type="text" name="brand" placeholder="product brand" class="form-control" >
        </div>


        <div class="form-group">
            <label for="">Product Size</label>
            <input type="text" name="size" placeholder="product size" class="form-control" >
        </div>

        <div class="form-group">
            <label for="">Product Color</label>
            <input type="color" name="color" placeholder="product color" class="form-control col-md-6 offset-3" >
        </div>

        <div class="form-group">
            <label for="">Product price</label>
            <input type="number" name="price" placeholder="product price" class="form-control col-md-6 offset-3" >
        </div>

        <button class ="btn btn-success">Submit</button>

    </form>
</div>

</body>
</html>
