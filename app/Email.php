<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    public function group(){
    	return $this->belongsTo('App\Group');
    }
}
