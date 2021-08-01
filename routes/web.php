<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;
use App\Http\Controllers\AdminController;

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

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login-submit', [AdminController::class, 'loginSubmit'])->name('loginSubmit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
    Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password-submit', [AdminController::class, 'forgotPasswordSubmit'])->name('forgotPasswordSubmit');
    Route::get('/check-password-reset-token/{token}', [AdminController::class, 'checkPasswordResetToken'])->name('checkPasswordResetToken');
    Route::get('/reset-password', [AdminController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password-submit', [AdminController::class, 'resetPasswordSubmit'])->name('resetPasswordSubmit');

    Route::group(['middleware' => 'AdminLogin'], function () {
        Route::get('/dashboard', [CryptoController::class, 'dashboard'])->name('dashboard');
        Route::get('/exchanges', [CryptoController::class, 'exchanges'])->name('exchanges');
        Route::get('/load-markets', [CryptoController::class, 'loadMarkets'])->name('loadMarkets');
        Route::get('/fetch-balance', [CryptoController::class, 'fetchBalance'])->name('fetchBalance');
        Route::get('/fetch-ticker', [CryptoController::class, 'fetchTicker'])->name('fetchTicker');
        Route::get('/fetch-trades', [CryptoController::class, 'fetchTrades'])->name('fetchTrades');
        Route::get('/fetch-order-book', [CryptoController::class, 'fetchOrderBook'])->name('fetchOrderBook');
        Route::get('/create-market-sell-order', [CryptoController::class, 'createMarketSellOrder'])->name('createMarketSellOrder');
        Route::get('/create-limit-buy-order', [CryptoController::class, 'createLimitBuyOrder'])->name('createLimitBuyOrder');
        Route::get('/create-order', [CryptoController::class, 'createOrder'])->name('createOrder');
    });
});
