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
    @include('secretaria.layouts.navbardashboard')

    <div class="flex flex-col items-center justify-center min-h-screen">
        <h2 class="text-2xl font-bold mb-4">¿Qué desea hacer?</h2>
        <a href="/secretaria/crearsecretaria" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear usuario Secretaría Académica</a>
        <a href="/secretaria/crearprofesor" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear usuario Profesor</a>
        <a href="/secretaria/crearcomision" class="btn btn-primary m-2 w-full max-w-xs text-center">Crear usuario Coordinador Comisión Curricular</a>
        <a href="/secretaria/verplanes" class="btn btn-primary m-2 w-full max-w-xs text-center">Listar planes</a>
    </div>


</body>

</html>