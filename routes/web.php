<?php
Auth::routes();

// admin
Route::get('/posts/novo', 'PostsController@novo')->name('admin.posts.new');
Route::post('/posts/create', 'PostsController@create')->name('admin.posts.create');
Route::get('/posts/{id}/edit', 'PostsController@edit')->name('admin.posts.edit');
Route::put('/posts/{id}/uodate', 'PostsController@update')->name('admin.posts.update');
Route::get('/posts/{id}/remove', 'PostsController@remove')->name('admin.posts.remove');
Route::get('/posts/{id}/publish', 'PostsController@publish')->name('admin.posts.publish');
Route::get('/posts/{id}/unpublish', 'PostsController@unpublish')->name('admin.posts.unpublish');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/postagem/{id}/{slug}', 'PublicController@postagem');
Route::get('/', 'PublicController@index');
