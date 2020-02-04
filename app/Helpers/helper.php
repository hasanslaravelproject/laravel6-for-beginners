<?php

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
