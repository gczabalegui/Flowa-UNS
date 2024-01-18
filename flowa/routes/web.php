<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\SecretariaController;

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

Route::get('filemanager', [FileManagerController::class, 'index']);

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/administracion', [AdministracionController::class, 'index']);
Route::get('/comision', [ComisionController::class, 'index']);
Route::get('/profesor', [ProfesorController::class, 'index']);
Route::get('/secretaria', [SecretariaController::class, 'index']);
//Route::get('/materia', [MateriaController::class, 'index']);


Route::get('archivo-upload', [ ArchivoController::class, 'upload' ])->name('archivo.upload');
Route::post('archivo-store', [ ArchivoController::class, 'store' ])->name('archivo.upload.post');


/*
require __DIR__.'/administracion.php';
require __DIR__.'profesor.php';
require __DIR__.'/alumno.php';
*/

/* ACA LAS RUTAS PARA LAS COSAS DE ADMINISTRACION */


Route::get('/administracion/cargarplan', [ArchivoController::class, 'upload'])
    ->name('archivo.upload');

/* SECRETARIA ACADEMICA */

Route::get('/secretaria/creardocente', [ProfesorController::class, 'create'])
    ->name('creardocente');

    Route::get('/secretaria/creardocente', [ProfesorController::class, 'store'])
    ->name('creardocente');



    

