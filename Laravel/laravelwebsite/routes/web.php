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




# Route::get('/about','PagesController@about');
# Route::get('/services','PagesController@services');

# Posts
Route::get('/', 'PostsController@index');
Route::resource('posts', 'PostsController');

# Authentication
Auth::routes();

# Dashboard
Route::get('/dashboard', 'DashboardController@index');

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

// Votes
# Route::post('posts/{id}/upvote', ['uses' => 'PostsController@upvote', 'as' => 'posts.upvote']);
Route::post('posts/{id}/{user_id}/upvote', 'PostsController@upvote');
Route::post('posts/{id}/{user_id}/downvote', 'PostsController@downvote');