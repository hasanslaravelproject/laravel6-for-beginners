@extends('frontend.master')
@section('content')
<div class="col-12">
    <a href="{{ route('sliders.create') }}"  class="btn btn-info">Add New slider</a>
    <h3>sliders List</h3>
    <input name="search1" id="search1" class="form-control" placeholder="Enter Keyword"/>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Caption</th>
                <th>Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody id="search_view">       
            <?php $keyid=1;     
            ?>                       
            @foreach($sliders as $slider)
            <tr>
                <td scope="row">{{$keyid++}}</td>
                <td>{{$slider->title}}</td>
                <td>{{$slider->caption}}</td>                
                <td>
                        <input id="slider_status" data-id="{{$slider->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $slider->status ? 'checked' : '' }}>

</td>           
               <td class="d-none d-sm-table-cell">
                            <span class="font-size-sm text-muted">
                                <img src="{{ asset('/upload/'.$slider->image) }}" alt=""
                                     style="width:150px;"
                                     class="img-thumbnail">
                            </span>
                </td>          
                <td>
                    <a href="{{ route('sliders.edit',$slider->id) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
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
            url: '{{URL::to('/slidersearch')}}',
            type: "get",
            data: { keyword : keyword1},
            success: function(data){
                console.log(data);
                
                //table  er body id #search_data_view
                $("#search_view").html(data);
            }
        });
    })

    $('#slider_status').change(function() {
        alert('ofgdfgdf');
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var slider_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'slider_id': slider_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
</script> 
@endsection




