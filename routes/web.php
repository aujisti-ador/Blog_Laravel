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

//Route::get('/', function () {
//    return view('index');
//});


//blog frontend Routs
Route::get('/', 'IndexController@index');
Route::get('/blog_details', 'IndexController@blog_details');
Route::get('/contact', 'IndexController@contact');

//start admin panel Routs
Route::get('/dashboard', 'SuperAdminController@index');

//login logout
Route::post('/admin_login', 'AdminController@admin_login_check');
Route::get('/admin_panel', 'AdminController@index');
Route::get('/logout', 'SuperAdminController@logout');

//pages
Route::get('/add_category', 'SuperAdminController@add_category');
Route::post('/save_category', 'SuperAdminController@save_category');
Route::get('/manage_category', 'SuperAdminController@manage_category');
Route::get('/unpublish_category/{id}', 'SuperAdminController@unpublish_category');
Route::get('/publish_category/{id}', 'SuperAdminController@publish_category');
