<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/comision', [ComisionController::class, 'index'])->name('comision');
    Route::get('/profesor', [ProfesorController::class, 'index'])->name('profesor');
    Route::get('/administracion', [AdministracionController::class, 'index'])->name('administracion');
    Route::get('/secretaria', [SecretariaController::class, 'index'])->name('secretaria');
});

Route::middleware(['auth'])->group(function () {
    Route::get('administracion/dashboard', function () {
        return view('administracion.dashboard');
    })->name('administracion.dashboard');
});

// Ruta de inicio de sesión y registro
require __DIR__.'/auth.php';
