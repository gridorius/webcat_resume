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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/summaries', 'SummaryController@index')->name('summaries');
Route::get('/summaries/new', 'SummaryController@new');
Route::post('/summaries', 'SummaryController@create');
Route::delete('/summaries/{id}', 'SummaryController@delete');
