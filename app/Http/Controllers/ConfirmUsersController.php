<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConfirmUsersController extends Controller
{
    //
	public function newUsers(){
		$users = User::whereNull('is_admin')->get();
		$usersCount = User::whereNull('is_admin')->count();
		return view('confirmUsers', array('users' => $users, 'usersCount' => $usersCount));
	}
	
	public function insertRole(Request $request){
		$user = User::find($request->id);
		$user->is_admin = $request->role;
		$user->save();
		return redirect()->back();
	}
}
