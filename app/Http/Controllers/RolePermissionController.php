<?php

namespace App\Http\Controllers;

use App\User;
use App\RolePermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
 
    public function index()
    {
        $rolepermissions = RolePermission::all();
      
        
        return view('RoletoPermission.index',compact('rolepermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

           $roles = Role::all();
            $permissions = Permission::all();
           
            
     
         return view('RoletoPermission.create',compact('roles','permissions','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $role = Role::findById($request->role_id);
   
     
        foreach($request->permissions as $peris){
          
            $permissions = Permission::findById($peris);
            $role->givePermissionTo($permissions);

        }     

       return redirect()->route('rolepermissions.index');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rps = RolePermission::find($id);
        return view('RoletoPermission.edit', compact('rps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role, permission $permission)
    {
         $rps=RolePermission::find($request->id);
        
       $rps->permission_id=$request->permission_id; 
        $rps->role_id=$request->role_id; 
           $rps->user_id=$request->user_id; 
            $rps->update();
            return redirect()->route('rolepermissions.index')
            ->with('success',' RoletoPermission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        $rps->delete();

        return redirect()->route('rolepermissions.index')
            ->with('success','rolepermissions deleted successfully');
    }
}
