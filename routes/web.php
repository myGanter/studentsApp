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
    return redirect('/genSumm');;
});

Route::get('/gro', 'GroupController@index')->name('gro');
Route::post('/gro', 'GroupController@addGroup');
Route::delete('/gro/{id}', 'GroupController@destroyGroup');
Route::post('/gro/{id}', 'GroupController@transformGroup');

Route::get('/ite', 'ItemController@index')->name('ite');
Route::post('/ite', 'ItemController@addItem');
Route::delete('/ite/{id}', 'ItemController@destroyItem');
Route::post('/ite/{id}', 'ItemController@transformItem');

Route::get('/stud', 'StudentController@index')->name('stud');
Route::post('/stud', 'StudentController@addStudent');
Route::delete('/stud/{id}', 'StudentController@destroyStudent');
Route::post('/stud/{id}', 'StudentController@transformStudent');

Route::get('/rati', 'RatingController@index')->name('rati');
Route::post('/rati', 'RatingController@addRating');
Route::delete('/rati/{id}', 'RatingController@destroyItem');
Route::post('/rati/{id}', 'RatingController@transformItem');

Route::get('/genSumm', 'GeneralController@index')->name('genSumm');
Route::post('/genSumm', 'GeneralController@getSummory');