<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;

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

    Route::prefix('/personnels')->name('personnels.')->controller(PersonnelController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
    });
    Route::prefix('/schedules')->name('schedules.')->controller(ScheduleController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/jadwal/{personnel_id}', 'getJadwalById');
        Route::get('/add', 'indexFormCreate')->name('show-create');
        Route::post('/add', 'store')->name('store');
    });

});
