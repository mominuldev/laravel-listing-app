<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    /* ------------------ Register ------------------ */
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    /* ------------------ Login ------------------ */
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'authenticate'])->name('authenticate');
    Route::get('/forgot-password', [ResetPasswordController::class, 'request'])->name('password.request');

    Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'reset'])->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

});

Route::middleware('auth')->group(function () {
    /* ------------------ Logout ------------------ */
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

    /* ------------------ Email Verification ------------------ */
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resent'])->middleware('throttle:6,1')->name('verification.send');

});
/* ------------------ Logout ------------------ */
