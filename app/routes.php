<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'MainController@index');

Route::group(['prefix' => 'admin'], function (){
	Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@index']);
	
	Route::get('cv', ['as' => 'admin.cv.index', 'uses' => 'AdminController@openCV']);
	
	Route::get('cv-create', ['as' => 'admin.cv.create', 'uses' => 'AdminController@openCVCreate']);
	Route::post('cv-create', ['as' => 'admin.cv.create.store', 'uses' => 'AdminController@storeCV']);
});

Route::group(['prefix' => 'api'], function (){
	Route::resource('industry', 'IndustryController');
});
