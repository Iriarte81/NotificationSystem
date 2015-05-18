<?php

/*
| The Home Page
*/

Route::get('/', 'PagesController@home');


/**
*Notices
*/
Route::resource('notices', 'NoticesController');


/**
* Authentication
*/


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
