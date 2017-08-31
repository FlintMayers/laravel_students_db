<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use App\Course;
use Illuminate\Support\Facades\Auth;

class ManageStudentsController extends Controller
{
	public function studentsList($id, $course_id){
		
		$group = Group::find($id);
		$course = Course::find($course_id);
		
		$enrolledStudents = Group::find($id)->users()->orderBy('name')->get();
		
		$allStudents = User::where('is_admin', 1)->get();
		
		return view('studentsList', array('group' => $group, 'course' => $course, 'enrolledStudents' => $enrolledStudents, 'allStudents' => $allStudents));
	}
	
	public function deleteEnrolledStudent($group_id, $student_id){
		$group = Group::find($group_id);
		$group->users()->detach($student_id);
		return redirect()->back();
	}
	
	public function addStudentToCourse(Request $request){
		
		$group = Group::find($request->group_id);
		$group->users()->attach($request->student_id);
		return redirect()->back();
	}
	
	public function information(){
		//current student
		$user = User::find(Auth::user()->id);
		//student enrolled in these groups
		$groups = $user->groups()->get();
		
		return view('user/information', array('user' => $user, 'groups' => $groups));
	}
}
