<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Slider extends Model
{
   protected $table = 'sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'position',
    ];


	public function attachment()
	{
		return $this->hasOne('App\Models\Attachment','foreign_id')->where('classname', 'slider');
	}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    // protected $hidden = [
        
    // ];

    public function scopeFilter($query,$queryParams)
    {
        if(!empty($queryParams['table_search']) && $queryParams['table_search'] != '')
        {
            $query->where('name', 'like',$queryParams['table_search'].'%');
        }
        return $query;
    }
}
