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

Route::get('/', array('as' => 'home.index', 'uses' => 'HomeController@index'));
Route::get('/login', array('as' => 'home.login', 'uses' => 'HomeController@login'));
Route::get('/logout', array('as' => 'home.logout', 'uses' => 'HomeController@logout'));
Route::get('/register', array('as' => 'home.register', 'uses' => 'HomeController@register'));
Route::post('/register', array('as' => 'home.register', 'uses' => 'HomeController@register'));
Route::get('/waiting-list', array('as' => 'pages.waiting_list', 'uses' => 'PagesController@waitingList'));

Route::post('/login', array('as' => 'home.login', 'before' => 'csrf', 'uses' => 'HomeController@login'));

Route::post('/links/get-site-title', array('as' => 'links.get_site_title', 'uses' => 'LinksController@getSiteTitle'));
Route::post('/links/add-to-waiting-list', array('as' => 'links.add_to_waiting_list', 'uses' => 'LinksController@addToWaitingList'));

Route::resource('categories', 'CategoriesController');
Route::resource('links', 'LinksController');