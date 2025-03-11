<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', function () {
    return 'Handle login';
})->name('login');

Route::get('/request-password', function () {
    return '';
})->name('password.request');

Route::get('/register', function () {
    return '';
})->name('register');
