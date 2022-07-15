<?php

use Illuminate\Support\Facades\Route;

/* ROUTES THAT DO NOT NEED AUTHENTICATION. */

// auth
Route::post('v1/login', [App\Http\Controllers\Security\LoginController::class, 'login']);
// users
Route::get('v1/user', [App\Http\Controllers\Security\UserController::class, 'getAll']);
Route::get('v1/user/{id}', [App\Http\Controllers\Security\UserController::class, 'getOne']);

/* ROUTES THAT NEED AUTHENTICATION. */

Route::group(['middleware' => ['auth']], function () {
    // auth
    Route::get('v1/refresh', [App\Http\Controllers\Security\LoginController::class, 'refresh']);
    Route::get('v1/logout', [App\Http\Controllers\Security\LoginController::class, 'logout']);
    // users
    Route::post('v1/user', [App\Http\Controllers\Security\UserController::class, 'create']);
    Route::put('v1/user/{id}', [App\Http\Controllers\Security\UserController::class, 'update']);
    Route::delete('v1/user/{id}', [App\Http\Controllers\Security\UserController::class, 'deleteOne']);
});
