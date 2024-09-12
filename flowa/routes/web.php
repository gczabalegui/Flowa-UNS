<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;

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

Route::get('iniciar-sesion', function () {
    return view('login'); // 'login' es el nombre del archivo sin la extensión .blade.php
});

Route::post('iniciar-sesion', [AuthController::class, 'login']);

Route::get('inicio', function() {
    return 'Bienvenido a la página de inicio';
})->name('home');

Route::post('/cerrar-sesion', [AuthController::class, 'logout'])->name('cerrar-sesion');

Route::get('/secretaria', function () {
    return view('secretaria.dashboard');
});

Route::get('/comision', function () {
    return view('comision.dashboard');
});

Route::get('/administracion', function () {
    return view('administracion.dashboard');
});

Route::get('/profesor', function () {
    return view('profesor.dashboard');
});

require __DIR__.'/auth.php';

// PRUEBA
Route::post('/comision/generar-pdf', [PDFController::class, 'generatePDF2']);
Route::get('/comision/pdfprueba', function() {
    return view('pdf_form');
});

// FILE MANAGER
Route::get('filemanager', [FileManagerController::class, 'index']);

// ADMINISTRACION
Route::get('/administracion', [AdministracionController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/administracion/cargarplan', [ArchivoController::class, 'upload'])->name('archivo.upload');
Route::post('/administracion/cargarplan', [ArchivoController::class, 'store'])->name('archivo.upload.post');

// CREAR UN USUARIO ADMINISTRATIVO
Route::get('/administracion/crearadministrativo', [AdministracionController::class, 'create'])->name('crearadministrativo');
Route::post('/administracion/crearadministrativo', [AdministracionController::class, 'store'])->name('storeadministrativo');

// CREAR UN USUARIO SECRETARIA ACADÉMICA
Route::get('/administracion/crearsecretaria', [SecretariaController::class, 'createByAdmin'])->name('crearsecretaria');
Route::post('/administracion/crearsecretaria', [SecretariaController::class, 'store'])->name('storesecretaria');

// CREAR UN PLAN
Route::get('/administracion/crearplan', [PlanController::class, 'create'])->name('crearplan');
Route::post('/administracion/crearplan', [PlanController::class, 'storeByAdmin'])->name('storeplan');

// CREAR UNA MATERIA  
Route::get('/administracion/crearmateria', [MateriaController::class, 'create'])->name('crearmateria');
Route::post('/administracion/crearmateria', [MateriaController::class, 'store'])->name('storemateria');

// CREAR UNA CARRERA  
Route::get('/administracion/crearcarrera', [CarreraController::class, 'create'])->name('crearcarrera');
Route::post('/administracion/crearcarrera', [CarreraController::class, 'store'])->name('storecarrera');

// CREAR UN DEPARTAMENTO  
Route::get('/administracion/creardepartamento', [DepartamentoController::class, 'create'])->name('creardepartamento');
Route::post('/administracion/creardepartamento', [DepartamentoController::class, 'store'])->name('storedepartamento');

// CREAR UN PROFESOR  
Route::get('/administracion/crearprofesor', [ProfesorController::class, 'createByAdmin'])->name('crearprofesor');
Route::post('/administracion/crearprofesor', [ProfesorController::class, 'store'])->name('storeprofesor');

// CREAR UN COORDINAR DE LA COMISION CURRICULAR  
Route::get('/administracion/crearcomision', [ComisionController::class, 'createByAdmin'])->name('crearcomision');
Route::post('/administracion/crearcomision', [ComisionController::class, 'store'])->name('storecomision');

// VER LOS PLANES EXISTENTES
Route::get('/administracion/verplanes', [PlanController::class, 'indexAdmin'])->name('verplanes');

// VISTA PREVIA DE LA INFORMACIÓN DEL PLAN
Route::get('/administracion/traerinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringInfoPlan($id, 'administracion');
})->name('administracion.traerinfoplan');

/* SECRETARIA ACADEMICA */

// CREAR UN PROFESOR  
Route::get('/secretaria/crearprofesor', [ProfesorController::class, 'createBySec'])->name('crearprofesor.sec');
Route::post('/secretaria/crearprofesor', [ProfesorController::class, 'store'])->name('storeprofesor.sec');

// CREAR UN USUARIO SECRETARIA ACADÉMICA
Route::get('/secretaria/crearsecretaria', [SecretariaController::class, 'createBySec'])->name('crearsecretaria.sec');
Route::post('/secretaria/crearsecretaria', [SecretariaController::class, 'store'])->name('storesecretaria.sec');

// CREAR UN COORDINAR DE LA COMISION CURRICULAR  
Route::get('/secretaria/crearcomision', [ComisionController::class, 'createBySec'])->name('crearcomision.sec');
Route::post('/secretaria/crearcomision', [ComisionController::class, 'store'])->name('storecomision.sec');

// VER PLANES PENDIENTES DE APROBACIÓN
Route::get('/secretaria/verplanes', [PlanController::class, 'indexSecretaria'])->name('verplanes.secretaria');

// PEDIR FORMULARIO DEL PLAN
Route::get('/secretaria/traerinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringInfoPlan($id, 'secretaria');
})->name('secretaria.traerinfoplan');

Route::post('/secretaria/aprobarplan/{id}', [PlanController::class, 'aprobarPlan'])->name('aprobarplan');
Route::post('/secretaria/rechazarplan/{id}', [PlanController::class, 'rechazarPlan'])->name('rechazarplan');

// PROFESOR

// VER PLANES PENDIENTES DE REVISIÓN
Route::get('/profesor/verplanes', [PlanController::class, 'indexProfesor'])->name('verplanes.profesor');

// MOSTRAR FORMULARIO PARA COMPLETAR INFORMACIÓN DEL PLAN
Route::get('/profesor/completarinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringPlanForm($id, 'completar');
})->name('completarinfoplan');

// COMPLETAR INFORMACIÓN DEL PLAN
Route::post('/profesor/completarinfoplan/{id}', [PlanController::class, 'storeByProfesor'])->name('storecompletarinfoplan');

// MOSTRAR FORMULARIO PARA MODIFICAR LA INFORMACIÓN DEL PLAN
Route::get('/profesor/modificarinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringPlanForm($id, 'modificar');
})->name('modificarinfoplan');

// MODIFICAR INFORMACIÓN DEL PLAN
Route::put('/profesor/modificarinfoplan/{id}', [PlanController::class, 'storeByProfesor'])->name('storemodificarinfoplan');

// PEDIR FORMULARIO DEL PLAN
Route::get('/profesor/traerinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringInfoPlan($id, 'profesor');
})->name('profesor.traerinfoplan');

//RECHAZAR PLAN PARA ADMINISTRACIÓN 
Route::post('/profesor/rechazarplan/{id}', [PlanController::class, 'rechazarPlan'])->name('rechazarplan');

// COMISION

// VER PLANES APROBADOS POR SECRETARIA ACADEMICA
Route::get('/comision/verplanes', [PlanController::class, 'indexComision'])->name('verplanes.comision');

// VISTA DE LA INFORMACIÓN DEL PLAN
Route::get('/comision/traerinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringInfoPlan($id, 'comision');
})->name('comision.traerinfoplan');
