<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->middleware('guest')->name('authenticate');


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
    });
    Route::prefix('/roles')->name('roles.')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
    });
});
