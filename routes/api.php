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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::post('login', 'API\Auth\LoginController@login');
    // Route::post('signup', 'AuthController@signup');
  
    Route::group( [ 'middleware' => 'auth:api' ], function() {
        // logout
        Route::post('logout', 'API\Auth\LoginController@logout');

        // Category
        Route::get('categories/count', 'API\CategoryController@count');
        Route::apiResource('categories', 'API\CategoryController');
        Route::post('categories/{id}', 'API\CategoryController@update');
        // Product
        Route::get('products/count', 'API\ProductController@getCountProduct');
        Route::apiResource('products', 'API\ProductController');
        Route::post('products/{product}', 'API\ProductController@update');
        // Supplier
        Route::get('suppliers/count', 'API\SupplierController@count');
        Route::apiResource('suppliers', 'API\SupplierController');
        Route::post('suppliers/{id}', 'API\SupplierController@update');

        // Unit
        Route::get('units', 'API\UnitController@index');

        //profile
        // Route::get('/me', 'API\Auth\LoginController@profile');
        Route::apiResource('/me', 'API\UserController');
        Route::post('/me/{id}', 'API\UserController@update');
        // home screen
        // Route::apiResource('/report', 'API\HomeController');
        Route::get('/report', 'API\ReportController@index');
        Route::get('/report/best-selling', 'API\ReportController@bestSelling');

    });