<?php

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

Route::get('/', ['as' => 'dashboard', function() {
    return view('home');
}])->middleware('auth');

Route::get('/login', ['as' => 'login', function() {
    return view('login');
}]);

Route::post('/login/authenticate', ['uses' =>'Auth\LoginController@authenticate']);

Route::get('/registerProduct', function() {
    return view('registerProduct');
});