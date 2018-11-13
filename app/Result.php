<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = ["id"];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
