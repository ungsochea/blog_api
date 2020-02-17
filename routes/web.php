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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard','DashboardController@index');

Route::get('create-category','CategoryController@create');
Route::get('all-categories','CategoryController@index')->name('category.index');
Route::post('post-category-form','CategoryController@store');
Route::get('edit-category/{category}','CategoryController@edit')->name('category.edit');
Route::patch('update-category/{category}','CategoryController@update')->name('category.update');
Route::get('delete-category/{category}','CategoryController@destroy')->name('category.delete');

Route::post('store-post','BlogPostController@store')->name('post.store');
Route::get('create-post','BlogPostController@create')->name('post.create');
Route::get('get-post','BlogPostController@index')->name('post.index');
Route::get('edit-post/{blogPost}','BlogPostController@edit')->name('post.edit');
Route::patch('update-post/{blogPost}','BlogPostController@update')->name('post.update');
Route::get('delete-post/{blogPost}','BlogPostController@destroy')->name('post.destroy');


