<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Restablecer Contraseña - Flowa UNS</title>
</head>

<body class="bg-gray-100">
    <div class="hero h-screen flex items-center justify-center">
        <div class="hero-content flex-col w-full max-w-md bg-white p-8 rounded-xl shadow-lg text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">Restablecer Contraseña</h1>
            <p class="text-gray-700 mb-6">Establezca una nueva contraseña para su cuenta.</p>

            {{-- Manejo de Errores/Mensajes (adaptado de la lógica de Laravel) --}}
            @if ($errors->any())
                <div class="mb-4 p-2 bg-red-100 text-red-700 rounded text-left w-full">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}" class="flex flex-col gap-4 w-full">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <input type="email" name="email" placeholder="Correo electrónico" required autofocus autocomplete="username"
                        class="input input-bordered w-full @error('email') input-error @enderror"
                        value="{{ old('email', $request->email) }}">
                    {{-- Si usas los helpers de error originales de Laravel, puedes dejarlos --}}
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <div>
                    <input type="password" name="password" placeholder="Nueva Contraseña" required autocomplete="new-password"
                        class="input input-bordered w-full @error('password') input-error @enderror">
                    {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                </div>

                <div>
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password"
                        class="input input-bordered w-full @error('password_confirmation') input-error @enderror">
                    {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
                </div>

                <button type="submit" class="btn btn-primary w-full mt-2">
                    Restablecer Contraseña
                </button>
            </form>

            <p class="mt-4 text-gray-600">
                Volver a <a href="{{ route('login') }}" class="text-blue-700 underline">Iniciar Sesión</a>
            </p>
        </div>
    </div>
</body>

</html>