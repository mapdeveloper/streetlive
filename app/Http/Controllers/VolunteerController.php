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
 * Class VolunteerController
 */
class VolunteerController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**Display a logged donor list details **/
    public function list(Request $request)
    {   
        $user_id=Auth::user()->id;
        $volunteerslist = Volunteer::get()->where('user_id','===',$user_id);
        return view('volunteer.list',compact('volunteerslist'));
    }
    /**Display all the details**/
    public function index(Request $request)
    {   
        $table_search = !empty($request->table_search) ? $request->table_search : '';
        $volunteerslist = Volunteer::filter($request->all())->paginate(5);                    
        return view('volunteer.index', compact('volunteerslist','table_search'))->with(Input::all());
    }
    /**
     *Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('volunteer.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function save(Request $request)
    {
          $volunteer = new Volunteer;
          $user=new User; 
         if ($volunteer->validateCreate($request->all()))
        {   
            // save user details            
            $user->name                     = $request->name;
            $user->email                    = $request->email;   
            $user->password                 = bcrypt($request->name);
            $user->role_id                  ='3';   
            $user->save();  

            $volunteer->user_id                   = $user->id; 
            $volunteer->name                = $request->name;
            $volunteer->address             = $request->address;                           
            $volunteer->phoneno             = $request->phoneno;                           
            $volunteer->email               = $request->email;                           
            $volunteer->occupation          = $request->occupation;                           
            $volunteer->occupation_details  = $request->occupation_details;                           
            $volunteer->areaofinterset      = $request->areaofinterset;                           
            $volunteer->others              = $request->others;                        
            $volunteer->save();
            /** email functionality **/
            $name = $request->name;
            $email = $request->email;
            Mail::send('email.volunteer', array('name' => $name,'email'=>$email), function($message) use ($email,$name)
            {
                $message->to($email, $name)->subject('Welcome!');
            });
            return redirect('volunteers')->with('success_msg','Volunteer Details had been added successfully');
        }else {
            $errors = $volunteer->errors();
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
	      $volunteer = Volunteer::where('id',$id)->first();
		  if(!empty($volunteer))
		  {
			  return view('volunteer.edit')->with(array('volunteer'=> $volunteer)); 
		  } 
		  else
		  {
			 return redirect('volunteers')->with('error_msg','Volunteer could not be edited');
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
        $volunteer = Volunteer::where('id',$request->id)->first();
        if ($volunteer->validateUpdate($request->all(),$request->id))
        {
            $volunteer->name                = $request->name;
            $volunteer->address             = $request->address;                           
            $volunteer->phoneno             = $request->phoneno;                           
            $volunteer->email               = $request->email;                           
            $volunteer->occupation          = $request->occupation;                           
            $volunteer->occupation_details  = $request->occupation_details;                           
            $volunteer->areaofinterset      = $request->areaofinterset;                           
            $volunteer->others              = $request->others;  
            
            if(!empty($request->is_active) && ($user_id='1'))
            {
                $volunteer->is_active =$request->is_active;
            }else {
                $volunteer->is_active ="0";
            }                          
            $volunteer->save();
             if($user_id!='1')
            {
            return redirect('volunteerlist')->with('success_msg','Ngo Details had been updated successfully');    
            }
            return redirect('volunteers')->with('success_msg','Volunteer Details had been updated successfully');
        } else {
            $errors = $volunteer->errors();
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
       $volunteer = Volunteer::findOrFail($id);
       Volunteer::find($id)->delete();
       return redirect('volunteers')->with('success_msg','Volunteer details has been deleted succesfully');
     }


     /**
     * Export the donor details in excel.
     *
     * @param  int  $id
     * @return Response
     */
     public function exportcsv()
     {
        $Volunteers = Volunteer::get();
        $volunteer_array = array();
        $row = 0;
        foreach($Volunteers as $Volunteer){
            $volunteer_array[$row] = [               
                'NAME'                  => $Volunteer->name,
                'ADDRESS'               => $Volunteer->address,
                'PHONE NO'              => $Volunteer->phoneno,
                'EMAIL'                 => $Volunteer->email,
                'OCCUPATION'            => $Volunteer->occupation,
                'OCCUPATION DETAILS'    => $Volunteer->occupation_details,
                'AREA OF INTEREST'      => $Volunteer->areaofinterset,
                'OTHERS'                => $Volunteer->others
            ];           
            $row++;
        }
        Excel::create('Volunteer', function($excel) use($volunteer_array) {
            $excel->sheet('Volunteer', function($sheet) use($volunteer_array) {  
                $sheet->fromArray(
                    $volunteer_array
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



