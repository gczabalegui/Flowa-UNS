<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flowa - UNS</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue': {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <div x-data="{ sidebarOpen: true }" class="flex h-screen">

        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
             class="fixed left-0 top-0 w-64 h-full bg-white shadow-xl transform transition-transform duration-500 ease-in-out z-30">

            <div class="flex flex-col h-full pt-6">
                <div class="flex items-center justify-between px-4 pb-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-blue-600">Flowa</h2>
                    <button @click="sidebarOpen = false" class="md:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <nav class="flex-1 px-4 py-6 overflow-y-auto">
                    <div class="mb-6">
                        <span class="block px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                            Seleccione su rol
                        </span>
                        <div class="space-y-2">
                            <a href="/comision" class="flex items-center px-4 py-3 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition duration-150 ease-in-out group">
                                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Comisión Académica
                            </a>
                            
                            <a href="/profesor" class="flex items-center px-4 py-3 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition duration-150 ease-in-out group">
                                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profesor
                            </a>

                            <a href="/administracion" class="flex items-center px-4 py-3 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition duration-150 ease-in-out group">
                                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Administración
                            </a>

                            <a href="/secretaria" class="flex items-center px-4 py-3 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition duration-150 ease-in-out group">
                                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Secretaría Académica
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="flex-1 overflow-auto transition-all duration-500 ease-in-out ml-64">
            <main class="flex items-center justify-center min-h-screen p-6">
                
                <div class="max-w-xl mx-auto text-center bg-white p-10 rounded-lg shadow-xl border border-gray-100">
                    <div class="flex flex-col items-center">
                        <div class="w-20 h-20 mb-6 bg-blue-100 rounded-full flex items-center justify-center">
                             <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        
                        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">Flowa - UNS</h1>
                        <p class="text-lg text-gray-700 mb-6">
                            Bienvenido al sistema para la gestión de planes de materias.
                        </p>
                        <p class="text-md text-gray-600 font-medium">
                            <span class="font-bold text-blue-600">A la izquierda</span>, seleccione el rol con el que desea acceder al sistema.
                        </p>
                    </div>

                    </div>
            </main>
        </div>
    </div>
</body>

</html>