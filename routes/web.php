<?php

use Illuminate\Support\Facades\Route;

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
Route::redirect('/','/en/home');
Route::group(['prefix'=>'{language}'],function(){

Auth::routes([

    'register' => false, // Register Routes...

    'reset'    => false, // Reset Password Routes...

    'verify'   => false, // Email Verification Routes...

]);
Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/user', 'UserController@index')->name('users.index');


