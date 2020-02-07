<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
       public function index()
    {

    }
      public function addtocart(Request $request)
    {
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $product_price = $request->price;

       $carts = Cart::add(['id' => $product_id, 'name' =>  $product_name, 'qty' => 1,  'weight' =>'1','price' =>$product_price]);
       $html='<i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-light">'.Cart::count().'</span>';

       echo json_encode($html);
   }

   public function cartlist()
   {
   $carts= Cart::content();

return view('Cart.cart',compact('carts'));
   }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function updateCart(Request $request)
    {
        $rowId=$request->rowId;
        $product_id=$request->product_id;
        $current_qty=$request->current_qty;
        $qty=$current_qty+1;
        $singleproduct= Product::find($product_id);
        $product_price=$singleproduct->price;

        Cart::update($rowId, ['qty' => $qty,  'price' =>$product_price]);
        $carts= Cart::content();

        $html['cart']='';
        $count=1;
        foreach($carts as $item){
            $html['cart'].=' <tr>
            <th scope="row">'. $count++ .'</th>
            <td><img src="'. asset('/upload/'.single_product($item->id)->image) .'" style="height:40px;width:35px"></td>
            <td>'. $item->name.'</td>
            <td>'.single_product($item->id)->price.'</td>
            <td>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon btn btn-info"><i class="fa fa-minus"></i></span>
                    <input type="text" class="form-inline text-center current-qty_'.$item->id.' " style="width:40px" value="'. $item->qty .'">
                       <span class="input-group-addon btn btn-info inc-qty"  data-row_id="'. $item->rowId .'" data-product_id="'. $item->id .'"><i class="fa fa-plus"></i></span>

                    </div>
                </div>
              </td>
            <td>'. $item->qty*$item->price  .'</td>
            <td>'. delete_btn_helper('carts.delete', $item->rowId).'
            </td>

          </tr>';
        }
        $html['cardcount'] ='<i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-light">'.Cart::count().'</span>';
        $html['subtotals'] = ' <td >Total:'.Cart::subtotal().'</td> ';

        echo json_encode($html);


    }

    public function destroy(Request $request, $rowID='')
    {

        Cart::remove($rowID);
        //Cart::destroy($rowID);
       return redirect()->back()
            ->with('success','Product deleted successfully');
    }
}
