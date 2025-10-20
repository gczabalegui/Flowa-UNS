<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Flowa UNS</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-900 mb-2">Recuperar contraseña</h1>
            <p class="text-gray-600 text-sm">
                Ingrese su correo electrónico y le enviaremos un enlace para restablecer su contraseña.
            </p>
        </div>

        <!-- Mensaje de estado -->
        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="Ingrese su email"
                    value="{{ old('email') }}" required
                    class="input input-bordered w-full @error('email') input-error @enderror">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="btn btn-primary w-full text-white font-semibold mt-2">
                Enviar enlace de recuperación
            </button>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
                ¿Recordó su contraseña?  
                <a href="{{ route('login') }}" class="text-blue-700 font-medium hover:underline">
                    Iniciar sesión
                </a>
            </p>
        </div>
    </div>
</body>

</html>
