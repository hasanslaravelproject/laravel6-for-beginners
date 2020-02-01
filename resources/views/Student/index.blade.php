@extends('frontend.master')
@section('content')
   <div class="col-12">
    <a href="{{ route('students.create') }}"  class="btn btn-info">Add New Student</a>
    <h3>Students List</h3>
<input name="search1" id="search1" class="form-control" placeholder="Enter Keyword"/>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>first_name</th>
            <th>middle_name</th>
            <th>last_name</th>
            <th>address</th>
            <th>date_of_birth</th>
            <th>place_of_birth</th>
            <th>age</th>
             <th>gender</th>
            <th>year</th>
            <th>status</th>
            <th>guardian</th>
            <th>relation</th>
             <th>g_address</th>
             <th>contact</th>
          
        </tr>
        </thead>
         <tbody id="search_view">
       
        <?php $keyid=1;
        
        
        ?>

        
        @foreach($students_list as $student)
            <tr>
                <td scope="row">{{$keyid++}}</td>
                <td>{{$student->first_name}}</td>
                <td>{{$student->middle_name}}</td>
                
                <td>{{$student->last_name}}</td>
                <td>{{$student->address}}</td>
               
                <td>{{$student->date_of_birth}}</td>
                  <td>{{$student->place_of_birth}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->gender}}</td>
                               
                                 
                <td>{{$student->year}}</td>
                <td>{{$student->status}}</td>
               
                <td>{{$student->guardian}}</td>
                <td>{{$student->relation}}</td>
                <td>{{$student->g_address}}</td>
               
                <td>{{$student->contact}}</td>
                <td>
                    <a href="{{ route('students.edit',$student->id) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="{{ route('students.destroy',$student->id) }}" method="POST">
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
 $('#search1').on('keyup',function(){
    var keyword1=$( this ).val();
       $.ajax({
        url: '{{URL::to('/abc')}}',
        type: "get",
        data: { keyword : keyword1},
        success: function(data){
           console.log(data);

           //table  er body id #search_data_view
           $("#search_view").html(data);
        }
    });
 })


</script> 
@endsection




