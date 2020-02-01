<?php
namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();       
        return view('frontend.Slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('frontend.Slider.create');
    }
    
    public function store(Request $request)
    {
        // check database, do not insert if get any duplicate name
        
        $isExist = Slider::where(['title' => $request->title])->first();
        if($isExist){
            Session::flash('error', 'This is already exists!');
            return redirect()->route('sliders.create');
        } 
        $slider=new Slider();
        $slider->title=$request->title;
        $slider->caption=$request->caption;
        $slider->status=$request->status;
        $b_image = '';
        if($request->hasFile('image')) {
            $images = $request->file('image');
            $b_image = rand(11111, 99999) . '.' . $images->getClientOriginalExtension();
            $request->file('image')->move('upload',$b_image);
        }
        $slider->image=$b_image;      
        $slider->status=1;
        $slider->save();
        Session::flash('error', 'This is already exists!');
        return redirect()->route('sliders.index');
    }
    
    public function show($id)
    {
        //
    }    
    
    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('frontend.Slider.edit', compact('sliders'));
    }
    
    public function update(Request $request, Slider $slider)
    {
        $slider=Slider::find($request->id);
        
        $slider->title=$request->title;
        $slider->caption=$request->caption;
        $slider->status=$request->status;
        $b_image = $slider->image;
        if($request->hasFile('image')) {
            $images = $request->file('image');
            $b_image = rand(11111, 99999) . '.' . $images->getClientOriginalExtension();
            $request->file('image')->move('upload',$b_image);
        }
        $slider->image=$b_image;
        $slider->update();
        
        return redirect()->route('sliders.index')
        ->with('success',' slider updated successfully');
    }
    
    public function destroy(slider $slider)
    {
        $slider->delete();
        
        return redirect()->route('sliders.index')
        ->with('success','sliders deleted successfully');
    }
    public function searchData(Request $request){
        
        $keyword=$request->input('keyword');
        $mypro = Slider::where("title", "like", "%" . $keyword . "%")
        ->orWhere("caption", "like", "%" . $keyword . "%")
        ->orWhere("status", "like", "%" . $keyword . "%") 
        ->get();
        $html='<tr>data not found</tr>';
        
        foreach($mypro as $key=>$slider){
            $html.='<tr>
            <td scope="row">'.$key .'</td>
            
            <td>'.$slider->title.'</td>
            <td>'.$slider->caption.'</td>
            <td>'.$slider->status.'</td>
            <td>'.$slider->image.'</td>  
            
            <td>';                
            $html.='</td>         
            
            <td>
            <a href="'.route('students.edit',$slider->id) .'"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
            <form action="'.route('sliders.destroy',$slider->id) .'" method="POST">
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>';
        }  
        echo $html;
    }
    public function changeStatus(Request $request)
    {
        $slider = Slider::find($request->slider_id);
        $slider->status = $request->status;
        $slider->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
