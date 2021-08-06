<?php

use Illuminate\Support\Facades\Route;
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
    Route::group(['middleware' => 'redirect.admin'], function () {
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/login-submit', [AdminController::class, 'loginSubmit'])->name('loginSubmit');
        Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
        Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
        Route::post('/forgot-password-submit', [AdminController::class, 'forgotPasswordSubmit'])->name('forgotPasswordSubmit');
        Route::get('/check-password-reset-token/{token}', [AdminController::class, 'checkPasswordResetToken'])->name('checkPasswordResetToken');
        Route::get('/reset-password', [AdminController::class, 'resetPassword'])->name('resetPassword');
        Route::post('/reset-password-submit', [AdminController::class, 'resetPasswordSubmit'])->name('resetPasswordSubmit');
    });

    Route::group(['middleware' => 'admin.login'], function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
});
