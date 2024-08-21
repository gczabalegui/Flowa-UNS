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
    @include('profesor.layouts.navbardashboard')

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
        <h2 class="text-2xl font-bold mb-4">¿Qué desea hacer?</h2>
        <a href="/profesor/verplanes" class="btn btn-primary m-2 w-full max-w-xs text-center">Ver planes pendientes</a>
        <a href="/profesor/completarinfoplan" class="btn btn-primary m-2 w-full max-w-xs text-center">Modificar plan de materia</a>
    </div>

    @if (session('warning'))
    <div class="alert alert-warning shadow-lg my-5 mx-auto max-w-screen-lg text-white">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span>{{ session('warning') }}</span>
        </div>
    </div>
    @endif
</body>

</html>