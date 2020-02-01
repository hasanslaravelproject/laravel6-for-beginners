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
