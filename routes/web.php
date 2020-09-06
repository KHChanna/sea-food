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
    
//     return 'hellp';
// });

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@loginForm')->name('login.form');
Route::post('/login', 'Auth\LoginController@authenticated')->name('login');

Route::get('register', 'Auth\RegisterController@registerForm')->name('register.form');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

