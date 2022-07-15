<?php

use Illuminate\Support\Facades\Route;

/* ROUTES THAT DO NOT NEED AUTHENTICATION. */

// auth
Route::post('v1/login', [App\Http\Controllers\Security\LoginController::class, 'login']);

/* ROUTES THAT NEED AUTHENTICATION. */

Route::group(['middleware' => ['auth']], function () {
    // auth
    Route::get('v1/refresh', [App\Http\Controllers\Security\LoginController::class, 'refresh']);
    Route::get('v1/logout', [App\Http\Controllers\Security\LoginController::class, 'logout']);
});
