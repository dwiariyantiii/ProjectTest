<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//     return view('home');
// })->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/', function () {
return view('admin_template');
})->middleware('auth');

Route::get('/home', function () {
return view('admin_template');
})->middleware('auth');

Route::get('/golongan', function () {
return view('golongan');
})->middleware('auth');