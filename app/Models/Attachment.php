<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

        protected $table ='attachments';
        protected $fillable = ['foreign_id','classname','name','size','height','width','path'];

}