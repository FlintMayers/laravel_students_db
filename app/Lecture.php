<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //
    public function group(){
    	return $this->belongsTo('App\Group');
    }
    
    public function files(){
    	return $this->hasMany('App\File');
    }
}
