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
    <a href="{{ route('roles.create') }}" >Role List</a>

    <form action="{{ route('roles.update',$roles->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($roles))
            <input type="hidden" name="id" value="{{ $roles->id }}">
        @endif
        <div class="form-group">
            <label for="">Role Name</label>
            <input type="text" name="name" placeholder="Role name" class="form-control" value="{{isset($roles->name) ? $roles->name : ''}}">
        </div>

        <div class="form-group">
            <label for="">Guard Name</label>
            <input type="text" name="guard_name" placeholder="guard_name" class="form-control" value="{{isset($roles->guard_name) ? $roles->guard_name : ''}}" >
        </div>

        
        <button class ="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>
