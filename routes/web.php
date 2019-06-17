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


Route::group(['middleware' => ['auth']], function () {
    //only authorized users can access these routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/history', 'HistoryController@index')->name('history');

    Route::post('/test', 'TestsController@show')->name('test');

    Route::resource('profile', 'ProfileController');
});


Route::group(["middleware" => "App\Http\Middleware\AdminMiddleware"], function () {
    Route::get('/admin', 'HomeController@indexAdmin')->name('home');
    Route::get('/manage-tests', 'TestsController@index')->name('manage-tests');
    Route::get('/edit-tests/{id}', 'TestsController@edit')->name('edit-tests');
    Route::put('/edit-tests/{id}', 'TestsController@update')->name('update-tests');
});


