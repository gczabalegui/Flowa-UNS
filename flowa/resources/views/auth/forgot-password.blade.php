<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Recuperar Contraseña - Flowa UNS</title>
</head>

<body class="bg-gray-100">
    <div class="hero h-screen flex items-center justify-center">
        <div class="hero-content flex-col w-full max-w-md bg-white p-8 rounded-xl shadow-lg text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">Recuperar Contraseña</h1>

            <p class="mb-4 text-gray-700">
                Ingrese su correo electrónico y le enviaremos un enlace para restablecer su contraseña.
            </p>

            <!-- Mensaje de sesión -->
            @if (session('status'))
                <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-4">
                @csrf

                <input type="email" name="email" placeholder="Correo electrónico" required
                    value="{{ old('email') }}"
                    class="input input-bordered w-full @error('email') input-error @enderror">

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary w-full mt-2">
                    Enviar enlace de recuperación
                </button>
            </form>

            <p class="mt-4 text-gray-500 text-sm">
                Volver a <a href="{{ route('login') }}" class="text-blue-700 underline">Iniciar Sesión</a>
            </p>
        </div>
    </div>
</body>

</html>
