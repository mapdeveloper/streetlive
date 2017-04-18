<?php
namespace App\Http\Controllers\Auth;

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
 * Class UserController
 */
class UserController extends Controller
{   
    public function index(Request $request)
        {   
            $user_id=Auth::user()->id;
            $ngoslist = Ngo::get()->with('ngouser')->where('user_id','===',$user_id);
            return view('ngo.index',compact('ngoslist'));
        }


      
     /**
     * Store a newly created resource in storage.
     * 
     * @return Response
     */
         

    public function store(Request $data)
        {  
            $user = new User;  
            if ($user->validateCreate($data->all()))
            {
            try
            { 
            // save user details            
            $user->name =$data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->role_id =$data['role_id'];   
            $user->save();
            if($data['role_id']=='2')
            {
            // save NGO details
            $ngo = new Ngo;      
            $ngo->user_id = $user->id;
            $ngo->name = $data['organizationname'];
            $ngo->regdoffice = $data['regdaddress'];
            $ngo->address = $data['commaddress'];
            $ngo->vision = $data['vision'];
            $ngo->email=$data['email'];
            $ngo->phoneno=$data['phone'];
            $ngo->others=$data['others'];
            $ngo->save();
            }
            elseif($data['role_id']=='3')
            {
            // save Volunteer details
            $volunteer = new Volunteer;      
            $volunteer->user_id = $user->id;
            $volunteer->name = $data['name'];
            $volunteer->address = $data['address'];
            $volunteer->phoneno = $data['volunteerphone'];
            $volunteer->email=$data['email'];
            $volunteer->occupation = $data['occupation'];
            $volunteer->occupation_details=$data['occupation_details'];
            $volunteer->areaofinterset=$data['areaofinterset'];
            $volunteer->others=$data['volunteerothers'];
            $volunteer->save();
            }
            elseif($data['role_id']=='4')
            {
            // save Donor details
            $donor = new Donor;      
            $donor->user_id = $user->id;
            $donor->name = $data['name'];
            $donor->address = $data['donoraddress'];
            $donor->phoneno = $data['donorphone'];
            $donor->email=$data['email'];
            $donor->occupation = $data['donoroccupation'];
            $donor->occupation_details=$data['donoroccupationdetails'];
            $donor->panno=$data['panno'];
            $donor->others=$data['donorothers'];
            $donor->save();
            }
            // return $user;   
           return view('auth.login'); 
            } catch (Exception $e) {
                    return Redirect::back()->withInput()->withErrors($errors);   
                }                 
            } else {
                $errors = $user->errors();
                return Redirect::back()->withInput()->withErrors($errors);   
            }
        }


         public function showpassword()
        {
            return view('auth.passwords.change');
        }



        public function changepassword(Request $request, $id)
        { 
            $user = new User;  
            if ($user->validatePasswordCreate($request->all()))
            {  
                $user 				          = User::find($id);
                $user->password         = bcrypt($request->input('password'));
                $user->save();
                return redirect('changepassword/'.$id)->with('success_msg', 'Successfully updated the Password!');
            }
            else {
            $errors = $user->errors();
            return Redirect::back()->withInput()->withErrors($errors); 
        } 
        
        }

        public function validatorchangepassword(array $data)
        {
            return Validator::make($data, [
                'password' => 'required|min:6',
            ]);
        }

}



