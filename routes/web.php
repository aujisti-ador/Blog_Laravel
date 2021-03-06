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
Route::get('/blog_details/{id}', 'IndexController@blog_details');
Route::get('/blog_post_by_category/{id}', 'IndexController@blog_post_by_category');
Route::get('/contact', 'IndexController@contact');

//start admin panel Routs
Route::get('/dashboard', 'SuperAdminController@index');

//login logout
Route::post('/admin_login', 'AdminController@admin_login_check');
Route::get('/admin_panel', 'AdminController@index');
Route::get('/logout', 'SuperAdminController@logout');

//pages
//-------------------------------------
//handle category blog
Route::get('/add_category', 'SuperAdminController@add_category');
Route::get('/edit_category/{id}', 'SuperAdminController@edit_category');
Route::get('/delete_category/{id}', 'SuperAdminController@delete_category');
Route::post('/save_category', 'SuperAdminController@save_category');
Route::post('/update_category', 'SuperAdminController@update_category');
Route::get('/manage_category', 'SuperAdminController@manage_category');
Route::get('/unpublish_category/{id}', 'SuperAdminController@unpublish_category');
Route::get('/publish_category/{id}', 'SuperAdminController@publish_category');

//handle blog post
Route::get('/manage_blog', 'SuperAdminController@manage_blog');
Route::get('/add_blog', 'SuperAdminController@add_blog');
Route::post('/save_blog', 'SuperAdminController@save_blog');
Route::get('/edit_blog/{id}', 'SuperAdminController@edit_blog');
Route::post('/update_blog', 'SuperAdminController@update_blog');
Route::get('/unpublish_blog/{id}', 'SuperAdminController@unpublish_blog');
Route::get('/publish_blog/{id}', 'SuperAdminController@publish_blog');
Route::get('/delete_blog/{id}', 'SuperAdminController@delete_blog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
