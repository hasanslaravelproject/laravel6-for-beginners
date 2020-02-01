<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <a href="{{ route('employees.create') }}"  class="btn btn-info">Add New Employee</a>
    <h3>Employee List</h3>
    <input name="search" id="search" class="form-control" placeholder="Enter Keyword"/>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th> 
            <th>Password</th>
            <th>City of Employment</th>
            <th>Web Server</th>
            <th>Role</th>            
            <th>Sign On</th>
            <th>Action</th>
          
          
        </tr>
        </thead>
        <tbody id="search_data_view">

        <?php $keyid=1;
        
        
        ?>

        
        @foreach($hi as $employee)
            <tr>
                <td scope="row">{{$keyid++}}</td>
                <td>{{$employee->user_name }}</td>
                <td>{{$employee->password}}</td>
                <td>{{$employee->city_of_employment}}</td>
                <td>{{$employee->web_server}}</td>
                  <td>{{$employee->role}}</td>
                <td><?php $jdata=json_decode($employee->sign_on);
                        foreach ($jdata as $key => $value) {
                        echo '<input type="checkbox" name="" value="'.$value.'">'.$value .",";
                        }
                ?></td>
               
                
               <td>
                    <a href="{{ route('employees.edit',$employee->id) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
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

<script>
 $('#search').on('keyup',function(){
    var keyword1=$( this ).val();
       $.ajax({
        url: '{{URL::to('employeesdata')}}',
        type: "get",
        data: { keyword : keyword1},
        success: function(data){
           // console.log(data);

           //table  er body id #search_data_view
           $("#search_data_view").html(data);
        }
    });
 })


</script>




</body>
</html>