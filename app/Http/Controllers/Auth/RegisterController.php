<?php

namespace App\Http\Controllers\Auth;

use App\Models\Donor;
use App\Models\Ngo;
use App\Models\Volunteer;
use App\Models\User;
use App\Models\Role;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
     // $roles = Role::pluck('id', 'title');
        $roles = Role::orderBy('title','asc')->get()->where('id','!=','1');
        return view('auth.register',compact('roles'));
    
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create($data)
    {
       

        // save User details
        $user = new User;  
        if ($user->validateCreate($data))
        {
        echo "test"   ;
        try
        {        
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
        return $user;   
        } catch (Exception $e) {
                  return Redirect::back()->withInput()->withErrors($errors);   
                
            }                 
        } else {
            $errors = $user->errors();
            return Redirect::back()->withInput()->withErrors($errors);   
        }
       }


 public function store(Request $data)
    {  
 

         // save User details
        $user = new User;  
        if ($user->validateCreate($data))
        {
        echo "test"   ;
        try
        {        
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
        return $user;   
        } catch (Exception $e) {
                  return Redirect::back()->withInput()->withErrors($errors);   
                
            }                 
        } else {
            $errors = $user->errors();
            return Redirect::back()->withInput()->withErrors($errors);   
        }
    }
 

}



