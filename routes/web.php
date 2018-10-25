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
    return view('where');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/email_verify_notice', 'HomeController@emailVerifyNotice')->name('email_verify_notice');
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');

    Route::group(['middleware' => 'email_verified'], function () {
        Route::get('chat/room_list', 'ChatRoomController@roomList')->name('chat.room_list');
        Route::post('chat/room_create', 'ChatRoomController@roomCreate')->name('chat.room_create');
        Route::get('chat/room_show', 'ChatRoomController@roomShow')->name('chat.room_show');

    });


    Route::post('talking/save', 'ChatController@save');
    Route::post('talking/getTalk', 'ChatController@getTalk');
    Route::get('talking/delete/{table?}', 'ChatController@delete');
});
