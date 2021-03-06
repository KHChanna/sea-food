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
    Route::resource('products', 'ProductsController');
    // Route::resource('units', 'UnitController');

    Route::resource('product', 'ProductsController');
    // user route
    Route::resource('user', 'UserController');
    // Supplier
    Route::resource('supplier', 'SupplierController');

    // Unit Route
    Route::resource('units', 'UnitController');

    Route::resource('sale', 'SaleController');
    Route::get('sale/add-cart/{id}', 'SaleController@addCard')->name('sale.addCart');
    Route::get('sale-get-product', 'SaleController@getCart')->name('sale.get-Cart');
    Route::get('sale-remove-product/{id}', 'SaleController@removeCart')->name('sale.remove-Cart');
    Route::post('sale-remove-all-product', 'SaleController@removeCartAll')->name('sale.remove-all-Cart');
    Route::post('sale-update-product/{id}', 'SaleController@updateProduct')->name('sale.update-Cart');

    Route::resource('regisersale', 'RegisterSaleController');
    Route::resource('currency', 'CurrencyController');

    Route::resource('payment-type', 'PaymentTypeController');
    
    Route::resource('purchase', 'PurchaseController');
    Route::get('purchase/add-cart/{id}', 'PurchaseController@addCard')->name('purchase.addCart');
    Route::get('purchase-get-product', 'PurchaseController@getCart')->name('purchase.get-Cart');
    Route::get('purchase-remove-product/{id}', 'PurchaseController@removeCart')->name('purchase.remove-Cart');
    Route::post('purchase-remove-all-product', 'PurchaseController@removeCartAll')->name('purchase.remove-all-Cart');
    Route::post('purchase-update-product/{id}', 'PurchaseController@updateProduct')->name('purchase.update-Cart');

    // report
    Route::get('report-sale', 'ReportController@sale')->name('report.sale');
    Route::get('report-purchase', 'ReportController@purchase')->name('report.purchase');
});

