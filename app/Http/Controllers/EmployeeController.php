<?php

namespace App\Http\Controllers;
use App\Hello;
use App\Server;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hi = Employee::all();

        return view('Employee.index', compact('hi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['servers']= Server::all();

        return view('Employee.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sign_on=array('sign1'=>$request->sign_on1, 'sign2'=>$request->sign_on2, 'sign3'=>$request->sign_on3);
        $json = json_encode($sign_on);
   /*     var_dump($json);
         var_dump(json_decode($json));*/

        $abc=new Employee();
        $abc->user_name=$request->user_name;
        $abc->password=$request->password;
        $abc->city_of_employment=$request->city_of_employment;
        $abc->web_server=$request->web_server;
        $abc->role=$request->role;
        $abc->sign_on=$json;

        $abc->save();

    return redirect()->route('employees.index')
            ->with('success','employees added successfully');

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
       $employees = Employee::find($id);
       $hellos= Hello::all();
        return view('Employee.edit', compact('employees','hellos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
         $sign_on=array('sign1'=>$request->sign_on1, 'sign2'=>$request->sign_on2, 'sign3'=>$request->sign_on3);
        $json = json_encode($sign_on);

         $role=array('role1'=>$request->role1, 'role2'=>$request->role2, 'role3'=>$request->role3);
        $json2 = json_encode($role);

        $abc=Employee::find($request->id);

        $abc->user_name=$request->user_name;
        $abc->password=$request->password;
        $abc->city_of_employment=$request->city_of_employment;
        $abc->web_server=$request->web_server;
        $abc->role=$json2;
        $abc->sign_on=$json;

        $abc->update();

        return redirect()->route('employees.index')
            ->with('success',' employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success','employees deleted successfully');
    }
}
