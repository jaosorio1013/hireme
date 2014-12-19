<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//candidates/backend-developer/1
Route::get('candidates/{slug}/{id}', ['as' => 'category', 'uses' => 'CandidatesController@category']);

//jaosorio/1
Route::get('{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);


//Si el usuario no esta autenticado
Route::group(['before' => 'guest'], function(){
	Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
	Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
});


//Si el usuario esta autenticado
Route::group(['before' => 'auth'], function(){
	//Rutas de formularios
	require (__DIR__.'/routes/auth.php');

	//Rutas del administrador
	Route::group(['before' => 'is_admin'], function () {
		require (__DIR__.'/routes/admin.php');
	});
});