<?php

use App\Http\Controllers\Alumno\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Alumno\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('administracion')->name('administracion')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:administracion');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:administracion')
        ->name('dashboard');



    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administracion')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administracion');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administracion')
        ->name('logout');
});
