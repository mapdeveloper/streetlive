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
use Exporter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
 
/**
 * Class DonorController
 */
class DonorController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**Display a logged donor list details **/
    public function list(Request $request)
    {   
        $user_id=Auth::user()->id;
        $donorslist = Donor::get()->where('user_id','===',$user_id);
        return view('donor.list',compact('donorslist'));
    }
   /**Display all the details**/
    public function index(Request $request)
    {   
        $table_search = !empty($request->table_search) ? $request->table_search : '';
        $donorslist = Donor::filter($request->all())->paginate(5);                    
        return view('donor.index', compact('donorslist','table_search'))->with(Input::all());
    }    
   /**
     *Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('donor.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function save(Request $request)
    {
         $user=new User;   
         $donor = new Donor;
         if ($donor->validateCreate($request->all()))
        {   
            // save user details            
            $user->name         = $request->name;
            $user->email        = $request->email;   
            $user->password     = bcrypt($request->name);
            $user->role_id      = '4';   
            $user->save();            

            // save Donor details            
            $donor->user_id             = $user->id;
            $donor->name                = $request->name;
            $donor->address             = $request->address;                           
            $donor->phoneno             = $request->phoneno;                           
            $donor->email               = $request->email;                           
            $donor->occupation          = $request->occupation;                           
            $donor->occupation_details  = $request->occupation_details;                           
            $donor->panno               = $request->panno;                           
            $donor->others              = $request->others;                           
            $donor->save();

           /** email functionality **/
            $name = $request->name;
            $email = $request->email;
            Mail::send('email.donor', array('name' => $name,'email'=>$email), function($message) use ($email,$name)
            {
                $message->to($email, $name)->subject('Welcome!');
            });
            return redirect('donors')->with('success_msg','Donor Details had been added successfully');
        }else {
            $errors = $donor->errors();
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
	      $donor = Donor::where('id',$id)->first();
		  if(!empty($donor))
		  {
			  return view('donor.edit')->with(array('donor'=> $donor)); 
		  } 
		  else
		  {
			 return redirect('donors')->with('error_msg','Donor could not be edited');
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
        $donor = Donor::where('id',$request->id)->first();
        if ($donor->validateUpdate($request->all(),$request->id))
        {
            $donor->name                = $request->name;
            $donor->address             = $request->address;                           
            $donor->phoneno             = $request->phoneno;                           
            $donor->email               = $request->email;                           
            $donor->occupation          = $request->occupation;                           
            $donor->occupation_details  = $request->occupation_details;                           
            $donor->panno               = $request->panno;                           
            $donor->others              = $request->others; 
            
            if(!empty($request->is_active) && ($user_id='1'))
            {
                $donor->is_active =$request->is_active;
            }else {
                $donor->is_active ="0";
            }                          
            $donor->save();
            if($user_id!='1')
            {
            return redirect('donorlist')->with('success_msg','Donor Details had been updated successfully');    
            }
            return redirect('donors')->with('success_msg','Donor Details had been updated successfully');
        } else {
            $errors = $donor->errors();
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
       $donor = Donor::findOrFail($id);
       Donor::find($id)->delete();
       return redirect('donors')->with('success_msg','Donor details has been deleted succesfully');
     }
      /**
     * Export the donor details in excel.
     *
     * @param  int  $id
     * @return Response
     */
     public function exportcsv()
     {
        $donors = Donor::get();
        $donor_array = array();
        $row = 0;
        foreach($donors as $donor){
            $donor_array[$row] = [               
                'NAME'                  => $donor->name,
                'ADDRESS'               => $donor->address,
                'PHONE NO'              => $donor->phoneno,
                'EMAIL'                 => $donor->email,
                'OCCUPATION'            => $donor->occupation,
                'OCCUPATION DETAILS'    => $donor->occupation_details,
                'PANNO'                 => $donor->panno,
                'OTHERS'                => $donor->others
            ];           
            $row++;
        }
        Excel::create('Donor', function($excel) use($donor_array) {
            $excel->sheet('Donor', function($sheet) use($donor_array) {  
                $sheet->fromArray(
                    $donor_array
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
     public function export()
     {
         $excel = Exporter::make('Excel');
         $excel->load(Auth::user());  
         return $excel->stream('abc.csv');
     }

}



