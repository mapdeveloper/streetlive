<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

     /** search query **/
    public function scopeFilter($query,$queryParams)
    {
        if(!empty($queryParams['table_search']) && $queryParams['table_search'] != '')
        {
            $query->where('amount', 'like',$queryParams['table_search'].'%');
        }
        return $query;
    }
    public function donors()
    {
        return $this->belongsTo(Donor::class,'user_id','user_id');
    }
    public function ngos()
    {
        return $this->belongsTo(Ngo::class,'user_id','user_id');
    }
    public function volunteers()
    {
        return $this->belongsTo(Volunteer::class,'user_id','user_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
