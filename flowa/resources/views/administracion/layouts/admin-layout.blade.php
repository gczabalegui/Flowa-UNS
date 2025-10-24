<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Flowa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="description" content="Panel de administración de Flowa para la gestión de usuarios, materias, carreras y programas de materia.">
</head>

<body class="bg-gray-50">
    <div x-data="{ sidebarOpen: true }" class="flex h-screen">
        <!-- Navbar -->
        <div class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-4">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Toggle Sidebar" title="Mostrar/Ocultar menú lateral">
                        <svg x-show="!sidebarOpen" x-transition.opacity class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-show="sidebarOpen" x-transition.opacity class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    @php
                    // Define la ruta de destino según el tipo de usuario
                    $tipo = Auth::user()->role ?? null;
                    switch ($tipo) {
                    case 'admin':
                    $ruta = url('/welcome');
                    break;
                    case 'comision':
                    $ruta = url('/comision');
                    break;
                    case 'administracion':
                    $ruta = url('/administracion');
                    break;
                    case 'secretaria':
                    $ruta = url('/secretaria');
                    break;
                    case 'profesor':
                    $ruta = url('/profesor');
                    break;
                    default:
                    $ruta = url('/'); // fallback
                    break;
                    }
                    @endphp

                    <a href="{{ $ruta }}" class="ml-4 text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                        Flowa
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <div x-data="{ profileOpen: false }" class="relative">
                        <button @click="profileOpen = !profileOpen" class="flex items-center p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Alternar menú lateral">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center" aria-label="Abrir menú de usuario" title="Abrir menú de usuario">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Usuario - Administración' }}</span>
                            <svg :class="profileOpen ? 'rotate-180' : ''" class="ml-1 w-4 h-4 text-gray-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="profileOpen" @click.away="profileOpen = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">

                            <div class="px-4 py-3 border-b border-gray-200">
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'Usuario' }}</p>
                                <p class="text-sm text-gray-500">{{ Auth::user()->email ?? 'usuario@ejemplo.com' }}</p>
                            </div>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Mi perfil
                            </a>

                            <div class="border-t border-gray-200">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:relative left-0 top-0 w-64 h-full bg-white shadow-xl transform transition-transform duration-500 ease-in-out z-30">

            <div class="flex flex-col h-full pt-16">
                <nav class="flex-1 px-4 py-6 overflow-y-auto">
                    <a href="/administracion" class="flex items-center px-4 py-3 mb-6 text-gray-700 bg-blue-50 rounded-lg hover:bg-blue-100">
                        <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v4M16 1v4"></path>
                        </svg>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>

                    <div class="mb-6">
                        <div class="flex items-center px-4 py-2 mb-3">
                            <svg class="w-5 h-5 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path>
                            </svg>
                            <span class="text-sm font-semibold text-gray-800">CREAR NUEVO</span>
                        </div>
                        <div class="ml-8 space-y-1 mb-4">
                            <a href="/administracion/crearmateria" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">
                                Materia
                            </a>
                            <a href="/administracion/crearcarrera" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">
                                Carrera
                            </a>
                            <a href="/administracion/crearplan" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">
                                Programa de materia
                            </a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center px-4 py-2 mb-3">
                            <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-gray-800">CREAR USUARIO</span>
                        </div>
                        <div class="ml-8 space-y-1 mb-4">
                            <a href="/administracion/crearsecretaria" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">Secretaría académica</a>
                            <a href="/administracion/crearadministrativo" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">Administración</a>
                            <a href="/administracion/crearprofesor" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">Profesor</a>
                            <a href="/administracion/crearcomision" class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-100">Coordinador comisión académica</a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <a href="/administracion/verplanes" class="flex items-center px-4 py-2 mb-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-gray-800">LISTAR PROGRAMAS</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Contenido principal -->
        <div :class="sidebarOpen ? 'lg:ml-64' : 'ml-0'" class="flex-1 w-full min-w-0 overflow-auto transition-all duration-500 ease-in-out pt-16 bg-gray-50">

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @include('components.notification-popup')
    @include('components.confirm-modal')
</body>

</html>