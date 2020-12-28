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

Auth::routes([

    'register' => false, // Register Routes...

    'reset'    => false, // Reset Password Routes...

    'verify'   => false, // Email Verification Routes...

]);


Route::get('/', 'HomeController@index')->name('home');


Route::get('/kobodatatable', 'HomeController@KoboDataTable')->name('home.kobodatatable');



