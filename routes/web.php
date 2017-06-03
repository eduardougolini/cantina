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

Route::get('/', ['as' => 'dashboard', 'uses' => 'BaseController@home'])->middleware('auth');

Route::get('/login', ['as' => 'login', function() {
    return view('login');
}]);

Route::get('/sql', ['uses' => 'BaseController@teste']);

Route::post('/login/authenticate', ['uses' =>'Auth\LoginController@authenticate']);

Route::get('/registerProvider', ['as' => 'registerProvider', 'uses' =>'ProvidersController@registerProviderView'])->middleware('auth');
Route::post('/registerNewProvider', ['as' => 'registerNewProvider', 'uses' =>'ProvidersController@registerNewProvider'])->middleware('auth');
Route::get('/registerProduct', ['as' => 'registerProduct', 'uses' =>'ProductsController@registerProductView'])->middleware('auth');
Route::post('/registerNewProduct', ['as' => 'registerNewProduct', 'uses' =>'ProductsController@registerNewProduct'])->middleware('auth');
Route::get('/registerSale', ['as' => 'registerSale', 'uses' =>'SalesController@registerSaleView'])->middleware('auth');

Route::get('/accountDetails', ['as' => 'accountDetails', 'uses' => 'AccountDetailsController@showDetails'])->middleware('auth');