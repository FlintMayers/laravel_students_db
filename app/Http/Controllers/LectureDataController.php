<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use App\Group;
use App\File;
use App\Http\Requests\LectureDataRequest;

class LectureDataController extends Controller
{
    
	public function lectureData(){
		$lectures = Lecture::all();
		$groups = Group::all();				
		return view('lectureData', array('groups' => $groups, 'lectures' => $lectures));
	}
	
	public function addLecture(LectureDataRequest $request){
				
		$lecture = new Lecture();
		
		$lecture->lecture_date = $request->lecture_date;
		$lecture->name = $request->name;
		$lecture->description = $request->description;
		$lecture->group_id = $request->group_id;
		$lecture->save();
		
		if(isset($request->skaidre)){
			foreach($request->file('skaidre') as $failas){
				$medziaga = new File();
				
				$irasytasFailas = $failas->store('public/');
				$medziaga->name = basename($irasytasFailas);
				$medziaga->visibility = 1;
				$medziaga->lecture_id = $lecture->id;
				$medziaga->save();
			}
		}

		return redirect()->back();
	}
	
	public function deleteLecture($id){
		$lecture = Lecture::find($id);
		$lecture->delete();
		$files = File::where('lecture_id', $id);
		$files->delete();
		return redirect()->back();
	}
	
	//deletes specific file
	public function deleteSpecificFile($id){
		$failas = File::find($id);
		$failas->delete();
		return redirect()->back();
	}
	
	//makes file visible to students
	public function makeFileVisible($id){
		$failas = File::find($id);
		$failas->visibility = 1;
		$failas->save();
		return redirect()->back();
	}
	
	//makes file invisible to students
	public function makeFileInvisible($id){
		$failas = File::find($id);
		$failas->visibility = 0;
		$failas->save();
		return redirect()->back();
	}
	
	public function editLecture($id){
		$lecture = Lecture::find($id);
		$groups = Group::all();	
		
		return view('editLecture', array('lecture' => $lecture, 'groups' => $groups));
	}
	
	public function postEditLecture(LectureDataRequest$request){
		$lecture = Lecture::find($request->id);
		$lecture->lecture_date = $request->lecture_date;
		$lecture->name = $request->name;
		$lecture->description = $request->description;
		$lecture->group_id = $request->group_id;
		$lecture->save();
		
		if(isset($request->skaidre)){
			foreach($request->file('skaidre') as $failas){
				$medziaga = new File();
				
				$irasytasFailas = $failas->store('public/');
				$medziaga->name = basename($irasytasFailas);
				$medziaga->visibility = 1;
				$medziaga->lecture_id = $lecture->id;
				$medziaga->save();
			}
		}
		return redirect()->back();
	}
	
	public function postEditedGroup(Request $request){
		$group = Group::find($request->id);
		$group->name = $request->name;
		$group->course_id = $request->course_id;
		$group->start_date = $request->start_date;
		$group->end_date = $request->end_date;
		$group->save();
		return redirect()->back();
	}
}
