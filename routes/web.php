<?php
Auth::routes();

// admin
Route::get('/posts/novo', 'PostsController@novo')->name('admin.posts.new');
Route::post('/posts/save', 'PostsController@save')->name('admin.posts.save');
Route::get('/posts/{id}/edit', 'PostsController@edit')->name('admin.posts.edit');
Route::get('/posts/{id}/remove', 'PostsController@remove')->name('admin.posts.remove');
Route::get('/posts/{id}/publish', 'PostsController@publish')->name('admin.posts.publish');
Route::get('/posts/{id}/unpublish', 'PostsController@unpublish')->name('admin.posts.unpublish');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/postagem/{id}/{slug}', 'PublicController@postagem');
Route::get('/', 'PublicController@index');
