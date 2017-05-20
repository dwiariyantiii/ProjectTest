<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
// Route::resource('user','UserController',['except' => ['create','edit']]);
// Route::resource('book','BookController',['except' => ['create','edit']]);
// // Route::get('golongan/init','GolonganController@index');
// // Route::post('golongan/create','GolonganController@create');
// Route::resource('golongan', 'GolonganController',
//                 ['only' => ['index', 'show']]);

// // Route::resource('golongan', 'GolonganController',
// //                 ['except' => ['create', 'store', 'update', 'destroy']]);
// Route::post('golongan/store','GolonganController@store');
Route::resource('golongan','GolonganController');
Route::post('golongan/update/{id}','GolonganController@update');
Route::post('golongan/delete/{id}','GolonganController@destroy');

Route::resource('pegawai','PegawaiController');
Route::get('pegawai/create','PegawaiController@create');
//Route::post('pegawai/store}','PegawaiController@store');
Route::post('pegawai/update/{id}','PegawaiController@update');
Route::post('pegawai/delete/{id}','PegawaiController@destroy');