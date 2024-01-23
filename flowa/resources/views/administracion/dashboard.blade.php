<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Flowa</title>
</head>

<body>
    @include('administracion.layouts.navbar')
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

    <div class="flex flex-col items-center justify-center min-h-screen">
        <a href="/administracion/crearmateria" class="btn btn-primary m-2 w-full max-w-xs text-center" >Crear materia</a>
        <a href="/administracion/crearcarrera" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear carrera</a>
        <a href="/administracion/crearplan" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear plan de materia</a>
        <a href="/administracion/crearsecretaria" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear usuario Secretaría Académica</a>
        <a href="/administracion/crearadministrativo" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear usuario Administración</a>
        <a href="/administracion/crearprofesor" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear usuario Profesor</a>
        <a href="/administracion/modificarplan" class="btn btn-primary m-2 w-full max-w-xs text-center">Modificar plan de materia</a>
        <a href="/administracion/eliminarplan" class="btn btn-primary m-2 w-full max-w-xs text-center">Eliminar plan de materia</a>
        <a href="/administracion/cargarplan" class="btn btn-primary m-2 w-full max-w-xs text-center">Cargar plan de materia - versión anterior</a>
    </div>
</body>

</html>