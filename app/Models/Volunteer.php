<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Volunteer extends Model
{
   protected $table = 'volunteers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phoneno',
    ];

/**validation details **/
    private $create_rules = array(    
        'name'                  => 'required|unique:users|min:3|max:50',
        'address'               => 'required' , 
        'phoneno'               => 'required|numeric',
        'email'                 => 'required|email|max:255|unique:users',
        'occupation'            => 'required',
        'occupation_details'    => 'required',
        'areaofinterset'        => 'required',    
    );
     private $update_rules = array(    
        'name'                  => 'required|unique:users|min:3|max:50',
        'address'               => 'required' , 
        'phoneno'               => 'required|numeric',
        'email'                  => 'required|email|max:255|unique:users',
        'occupation'            => 'required',
        'occupation_details'    => 'required',
        'areaofinterset'        => 'required', 
    );
        
    private $errors;
    private $messages = array(
        'name.required'                 => 'The :attribute field is required',
        'name.unique'                   => 'The :attribute field is already exist',
        'address.required'              => 'The :attribute field is required',
        'phoneno.required'              => 'The :attribute field is required',
        'phoneno.numeric'               => 'The :attribute field is only number',
        'email.required'                => 'The :attribute field is required',
        'email.min'                     => 'The :attribute should have minimum of 2 characters',
        'email.max'                     => 'The :attribute should not exceed maximum of 2 characters',
        'email.unique'                  => 'The :attribute is already created',
        'occupation.required'           => 'The :attribute field is required',
        'occupation_details.required'   => 'The :attribute field is required',
        'panno.required'                => 'The :attribute field is required',
        'areaofinterset.required'       => 'The :attribute field is required',
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

    public function validateUpdate($data,$id)
    {            
        $validator = Validator::make($data,$this->update_rules,$this->messages);
        if ($validator->fails())
        {               
            $this->errors = $validator->errors();
            return false;               
        }
        return true;
    }
    public function errors()
    {
        return $this->errors;
    }
    /** search query **/
    public function scopeFilter($query,$queryParams)
    {
        if(!empty($queryParams['table_search']) && $queryParams['table_search'] != '')
        {
            $query->where('name', 'like',$queryParams['table_search'].'%');
        }
        return $query;
    }
}
