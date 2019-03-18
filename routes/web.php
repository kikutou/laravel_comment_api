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

Route::get('show_sites','SiteController@index')->name('get_show_sites');
Route::get('show_add_sites','SiteController@show_add_site')->name('get_show_add_sites');
Route::post('add_sites','SiteController@add')->name('post_add_sites');
Route::get('site_delete','SiteController@show_delete_site')->name('get_site_delete');
Route::post('delete_site','SiteController@delete')->name('post_delete_sites');
