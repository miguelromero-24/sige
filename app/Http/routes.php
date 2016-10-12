<?php


/*
|----------------------------------------------------------------------------------------------------------------------+
| Authentication & Authorization Routes - Sentinel Implementation                                                      |
|----------------------------------------------------------------------------------------------------------------------+
*/

Route::get('login', ['as' => 'login.page', 'uses' => 'Auth\AuthController@loginPage']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
Route::get('reset/{id}/request', ['as' => 'reset.password.request',
    'uses' => 'Auth\AuthController@resetPasswordRequest']);
Route::get('reset/{id}/{code}', ['as' => 'reset.password.page', 'uses' => 'Auth\AuthController@resetPasswordPage']);
Route::post('reset', ['as' => 'reset.password', 'uses' => 'Auth\AuthController@resetPassword']);

/*
|----------------------------------------------------------------------------------------------------------------------+
| Home and Dashboard Routes                                                                                            |
|----------------------------------------------------------------------------------------------------------------------+
*/
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
