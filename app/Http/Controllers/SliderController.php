<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Attachment;
use App\Models\Donor;
use App\Models\Ngo;
use App\Models\Volunteer;
use App\Models\User;
use App\Models\Role;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
 
/**
 * Class SliderController
 */
class SliderController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   
        $table_search = !empty($request->table_search) ? $request->table_search : '';
        $sliderslist = Slider::filter($request->all())->with('attachment')->paginate(5);                    
        return view('slider.index', compact('sliderslist','table_search'))->with(Input::all());

        // $sliderslist = Slider::with('attachment')->get();
        // return view('slider.index',compact('sliderslist'));
    }
 /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
 
    public function create()
    {      
        return view('slider.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {      
        try
            {
                $slider = new Slider;
                $slider->name            = basename($_FILES["file"]["name"]);
                $slider->position      = $request->input('position');
                $slider->save();
                if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
                } else {
                    $target_dir = 'upload/slider/' . $slider->id . '/';
                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    list($width, $height, $type, $attr) = getimagesize($target_dir .'/'.basename($_FILES["file"]["name"]));
                    $attachment = new Attachment();
                    $attachment->foreign_id = $slider->id;
                    $attachment->classname = 'slider';
                    $attachment->name =  basename($_FILES["file"]["name"]);
                    $attachment->size = $_FILES['file']['size'];
                    $attachment->height = $width;
                    $attachment->width = $height;
                    $attachment->path = 'slider/' .  $slider->id;
                    $attachment->save();
                }
                return redirect('sliders')->with('success_msg',trans('message.slider_created'));
                return Redirect::back();
            } catch (Exception $e) {
                $request->session()->flash('alert-warning', trans('cities.bad_request'));
                return Redirect::back()->withInput();
            }                        
    }

 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
	 public function edit($id, Request $request)
	 { 
	      $slider = Slider::with('attachment')->where('id',$id)->first();
		  if(!empty($slider))
		  {
			  return view('slider.edit')->with(array('slider'=> $slider)); 
		  } 
		  else
		  {
			 return redirect('slider')->with('error_msg','Slider could not be edited');
		  }    
	 }
      /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function update(Request $request)
     {
        $slider = Slider::where('id',$request->id)->first();
          try
            {
                //!empty(basename($_FILES["file"]["name"])) ? basename($_FILES["file"]["name"]) :$slider->name ;
                $slider->name            = !empty(basename($_FILES["file"]["name"])) ? basename($_FILES["file"]["name"]) :$slider->name ;
                $slider->position      = $request->input('position');
                $slider->save();
                if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
            } else {
                $attachment = Attachment::where('foreign_id', $slider->id)->where('classname','slider')->delete();
                $target_dir = 'upload/slider/' . $slider->id . '/';
                $files = glob($target_dir . '/*');
                foreach($files as $file){
                        if(is_file($file))
                        unlink($file);
                } 
                $target_dir = 'upload/slider/' . $slider->id . '/';
                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                list($width, $height, $type, $attr) = getimagesize($target_dir .'/'.basename($_FILES["file"]["name"]));
                $attachment = new Attachment();
                $attachment->foreign_id = $slider->id;
                $attachment->classname = 'slider';
                $attachment->name =  basename($_FILES["file"]["name"]);
                $attachment->size = $_FILES['file']['size'];
                $attachment->height = $width;
                $attachment->width = $height;
                $attachment->path = 'slider/' .  $slider->id;
                $attachment->save();
            }
                return redirect('sliders')->with('success_msg',trans('message.slider_updated'));
                return Redirect::back();
            } catch (Exception $e) {
                $request->session()->flash('alert-warning', trans('cities.bad_request'));
                return Redirect::back()->withInput();
            }            
     }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function destroy($id)
     {
        $slider=Slider::findOrFail($id);
        Slider::find($id)->delete();
        $attachment = Attachment::where('foreign_id',$id)->delete();
        return redirect('sliders')->with('success_msg','Slider has been deleted succesfully');
     }

}



