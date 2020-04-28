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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function ()
{
    Route::resource('department','DepartmentController');
    Route::resource('class','ClassStudentController');
// Route::resource('student','StudentController');
Route::get('student','StudentController@index');
 // Route::post('student/store','StudentController@store');

 Route::post('student/store',['middleware'=>'create:SuperAdmin,Teacher','uses'=>'StudentController@store']);
 Route::get('student/create',['middleware'=>'create:SuperAdmin,Teacher','uses'=>'StudentController@create']);
 //Route::get('student/{student}','StudentController@show');
 // Route::put('student/update/{student}','StudentController@update');
 Route::put('student/update/{student}',['middleware'=>'update:SuperAdmin,Student','uses'=>'StudentController@update']);
 //Route::delete('student/destroy/{student}','StudentController@destroy');
 Route::delete('student/destroy/{student}',['middleware'=>'delete:SuperAdmin','uses'=>'StudentController@destroy']);
 Route::get('student/edit/{student}','StudentController@edit');

 
});
