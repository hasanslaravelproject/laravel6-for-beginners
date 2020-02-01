
@extends('frontend.master')
@section('content')
<div class="col-12">
    <a href="{{ route('sliders.create') }}">Students List</a>

    <form action="{{ route('sliders.update', $sliders->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(isset($sliders))
            <input type="hidden" name="id" value="{{ $sliders->id }}">
        @endif

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{isset($sliders->title) ? $sliders->title : ''}}">
        </div>
        <div class="form-group">
            <label for="">Caption</label>
            <input type="text" name="caption" placeholder="Caption" class="form-control" value="{{isset($sliders->caption) ? $sliders->caption : ''}}">
        </div>
          
        <div class="form-group">
            <label for="">Slider Image</label>
            <input type="file" name="image" placeholder="image" class="form-control" value="{{isset($sliders->image) ? $sliders->image : ''}}">
        </div
        
         <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control">
                <option value="{{isset($sliders->status) ? $sliders->status : ''}}">Active</option>
                <option value="{{isset($sliders->status) ? $sliders->status : ''}}">Inactive</option>       
            </select>            
      
            
        </div>

          <button class ="btn btn-success">Submit</button>
    </form>
</div>
@endsection
