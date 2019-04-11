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

Route::get('/', 'PostController@index');
Route::get('/forma/{category}', 'PostController@create');
Route::get('/add-category', 'CategoryController@createCategory');

Route::post('/store', 'PostController@store');
Route::post('/storeCategory','CategoryController@storeCategory');
Route::get('/post/{post}', 'PostController@show');

Route::get('/post/{id}/edit', 'PostController@edit');
Route::patch('/post/{id}/update', 'PostController@update');
Route::delete('/post/{id}/destroy', 'PostController@destroy');