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
Route::get('/cadastro', ['as' => 'cadastro', function() {
    return view('registerUser');
}]);

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@logoutUser']);

Route::get('/sql', ['uses' => 'BaseController@teste']);

Route::post('/login/authenticate', ['uses' =>'Auth\LoginController@authenticate']);
Route::post('/registerNewUser', ['as'=> 'registerNewUser', 'uses' =>'Auth\RegisterController@create']);

Route::get('/accountDetails', ['as' => 'accountDetails', 'uses' => 'AccountDetailsController@showDetails'])->middleware('auth');

Route::get('/registerProvider', ['as' => 'registerProvider', 'uses' =>'ProvidersController@registerProviderView'])->middleware('auth');
Route::post('/registerNewProvider', ['as' => 'registerNewProvider', 'uses' =>'ProvidersController@registerNewProvider'])->middleware('auth');
Route::get('/registerProduct', ['as' => 'registerProduct', 'uses' =>'ProductsController@registerProductView'])->middleware('auth');
Route::post('/registerNewProduct', ['as' => 'registerNewProduct', 'uses' =>'ProductsController@registerNewProduct'])->middleware('auth');
Route::get('/registerSale', ['as' => 'registerSale', 'uses' =>'SalesController@registerSaleView'])->middleware('auth');


Route::get('/listProviders', ['as' => 'listProviders', 'uses' => 'ProvidersController@listProviders'])->middleware('auth');
Route::get('/listProducts', ['as' => 'listProducts', 'uses' => 'ProductsController@listProducts'])->middleware('auth');

Route::delete('/deleteProviders', ['as' => 'deleteProviders', 'uses' => 'ProvidersController@deleteProviders'])->middleware('auth');

Route::get('/wallet', ['as' => 'wallet', 'uses' => 'WalletController@showWallet'])->middleware('auth');
Route::post('/generatePaymentSlip', ['as' => 'paymentSlip', 'uses' => 'PaymentSlipController@generatePaymentSlip'])->middleware('auth');