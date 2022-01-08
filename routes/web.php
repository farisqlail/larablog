<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');

Route::group(['middleware'=>'auth'], function(){
    Route::post('/ajaxcreate', 'BlogAjaxController@url');
    Route::get('/blogajax', 'BlogAjaxController@index')->name('blog.index');
    Route::get('/blogajax/create', 'BlogAjaxController@create')->name('blog.create');
    Route::post('/blogajax/create', 'BlogAjaxController@store')->name('blog.store');
    Route::get('/blogajax/{blog}', 'BlogAjaxController@show')->name('blog.show');
    Route::get('/blogajax/{blog}/edit', 'BlogAjaxController@edit')->name('blog.edit');
    Route::patch('/blogajax/{blog}/edit', 'BlogAjaxController@update')->name('blog.update');
    Route::delete('/blogajax/delete', 'BlogAjaxController@destroy');

    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/create', 'PostController@store')->name('post.store');
    Route::get('/post/{post}', 'PostController@detail')->name('post.detail');
    Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');
    Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store');
    
    
});