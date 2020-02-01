<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('Product.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('Product.create');
    }

    public function store(Request $request)
    {
        $abc=new Product();
        $abc->name=$request->name;
        $abc->category=$request->category;
        $b_image = '';
        if($request->hasFile('image')) {
            $images = $request->file('image');
            $b_image = rand(11111, 99999) . '.' . $images->getClientOriginalExtension();
            $request->file('image')->move('upload',$b_image);
        }
        $abc->image=$b_image;
        $abc->brand = $request->brand;
        $abc->size = $request->size;
        $abc->color = $request->color;
        $abc->save();

        return view('Product.index');

    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id){

        $products = Product::find($id);
        return view('Product.edit', compact('products'));
    }

    public function update(Request $request, Product $product)
    {
        $abc=Product::find($request->id);
        $abc->name=$request->name;
        $abc->category=$request->category;

        $b_image = $abc->image;
        if($request->hasFile('image')) {
            $images = $request->file('image');
            $b_image = rand(11111, 99999) . '.' . $images->getClientOriginalExtension();
            $request->file('image')->move('upload',$b_image);
        }
        $abc->image=$b_image;
        $abc->brand = $request->brand;
        $abc->size = $request->size;
        $abc->color = $request->color;
        $abc->update();

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}
