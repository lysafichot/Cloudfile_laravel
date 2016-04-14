<?php

Route::get('/user', 'UserController@getIndex');

Route::get('/registration', array('as' => 'register', 'uses' => 'AuthController@getRegister'));
Route::post('/registration', 'AuthController@postRegister');
Route::post('/', 'AuthController@postLogin');
Route::get('/', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('/logout', 'AuthController@postLogout');
Route::get('/file/upload', array('as' => 'upload', 'uses' => 'FilerController@getUpload'));
Route::post('/file/upload', array('as' => 'upload', 'uses' => 'FilerController@postUpload'));

Route::group(array('namespace'=>'Admin'), function() {
    Route::get('/admin', array('as' => 'admin', 'uses' => 'DashController@index'));
    Route::get('/admin/users', array('as' => 'users', 'uses' => 'UserController@getAll'));
    Route::post('/admin/users', array('as' => 'users', 'uses' => 'UserController@postAll'));

});