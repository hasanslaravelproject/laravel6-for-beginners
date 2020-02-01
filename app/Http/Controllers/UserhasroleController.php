<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserhasroleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
       
       $userroles = User::with('roles')->get();
     
        
        return view('Userhasrole.index',compact('userroles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

           $roles = Role::all();
            $users = User::all();
    
     
         return view('Userhasrole.create',compact('roles','users'));
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
   

        foreach($request->roles as $role){
          
            $rol = Role::findById($role);

            $users->assignRole($rol->name);         

        }   

       return redirect()->route('userhasroles.index');

    }
    

    
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
        $rps = User::find($id);
        return view('userhasrole.edit', compact('rps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
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

        return redirect()->route('userhasroles.index')
            ->with('success','rolepermissions deleted successfully');
    }
}
