<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Flowa</title>
</head>

<body>
    @include('administracion.layouts.navbardashboard')
    @if (session('estado'))
    <div class="alert alert-success shadow-lg my-5 mx-auto max-w-screen-lg text-white">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('estado') }}</span>
        </div>
    </div>
    @endif

    <div class="flex flex-col items-center justify-center min-h-screen p-4">
        <h2 class="text-2xl font-bold mb-8">¿Qué desea hacer?</h2>
        
        <div class="max-w-lg w-full mx-auto space-y-4">
            <!-- Sección Crear -->
            <div class="collapse collapse-arrow bg-base-200 border border-base-300">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Crear Nuevo
                </div>
                <div class="collapse-content">
                    <div class="space-y-3 pt-2">
                        <a href="/administracion/crearmateria" class="btn btn-outline btn-sm w-full">Crear materia</a>
                        <a href="/administracion/crearcarrera" class="btn btn-outline btn-sm w-full">Crear carrera</a>
                        <a href="/administracion/crearplan" class="btn btn-outline btn-sm w-full">Crear plan de materia</a>
                        
                        <div class="mt-4">
                            <h4 class="text-sm font-semibold text-gray-600 mb-3">Usuarios</h4>
                            <div class="space-y-2">
                                <a href="/administracion/crearsecretaria" class="btn btn-outline btn-sm w-full">Crear usuario Secretaría Académica</a>
                                <a href="/administracion/crearadministrativo" class="btn btn-outline btn-sm w-full">Crear usuario Administración</a>
                                <a href="/administracion/crearprofesor" class="btn btn-outline btn-sm w-full">Crear usuario Profesor</a>
                                <a href="/administracion/crearcomision" class="btn btn-outline btn-sm w-full">Crear usuario Coordinador Comisión Curricular</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección Gestionar -->
            <div class="collapse collapse-arrow bg-base-200 border border-base-300">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Gestionar Planes
                </div>
                <div class="collapse-content">
                    <div class="space-y-3 pt-2">
                        <a href="/administracion/verplanes" class="btn btn-outline btn-sm w-full">Ver planes existentes</a>
                        <a href="/administracion/cargarplan" class="btn btn-outline btn-sm w-full">Cargar plan de materia - versión anterior</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('warning'))
    <div class="alert alert-warning shadow-lg my-5 mx-auto max-w-screen-lg text-white">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>{{ session('warning') }}</span>
        </div>
    </div>
    @endif

</body>

</html>