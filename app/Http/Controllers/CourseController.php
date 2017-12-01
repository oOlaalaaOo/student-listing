<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

class CourseController extends Controller
{
    public function __construct() {

    }

    public function list() {
    	$courses = Course::all();

    	return view('welcome')->with('courses', $courses);
    }
}
