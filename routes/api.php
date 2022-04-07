<?php

use Illuminate\Support\Facades\Route;

#region Admin
Route::group(['prefix' => 'admin', 'middleware' => 'lang', 'namespace' => 'Admin', 'as' => 'admin.'], function (): void {
    Route::group(['prefix' => 'auth', 'middleware' => 'guest', 'namespace' => 'Auth', 'as' => 'auth.'], function (): void {
        Route::post('/login', 'AuthController@login');
        Route::group(['prefix' => 'password_restore', 'namespace' => 'Restore', 'as' => 'restore.'], function (): void {
            Route::post('/email/code', 'PasswordRestoreController@sendCode');
            Route::post('/restore', 'PasswordRestoreController@restore');
        });
    });

    Route::group(['middleware' => 'auth:api'], function (): void {
        Route::controller('SliderController')->group(function (): void {
            Route::get('/sliders', 'index');
            Route::post('/sliders', 'store');
            Route::get('/sliders/{id}', 'show');
            Route::post('/sliders/{id}', 'update');
            Route::delete('/sliders/{id}', 'destroy');
        });
    });
});
#endregion

#region Clients
Route::group(['middleware' => 'lang'], function (): void {
    Route::get('/sliders', 'SliderController');
});
#endregion
