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
    <!-- Header con logo y botón -->
    <div class="bg-white border-b border-gray-200">
        <div class="px-4 sm:px-8 lg:px-12 xl:px-16">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center">
                    <a href="/administracion">
                        <img src="{{ asset('logouns.png') }}" alt="Logo" class="h-16 w-16" style="width: 80px; height: 80px;">
                    </a>
                </div>
                
                <div class="flex items-center">
                    <a href="/welcome" class="btn btn-primary normal-case text-2xl">Flowa - UNS</a>
                </div>
                
                <div class="flex items-center">
                    <form action="{{ route('cerrar-sesion') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900 bg-transparent border-none cursor-pointer px-4 py-2 rounded transition">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
        <div class="max-w-none mx-auto">
            <div class="mb-6 pt-8">

            </div>

            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <div class="max-w-lg w-full mx-auto space-y-4">
                    <!-- Sección Crear -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg">
                        <div class="collapse collapse-arrow">
                            <input type="checkbox" />
                            <div class="collapse-title text-xl font-medium text-gray-900">
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
                    </div>

                    <!-- Sección Gestionar -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg">
                        <div class="collapse collapse-arrow">
                            <input type="checkbox" />
                            <div class="collapse-title text-xl font-medium text-gray-900">
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
            </div>
        </div>
    </div>

    @include('components.notification-popup')
    @include('components.confirm-modal')


</body>

</html>