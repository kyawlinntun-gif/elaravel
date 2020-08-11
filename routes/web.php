<?php

use Illuminate\Support\Facades\Auth;
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

// FrontEnd

Route::get('/', function(){
    return redirect()->action('HomeController@index');
});

Route::resource('home', 'HomeController');

// BackEnd

Route::resource('/admin', 'AdminController');
Route::get('/dashboard', 'AdminController@dashboard');
Auth::routes();

// Category
Route::match(['put', 'patch'],'category/status', 'CategoryController@status');
// Route::put('category/status', 'CategoryController@status');
Route::resource('category', 'CategoryController');



