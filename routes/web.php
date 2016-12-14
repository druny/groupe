<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::group(['middleware' => 'auth'], function() {
    Route::get('/user/all', [
        'uses' => 'UserController@all',
        'as' => 'user.all',
    ]);
    Route::get('/user/create', [
        'uses' => 'UserController@create',
        'as' => 'user.create',
    ]);
    Route::post('user/create', [
        'uses' => 'UserController@store',
        'as' => 'user.create',
    ]);
});