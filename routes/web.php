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
    return redirect('home');
});

Route::resource('home', 'HomeController');

// Products by Category
Route::get('category/all/products', 'HomeController@index');
Route::get('category/{category_id}/products', 'HomeController@index');

// Products by Manufacture
Route::get('brand/all/products', 'HomeController@index');
Route::get('brand/{brand_id}/products', 'HomeController@index');

// Products detail
Route::get('product/show/{product_id}', 'HomeController@productShow');

// Cart add
Route::post('cart/add', 'ShoppingCartController@addCart');
Route::get('cart', 'ShoppingCartController@index');

// BackEnd

Auth::routes();
Route::resource('/admin', 'AdminController');

Route::group(['middleware' => ['auth', 'role:admin', 'permission:manager']], function(){

    Route::get('/dashboard', 'AdminController@dashboard');
    
    // Category
    Route::match(['put', 'patch'],'category/status', 'CategoryController@status');
    // Route::put('category/status', 'CategoryController@status');
    Route::resource('category', 'CategoryController');

    // Brand or Manufacture
    Route::match(['put', 'patch'], 'brand/status', 'BrandController@status');
    Route::resource('brand', 'BrandController');

    // Product
    Route::match(['put', 'patch'], 'product/status', 'ProductController@status');
    Route::resource('product', 'ProductController');

    // Slider
    Route::match(['put', 'patch'], 'slider/status', 'SliderController@status');
    Route::resource('slider', 'SliderController');

});



