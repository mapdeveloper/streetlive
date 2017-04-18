<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','twitter_id','facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function errors()
    {
        return $this->errors;
    }
    
    private $create_rules = array(
         'name' => 'required|max:255',
         'email' => 'sometimes|email|max:255|unique:users',
         'password' => 'required|min:6|confirmed',
         'terms' => 'required',

    );
    private $errors;

    private $messages = array(
        'name.required' => 'The :attribute field is required',
        'name.min' => 'The :attribute should have minimum of 3 characters',
        'name.max' => 'The :attribute should not exceed maximum of 50 characters',
        
        'email.required' => 'The :attribute field is required',
        'email.min' => 'The :attribute should have minimum of 2 characters',
        'email.max' => 'The :attribute should not exceed maximum of 255 characters',
        'email.unique' => 'The :attribute is already created',

        'password.required' => 'The :attribute field is required',
        'password.min' => 'The :attribute should have minimum of 6 characters',
        'password.max' => 'The :attribute should not exceed maximum of 16 characters',
        'password.confirmed'=>'The :attribute does not match with Confirm Password',
        'terms.required' => 'The :attribute field is required',
       
    );

       public function validateCreate($data)
    {         
        $validator = Validator::make($data,$this->create_rules,$this->messages);
        if ($validator->fails())
        {               
            $this->errors = $validator->errors();
            return false;                 
        }
        return true;
    }
     public function scopeFilter($query,$queryParams)
    {
        if(!empty($queryParams['table_search']) && $queryParams['table_search'] != '')
        {
            $query->where('name', 'like',$queryParams['table_search'].'%');
        }
        return $query;
    }



    private $create_password_rules = array(
            'password' => 'required|min:6|confirmed',         
        );


       public function validatePasswordCreate($data)
    {         
        $validator = Validator::make($data,$this->create_password_rules,$this->messages);
        if ($validator->fails())
        {               
            $this->errors = $validator->errors();
            return false;                 
        }
        return true;
    }
    
}
