<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Course;
use App\Http\Requests\GroupsRequest;

class GroupController extends Controller
{
    public function groups(){
    	$groups = Group::all();
    	$courses = Course::all();
    	
    	$total = Group::all()->count();
    	
    	return view('groups', array('groups' => $groups, 'courses' => $courses, 'total' => $total));
    }
    
    public function addGroup(GroupsRequest $request){
    	$group = new Group();
    	$group->name = $request->name;
    	$group->course_id = $request->course_id;
    	$group->start_date = $request->start_date;
    	$group->end_date = $request->end_date;
    	$group->save();
    	return redirect()->back();
    }
    
    public function deleteGroup($id){
    	$group = Group::find($id);
    	$group->delete();
    	return redirect()->back();
    }
    
    public function editGroup($id){
    	$groups = Group::find($id);
    	$courses= Course::all();
    	return view('editGroup', array('groups' => $groups, 'courses' => $courses));
    }
    
    public function postEditedGroup(GroupsRequest $request){
    	$group = Group::find($request->id);
    	$group->name = $request->name;
    	$group->course_id = $request->course_id;
    	$group->start_date = $request->start_date;
    	$group->end_date = $request->end_date;
    	$group->save();
    	return redirect()->back();
    }
}
