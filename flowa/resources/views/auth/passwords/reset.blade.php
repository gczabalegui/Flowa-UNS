@extends('layouts.app')

@section('content')
<div class="hero h-screen flex items-center justify-center bg-gray-100">
    <div class="hero-content flex-col w-full max-w-md bg-white p-8 rounded-xl shadow-lg text-center">
        <h1 class="text-3xl font-bold text-blue-900 mb-4">Restablecer Contraseña</h1>
        <p class="text-gray-700 mb-6">Ingrese su correo y la nueva contraseña</p>

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="mb-4 p-2 bg-red-100 text-red-700 rounded text-left">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <input id="email" type="email" name="email"
                placeholder="Correo electrónico"
                value="{{ $email ?? old('email') }}"
                required autocomplete="email" autofocus
                class="input input-bordered w-full @error('email') input-error @enderror">

            <input id="password" type="password" name="password"
                placeholder="Nueva contraseña"
                required autocomplete="new-password"
                class="input input-bordered w-full @error('password') input-error @enderror">

            <input id="password-confirm" type="password" name="password_confirmation"
                placeholder="Confirmar contraseña"
                required autocomplete="new-password"
                class="input input-bordered w-full">

            <button type="submit" class="btn btn-primary w-full mt-2">
                Restablecer Contraseña
            </button>
        </form>

        <p class="mt-4 text-gray-600">
            ¿Ya recordaste tu contraseña? 
            <a href="{{ route('login') }}" class="text-blue-700 underline">Iniciar sesión</a>
        </p>
    </div>
</div>
@endsection
