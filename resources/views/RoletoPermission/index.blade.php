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
    <a href="{{ route('rolepermissions.create') }}"  class="btn btn-info">Add Role to permission</a>
    <h3>Role List</h3>
 <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
           
            <th>Role ID</th>
             <th>Permission ID</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php $keyid=1;?>
        @foreach($rolepermissions as $rolepermission)
            <tr>
                <td scope="row">{{$keyid++}}</td>
                <td>{{urrole($rolepermission->role_id)}}</td>
            <td> {{userpermission($rolepermission->permission_id)}}</td>
                              
               
                <td>
                    <a href="{{ route('rolepermissions.edit',$rolepermission->role_id) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="{{ route('rolepermissions.destroy',$rolepermission->role_id) }}" method="POST">
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
