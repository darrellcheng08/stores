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
Route::middleware('auth:api')->group(function () {
    
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('/get-user-info', 'UserController@getInfo');
    Route::get('/categories', 'CategoryController@index');

    Route::post('/video/save', 'VideoController@save');
    Route::post('/product/update', 'ProductController@update');

    Route::apiResources([
        'users' => 'UserController',
        'products' => 'ProductController'
    ]);
});