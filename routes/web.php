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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/games', 'GamesController@index')->name('games');
Route::get('/games/new', 'GamesController@new')->name('new_game');

Route::post('/games/new', 'GamesController@create')->name('new_game');
Route::get('/game/{id}', 'GamesController@show')->name('show_game');

Route::get('/review/new/{id}', 'ReviewController@new')->name('new_review');
Route::post('/review/new/{id}', 'ReviewController@create')->name('post_review');

  // zet de default route maar ff op games.
  // library ophalen en iets om een game toe te voegen.
Route::get('/library', 'LibraryController@index')->name('library');
Route::get('/library/add/{id}', 'LibraryController@add')->name('add_to_library');
