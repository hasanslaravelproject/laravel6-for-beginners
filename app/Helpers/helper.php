<?php

use App\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

function userpermission($per_id=''){
     $permission=Permission::findById($per_id);

    return $permission->name;
}

function urrole($role_id=''){
    $role = Role::findById($role_id);
    return $role->name;
}

function edit_btn_helper($route_name='',$data_id=''){
    $edit_html='<a href="'.route($route_name, $data_id).'" class="btn btn-info" >Edit</a>';
    return  $edit_html;
}
function addtocart_btn_helper($pro_id='',$product_name='',$price=''){
    $btn_html='<a href="javascript:void(0)" data-product_id="'.$pro_id.'" data-product_name="'.$product_name.'"  data-price="'.$price.'" class="addToCart btn btn-success btn-block">Add to Cart</a>';
    return  $btn_html;
}

function delete_btn_helper($route_name='',$data_id=''){
    $delete_html='<a href="'.route($route_name, $data_id).'" class="btn btn-danger" ><i class="fa fa-times"> </i></a>';
    return  $delete_html;
}

function increment_btn_helper($route_name='',$data_id=''){
    $increment_html='<a href="'.route($route_name, $data_id).'" class="btn btn-info" ><i class="fa fa-plus-square"> </i></a>';
    return  $increment_html;
}
function decrement_btn_helper($route_name='',$data_id=''){
    $decrement_html='<a href="'.route($route_name, $data_id).'" class="btn btn-info" ><i class="fa fa-minus-square"> </i></a>';
    return  $decrement_html;
}

function single_product($productID=''){
   $singleproduct= Product::find($productID);
   return $singleproduct;
}
