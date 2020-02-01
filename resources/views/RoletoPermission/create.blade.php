<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hi</title>
   
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    

    <form action="{{ route('rolepermissions.store') }}" method="post" enctype="multipart/form-data">
        @csrf


         

         <div class="form-group">
            <label for="">Role ID</label>
            <select name="role_id" class="form-control" required>
                <option value="">Role ID</option>        
                @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>    
                @endforeach        
                              
            </select>            
        </div>
<div class="form-group">
        <label for="" class="">Permissions Name</label>
        
                <select name="permissions[]" id="permissions" multiple="multiple" class="form-control">
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
          
        </div>
       
 <button class ="btn btn-success">Submit</button>
        
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
		$("#permissions").select2()
        });
	</script>
</body>
</html>
