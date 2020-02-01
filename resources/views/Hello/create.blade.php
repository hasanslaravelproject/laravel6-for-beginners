
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
    <a href="{{ route('hellos.create') }}" >Server create</a>

    <form action="{{ route('hellos.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">server_name</label>
            <input type="text" name="server_name" placeholder="server_name" class="form-control" >
        </div>

           <div class="form-group">
            <label for="">status</label>
            <input type="text" name="status" placeholder="status" class="form-control" >
        </div>

        <button class ="btn btn-success">submit</button>
        
    </form>
</div>

</body>
</html>
