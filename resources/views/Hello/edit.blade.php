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
    <a href="{{ route('hellos.create') }}">Server List</a>

    <form action="{{ route('hellos.update', $hellos->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($hellos))
            <input type="hidden" name="id" value="{{ $hellos->id }}">
        @endif

       
        <div class="form-group">
            <label for="">server_name</label>
            <input type="text" name="server_name" placeholder="server_name" class="form-control" value="{{isset($hellos->server_name) ? $hellos->server_name : ''}}"> >
        </div>

           <div class="form-group">
            <label for="">status</label>
            <input type="text" name="status" placeholder="status" class="form-control" value="{{isset($hellos->status) ? $hellos->status : ''}}">>
        </div>

          
        <button class ="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>