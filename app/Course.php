<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	public function group(){
		return $this->hasMany('App\Group');
	}
}
