<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'TopController@index',
    'as'   => 'top',
]);

Route::get('/thread/create', [
    'uses' => 'ThreadController@add',
    'as'   => 'thread_create',
]);

Route::post('/thread/create', [
    'uses' => 'ThreadController@create',
    'as'   => 'post_thread_create',
]);

Route::get('/thread/{id}', [
    'uses' => 'CommentController@show',
    'as'   => 'comments',
]);

Route::post('/thread/{id}', [
    'uses' => 'CommentController@create',
    'as'   => 'comments',
]);
