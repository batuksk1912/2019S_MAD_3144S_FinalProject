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


Route::group(["middleware" => "App\Http\Middleware\AdminMiddleware"], function () {
    //Route::match(["get", "post"], "/students/", "HomeController@admin");
    Route::get('/students', function () {
        $students = \App\Student::all();

        return view('Students', ['students' => $students]);
    });
});


