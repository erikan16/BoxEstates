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

// Web Pages Routes

Route::get('pages/buy', 'PagesController@getBuy');

Route::get('pages/sell', 'PagesController@getSell');
Route::post('pages/sell', 'PagesController@postSell');

Route::get('pages/agent', 'PagesController@getAgent');
Route::get('pages/article', 'PagesController@getArticle');
Route::get('/', 'PagesController@getIndex');


// Dashboard Pages Routes

Route::resource('dashboard', 'DashboardController@getIndex');
Route::resource('tags', 'TagController', ['except' => ['create']]);
Route::get('pages/{slug}', ['as' => 'article.single', 'uses' => 'ArticleSingleController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');
Route::resource('todo', 'TodoController');
Route::resource('article', 'ArticleController');
Route::resource('property', 'PropertyController');
Route::resource('profile', 'ProfileController');


// Comments
Route::post('comments/{article_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);

// Authentication

Route::auth();
