<?php

use App\Http\Controllers\RetrievePublicUserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/{dni}', [RetrievePublicUserInformation::class, 'findByDni'])
    ->name('user.findByDni')
    ->middleware('web');
