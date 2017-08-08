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

Route::get('/', ['as'=>'home', 'uses'=>'PagesController@index']);
Route::get('about', ['as'=>'about', 'uses'=>'PagesController@about']);
Route::get('team', ['as'=>'team', 'uses'=>'PagesController@team']);
Route::get('user/profile', ['as'=>'user.profile', 'uses'=>'UsersController@profile']);

Route::group(['prefix'=>'user/{id}'], function(){
  Route::get('edit', 'UsersController@edit')->name('user.edit');
  Route::post('update', 'UsersController@update')->name('user.update');
  Route::get('delete', 'UsersController@delete')->name('user.delete');
  Route::get('/', ['as'=>'user.show', 'uses'=>'UsersController@show']);
  Route::get('logout', ['as'=>'user.logout', 'uses'=>'UsersController@logout']);
});

Route::get('ads/search', ['as'=>'ads.search', 'uses'=>'AdsController@index']);
Route::post('ads/{ad}/send-message', ['as'=>'ads.message', 'uses'=>'AdsController@adsMessage']);
Route::get('ads/{ad}/delete', ['as'=>'ads.delete', 'uses'=>'AdsController@delete']);
Route::resource('ads', 'AdsController');
Route::resource('contact', 'ContactController', ['only'=>['index', 'store']]);

Route::group(['prefix'=>'admin'], function(){
  Route::post('operations', ['as'=>'admin.operations', 'uses'=>'AdminController@adsOperations']);
  Route::get('content', ['as'=>'admin.content', 'uses'=>'AdminController@content']);
  Route::get('users', ['as'=>'admin.users', 'uses'=>'AdminController@users']);
  Route::get('contact/submissions', ['as'=>'admin.contact_submissions', 'uses'=>'AdminController@contactSubmissions']);
});
