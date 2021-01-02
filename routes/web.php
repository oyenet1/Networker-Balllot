<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin', 'AdminController@index')->name('admin.index');

// office 
Route::resource('offices', 'OfficeController');

// candidate
Route::get('/office/{office}/candidate', 'CandidateController@index')->name('candidate.index');
Route::get('/office/{office}/candidate/create', 'CandidateController@create')->name('candidate.create');
Route::post('/office/{office}/candidate', 'CandidateController@store')->name('candidate.store');
Route::get('/office/{office}/candidate/{candidate:name}', 'CandidateController@show')->name('candidate.show');
Route::get('/office/{office}/candidate/{candidate:name}/edit', 'CandidateController@edit')->name('candidate.edit');
Route::put('/office/{office}/candidate/{candidate:name}', 'CandidateController@update')->name('candidate.update');
Route::delete('/office/{office}/candidate/{candidate:name}', 'CandidateController@destroy')->name('candidate.destroy');