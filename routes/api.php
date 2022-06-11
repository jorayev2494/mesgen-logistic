<?php

use Illuminate\Routing\Router;
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

    Route::group(['middleware' => ['auth:api', 'admin']], static function (): void {
        Route::group(['prefix' => 'profile'], static function (Router $router): void {
            $router->get('/', 'ProfileController@getProfile');
            $router->post('/', 'ProfileController@updateProfile');
        });

        Route::controller('UserController')->group(static function (Router $router): void {
            $router->get('/users', 'UserController@index');
            $router->post('/users', 'UserController@store');
            $router->get('/users/{id}', 'UserController@show');
            $router->post('/users/{id}', 'UserController@update');
            $router->delete('/users/{id}', 'UserController@destroy');
        });

        Route::apiResource('/sliders/blocks', 'SliderBlockController', ['only' => ['index', 'show', 'update']]);
        Route::controller('SliderController')->group(static function (Router $router): void {
            $router->get('/sliders', 'index')->name('sliders.index');
            $router->post('/sliders', 'store')->name('sliders.store');
            $router->get('/sliders/{id}', 'show')->name('sliders.show');
            $router->post('/sliders/{id}', 'update')->name('sliders.update');
            $router->delete('/sliders/{id}', 'destroy')->name('sliders.destroy');
        });

        Route::apiResource('/socials', 'SocialController', ['only' => ['index', 'show', 'update']]);
        Route::apiResource('/emails', 'EmailController');
        Route::apiResource('/countries', 'CountryController');
        Route::apiResource('/countries.addresses', 'AddressController');
        Route::apiResource('/countries.phones', 'PhoneController');

        Route::controller('PartnerController')->group(static function (Router $router): void {
            $router->get('/partners', 'index');
            $router->post('/partners', 'store');
            $router->get('/partners/{partner}', 'show');
            $router->post('/partners/{partner}', 'update');
            $router->delete('/partners/{partner}', 'destroy');
        });

        Route::group(['prefix' => 'abouts', 'namespace' => 'About'], static function (): void {
            Route::apiResource('/steps', 'AboutStepController', ['except' => 'store', 'delete']);
            Route::controller('AboutController')->group(static function (Router $router): void {
                $router->get('/company', 'index');
                $router->get('/company/{company}', 'show');
                $router->post('/company/{company}', 'update');
            });
        });

        Route::controller('ServiceController')->group(static function (Router $router): void {
            $router->get('/services', 'index');
            $router->post('/services', 'store');
            $router->get('/services/{service}', 'show');
            $router->post('/services/{service}', 'update');
            $router->delete('/services/{service}', 'destroy');
        });

        Route::apiResource('/services', 'ServiceController');

        Route::apiResource('/tags', 'TagController');
        Route::apiResource('/blogs/categories', 'BlogCategoryController');
        Route::post('/blogs/{blog_id}', 'BlogController@update');
        Route::apiResource('/blogs', 'BlogController', ['except' => ['update']]);
        Route::apiResource('/steps', 'StepController', ['only' => ['index', 'show', 'update']]);
        Route::apiResource('/processes', 'ProcessController', ['only' => ['index', 'show', 'update']]);     
        Route::apiResource('/chooses', 'ChooseController', ['only' => ['index', 'show', 'update']]);
        Route::apiResource('/work_hours', 'WorkHourController');
        Route::apiResource('/text_translates', 'TextTranslateController');
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

    Route::group(['prefix' => 'abouts', 'namespace' => 'About'], static function (Router $router): void {
        $router->get('/company', 'AboutController@about');
        $router->get('/steps', 'AboutStepController');
    });

    Route::post('/contact', ['uses' => 'ContactController@contact']);

    Route::get('/blog_categories', 'BlogCategoryController');
    Route::get('/blog_categories/{category_id}/blogs', 'BlogController@getBlogsByCategory');
    Route::get('/blogs', ['uses' => 'BlogController']);
    Route::get('/blogs/search', ['uses' => 'BlogSearchController']);
    Route::get('/blogs/popular', ['uses' => 'BlogPopularController']);
    Route::get('/blogs/{blog_id}', ['uses' => 'BlogController@show']);
    Route::get('/hastags', ['uses' => 'TagController', 'as' => 'tags']);
    Route::get('/hastags/{blog_id}/blogs', ['uses' => 'BlogController@getBlogsByTag']);
    Route::get('/team', 'TeamController');
    Route::get('/services/{id?}', 'ServiceController');
    Route::get('/steps', 'StepController');
    Route::get('/processes', 'ProcessController');
    Route::get('/chooses', 'ChooseController');
    Route::get('/work_hours/{country_id}', 'WorkHourController');
    Route::get('/text_translates', 'TextTranslateController');
});
#endregion
