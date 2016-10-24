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

/*
|----------------------------------------------------------------------------------------------------------------------+
| User Routes                                                                                                          |
|----------------------------------------------------------------------------------------------------------------------+
*/

Route::resource('users', 'UsersController');
Route::get('users/{id}/profile', ['as' => 'users.show', 'uses' => 'UsersController@show']);
Route::get('activate/{id}/{code}', ['as'   => 'users.activate', 'uses' => 'UsersController@activate']);

/*
|----------------------------------------------------------------------------------------------------------------------+
| Roles Routes - Sentinel Implementation                                                                               |
+--------+----------+------------------------------+----------------------+--------------------------------------------+
*/
Route::resource('roles', 'RolesController');

/*
|----------------------------------------------------------------------------------------------------------------------+
| Permissions Routes - Sentinel Implementation                                                                         |
+--------+----------+------------------------------+--------------------------+----------------------------------------+
*/
Route::resource('permissions', 'PermissionsController');