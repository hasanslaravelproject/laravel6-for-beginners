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
            <tbody>
                <?php $count=1;?>
            @if(!empty($carts))
               @foreach ($carts as $item)


              <tr>
                <th scope="row">{{ $count++ }}</th>
                <td><img src="{{ asset('/upload/'.single_product($item->id)->image)  }}" style="height:40px;width:35px"></td>
                <td>{{  $item->name }}</td>
                <td>{{  $item->price }}</td>
                <td>{{  $item->qty }}</td>
                <td>{{   $item->price * $item->qty }}</td>

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



</body>
</html>
