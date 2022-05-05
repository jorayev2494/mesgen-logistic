<?php

use Illuminate\Support\Facades\Route;

#region Admin
Route::group(['prefix' => 'admin', 'middleware' => 'lang', 'namespace' => 'Admin', 'as' => 'admin.'], static function (): void {
    Route::group(['prefix' => 'auth', 'middleware' => 'guest', 'namespace' => 'Auth', 'as' => 'auth.'], static function (): void {
        Route::post('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
        Route::group(['prefix' => 'password_restore', 'namespace' => 'Restore', 'as' => 'restore.'], static function (): void {
            Route::post('/email/code', 'PasswordRestoreController@sendCode');
            Route::post('/restore', 'PasswordRestoreController@restore');
        });
    });

    Route::group(['middleware' => 'auth:api'], static function (): void {
        Route::apiResource('/sliders/blocks', 'SliderBlockController', ['only' => ['index', 'show', 'update']]);
        Route::controller('SliderController')->group(static function (): void {
            Route::get('/sliders', 'index')->name('sliders.index');
            Route::post('/sliders', 'store')->name('sliders.store');
            Route::get('/sliders/{id}', 'show')->name('sliders.show');
            Route::post('/sliders/{id}', 'update')->name('sliders.update');
            Route::delete('/sliders/{id}', 'destroy')->name('sliders.destroy');
        });

        Route::apiResource('/socials', 'SocialController', ['only' => ['index', 'show', 'update']]);
        Route::apiResource('/emails', 'EmailController');
        Route::apiResource('/countries', 'CountryController');
        Route::apiResource('/countries.addresses', 'AddressController');
        Route::apiResource('/countries.phones', 'PhoneController');

        Route::controller('PartnerController')->group(static function (): void {
            Route::get('/partners', 'index');
            Route::post('/partners', 'store');
            Route::get('/partners/{partner}', 'show');
            Route::post('/partners/{partner}', 'update');
            Route::delete('/partners/{partner}', 'destroy');
        });

        Route::group(['prefix' => 'abouts', 'namespace' => 'About'], static function (): void {
            Route::controller('AboutController')->group(static function (): void {
                Route::get('/company', 'index');
                Route::get('/company/{company}', 'show');
                Route::post('/company/{company}', 'update');
            });
        });
    });
});
#endregion

#region Clients
Route::group(['middleware' => 'lang'], static function (): void {
    Route::get('/sliders', 'SliderController');
    Route::get('/socials', 'SocialController');
    Route::get('/emails', 'EmailController');
    Route::get('/sliders/blocks', 'SliderBlockController');
    Route::get('/countries', 'CountryController');
    Route::get('/countries/{country}/addresses', 'AddressController');
    Route::get('/countries/{country}/phones', 'PhoneController');
    Route::get('/partners', 'PartnerController');

    Route::group(['prefix' => 'abouts', 'namespace' => 'About'], static function (): void {
        Route::get('/company', 'AboutController@about');
    });
});
#endregion
