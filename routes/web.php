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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('register','UserController@getSignupPage')->name('register');
Route::post('register',['as'=>'postRegister','uses'=>'UserController@postSignup']);

Route::get('login','UserController@getSignIn')->name('login');;


Route::post('login',['as'=>'postLogin','uses'=>'UserController@postSignIn']);
Route::post('doSignOut',['as'=>'doSignOut','uses'=>'UserController@doSignOut']);

Route::get('success','UserController@getSuccessPage')->name('success');