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

/*Route::get('/', function () {
    return view('pages.index');
});*/

Route::get('/','App\Http\Controllers\HelloController@index');

Route::get('contactUs','App\Http\Controllers\HelloController@contact')->name('contact');

Route::get('aboutUs','App\Http\Controllers\HelloController@about')->name('about');


/*-----------Category CRUD here----------------------*/

Route::get('add/category','App\Http\Controllers\BoloController@addCategory')->name('add.category');

Route::post('store/category','App\Http\Controllers\BoloController@storeCategory')->name('store.category');

Route::get('all/category','App\Http\Controllers\HelloController@allCategory')->name('all.category');

Route::get('viewCategory/{id}','App\Http\Controllers\HelloController@viewCategory');

Route::get('deleteCategory/{id}','App\Http\Controllers\HelloController@deleteCategory');

Route::get('edit/category/{id}','App\Http\Controllers\HelloController@editCategory');

Route::post('update/category/{id}','App\Http\Controllers\HelloController@updateCategory');

/*-----------Post CRUD here-----------*/

Route::get('write/post','App\Http\Controllers\PostController@posts')->name('post');

Route::post('store/post','App\Http\Controllers\PostController@storePost')->name('storePost');

Route::get('allPost','App\Http\Controllers\PostController@allPost')->name('allPost');

Route::get('viewPost/{id}','App\Http\Controllers\PostController@viewPost');

Route::get('postDelete/{id}','App\Http\Controllers\PostController@postDelete');

Route::get('postEdit/{id}','App\Http\Controllers\PostController@postEdit');

Route::post('updatePost/{id}','App\Http\Controllers\PostController@updatePost');

Route::get('viewDetails/{id}','App\Http\Controllers\PostController@viewDetails');



