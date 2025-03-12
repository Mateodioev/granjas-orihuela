<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login');

    Route::get('/request-password', function () {
        return '';
    })->name('password.request');

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register.view');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});