<?php
namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Ngo;
use App\Models\Volunteer;
use App\Models\User;
use App\Models\Role;
use Auth;
use Excel;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
 
/**
 * Class NgoController
 */
class NgoController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
     /**Display a logged donor list details **/
    public function list(Request $request)
    {   
        $user_id=Auth::user()->id;
        $ngoslist = Ngo::get()->where('user_id','===',$user_id);
        return view('ngo.list',compact('ngoslist'));
    }
    /**Display all the details**/
    public function index(Request $request)
    {   
        $table_search = !empty($request->table_search) ? $request->table_search : '';
        $ngoslist = Ngo::filter($request->all())->paginate(5);                    
        return view('ngo.index', compact('ngoslist','table_search'))->with(Input::all());
    }
    /**
     *Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('ngo.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function save(Request $request)
    {
          $ngo = new Ngo;
          $user=new User;   
         if ($ngo->validateCreate($request->all()))
        {   
             // save user details            
            $user->name               = $request->name;
            $user->email              = $request->email;   
            $user->password           = bcrypt($request->name);
            $user->role_id            ='2';   
            $user->save();  

            $ngo->user_id             = $user->id;
            $ngo->name                = $request->name;
            $ngo->regdoffice          = $request->regdoffice; 
            $ngo->address             = $request->address;  
            $ngo->vision              = $request->vision; 
            $ngo->email               = $request->email;                          
            $ngo->phoneno             = $request->phoneno;                                                    
            $ngo->others              = $request->others;                             
            $ngo->save();
            /** email functionality **/
            $name = $request->name;
            $email = $request->email;
            Mail::send('email.ngo', array('name' => $name,'email'=>$email), function($message) use ($email,$name)
            {
                $message->to($email, $name)->subject('Welcome!');
            });
            return redirect('ngos')->with('success_msg','Ngo Details had been added successfully');
        }else {
            $errors = $ngo->errors();
            return Redirect::back()->withInput()->withErrors($errors); 
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
	      $ngo = Ngo::where('id',$id)->first();
		  if(!empty($ngo))
		  {
			  return view('ngo.edit')->with(array('ngo'=> $ngo)); 
		  } 
		  else
		  {
			 return redirect('ngos')->with('error_msg','Ngo could not be edited');
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
        $user_id=Auth::user()->id;
        $ngo = Ngo::where('id',$request->id)->first();
        if ($ngo->validateUpdate($request->all(),$request->id))
        {
            $ngo->user_id             = Auth::user()->id; 
            $ngo->name                = $request->name;
            $ngo->regdoffice          = $request->regdoffice; 
            $ngo->address             = $request->address;  
            $ngo->vision              = $request->vision; 
            $ngo->email               = $request->email;                          
            $ngo->phoneno             = $request->phoneno;                                                    
            $ngo->others              = $request->others;  
            if(!empty($request->is_active) && ($user_id='1'))
            {
                $ngo->is_active =$request->is_active;
            }else {
                $ngo->is_active ="0";
            }                          
            $ngo->save();
            if($user_id!='1')
            {
            return redirect('ngolist')->with('success_msg','Ngo Details had been updated successfully');    
            }
            return redirect('ngos')->with('success_msg','Ngo Details had been updated successfully');
        } else {
            $errors = $ngo->errors();
            return Redirect::back()->withInput()->withErrors($errors);   
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
        $ngo = Ngo::findOrFail($id);
        Ngo::find($id)->delete();
        return redirect('ngos')->with('success_msg','Ngo details has been deleted succesfully');
     }
      /**
     * Export the donor details in excel.
     *
     * @param  int  $id
     * @return Response
     */
     public function exportcsv()
     {
        $ngos = Ngo::get();
        $ngo_array = array();
        $row = 0;
        foreach($ngos as $ngo){
            $ngo_array[$row] = [               
                'NAME'                  => $ngo->name,
                'REG OFFICE'            => $ngo->regdoffice,
                'ADDRESS'               => $ngo->address,
                'VISION'                => $ngo->vision,
                'EMAIL'                 => $ngo->email,
                'PHONE NO'              => $ngo->phoneno,
                'OTHERS'                => $ngo->others
            ];           
            $row++;
        }
        Excel::create('Ngo', function($excel) use($ngo_array) {
            $excel->sheet('Ngo', function($sheet) use($ngo_array) {  
                $sheet->fromArray(
                    $ngo_array
                );
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true
                    )
                ));
                $sheet->setAllBorders('thick');            
                $sheet->setAutoSize(true);                       
            });
        })->export('xlsx');         
     }

}



