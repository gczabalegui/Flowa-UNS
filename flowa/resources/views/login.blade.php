<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login - Flowa UNS</title>
</head>

<body class="bg-gray-100">
    <div class="hero h-screen flex items-center justify-center">
        <div class="hero-content flex-col w-full max-w-md bg-white p-8 rounded-xl shadow-lg text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">Iniciar Sesión</h1>
            <p class="text-gray-700 mb-6">Ingrese sus credenciales para acceder al sistema</p>

            @if ($errors->any())
                <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('iniciar-sesion') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <input type="email" name="email" placeholder="Correo electrónico" required
                    class="input input-bordered w-full">

                <input type="password" name="password" placeholder="Contraseña" required
                    class="input input-bordered w-full">

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="checkbox">
                    <span class="text-gray-700">Mantener sesión iniciada</span>
                </label>

                <button type="submit" class="btn btn-primary w-full mt-2">Iniciar Sesión</button>
            </form>

            <p class="mt-4 text-gray-600">
                ¿Olvidó su contraseña? <a href="{{ route('password.request') }}" class="text-blue-700 underline">Recuperarla</a>
            </p>

            <p class="mt-2 text-gray-500 text-sm">
                Volver a <a href="{{ route('login') }}" class="text-blue-700 underline">Bienvenida</a>
            </p>
        </div>
    </div>
</body>

</html>
