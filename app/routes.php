<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/', ['as' => 'home.post', 'uses' => 'HomeController@store']);
Route::get('/s/{hash}', ['as' => 'home.hash', 'uses' => 'HomeController@hash']);
Route::get('/st/{hash}', ['as' => 'home.statistic', 'uses' => 'HomeController@statistic']);