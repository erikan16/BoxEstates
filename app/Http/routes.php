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

Route::get('pages/agent', function () {
    return view('pages/agent');
});

Route::get('pages/article', function () {
    return view('pages/article');
});

Route::get('pages/buy', function () {
    return view('pages/buy');
});

Route::get('pages/sell', function () {
    return view('pages/sell');
});

Route::get('/', 'WelcomeController@getIndex');

Route::resource('article', 'ArticleController');

