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




Route::get('pages/buy', 'PagesController@getBuy');

Route::get('pages/sell', 'PagesController@getSell');

Route::get('pages/agent', 'PagesController@getAgent');

Route::get('pages/article', 'PagesController@getArticle');

Route::get('/', 'PagesController@getIndex');

Route::resource('dashboard', 'DashboardController@getIndex');

Route::resource('todo', 'TodoController');

Route::resource('article', 'ArticleController');

Route::resource('property', 'PropertyController');

//Route::get('password/rest/{token?}');
//Route::post();
//Route::post();

Route::auth();

//Route::get('/home', 'HomeController@index');
