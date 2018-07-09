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

Route::get('/', 'FrontendController@index');
Route::get('/backend', 'BackendController@index');
Route::get('/login', 'LoginController@index');
Route::post('/login/validate', 'LoginController@validateLogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/services', 'FrontendController@services');
Route::get('/prices', 'FrontendController@prices');

Route::group(['prefix' => 'master', 'namespace' => 'Master'], function () {
    Route::group(['prefix' => 'pengguna', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'PenggunaController@index');
        Route::post('/add', 'PenggunaController@add');
        Route::post('/save', 'PenggunaController@save');
        Route::post('/delete', 'PenggunaController@delete');
        Route::get('/{id}/detail', 'PenggunaController@detail');
    });

    Route::group(['prefix' => 'periode', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'PeriodeController@index');
        Route::post('/add', 'PeriodeController@add');
        Route::post('/save', 'PeriodeController@save');
        Route::post('/delete', 'PeriodeController@delete');
    });

    Route::group(['prefix' => 'kategori-ikan', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'KategoriIkanController@index');
        Route::post('/add', 'KategoriIkanController@add');
        Route::post('/save', 'KategoriIkanController@save');
        Route::post('/delete', 'KategoriIkanController@delete');
    });

    Route::group(['prefix' => 'ukuran-ikan', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'UkuranIkanController@index');
        Route::post('/add', 'UkuranIkanController@add');
        Route::post('/save', 'UkuranIkanController@save');
        Route::post('/delete', 'UkuranIkanController@delete');
    });

    Route::group(['prefix' => 'ikan', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'IkanController@index');
        Route::post('/add', 'IkanController@add');
        Route::post('/save', 'IkanController@save');
        Route::post('/delete', 'IkanController@delete');
        Route::get('/{fish}/detail', 'IkanController@detail');
        Route::any('/{fish}/add-detail', 'IkanController@addDetail');
        Route::any('/{fish}/save-detail', 'IkanController@saveDetail');
        Route::any('/{fish}/delete-detail', 'IkanController@deleteDetail');
    });

    Route::group(['prefix' => 'kurir', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'KurirController@index');
        Route::post('/add', 'KurirController@add');
        Route::post('/save', 'KurirController@save');
        Route::post('/delete', 'KurirController@delete');
        Route::get('/{id}/detail', 'KurirController@detail');
    });

});


Route::group(['prefix' => 'transaction', 'namespace' => 'Transaction'], function () {
    Route::group(['prefix' => 'in', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'InTransactionController@index');
        Route::post('/detail', 'InTransactionController@detail');
        Route::post('/update-to-process', 'InTransactionController@updateToProcess');
    });

    Route::group(['prefix' => 'progress', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'ProgressTransactionController@index');
        Route::post('/detail', 'ProgressTransactionController@detail');
        Route::post('/update-status', 'ProgressTransactionController@updateStatus');
    });

    Route::group(['prefix' => 'record', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'RecordTransactionController@index');
        Route::post('/show', 'RecordTransactionController@show');
        Route::post('/detail', 'RecordTransactionController@detail');
    });
});


Route::group(['prefix' => 'feedback', 'namespace' => 'Feedback', 'middleware' => 'login-verification'], function () {
    Route::get('/', 'FeedbackController@index');
    Route::get('/in', 'FeedbackController@in');
});


Route::group(['prefix' => 'report', 'namespace' => 'Report'], function () {
    Route::group(['prefix' => 'stock', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'StockController@index');
        Route::post('/show', 'StockController@show');
    });

    Route::group(['prefix' => 'period-selling', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'PeriodSellingController@index');
        Route::post('/show', 'PeriodSellingController@show');
    });

    Route::group(['prefix' => 'price-statistic', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'PriceStatisticController@index');
        Route::post('/show', 'PriceStatisticController@show');
    });
});