<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use Validator;

class StudentController extends Controller
{
    public function __construct() {

    }

    public function list() {
    	$students = Student::all();

    	return view('students')->with('students', $students);
    }

    public function add_view() {
    	$courses = Course::all();
    	return view('student-add')->with('courses', $courses);
    }

    public function add(Request $request) {

    	// validate data
    	
    	$validator = Validator::make($request->all(), [
    		'firstname' 	=> 'required',
    		'midname' 		=> 'required',
    		'lastname' 		=> 'required',
    		'year_level' 	=> 'required',
    		'course_id' 	=> 'required'
    	]);

    	// check if validation has meet the required data
    	
    	if ($validator->fails()) {
    		return redirect()->back()
    				->withErrors($validator)
    				->withInput();
    	}

    	// add data
    	
    	$student = new Student;
    	$student->firstname  = $request->firstname;
    	$student->midname    = $request->midname;
    	$student->lastname   = $request->lastname;
    	$student->year_level = $request->year_level;
    	$student->course_id  = $request->course_id;

    	if ($student->save()) {
    		session()->flash('status', 'Successfully Added: ' . $request->firstname);
    		return redirect()->route('student.list');
    	} 

    	session()->flash('status', 'Something went wrong!');
    	return redirect()->route('student.list');
    }

    public function update_view($student_id) {

    	$student = Student::find($student_id);
    	$courses = Course::all();
    	return view('student-update')->with('student', $student)->with('courses', $courses);

    }

    public function update(Request $request) {

    	// validate data
    	
    	$validator = Validator::make($request->all(), [
    		'firstname' 	=> 'required',
    		'midname' 		=> 'required',
    		'lastname' 		=> 'required',
    		'year_level' 	=> 'required',
    		'course_id' 	=> 'required'
    	]);

    	// check if validation has meet the required data
    	
    	if ($validator->fails()) {
    		return redirect()->back()
    				->withErrors($validator)
    				->withInput();
    	}

    	$student = Student::find($request->student_id);
    	$student->firstname  = $request->firstname;
    	$student->midname    = $request->midname;
    	$student->lastname   = $request->lastname;
    	$student->year_level = $request->year_level;
    	$student->course_id  = $request->course_id;

    	if ($student->save()) {
    		session()->flash('status', 'Successfully Updated');
    		return redirect()->route('student.list');
    	} 

    	session()->flash('status', 'Something went wrong!');
    	return redirect()->route('student.list');

    }

    public function delete(Request $request) {

    	$student = Student::find($request->student_id);

    	if ($student->delete()) {
    		session()->flash('status', 'Successfully deleted');
    		return redirect()->route('student.list');
    	}

    	session()->flash('status', 'Something went wrong!');
    	return redirect()->route('student.list');

    }
}
