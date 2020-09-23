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

<<<<<<< HEAD
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//product route
=======
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::post('login', 'API\Auth\LoginController@login');
    // Route::post('signup', 'AuthController@signup');
  
    Route::group( [ 'middleware' => 'auth:api' ], function() {
        // Route::get('logout', 'AuthController@logout');
        // Route::get('user', 'AuthController@user');

        Route::apiResource('categories', 'API\CategoryController');
    });

>>>>>>> 262da52f49a98841f0c549f8ddb5d183b7ad3e9d
Route::get('/products/list', 'Administrator\ProductsController@findProductsCriteria');
Route::get('/products/detail/{id}', 'Administrator\ProductsController@productDetail');
Route::get('/products/countAll', 'Administrator\ProductsController@productTotal');
// category route
Route::get('/category/list', 'Administrator\CategoryController@findCategoryCriteria');
Route::get('/category/detail/{id}', 'Administrator\CategoryController@categoryDetail');
Route::get('/category/countAll', 'Administrator\CategoryController@categoryTotal');
// supplier route
Route::get('/supplier/list', 'Administrator\SupplierController@findSupplierCriteria');
Route::get('/supplier/detail/{id}', 'Administrator\SupplierController@supplierDetail');
Route::get('/supplier/countAll', 'Administrator\SupplierController@supplierTotal');