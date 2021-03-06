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
    <a href="{{ route('employees.create') }}">employees List</a>

    <form action="{{ route('employees.update', $employees->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($employees))
            <input type="hidden" name="id" value="{{ $employees->id }}">
        @endif

       
        <div class="form-group">
            <label for="">user_name</label>
            <input type="text" name="user_name" placeholder="user_name" class="form-control" value="{{isset($employees->user_name) ? $employees->user_name : ''}}"> 
        </div>

           <div class="form-group">
            <label for="">password</label>
            <input type="text" name="password" placeholder="password" class="form-control" value="{{isset($employees->password) ? $employees->password : ''}}">
        </div>

          <div class="form-group">
            <label for="">city_of_employment</label>
            <input type="text" name="city_of_employment" placeholder="city_of_employment" class="form-control" value="{{isset($employees->city_of_employment) ? $employees->city_of_employment : ''}}"> 
        </div>

<div class="form-group">
            <label for="">web_server</label>
          
            <select name="web_server" class="form-control">
                                   
                <option value="">--Choose a server--</option>
                @foreach ($hellos as $item)
            <option value="{{$item->id}}">{{$item->server_name}}</option>
                @endforeach
           
            </select>
      <br>
            <div class="form-group">
                <label for="">Role</label>
                 <input type=radio name="role" value="Admin" checked >Admin</option>
                 <input type=radio name="role" value="Engineer" checked>Engineer</option>
                <input type=radio name="role" value="Manager" checked >Manager</option>
                 <input type=radio name="role" value="Guest" checked>Guest</option>
            </div>
            <div class="form-group">
                <label for="">Sign On</label><br>
                <td><?php $jdata=json_decode($employees->sign_on);
                     $check1="";
                     $check2="";
                     $check3="";
                        foreach ($jdata as $key => $value) {
                     
                        if($value=='Mail'){
                         $check1.="checked";
                        }else{
                           $check1.="";
                        }

                        
                        if($value=='Payroll'){
                         $check2.="checked";
                        }else{
                           $check2.="";
                        }
                           if($value=='Self-Service'){
                         $check3.="checked";
                        }else{
                           $check3.="";
                        }
                    }
                ?></td>
<input type="checkbox" name="sign_on1" {{$check1}} value="Mail">Mail<br>
<input type="checkbox" name="sign_on2" {{$check2}} value="Payroll">Mail<br>
<input type="checkbox" name="sign_on3" {{$check3}} value="Self-Service">Self-Service<br>

       </div>
        <button class ="btn btn-success">login</button>
        <button class ="btn btn-success">reset</button>
    </form>
</div>

</body>
</html>