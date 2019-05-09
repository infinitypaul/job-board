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

Route::get('/', 'FrontendController@index')->name('welcome');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'HomeController@setting')->name('setting');

Route::get('/job', 'EmployeeController@index')->name('job');
Route::get('/managejob', 'EmployeeController@manageJob')->name('manageJob');
Route::get('/managejob/{job}', 'EmployeeController@manageCandidate')->name('manageCandidate');
Route::post('/sendmessage/{application}', 'EmployeeController@sendMessageToCandidate')->name('sendMessageToCandidate');

Route::post('/job', 'EmployeeController@postJob');

Route::get('/resume', 'FreelanceController@resume')->name('resume');
Route::post('/resume', 'FreelanceController@postResume');
Route::post('/apply/{job}', 'FreelanceController@applyForJob')->name('apply');

Route::post('/settings', 'ProfileController@updateProfile');
Route::post('/settings/password', 'ProfileController@changePassword')->name('change_password');

Route::get('/{job}', 'FrontendController@viewJob')->name('viewJob');
