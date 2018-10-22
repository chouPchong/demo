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
Route::get('talking', 'ChatController@talking');
Route::post('talking/save', 'ChatController@save');
Route::post('talking/getTalk', 'ChatController@getTalk');
Route::get('talking/delete', 'ChatController@delete');