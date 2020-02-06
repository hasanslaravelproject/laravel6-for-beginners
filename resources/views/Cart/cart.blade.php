<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hi</title>
    @include('frontend.partials._scripts')
</head>
<body>
    @include('frontend.partials._navbar')
<div class="container">
     <div class="row">
         <div class="col-12">
             <h3>Shooping Cart</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="cart_list">
                <?php $count=1;?>
            @if(!empty($carts))
               @foreach ($carts as $item)


              <tr>
                <th scope="row">{{ $count++ }}</th>
                <td><img src="{{ asset('/upload/'.single_product($item->id)->image)  }}" style="height:40px;width:35px"></td>
                <td>{{  $item->name }}</td>
                <td>{{ single_product($item->id)->price }}</td>
                <td>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon btn btn-info"><i class="fa fa-minus"></i></span>
                        <input type="text" class="form-inline text-center current-qty_{{$item->id}} " style="width:40px" value="{{ $item->qty   }}">
                           <span class="input-group-addon btn btn-info inc-qty"  data-row_id="{{  $item->rowId }}" data-product_id="{{  $item->id }}"><i class="fa fa-plus"></i></span>

                        </div>
                    </div>


                  </td>
                <td>{{   $item->price }}</td>

                <td>
                    {!! delete_btn_helper('carts.delete', $item->rowId) !!}


                </td>

              </tr>
              @endforeach
              @else
              <tr>
                  Cart is Empty----
              </tr>
              @endif
            </tbody>
          </table>








        </div>
    </div>
</div>


<script>
//$('.inc-qty').on('click',function(){
    $('body').on('click','.inc-qty',function(){
    var rowId=$(this).data('row_id');
    var product_id=$(this).data('product_id');
    var  current_qty=$('.current-qty_'+product_id).val();
    $.ajax({
       type: 'get',
       dataType: "json",
       url: '{{ URL::route('updateCart')}}',
       data:{rowId:rowId,product_id:product_id,current_qty:current_qty},
       success: function (response) {
           console.log(response);
           $('.cart_list').html(response.cart);
           $('.cart_count').html(response.cardcount);
       }
  });
});


</script>



</body>
</html>
