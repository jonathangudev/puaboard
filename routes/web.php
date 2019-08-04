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

Route::get('/field-report/all', 'FieldReportController@showAll');

Route::post('/field-report/create', 'FieldReportController@saveFieldReport');

Route::get('/field-report/{id}', 'FieldReportController@getFieldReport');

Route::post('/field-report/delete/{id}', 'FieldReportController@deleteFieldReport');

Route::post('/field-report/comment/{id}', 'FieldReportController@addCommentToFieldReport');

Route::get('/admin', 'AdminController@index');

Route::post('/field-report/approve/{id}', 'AdminController@approveFieldReport');
