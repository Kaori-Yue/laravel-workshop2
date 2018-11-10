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


Route::get('demoone', 'DemoController@index');



Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@authenticate');


//Route::resource('admin/user', 'Admin\UsersController');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('user', 'Admin\UsersController');
});


Route::get('register', function() {
	return App::abort(404);
})->name('register');
