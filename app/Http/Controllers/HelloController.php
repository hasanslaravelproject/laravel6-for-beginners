<?php

namespace App\Http\Controllers;

use App\Hello;
use App\Employee;
use Illuminate\Http\Request;

class HelloController extends Controller
{
     public function index()
    {
      $hi = Hello::all();   
      
        return view('Hello.index', compact('hi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Hello.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $abc=new Hello();
        $abc->server_name=$request->server_name;
        $abc->status=$request->status;


        $abc->save();

    return redirect()->route('hellos.index')
            ->with('success','server added successfully');

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
       $hellos = Hello::find($id);
        return view('Hello.edit', compact('hellos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hello $hello)
    {
        $abc=Hello::find($request->id);
        
           $abc->server_name=$request->server_name;
        $abc->status=$request->status;
        
        $abc->update();

        return redirect()->route('hellos.index')
            ->with('success',' Server updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hello $hello)
    {
        $hello->delete();

        return redirect()->route('hellos.index')
            ->with('success','Server deleted successfully');
    }

    public function searchData(Request $request){
        
        $keyword=$request->input('keyword');
        $product_data = Employee::where("user_name", "like", "%" . $keyword . "%")
        ->orWhere("city_of_employment", "like", "%" . $keyword . "%")
         ->orWhere("password", "like", "%" . $keyword . "%")
        ->get();
        $html='<tr>data not found</tr>';
        foreach($product_data as $key=>$employee){
                $html.='<tr>
                <td scope="row">'.$key .'</td>
                 
                <td>'.$employee->user_name.'</td>
                <td>'. $employee->password .'</td>
                <td>'. $employee->password .'</td>
                <td>'.$employee->city_of_employment.'</td>
                <td>'.$employee->web_server.'</td>
                  <td>'.$employee->role.'</td>
                <td>';
                 $jdata=json_decode($employee->sign_on);
                        foreach ($jdata as $key => $value) {
                       $html.='<input type="checkbox" name="" value="'.$value.'">'.$value .",";
                        }
                $html.='</td>
               
                
               <td>
                    <a href="'.route('employees.edit',$employee->id) .'"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="'.route('employees.destroy',$employee->id) .'" method="POST">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>';
        }  
        echo $html;

    }
}
