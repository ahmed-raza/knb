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
Route::get('user/profile', ['as'=>'user.profile', 'uses'=>'UsersController@profile']);

Route::group(['prefix'=>'user/{id}'], function(){
  Route::get('/', ['as'=>'user.show', 'uses'=>'UsersController@show']);
  Route::get('logout', ['as'=>'user.logout', 'uses'=>'UsersController@logout']);
});

Route::get('ads/{ad}/delete', ['as'=>'ads.delete', 'uses'=>'AdsController@delete']);
Route::resource('ads', 'AdsController');

Route::post('ads/operations', ['as'=>'ads.operations', 'uses'=>'AdminController@adsOperations']);
Route::group(['prefix'=>'admin'], function(){
  Route::get('dashboard', ['as'=>'admin.dashboard', 'uses'=>'AdminController@dashboard']);
});
