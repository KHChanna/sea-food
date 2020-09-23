<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::group(['middleware' => ['auth']], function () {
    //
    Route::resource('/', 'DashboardController');
    Route::resource('category', 'CategoryController');

    //products route


    // Route::post('product/update', 'ProductsController@update')->name('product.update');
    Route::resource('products', 'ProductsController');
    Route::resource('units', 'UnitsController');


    // Route::post('product/update', 'ProductsController@update')->name('product.update');
    // Route::resource('products', 'ProductsController');
    // Route::resource('units', 'UnitsController');

    Route::resource('product', 'ProductsController');
    // user route
    Route::resource('user', 'UserController');
    // Supplier
    Route::resource('supplier', 'SupplierController');

    // Unit Route
    Route::resource('unit', 'UnitController');

<<<<<<< HEAD

=======
>>>>>>> 262da52f49a98841f0c549f8ddb5d183b7ad3e9d
});

