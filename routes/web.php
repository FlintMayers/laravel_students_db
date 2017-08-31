<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Course;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
		return view('welcome');
	});
	
	Route::get('/pending', function(){
		return view('warning');
	});
	
	//pasiekiama ir destytojams, ir studentams
	Route::group(['middleware' => 'checkRole'], function () {
		
		//home pasiekiamas tik patvirtintiems vartotojams
		Route::get('/', 'HomeController@index')->name('home');
		
		//laiskai atsiusti studentams
		Route::get('receivedEmails', 'EmailController@receivedEmails')->name('receivedEmails');
		
		//bendra informacija studentams
		Route::get('/information', 'ManageStudentsController@information')->name('information');
		
		//kontaktine informacija be galimybes ja keisti
		Route::get('/kontaktai', 'ContactsController@kontaktai')->name('kontaktai');
		
		
		//pasiekiama tik destytojams
		Route::group(['middleware' => 'adminOnly'], function () {
			
			//kontaktine informacija
			Route::get('/contacts', 'ContactsController@contacts')->name('contacts');
			Route::post('/postContacts', 'ContactsController@postContacts')->name('postContacts');
			
			//kursai
			Route::get('courses', 'CourseController@courses')->name('courses');
			Route::post('addCourse', 'CourseController@addCourse')->name('addCourse');
			Route::get('deleteCourse/{id}', 'CourseController@deleteCourse')->name('deleteCourse');
			Route::get('editCourse/{id}', 'CourseController@editCourse')->name('editCourse');
			Route::post('postEditedCourse', 'CourseController@postEditedCourse')->name('postEditedCourse');
	
			//grupes
			Route::get('groups', 'GroupController@groups')->name('groups');
			Route::post('addGroup', 'GroupController@addGroup')->name('addGroup');
			Route::get('deleteGroup/{id}', 'GroupController@deleteGroup')->name('deleteGroup');
			Route::get('editGroup/{id}', 'GroupController@editGroup')->name('editGroup');
			Route::post('postEditedGroup', 'GroupController@postEditedGroup')->name('postEditedGroup');
			
			//studentu priskyrimas prie grupes
			Route::get('/manageStudents/{id}/{course_id}', 'ManageStudentsController@studentsList')->name('manageStudents');
			Route::post('/addStudentToCourse', 'ManageStudentsController@addStudentToCourse')->name('addStudentToCourse');
			Route::get('/deleteEnrolledStudent/{group_id}/{student_id}', 'ManageStudentsController@deleteEnrolledStudent')->name('deleteEnrolledStudent');
			
			//nauju vartotoju valdymas
			Route::get('/confirmUsers', 'ConfirmUsersController@newUsers')->name('confirmUsers');
			Route::post('/insertRole', 'ConfirmUsersController@insertRole')->name('insertRole');
			
			//mokomoji medziaga
			Route::get('/lectureData', 'LectureDataController@lectureData')->name('lectureData');
			Route::post('/addLecture', 'LectureDataController@addLecture')->name('addLecture');
			Route::get('deleteLecture/{id}', 'LectureDataController@deleteLecture')->name('deleteLecture');
			Route::get('editLecture/{id}', 'LectureDataController@editLecture')->name('editLecture');
			Route::post('postEditLecture', 'LectureDataController@postEditLecture')->name('postEditLecture');
			
			//file editing
			Route::get('deleteSpecificFile/{id}', 'LectureDataController@deleteSpecificFile')->name('deleteSpecificFile');
			Route::get('makeFileVisible/{id}', 'LectureDataController@makeFileVisible')->name('makeFileVisible');
			Route::get('makeFileInvisible/{id}', 'LectureDataController@makeFileInvisible')->name('makeFileInvisible');
			
			//siusti masini e-mail visai grupei
			Route::post('/sendEmail', 'EmailController@sendEmail')->name('sendEmail');
		
		});
		
	});
});


Auth::routes();
