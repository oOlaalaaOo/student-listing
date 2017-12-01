<?php

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

Route::get('/', 'StudentController@list')->name('student.list');

Route::get('/student/add', 'StudentController@add_view')->name('student.add.view');
Route::post('/student/add', 'StudentController@add')->name('student.add');

Route::get('/student/update/{student_id}', 'StudentController@update_view')->name('student.update.view');
Route::post('/student/update', 'StudentController@update')->name('student.update');

Route::post('/student/delete', 'StudentController@delete')->name('student.delete');