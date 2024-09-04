<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\AuthenticatedSessionController;

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

Route::middleware(['auth:comision'])->group(function () {
    Route::get('/comision/dashboard', function () {
        // Solo accesible para usuarios autenticados con el guardia 'comision'
        return view('comision.dashboard');
    });
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CREAR EL PDF
//Route::post('/administracion/crearplan', [PDFController::class, 'crearPlan'])->name('crearplan');

Route::get('/crearplan', [PDFController::class, 'create'])->name('crearplan');
Route::post('/crearplan', [PDFController::class, 'generatePDF'])->name('generarPDF');


/*--------PRUEBA------------*/
Route::post('/comision/generar-pdf', [PDFController::class, 'generatePDF2']);

Route::get('/comision/pdfprueba', function() {
    return view('pdf_form');
});


/*------------------------------------------------------------------------------------------ */


Route::get('filemanager', [FileManagerController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});
Route::get('/administracion', [AdministracionController::class, 'dashboard']);
Route::get('/comision', [ComisionController::class, 'dashboard']);
Route::get('/profesor', [ProfesorController::class, 'dashboard']);
Route::get('/secretaria', [SecretariaController::class, 'dashboard']);
//Route::get('/materia', [MateriaController::class, 'dashboard']);
Route::get('archivo-upload', [ ArchivoController::class, 'upload' ])->name('archivo.upload');
Route::post('archivo-store', [ ArchivoController::class, 'store' ])->name('archivo.upload.post');
/*
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
require __DIR__.'/administracion.php';
require __DIR__.'profesor.php';
require __DIR__.'/alumno.php';
*/

/*
Route::middleware(['auth'])->group(function () {
    Route::get('/comision', [ComisionController::class, 'index'])->name('comision');
    Route::get('/profesor', [ProfesorController::class, 'index'])->name('profesor');
    Route::get('/administracion', [AdministracionController::class, 'index'])->name('administracion');
    Route::get('/secretaria', [SecretariaController::class, 'index'])->name('secretaria');
});
*/
/* ACA LAS RUTAS PARA LAS COSAS DE ADMINISTRACION */
Route::get('/administracion/cargarplan', [ArchivoController::class, 'upload'])
    ->name('archivo.upload');


//CREAR UN USUARIO ADMINISTRATIVO
Route::get('/administracion/crearadministrativo', [AdministracionController::class, 'create'])
->name('crearadministrativo');

Route::post('/administracion/crearadministrativo', [AdministracionController::class, 'store'])
->name('crearadministrativo');

//FIN CREAR UN USUARIO ADMINISTRATIVO

//CREAR UN USUARIO SECRETARIA ACADÉMICA
Route::get('/administracion/crearsecretaria', [SecretariaController::class, 'createByAdmin'])
->name('crearsecretaria');

Route::post('/administracion/crearsecretaria', [SecretariaController::class, 'store'])
->name('crearsecretaria');

//FIN CREAR UN USUARIO SECRETARÍA ACADÉMICA

//CREAR UN PLAN
Route::get('/administracion/crearplan', [PlanController::class, 'create'])
    ->name('crearplan');

Route::post('/administracion/crearplan', [PlanController::class, 'storeByAdmin'])
    ->name('crearplan');

//FIN CREAR UN PLAN 

//CREAR UNA MATERIA  
Route::get('/administracion/crearmateria', [MateriaController::class, 'create'])
    ->name('crearmateria');

Route::post('/administracion/crearmateria', [MateriaController::class, 'store'])
    ->name('crearmateria');

//FIN CREAR UNA MATERIA 

//CREAR UNA CARRERA  
Route::get('/administracion/crearcarrera', [CarreraController::class, 'create'])
    ->name('crearcarrera');

Route::post('/administracion/crearcarrera', [CarreraController::class, 'store'])
    ->name('crearcarrera');

//FIN CREAR UNA CARRERA

//CREAR UN DEPARTAMENTO  
Route::get('/administracion/creardepartamento', [DepartamentoController::class, 'create'])
    ->name('creardepartamento');

Route::post('/administracion/creardepartamento', [DepartamentoController::class, 'store'])
    ->name('creardepartamento');

//FIN CREAR UN DEPARTAMENTO

//CREAR UN PROFESOR  
Route::get('/administracion/crearprofesor', [ProfesorController::class, 'createByAdmin'])
    ->name('crearprofesor');

Route::post('/administracion/crearprofesor', [ProfesorController::class, 'store'])
    ->name('crearprofesor');
//FIN CREAR UN PROFESOR

//CREAR UN COORDINAR DE LA COMISION CURRICULAR  
Route::get('/administracion/crearcomision', [ComisionController::class, 'createByAdmin'])
    ->name('crearcomision');

Route::post('/administracion/crearcomision', [ComisionController::class, 'store'])
    ->name('crearcomision');
//FIN CREAR UN COORDINAR DE LA COMISION CURRICULAR  

//VER LOS PLANES EXISTENTES
Route::get('/administracion/verplanes', [PlanController::class, 'indexAdmin'])
    ->name('verplanes');
//FIN VER LOS PLANES EXISTENTES

//VISTA PREVIA DE LA INFORMACIÓN DEL PLAN
Route::get('/administracion/traerinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringInfoPlan($id, 'administracion');
})->name('administracion.traerinfoplan');
//FIN VISTA PREVIA DE LA INFORMACIÓN DEL PLAN

/*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/

/* SECRETARIA ACADEMICA */

//CREAR UN PROFESOR  
Route::get('/secretaria/crearprofesor', [ProfesorController::class, 'createBySec'])
    ->name('crearprofesor');

Route::post('/secretaria/crearprofesor', [ProfesorController::class, 'store'])
    ->name('crearprofesor');
//FIN CREAR UN PROFESOR

//CREAR UN USUARIO SECRETARIA ACADÉMICA
Route::get('/secretaria/crearsecretaria', [SecretariaController::class, 'createBySec'])
->name('crearsecretaria');

Route::post('/secretaria/crearsecretaria', [SecretariaController::class, 'store'])
->name('crearsecretaria');

//FIN CREAR UN USUARIO SECRETARÍA ACADÉMICA

//CREAR UN COORDINAR DE LA COMISION CURRICULAR  
Route::get('/secretaria/crearcomision', [ComisionController::class, 'createBySec'])
    ->name('crearcomision');

Route::post('/secretaria/crearcomision', [ComisionController::class, 'store'])
    ->name('crearcomision');
//FIN CREAR UN COORDINAR DE LA COMISION CURRICULAR  

//VER PLANES PENDIENTES DE APROBACIÓN
Route::get('/secretaria/verplanes', [PlanController::class, 'indexSecretaria'])
    ->name('verplanes');
//FIN VER PLANES PENDIENTES DE APROBACIÓN

//PEDIR FORMULARIO DEL PLAN
Route::get('/secretaria/traerinfoplan/{id}', function($id) {
            return app(PlanController::class)->bringInfoPlan($id, 'secretaria');
        })
        ->name('secretaria.traerinfoplan');
//PEDIR FORMULARIO DEL PLAN


Route::post('/secretaria/aprobarplan/{id}', [PlanController::class, 'aprobarPlan'])
    ->name('aprobarplan');
    
Route::post('/secretaria/rechazarplan/{id}', [PlanController::class, 'rechazarPlan'])
    ->name('rechazarplan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/

/* PROFESOR */

//VER PLANES PENDIENTES DE REVISIÓN
Route::get('/profesor/verplanes', [PlanController::class, 'indexProfesor'])
    ->name('verplanes');
//FIN VER PLANES PENDIENTES DE REVISIÓN
    
//MOSTRAR FORMULARIO PARA COMPLETAR INFORMACIÓN DEL PLAN
Route::get('/profesor/completarinfoplan/{id}', function($id) {
            return app(PlanController::class)->bringPlanForm($id, 'completar');
        })
        ->name('completarinfoplan');
//FIN MOSTRAR FORMULARIO PARA COMPLETAR INFORMACIÓN DEL PLAN


//COMPLETAR INFORMACIÓN DEL PLAN
Route::post('/profesor/completarinfoplan/{id}', [PlanController::class, 'storeByProfesor'])
    ->name('completarinfoplan');
//FIN COMPLETAR INFORMACIÓN DEL PLAN

//MOSTRAR FORMULARIO PARA MODIFICAR LA INFORMACIÓN DEL PLAN
Route::get('/profesor/modificarinfoplan/{id}', function($id) {
            return app(PlanController::class)->bringPlanForm($id, 'modificar');
        })
        ->name('modificarinfoplan');

//MODIFICAR INFORMACIÓN DEL PLAN
Route::put('/profesor/modificarinfoplan/{id}', [PlanController::class, 'storeByProfesor'])
    ->name('modificarinfoplan');
//FIN MODIFICAR INFORMACIÓN DEL PLAN


    /*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/

//COMISION

//VER PLANES APROBADOS POR SECRETARIA ACADEMICA
Route::get('/comision/verplanes', [PlanController::class, 'indexComision'])
    ->name('comision.verplanes');

//VISTA DE LA INFORMACIÓN DEL PLAN DE LA COMISION
Route::get('/comision/traerinfoplan/{id}', function($id) {
    return app(PlanController::class)->bringInfoPlan($id, 'comision');
})->name('comision.traerinfoplan');

    /*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------*/

//INICIO DE SESION


// Ruta para la Comisión Académica
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:comision')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:comision');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:comision')
        ->name('logout');

// Ruta para el Profesor
//Route::get('/profesor', [LoginController::class, 'showLoginForm'])->middleware('guest:profesor')->name('profesor.login');

// Ruta para la Administración
//Route::get('/administracion', [LoginController::class, 'showLoginForm'])->middleware('guest:administracion')->name('administracion.login');

// Ruta para la Secretaría Académica
//Route::get('/secretaria', [LoginController::class, 'showLoginForm'])->middleware('guest:secretaria')->name('secretaria.login');