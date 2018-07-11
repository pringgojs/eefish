<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** Sprint 1 **/

Route::post('/login', 'Api\ApiLoginController@validateLogin');
Route::post('/register', 'Api\ApiRegisterController@register');
Route::post('/update-profile', 'Api\ApiRegisterController@updateProfile');
Route::get('/fish-category', 'Api\ApiKategoriIkanController@index');
Route::get('/fish-size-category', 'Api\ApiKategoriUkuranIkanController@index');
Route::get('/fish', 'Api\ApiIkanController@index');
Route::get('/{id}/profile', 'Api\ApiProfileController@index');
Route::get('/fish/filter', 'Api\ApiIkanController@filtered');

/**  Sprint 2 **/
Route::group(['prefix' => 'cart', 'namespace' => 'Api\Cart'], function () {
    Route::get('/', 'ApiCartController@index');
    Route::get('/{user_id}/list', 'ApiCartController@listProductInCart');
    Route::post('/add-to-cart', 'ApiCartController@addToCart');
    Route::post('/add-quantity', 'ApiCartController@addQuantity');
    Route::post('/reduce-quantity', 'ApiCartController@reduceQuantity');
    Route::get('/{user_id}/normalization-cart', 'ApiCartController@normalizationCart');
});

/** Sprint 3 **/
Route::get('/fish/recomendation', 'Api\ApiIkanController@getRecomendation');

Route::group(['prefix' => 'history', 'namespace' => 'Api'], function () {
    Route::get('/{userid}/all', 'ApiHistoryTransaksiController@all');
    Route::get('/{userid}/on-going', 'ApiHistoryTransaksiController@onGoingTransaction');
    Route::get('/{userid}/success', 'ApiHistoryTransaksiController@onSuccessTransaction');
});


Route::group(['prefix' => 'payment', 'namespace' => 'Api'], function () {
    Route::post('/checkout', 'ApiPembayaranController@checkOut');
    Route::post('/upload-receipt', 'ApiPembayaranController@uploadBuktiBayar');
});


Route::group(['prefix' => 'feedback', 'namespace' => 'Api'], function () {
    Route::post('/store', 'ApiFeedbackController@postFeedback');
});

Route::post('/search', 'Api\ApiIkanController@search');




Route::group(['prefix' => 'raja-ongkir', 'namespace' => 'Api\RajaOngkir'], function () {
    Route::get('/province', 'RajaOngkirController@getProvince');
    Route::get('/city', 'RajaOngkirController@getCity');
    Route::post('/cost', 'RajaOngkirController@getCost');
});