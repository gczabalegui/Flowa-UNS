<!-- resources/views/auth/passwords/email.blade.php -->
@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="text-5xl font-bold">Reestablecer contraseña</h1>
    <p class="py-6">Ingrese su dirección de correo electrónico para recibir un enlace de restablecimiento de contraseña.</p>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @if (session('status'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
                <input id="email" type="email" class="block mt-1 w-full bg-white text-black border-gray-300 rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                @error('email')
                    <span class="invalid-feedback text-red-600 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-primary" style="background-color: #8C0327; color: #FFB8CB;">
                    {{ __('Enviar link de reseteo') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
