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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'admin'], function () {

});
Route::group(['middleware' => 'nanny'], function () {
    Route::resource('nanny','NannyController');
    Route::resource('nanny.ad','AdController');
    Route::resource('nanny.planning','PlanningController');
});
Route::group(['middleware' => 'parent'], function () {
    Route::resource('parent','ParentAppController');
});
Route::resource('role', 'RoleController');
Route::resource('login', 'LoginController');
Route::post('logout', 'LoginController@logout')->name('logout');
Route::get('register', 'RegisterController@get')->name('register');
Route::post('register', 'RegisterController@post')->name('register.post');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');




