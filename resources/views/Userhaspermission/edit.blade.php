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
    <a href="{{ route('roles.index') }}" >Role List</a>

    <form action="{{ route('userhaspermissions.update',$users->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($roles))
            <input type="hidden" name="id" value="{{ $roles->id }}">
        @endif
       
         

         <div class="form-group">
            <label for="">User ID</label>
              <input type="text" name="user_name" value="{{ $users->name }}" class="form-control" >     
   
                  
        </div>
   
       

        <div class="form-group">
        <label for="" class="">Users Permissions</label>

                
                <select name="permissions[]" id="permissions" multiple="multiple" class="form-control">
                
                    @foreach($permissions as $key=>$permission)
                        <?php $check=''?>
                          @foreach($users->getPermissionNames() as $permissi)
                                <?php if ($permissi==  $permission->name ){
                                    $check='selected';
                                }else{
                                    $check='';
                                }?>
                                  <option {{ $check }} value="{{$permission->id}}">{{ $permission->name }}</option>
                        @endforeach
                        <option value="{{$permission->id}}">{{ $permission->name }}</option>
                    @endforeach
                </select>
          
        </div>

        <div class="form-group">
            <label for="">Guard Name</label>
            <input type="text" name="guard_name" placeholder="guard_name" class="form-control" value="{{isset($roles->guard_name) ? $roles->guard_name : ''}}" >
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
