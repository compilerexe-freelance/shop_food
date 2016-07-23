<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// AuthController
// Route::get('/', 'Auth\AuthController@index');
// Route::get('/register', 'Auth\AuthController@getRegister');
// Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/login', 'Auth\AuthController@index');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', ['as'=>'logout','uses' => 'Auth\AuthController@logout']);

// AdminController
Route::get('/admin', 'AdminController@index');
// Category
Route::get('/add_category', 'AdminController@getAddCategory');
Route::post('/add_category', 'AdminController@postAddCategory');
Route::get('/edit_category', 'AdminController@getEditCategory');
Route::get('/edit_category/{id}', 'AdminController@getEditCategoryId');
Route::post('/update_category', 'AdminController@postUpdateCategory');
Route::get('/delete_category', 'AdminController@getDeleteCategory');
Route::get('/delete_category/{id}', 'AdminController@postDeleteCategory');
// Product
Route::get('/add_product', 'AdminController@getAddProduct');
Route::post('/add_product', 'AdminController@postAddProduct');
Route::get('/edit_product', 'AdminController@getEditProduct');
Route::get('/edit_product/{id}', 'AdminController@getEditProductId');
Route::post('/edit_product', 'AdminController@postEditProduct');
Route::get('/delete_product', 'AdminController@getDeleteProduct');
Route::get('/delete_product/{id}', 'AdminController@getDeleteProductId');
Route::get('/change_banner', 'AdminController@getChangeBanner');
Route::post('/change_banner', 'AdminController@postChangeBanner');

// UserController
Route::get('/', 'UserController@index');
Route::get('/view_item/{id}', 'UserController@getViewItem');
Route::get('/how_to_buy', 'UserController@getHowToBuy');
Route::get('/how_to_payment', 'UserController@getHowToPayment');
Route::get('/how_to_send', 'UserController@getHowToSend');
Route::get('/about', 'UserController@getAbout');
Route::get('/contact', 'UserController@getContact');
