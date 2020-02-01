<?php

namespace App\Http\Controllers;
use App\user;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //  $role = Role::create(['name' => 'writer']);
//$permission= Permission::create(['name' => 'Create Post']);
$role = Role::findById(1);
$permission = Permission::findById(1);
$user=

$role->givePermissionTo($permission);
//$role->givePermissionTo($permission);
//$permission->assignRole($role);

        //auth()->user()->assignRole('admin');
       // auth()->user()->givePermissionTo('Create Post');
      // return auth()->user()->permissions;

     // return auth()->user()->getAllPermissions();
     //return auth()->user()->getPermissionsViaRoles();
     //return auth()->user()->getDirectPermissions();


        return view('home');
    }
}
