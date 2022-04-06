<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function (): void {
    Route::controller('SliderController')->group(function (): void {
        Route::get('/sliders', 'index');
        Route::post('/sliders', 'store');
        Route::get('/sliders/{id}', 'show');
        Route::post('/sliders/{id}', 'update');
        Route::delete('/sliders/{id}', 'destroy');
    });
});
