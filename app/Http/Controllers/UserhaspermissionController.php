<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserhaspermissionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
       
       $userpermissions = User::with('permissions')->get();
     
        
        return view('Userhaspermission.index',compact('userpermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

           $permissions = Permission::all();
            $users = User::all();
    
     
         return view('Userhaspermission.create',compact('permissions','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $users = User::find($request->id);
   

        foreach($request->permissions as $permission){
          
            $per = Permission::findById($permission);
       

            $users->givePermissionTo($per->name);
                       $users->givePermissionTo($per->name);


        }     

       return redirect()->route('userhaspermissions.index');

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
        $users = User::find($id);

         $permissions = Permission::all();
     
         
        return view('Userhaspermission.edit', compact('users','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  
        $users = User::find($id);
   

        foreach($request->permissions as $permission){
          
            $per = Permission::findById($permission);
         

            $users->givePermissionTo($per->name);
                       $users->givePermissionTo($per->name);


        }     

       return redirect()->route('userhaspermissions.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $rps->delete();

        return redirect()->route('userhaspermissions.index')
            ->with('success','userhaspermissions deleted successfully');
    }
}
