<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\RegisterController@action');
Route::post('login', 'Api\LoginController@action');
Route::get('user-detail', 'Api\UserController@userDetail')->middleware('auth:api');
Route::post('post/create', 'Api\PostController@createPost')->middleware('auth:api');
Route::get('post/', 'Api\PostController@getAllPost')->middleware('auth:api');
Route::get('post/{post}', 'Api\PostController@show')->middleware('auth:api');
Route::put('post/{post}', 'Api\PostController@update')->middleware('auth:api');
