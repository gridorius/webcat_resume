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
Route::model('summaryresponse', 'App\SummaryResponse');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'Auth\LoginController@logout');
    
    Route::get('/summaryresponse/set/{summaryresponse}/{val}', 'SummaryResponseController@setResponse');
    
    Route::get('/summaries', 'SummaryController@index')->name('summaries');
    Route::get('/summaries/new', 'SummaryController@new');
    Route::get('/statistics', 'SummaryController@statistics');
    Route::get('/summaries/file/{summary}', 'SummaryController@getFile');
    Route::get('/summaries/{summary}', 'SummaryController@summary');
    Route::get('/summaries/send/{company}', 'SummaryController@sendGetForm');
    Route::get('/summaries/send/{summary}/{company_id}', 'SummaryController@send');

    Route::get('/summaries/edit/{id}', 'SummaryController@edit');
    Route::patch('/summaries', 'SummaryController@update');
    Route::post('/summaries', 'SummaryController@create');
    Route::delete('/summaries/{id}', 'SummaryController@delete');

    Route::get('/companies', 'CompanyController@index');
    Route::delete('/companies/{company}', 'CompanyController@delete');
    Route::patch('/companies', 'CompanyController@update');
    Route::get('/companies/my', 'CompanyController@myList');
    Route::get('/companies/new', 'CompanyController@newGetForm');
    Route::post('/companies', 'CompanyController@new');
    Route::get('/companies/edit/{company}', 'CompanyController@editGetForm');
    Route::get('/companies/{company}', 'CompanyController@get');
});


Route::post('/search', 'SearchController@find');
