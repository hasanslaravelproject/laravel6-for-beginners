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
                           <?php var_dump( $item);?>
              <tr>
                <th scope="row">{{ $count++ }}</th>
                <td>{{  $item->id }}</td>
                <td>{{  $item->name }}</td>
                <td>{{  $item->price }}</td>
                <td>{{  $item->qty }}</td>
                <td>{{   $item->price * $item->qty }}</td>
                <td>
                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
