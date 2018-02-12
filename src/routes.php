<?php

Route::group(['middleware' => ['web']], function() {
    Route::post('login', [
        'uses' => 'Ozparr\AdminLogin\Controllers\Auth\LoginController@login',
    ]);

    Route::get('login', [
        'uses' => 'Ozparr\AdminLogin\Controllers\Auth\LoginController@showLoginForm',
        'as' => 'login',
    ]);

    Route::post('logout', [
        'uses' => 'Ozparr\AdminLogin\Controllers\Auth\LoginController@logout',
        'as' => 'logout'
    ]);





    Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function() {
        Route::get('/', function () {
            return view('admin_templeta::templetas.admin.index');
        });

        //-----------------------ADMIN USERS-----------------------
        Route::resource('adminUsuarios', 'Ozparr\AdminLogin\Controllers\UsersController', ['except' => [
            'store', 'show'
        ]]);

        Route::get('adminUsuarios/{id}/editPass', [
            'uses' => 'Ozparr\AdminLogin\Controllers\UsersController@editPass',
            'as' => 'adminUsuarios.editPass'
        ]);

        Route::put('adminUsuarios/{id}/updatePass', [
            'uses' => 'Ozparr\AdminLogin\Controllers\UsersController@updatePass',
            'as' => 'adminUsuarios.updatePass'
        ]);

        Route::get('adminUsuarios/{id}/destroy', [
            'uses' => 'Ozparr\AdminLogin\Controllers\UsersController@destroy',
            'as' => 'adminUsuarios.destroy'
        ]);

        //-----------------------Roles-----------------------
        Route::resource('roles', 'Ozparr\AdminLogin\Controllers\RolesController', ['except' => [
            'index', 'show'
        ]]);

        Route::get('roles/{id}/destroy', [
            'uses' => 'Ozparr\AdminLogin\Controllers\RolesController@destroy',
            'as' => 'roles.destroy'
        ]);



        //----------------------REGISTES------------------------------
        Route::get('register', [
            'uses' => 'Ozparr\AdminLogin\Controllers\Auth\RegisterController@showRegistrationForm',
            'as' => 'register'
        ]);

        Route::post('register', [
            'uses' => 'Ozparr\AdminLogin\Controllers\Auth\RegisterController@register',
            'as' => 'register'
        ]);

    });
});


/*
Route::post('password/email','ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'ResetPasswordController@reset');
Route::get('password/reset ', 'ForgotPasswordController@showLinkRequest');
Route::get('password/reset/{token}','ResetPasswordController@showResetForm');




Route::group(['prefix' => 'admin'], function() {

    Route::resource('adminUsuarios', 'admin\UsersController');

    Route::get('adminUsuarios/{id}/editPass', [
        'uses' => 'admin\UsersController@editPass',
        'as' => 'adminUsuarios.editPass'
    ]);

    Route::put('adminUsuarios/{id}/updatePass', [
        'uses' => 'admin\UsersController@updatePass',
        'as' => 'adminUsuarios.updatePass'
    ]);

});*/

