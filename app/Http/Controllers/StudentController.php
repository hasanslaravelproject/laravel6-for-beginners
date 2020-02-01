<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students_list = Student::all();
    
      
        return view('Student.index', compact('students_list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// check database, do not insert if get any duplicate name
     
        $isExist = Student::where(['first_name' => $request->first_name])->first();
        if($isExist){
            Session::flash('error', 'This is already exists!');
             return redirect()->route('students.create');
        } 

        $abc=new Student();
        $abc->first_name=$request->first_name;
        $abc->middle_name=$request->middle_name;
        $abc->last_name=$request->last_name;
        $abc->address=$request->address;
        $abc->date_of_birth=$request->date_of_birth;
        $abc->place_of_birth=$request->place_of_birth;
        $abc->age=$request->age;
        $abc->gender=$request->gender;
        $abc->year=$request->year;
        $abc->status=1;
        $abc->guardian=$request->guardian;
        $abc->relation=$request->relation;
        $abc->g_address=$request->g_address;
        $abc->contact=$request->contact;

        	

        $abc->save();

        return redirect('/students');

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
       $students = Student::find($id);
        return view('Student.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $abc=Student::find($request->id);
        
        $abc->first_name=$request->first_name;
        $abc->middle_name=$request->middle_name;
        $abc->last_name=$request->last_name;
        $abc->address=$request->address;
        $abc->date_of_birth=$request->date_of_birth;
        $abc->place_of_birth=$request->place_of_birth;
        $abc->age=$request->age;
        $abc->gender=$request->gender;
        $abc->year=$request->year;
        $abc->status=1;
        $abc->guardian=$request->guardian;
        $abc->relation=$request->relation;
        $abc->g_address=$request->g_address;
        $abc->contact=$request->contact;
        $abc->update();

        return redirect()->route('students.index')
            ->with('success',' student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success','Students deleted successfully');
    }
    public function searchData(Request $request){
        
        $keyword=$request->input('keyword');
        $mypro = Student::where("first_name", "like", "%" . $keyword . "%")
        ->orWhere("middle_name", "like", "%" . $keyword . "%")
         ->orWhere("last_name", "like", "%" . $keyword . "%")
          ->orWhere("age", "like", "%" . $keyword . "%")
        ->get();
        $html='<tr>data not found</tr>';

        foreach($mypro as $key=>$student){
                $html.='<tr>
                <td scope="row">'.$key .'</td>-
                 
                <td>'.$student->first_name.'</td>
                <td>'.$student->middle_name.'</td>
                <td>'.$student->last_name.'</td>
                <td>'.$student->address.'</td>
                <td>'.$student->date_of_birth.'</td>
                <td>'.$student->place_of_birth.'</td>
                <td>'.$student->age.'</td>
                <td>'.$student->gender.'</td>
                <td>'.$student->year.'</td>
                <td>'.$student->status.'</td>
                <td>'.$student->guardian.'</td>
                  <td>'.$student->relation.'</td>
                <td>'.$student->g_address.'</td>
                <td>'.$student->contact.'</td>
              
               <td>';
                
                $html.='</td>
               
                
               <td>
                    <a href="'.route('students.edit',$student->id) .'"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                    <form action="'.route('students.destroy',$student->id) .'" method="POST">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>';
        }  
        echo $html;

    }
}
