<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => "TDP\User\Http\Controller", 'middleware' => ['web']], function () {

    Route::get('/info', [
        'as'=> 'info_user',
        'uses' => 'UserController@getInfo_User'
    ]);

    Route::get('/change_password', [
        'as'=> 'change_password',
        'uses' => 'UserController@ChangePassWord'
    ]);

    Route::post('/change_password',[
        'as'=> 'change_password',
        'uses' => 'UserController@postChangePassWord'
    ]);

    // Đăng ký người dùng
    Route::get('/register', [
        'as'=> 'register',
        'uses' => 'UserController@getRegister_User'
    ]);
    // end đăng ký người dùng
    Route::post('/register', [
        'as'=> 'register',
        'uses' => 'UserController@postRegister_User'
    ]);

    Route::get('/login', [
        'as'=> 'login',
        'uses' => 'UserController@getLogin'
    ]);

    Route::post('/login', [
        'as'=> 'login',
        'uses' => 'UserController@postLogin'
    ]);

    Route::get('/logout', [
        'as'=> 'logout',
        'uses' => 'UserController@getLogout'
    ]);

});
