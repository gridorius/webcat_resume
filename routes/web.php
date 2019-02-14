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

Route::model('company', 'App\Company');
Route::model('summary', 'App\Summary');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/summaries', 'SummaryController@index')->name('summaries');
Route::get('/summaries/send/{company}', 'SummaryController@sendGetForm');
Route::get('/summaries/send/{summary}/{company_id}', 'SummaryController@send');
Route::get('/summaries/new', 'SummaryController@new');
Route::get('/summaries/edit/{id}', 'SummaryController@edit');
Route::patch('/summaries', 'SummaryController@update');
Route::post('/summaries', 'SummaryController@create');
Route::delete('/summaries/{id}', 'SummaryController@delete');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/{company}', 'CompanyController@get');

Route::post('/search', 'SearchController@find');
