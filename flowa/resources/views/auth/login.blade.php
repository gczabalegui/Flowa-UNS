<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Flowa</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8" x-data="{ showPassword: false }">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-800">Iniciar sesión - Flowa UNS</h1>
            <p class="text-gray-600 mt-2">Ingrese sus credenciales para acceder al sistema</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ url('iniciar-sesion') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Campo de email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" required
                    class="input input-bordered w-full focus:ring focus:ring-blue-200"
                    placeholder="Ingrese su email">
            </div>

            <!-- Campo de contraseña con ojito -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required
                        class="input input-bordered w-full pr-10 focus:ring focus:ring-blue-200"
                        placeholder="Ingrese su contraseña">
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.977 9.977 0 012.245-3.73M9.88 9.88A3 3 0 0114.12 14.12M9.88 9.88L3 3m6.88 6.88L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mantener sesión iniciada -->
            <label class="flex items-center gap-2 text-gray-700 text-sm">
                <input type="checkbox" name="remember" class="checkbox checkbox-sm">
                Mantener sesión iniciada
            </label>

            <!-- Botón de inicio -->
            <button type="submit" class="btn btn-primary w-full">Iniciar sesión</button>
        </form>

        <!-- Links secundarios -->
        <div class="mt-6 text-center text-sm text-gray-600">
            <p>
                ¿Olvidó su contraseña?
                <a href="{{ route('password.request') }}" class="text-blue-700 hover:underline">Recuperarla</a>
            </p>
        </div>
    </div>
</body>

</html>
