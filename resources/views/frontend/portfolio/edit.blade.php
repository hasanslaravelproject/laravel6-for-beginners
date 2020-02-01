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
    <a href="{{ route('students.create') }}">Students List</a>

    <form action="{{ route('students.update', $students->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($students))
            <input type="hidden" name="id" value="{{ $students->id }}">
        @endif

        <div class="form-group">
            <label for="">first_name</label>
            <input type="text" name="first_name" placeholder="first_name" class="form-control" value="{{isset($students->first_name) ? $students->first_name : ''}}">
        </div>

           <div class="form-group">
            <label for="">middle_name</label>
            <input type="text" name="middle_name" placeholder="middle_name" class="form-control" value="{{isset($students->middle_name) ? $students->middle_name : ''}}">
        </div>

          <div class="form-group">
            <label for="">last_name</label>
            <input type="text" name="last_name" placeholder="last_name" class="form-control" value="{{isset($students->last_name) ? $students->last_name : ''}}">
        </div>

        <div class="form-group">
            <label for="">address</label>
            <input type="text" name="address" placeholder="address" class="form-control" value="{{isset($students->address) ? $students->address : ''}}">
        </div>

         <div class="form-group">
            <label for="">date_of_birth</label>
            <input type="text" name="date_of_birth" placeholder="date_of_birth" class="form-control"value="{{isset($students->date_of_birth) ? $students->date_of_birth : ''}}" >
        </div>

         <div class="form-group">
            <label for="">place_of_birth</label>
            <input type="text" name="place_of_birth" placeholder="place_of_birth" class="form-control" value="{{isset($students->place_of_birth) ? $students->place_of_birth : ''}}">
        </div>

         <div class="form-group">
            <label for="">age</label>
            <input type="text" name="age" placeholder="age" class="form-control" value="{{isset($students->age) ? $students->age : ''}}">
        </div>

       
             <label class="col-md-2">Gender:</label>
            <div class="col-md-6">
                 <input type=radio name="gender" {{ $students->gender == 'Male' ? 'checked' : ''}} value="Male" >Male</option>
                 <input type=radio name="gender" {{ $students->gender == 'Female' ? 'checked' : ''}} value="Female" >Female</option>
            </div>

       
          <div class="form-group">
            <label for="">year</label>
            <select name="year" class="form-control">
                <option value="">Year</option>
                <?php for($i=1970; $i<=2020;$i++){?>
                <option value="{{$i}}" @if($students->year==$i){{ 'selected' }}@endif>{{ $i }}</option>
                <?php } ?>

            </select>
            
        </div>

         <div class="form-group">
            <label for="">status</label>
            <input type="text" name="status" placeholder="status" class="form-control"value="{{isset($students->status) ? $students->status : ''}}" >
        </div>

        <div class="form-group">
            <label for="">guardian	</label>
            <input type="text" name="guardian" placeholder="guardian" class="form-control" value="{{isset($students->guardian) ? $students->guardian : ''}}">
        </div>

        <div class="form-group">
            <label for="">relation</label>
            <input type="text" guardian="relation" placeholder="relation" class="form-control" value="{{isset($students->relation) ? $students->relation : ''}}">
        </div>
        <div class="form-group">
            <label for="">g_address</label>
            <input type="text" name="g_address" placeholder="g_address" class="form-control" value="{{isset($students->ng_addressame) ? $students->g_address : ''}}">
        </div>

        <div class="form-group">
            <label for="">contact</label>
            <input type="text" name="contact" placeholder="contact" class="form-control" value="{{isset($students->contact) ? $students->contact : ''}}">
        </div>


        <button class ="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>
