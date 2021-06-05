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
    // return view('welcome');
    return 'hi';
});

Route::get('/q1', 'TestController@q1');
Route::get('/q2', 'TestController@q2');
Route::get('/q3', 'TestController@q3');
Route::get('/q4', 'TestController@q4');
Route::get('/q5', 'TestController@q5');
