<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permissions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a href="{{ route('permissions.index') }}" >Permissions List</a>

    <form action="{{ route('permissions.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Permission Name</label>
            <input type="text" name="name" placeholder="Permission name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="">Guard Name</label>
            <input type="text" name="guard_name" placeholder="guard_name" class="form-control" >
        </div>
 <button class ="btn btn-success">Submit</button>
        
    </form>
</div>

</body>
</html>
