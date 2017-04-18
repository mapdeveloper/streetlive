<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Ngo extends Model
{
   protected $table = 'ngos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phoneno',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    // protected $hidden = [
        
    // ];

       public function ngouser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    /**validation details **/
    private $create_rules = array(    
        'name'                  => 'required|unique:users|min:3|max:50',
        'regdoffice'            => 'required' , 
        'address'               => 'required' ,
        'vision'                => 'required' ,
        'email'                 => 'required|email|max:255|unique:users',
        'phoneno'               => 'required|numeric',  
    );
     private $update_rules = array(    
        'name'                  => 'required|unique:users|min:3|max:50',
        'regdoffice'            => 'required' , 
        'address'               => 'required' , 
        'vision'                => 'required' ,
        'email'                 => 'required|email|max:255|unique:users',
        'phoneno'               => 'required|numeric',
    );
        
    private $errors;
    private $messages = array(
        'name.required'                 => 'The :attribute field is required',
        'name.unique'                   => 'The :attribute field is already exist',
        'regdoffice.required'           => 'The :attribute field is required',
        'address.required'              => 'The :attribute field is required',
        'vision.required'               => 'The :attribute field is required',
        'email.required'                => 'The :attribute field is required',
        'email.min'                     => 'The :attribute should have minimum of 2 characters',
        'email.max'                     => 'The :attribute should not exceed maximum of 2 characters',
        'email.unique'                  => 'The :attribute is already created',
        'phoneno.required'              => 'The :attribute field is required',
        'phoneno.numeric'               => 'The :attribute field is only number',
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
