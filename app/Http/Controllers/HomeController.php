<?php

namespace App\Http\Controllers;
use App\user;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
$role = Role::findById(1);
$permission = Permission::findById(1);
$user= $role->givePermissionTo($permission);
 return view('home');
    }
}
