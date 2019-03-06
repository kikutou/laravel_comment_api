<?php

use Illuminate\Http\Request;

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

Route::post('/site/register', "Api\SiteController@register");
Route::post('/comment/add', "Api\CommentController@add_comment");
Route::post('/comments', "Api\CommentController@get_comments");
