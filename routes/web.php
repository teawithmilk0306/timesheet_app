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

Route::get('/', 'TimesheetController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/setting', 'TimesheetController@add');
Route::get('/timesheet_request', 'TimesheetController@request');
//Route::get('/, 'TimesheetController@index');
Route::get('/holiday_request', 'HolidayController@add')->middleware("auth");
Route::post('/holiday_request', 'HolidayController@create');
Route::get('/done', 'HolidayController@add');
