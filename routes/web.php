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
//Posts
Route::get('/', 'PostController@index');
Route::get('/forma', 'PostController@create');
Route::post('/store', 'PostController@store');
Route::get('/post/{post}', 'PostController@show');
Route::get('/post/{id}/edit', 'PostController@edit');
Route::patch('/post/{id}/update', 'PostController@update');
Route::delete('/post/{id}/destroy', 'PostController@destroy');
Route::get('/category/{id}', 'PostController@showByID');

//Categories
Route::get('/add-category', 'CategoryController@createCategory');
Route::post('/storeCategory','CategoryController@storeCategory');

//Comments
Route::post('/add-comment', 'CommentsController@store');

//Auth
Auth::routes();
Route::get('/home', 'DashboardController@index')->name('home');

//Admin
Route::get('/dashboard','DashboardController@index');
