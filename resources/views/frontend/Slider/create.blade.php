@extends('frontend.master')
@section('content')
<div class="col-12">
    <a href="{{ route('sliders.create') }}" >Slider List</a>

    <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" >
        </div>

           <div class="form-group">
            <label for="">Caption</label>
            <input type="text" name="caption" placeholder="Caption" class="form-control" >
        </div>
          
        <div class="form-group">
            <label for="">Slider Image</label>
            <input type="file" name="image" placeholder="image" class="form-control" >
        </div

        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>       
            </select>            
        </div>

        <button class ="btn btn-success">Submit</button>
    </form>
</div>

@endsection