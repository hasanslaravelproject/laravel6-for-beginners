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
    <a href="{{ route('userhasroles.create') }}"  class="btn btn-info">Add user role</a>
    <h3>userroles List</h3>
 <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
           
            <th>User ID</th>
             <th>name</th>
                   <th>Role</th>
             <th>email</th>          
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php $keyid=1;?>
        @foreach($userroles as $userrole)
            <tr>
                <td scope="row">{{$keyid++}}</td>
                <td>{{ $userrole->id }}</td>
   <td>{{ $userrole->name }}</td>
                <td>
                    @foreach($userrole->getRoleNames() as $value)
                    <button class="btn btn-info">{{ $value }}</button>
                    @endforeach
                </td>
                   <td>{{ $userrole->email }}</td>
                    
            
                              
               
                <td>
                    <a href="{{ route('userhasroles.edit',$userrole->id) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="{{ route('userhasroles.destroy',$userrole->id) }}" method="POST">
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
