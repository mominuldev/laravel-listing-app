<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationController;

Route::middleware('guest')->group(function () {
    /* ------------------ Register ------------------ */
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    /* ------------------ Login ------------------ */
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'authenticate'])->name('authenticate');
    
    
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
