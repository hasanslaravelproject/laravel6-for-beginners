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

    <form action="{{ route('permissions.update',$permissions->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($permissions))
            <input type="hidden" name="id" value="{{ $permissions->id }}">
        @endif
        <div class="form-group">
            <label for="">Permission Name</label>
            <input type="text" name="name" placeholder="Permission name" class="form-control" value="{{isset($permissions->name) ? $permissions->name : ''}}">
        </div>

        <div class="form-group">
            <label for="">Guard Name</label>
            <input type="text" name="guard_name" placeholder="guard_name" class="form-control" value="{{isset($permissions->guard_name) ? $permissions->guard_name : ''}}" >
        </div>

        
        <button class ="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>
