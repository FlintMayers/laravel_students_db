<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests\CoursesRequest;

class CourseController extends Controller
{
	public function courses(){
		$courses = Course::all();
		
		$total = Course::all()->count();
		
		return view('courses', array('courses' => $courses, 'total' => $total));
	}
	
	public function addCourse(CoursesRequest $request){
		$course = new Course();
		$course->name = $request->name;
		$course->save();
		return redirect()->back();
	}
	
	public function deleteCourse($id){
		$course = Course::find($id);
		$course->delete();
		return redirect()->back();
	}
	
	public function editCourse($id){
		$course = Course::find($id);
		
		return view('editCourse', compact('course'));
	}
	
	public function postEditedCourse(CoursesRequest $request){
		$course = Course::find($request->id);
		$course->name = $request->name;
		$course->save();
		return redirect()->back();
	}
}
