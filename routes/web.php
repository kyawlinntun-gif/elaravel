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
Route::match(['put', 'patch'], 'cart/edit', 'ShoppingCartController@update');
Route::delete('cart/delete', 'ShoppingCartController@delete');
Route::get('cart', 'ShoppingCartController@index');

// Cart Checkout

Route::group(['middleware' => ['auth:customer']], function(){
    Route::get('checkout', 'CheckOutController@index');
});

// Customer Login
Route::group(['prefix' => 'customer', 'namespace' => 'AuthCustomer', 'as' => 'customer.'], function(){
    // Login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

    // Register
    Route::get('register', 'RegisterController@showRegisterForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register');

    // Logout
    Route::post('logout', 'LoginController@logout')->name('logout');
});

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



