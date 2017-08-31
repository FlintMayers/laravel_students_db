<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function contacts(){
    	
    	$content = Contact::find(1)->contacts_html;    	
    	return view('contacts', array('content' => $content));  	
    }
    
    //saving tinyMce textarea html to database;
    public function postContacts(Request $request){
    	$content = Contact::find(1);
    	$content->contacts_html = $request->content;
    	$content->save();
		return redirect()->back();
    }
    
    //kontaktai atvaizduojami studentams
    public function kontaktai(){
    	$content = Contact::find(1)->contacts_html;
    	return view('user/kontaktai', array('content' => $content));  
    }
}
