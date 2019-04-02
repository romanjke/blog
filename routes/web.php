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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/posts/{post}', 'HomeController@show')->name('home.show');

Route::group(['middleware' => 'can:admin'], function(){
    // Admin panel
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    // Posts
    Route::resource('/admin/posts', 'PostsController');
});

// Comments
Route::post('{post}/comments', 'CommentsController@store')->name('comments.store');
Route::get('/comments/{comment}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('/comments/{comment}', 'CommentsController@update')->name('comments.update');
Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');