<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::resource('/user', 'UserController');
Route::get('/user/all', [
		'uses' => 'UserController@all',
		'as' => 'user.all',
	])->middleware('auth');