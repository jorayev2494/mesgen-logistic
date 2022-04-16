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
        Route::apiResource('/sliders/blocks', 'SliderBlockController', ['only' => ['index', 'show', 'update']]);
        Route::controller('SliderController')->group(function (): void {
            Route::get('/sliders', 'index');
            Route::post('/sliders', 'store');
            Route::get('/sliders/{id}', 'show');
            Route::post('/sliders/{id}', 'update');
            Route::delete('/sliders/{id}', 'destroy');
        });

        Route::apiResource('/socials', 'SocialController', ['only' => ['index', 'show', 'update']]);
        Route::apiResource('/emails', 'EmailController');
        Route::apiResource('/countries', 'CountryController');
        Route::apiResource('/countries.addresses', 'AddressController');
        Route::apiResource('/countries.phones', 'PhoneController');
    });
});
#endregion

#region Clients
Route::group(['middleware' => 'lang'], function (): void {
    Route::get('/sliders', 'SliderController');
    Route::get('/socials', 'SocialController');
    Route::get('/emails', 'EmailController');
    Route::get('/sliders/blocks', 'SliderBlockController');
    Route::get('/countries', 'CountryController');
    Route::get('/countries/{country}/addresses', 'AddressController');
    Route::get('/countries/{country}/phones', 'PhoneController');
});
#endregion
