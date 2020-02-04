<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hi</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!----<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    @include('frontend.partials._navbar')
<div class="container">
     <div class="row">

  <div class="col-12">
    <a href="{{ route('products.create') }}"  class="btn btn-info">Add New Product</a>
    <h3>Product List</h3>

  </div>
    @foreach($productslist as $product)
    <div class="col-md-3">
        <div class="panel panel-default"  style="border: 1px solid #ededed;margin-bottom:30px">
            <div class="panel-body">
                <img src="{{ asset('/upload/'.$product->image) }}" alt="" style="width:100%"  class="img-thumbnail">
                <h4 class="text-center">{{$product->name}}</h4>
                <p class="text-center">{{$product->category}}</p>
                <h5 class="text-center text-danger">TK {{$product->price}}</h5>
                {!! addtocart_btn_helper($pro_id=$product->id,$name=$product->name,$price=$product->price) !!}

            </div>
            </div>
          </div>

    @endforeach

</div>
{{ $productslist->links() }}
</div>

<script>
$('body').on('click','.addToCart',function(){
  var product_id=$(this).data('product_id');
  var product_name=$(this).data('product_name');
  var price=$(this).data('price');
  $.ajax({
       type: 'get',
       dataType: "json",
       url: '{{ URL::route('addtocarts')}}',
       data:{product_id:product_id,product_name:product_name,price:price},
       success: function (response) {
           $('.cart_count').html(response);

       }
  });
});

</script>
</body>
</html>
