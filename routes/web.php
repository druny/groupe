<?php





Auth::routes();

Route::get('/', 'HomeController@index');



Route::group(['middleware' => 'auth'], function() {

    //User controller
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
    Route::delete('user/{id}', [
        'uses' => 'UserController@destroy',
        'as' => 'user.delete'
    ]);
    Route::get('/user/update/{id}', [
        'uses' => 'UserController@edit',
        'as' => 'user.edit',
    ]);
    Route::put('user/update/{id}', [
        'uses' => 'UserController@update',
        'as' => 'user.update'
    ]);

    //Group controller
    Route::get('/group/all', [
        'uses' => 'GroupController@all',
        'as' => 'group.all',
    ]);
    Route::get('/group/create', [
        'uses' => 'GroupController@create',
        'as' => 'group.create'
    ]);
    Route::post('/group/create', [
        'uses' => 'GroupController@store',
        'as' => 'group.create'
    ]);
    Route::delete('/group/{id}', [
        'uses' => 'GroupController@destroy',
        'as' => 'group.delete'
    ]);
    Route::get('/group/update/{id}', [
        'uses' => 'GroupController@edit',
        'as' => 'group.edit',
    ]);
    Route::put('/group/update/{id}', [
        'uses' => 'GroupController@update',
        'as' => 'group.update'
    ]);
    Route::get('/group/{id}', [
        'uses' => 'GroupController@users',
        'as' => 'group.users',
    ]);

});