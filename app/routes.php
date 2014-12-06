<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//candidates/backend-developer/1
Route::get('candidates/{slug}/{id}', ['as' => 'category', 'uses' => 'CandidatesController@category']);

//jaosorio/1
Route::get('{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);

Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);