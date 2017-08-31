<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function course(){
    	return $this->belongsTo('App\Course');
    }
    
    public function lectures(){
    	return $this->hasMany('App\Lecture');
    }
    
    public function users(){
    	return $this->belongsToMany('App\User');
    }
    
    public function emails(){
    	return $this->hasMany('App\Email');
    }
}
