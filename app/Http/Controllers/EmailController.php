<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\EmailRequest;

class EmailController extends Controller
{

    public function sendEmail(EmailRequest $request){
    	$email = new Email();
    	
    	$email->title = $request->title;
    	$email->body = $request->body;
    	$email->group_id = $request->group_id;
    	$email->save();
    	return redirect()->back();
    }
    
    public function receivedEmails(){
    	//current student
    	$user = User::find(Auth::user()->id);
    	//student enrolled in these groups
    	$groups = $user->groups()->get();
    	
//     	foreach($groups as $group){
//     		foreach($group->emails as $email){
//     			echo $group->name . $email->title . '<br>';    		
//     		}
//     	}
	
    	return view('user/emails', array('groups' => $groups));
    }
}
