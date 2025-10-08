<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    FileManagerController,
    AdministracionController,
    ComisionController,
    ProfesorController,
    ArchivoController,
    SecretariaController,
    PlanController,
    MateriaController,
    CarreraController,
    DepartamentoController,
    PDFController,
    AuthController
};

// ------------------------------
// PANTALLA DE BIENVENIDA
// ------------------------------
// Pantalla de inicio → login
Route::get('/', function () {
    return redirect()->route('iniciar-sesion'); // Redirige al login
});

// Login / Logout
Route::get('iniciar-sesion', [AuthController::class, 'showLoginForm'])->name('iniciar-sesion');
Route::post('iniciar-sesion', [AuthController::class, 'login']);
Route::post('/cerrar-sesion', [AuthController::class, 'logout'])->name('cerrar-sesion');


// ------------------------------
// PERFIL (usuarios autenticados)
// ------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FILE MANAGER
    Route::get('filemanager', [FileManagerController::class, 'index']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/welcome', [ProfileController::class, 'dashboard'])->name('welcome');
});

// ------------------------------
// ADMINISTRACION
// ------------------------------
Route::middleware(['auth', 'role:administracion'])->group(function () {
    Route::get('/administracion', [AdministracionController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/administracion/cargarplan', [ArchivoController::class, 'upload'])->name('archivo.upload');
    Route::post('/administracion/cargarplan', [ArchivoController::class, 'store'])->name('archivo.upload.post');

    Route::get('/administracion/crearadministrativo', [AdministracionController::class, 'create'])->name('crearadministrativo');
    Route::post('/administracion/crearadministrativo', [AdministracionController::class, 'store'])->name('storeadministrativo');

    Route::get('/administracion/crearsecretaria', [SecretariaController::class, 'createByAdmin'])->name('crearsecretaria');
    Route::post('/administracion/crearsecretaria', [SecretariaController::class, 'store'])->name('storesecretaria');

    Route::get('/administracion/crearplan', [PlanController::class, 'create'])->name('crearplan');

    Route::post('/administracion/crearplan', [PlanController::class, 'storeByAdmin'])->name('storeplan');

    Route::get('/administracion/crearmateria', [MateriaController::class, 'create'])->name('crearmateria');
    Route::post('/administracion/crearmateria', [MateriaController::class, 'store'])->name('storemateria');

    Route::get('/administracion/crearcarrera', [CarreraController::class, 'create'])->name('crearcarrera');
    Route::post('/administracion/crearcarrera', [CarreraController::class, 'store'])->name('storecarrera');

    Route::get('/administracion/creardepartamento', [DepartamentoController::class, 'create'])->name('creardepartamento');
    Route::post('/administracion/creardepartamento', [DepartamentoController::class, 'store'])->name('storedepartamento');

    Route::get('/administracion/crearprofesor', [ProfesorController::class, 'createByAdmin'])->name('crearprofesor');
    Route::post('/administracion/crearprofesor', [ProfesorController::class, 'store'])->name('storeprofesor');

    Route::get('/administracion/crearcomision', [ComisionController::class, 'createByAdmin'])->name('crearcomision');
    Route::post('/administracion/crearcomision', [ComisionController::class, 'store'])->name('storecomision');

    Route::get('/administracion/verplanes', [PlanController::class, 'indexAdmin'])->name('administracion.verplanes');

    Route::get('/administracion/editarplan/{id}', [PlanController::class, 'editByAdmin'])->name('administracion.editarplan');
    Route::put('/administracion/editarplan/{id}', [PlanController::class, 'updateByAdmin'])->name('administracion.updateplan');

    Route::delete('/administracion/eliminarplan/{id}', [PlanController::class, 'destroy'])->name('administracion.eliminarplan');

    Route::get('/administracion/traerinfoplan/{id}', function($id) {
        return app(PlanController::class)->bringInfoPlan($id, 'administracion');
    })->name('administracion.traerinfoplan');
});

// ------------------------------
// SECRETARIA
// ------------------------------
Route::middleware(['auth', 'role:secretaria'])->group(function () {
    Route::get('/secretaria', [SecretariaController::class, 'dashboard'])->name('secretaria.dashboard');

    Route::get('/secretaria/crearprofesor', [ProfesorController::class, 'createBySec'])->name('crearprofesor.sec');
    Route::post('/secretaria/crearprofesor', [ProfesorController::class, 'store'])->name('storeprofesor.sec');

    Route::get('/secretaria/crearsecretaria', [SecretariaController::class, 'createBySec'])->name('crearsecretaria.sec');
    Route::post('/secretaria/crearsecretaria', [SecretariaController::class, 'store'])->name('storesecretaria.sec');

    Route::get('/secretaria/crearcomision', [ComisionController::class, 'createBySec'])->name('crearcomision.sec');
    Route::post('/secretaria/crearcomision', [ComisionController::class, 'store'])->name('storecomision.sec');

    Route::get('/secretaria/traerinfoplan/{id}', function($id) {
        return app(PlanController::class)->bringInfoPlan($id, 'secretaria');
    })->name('secretaria.traerinfoplan');

    Route::post('/secretaria/aprobarplan/{id}', [PlanController::class, 'aprobarPlan'])->name('secretaria.aprobarplan')->middleware('role:secretaria');
    Route::post('/secretaria/rechazarplan/{id}', [PlanController::class, 'rechazarPlan'])->name('secretaria.rechazarplan')->middleware('role:secretaria');

    Route::get('/secretaria/verplanes', [PlanController::class, 'indexSecretaria'])->name('secretaria.verplanes');
});

// ------------------------------
// PROFESOR
// ------------------------------
Route::middleware(['auth', 'role:profesor'])->group(function () {
    Route::get('/profesor', [ProfesorController::class, 'dashboard'])->name('profesor.dashboard');

    Route::get('/profesor/traerinfoplan/{id}', function($id) {
        return app(PlanController::class)->bringInfoPlan($id, 'profesor');
    })->name('profesor.traerinfoplan');

    Route::post('/profesor/rechazarplan/{id}', [PlanController::class, 'rechazarPlan'])->name('profesor.rechazarplan')->middleware('role:profesor');

    Route::get('/profesor/editarplan/{id}', [PlanController::class, 'editByProfesor'])->name('profesor.editarplan');
    Route::put('/profesor/editarplan/{id}', [PlanController::class, 'updateByProfesor'])->name('profesor.editarplan.update');

    Route::get('/profesor/verplanes', [PlanController::class, 'indexProfesor'])->name('profesor.verplanes');
});

// ------------------------------
// COMISION
// ------------------------------
Route::middleware(['auth', 'role:comision'])->group(function () {
    Route::get('/comision', [ComisionController::class, 'dashboard'])->name('comision.dashboard');

    Route::get('/comision/traerinfoplan/{id}', function($id) {
        return app(PlanController::class)->bringInfoPlan($id, 'comision');
    })->name('comision.traerinfoplan');

    Route::get('/comision/pdfprueba', [ComisionController::class, 'pdfPrueba'])->name('comision.pdfprueba');

    Route::get('/comision/verplanes', [PlanController::class, 'indexComision'])->name('comision.verplanes');

    Route::get('/comision/generarpdf/{id}', [ComisionController::class, 'pdfPrueba'])
    ->name('comision.generarPdf');
});


// ------------------------------
// PLAN DE MATERIA
// ------------------------------
Route::get('/administracion/plan/{id}/pdf', [PlanController::class, 'exportarPDF']);

// routes/web.php
Route::post('/administracion/plan/preview-pdf', [PlanController::class, 'previewPDF'])
     ->name('plan.preview.pdf');


     // routes/web.php
Route::post('/administracion/plan', [PlanController::class, 'store'])
->name('plan.store');

// ------------------------------
// Auth predeterminado de Laravel
// ------------------------------
require __DIR__.'/auth.php';
