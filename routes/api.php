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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('login','LoginCOntroller@get')->name('login');
Route::post('login','LoginCOntroller@post')->name('login.connect');
Route::get('register', 'RegisterController@get')->name('register');
Route::post('register', 'RegisterController@post')->name('register.post');
Route::resource('role', 'RoleController');



