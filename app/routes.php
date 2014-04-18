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

Route::get('/', function()
{
	return Redirect::route('lists');
});

Route::get('lists', ['as' => 'lists', 'uses' => 'WordsController@lists']);

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::resource('words', 'WordsController');

Route::post('conjugations/store/{word_id}', 'ConjugationsController@store');

Route::resource('conjugations', 'ConjugationsController');

Route::get('list/{type}/{subtype?}/{uverbtype?}', ['as' => 'list', 'uses' => 'WordsController@index']);