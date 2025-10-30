@extends('admin.layouts.admin-layout')

@section('title', 'Mi perfil')

@section('content')

<div class="space-y-8 max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-900">Mi perfil</h1>
    <p class="text-gray-600">Ver la información de tu cuenta y actualizar tu contraseña</p>

    {{-- Notificación de éxito si la contraseña se actualizó --}}
    @if (session('success'))
    <div class="p-3 bg-green-100 text-green-700 rounded-lg text-sm flex items-center mb-6 shadow-md">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Información de usuario
            </h2>
        </div>
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <p class="mt-1 text-base font-medium text-gray-900">{{ $user->email ?? 'correo@ejemplo.com' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Rol</label>
                    <p class="mt-1 text-base font-medium text-gray-900 capitalize">{{ $user->role ?? 'Profesor' }}</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="border-gray-200">

    {{-- 🔒 Panel de Cambio de Contraseña (Lo más importante) --}}
    <div class="bg-white shadow-lg rounded-xl overflow-hidden" x-data="{ showCurrent: false, showNew: false, showConfirm: false }">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
</svg>
                Cambiar contraseña
            </h2>
            <p class="text-sm text-gray-500 mt-1">Asegurate de que tu cuenta esté usando una contraseña segura.</p>
        </div>

        <form action="{{ route('profile.updatePassword') }}" method="POST" class="p-6 space-y-6">
            @csrf
            {{-- Usamos PUT para actualizar recursos --}}
            @method('PUT')

            {{-- 1. Contraseña actual --}}
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Contraseña actual</label>
                <div class="relative mt-1">
                    <input :type="showCurrent ? 'text' : 'password'" id="current_password" name="current_password" required class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 pr-10 focus:ring-blue-500 focus:border-blue-500 @error('current_password') border-red-500 @enderror" placeholder="Contraseña actual">
                    {{-- Botón Ocultar/Mostrar --}}
                    <button type="button" @click="showCurrent = !showCurrent" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg x-show="!showCurrent" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg x-show="showCurrent" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.977 9.977 0 012.245-3.73M9.88 9.88A3 3 0 0114.12 14.12M9.88 9.88L3 3m6.88 6.88L21 21"></path>
                        </svg>
                    </button>
                </div>
                {{-- Muestra errores de validación de Laravel --}}
                @error('current_password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- 2. Nueva contraseña --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                <div class="relative mt-1">
                    <input :type="showNew ? 'text' : 'password'" id="password" name="password" required class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 pr-10 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror" placeholder="Nueva contraseña">
                    <button type="button" @click="showNew = !showNew" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg x-show="!showNew" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg x-show="showNew" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.977 9.977 0 012.245-3.73M9.88 9.88A3 3 0 0114.12 14.12M9.88 9.88L3 3m6.88 6.88L21 21"></path>
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Debe tener al menos 8 caracteres.</p>
            </div>

            {{-- 3. Confirmar nueva contraseña --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar nueva contraseña</label>
                <div class="relative mt-1">
                    <input :type="showConfirm ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 pr-10 focus:ring-blue-500 focus:border-blue-500" placeholder="Repita la nueva contraseña">
                    <button type="button" @click="showConfirm = !showConfirm" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg x-show="!showConfirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg x-show="showConfirm" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.977 9.977 0 012.245-3.73M9.88 9.88A3 3 0 0114.12 14.12M9.88 9.88L3 3m6.88 6.88L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-700 bg-white 
                   hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    Guardar nueva contraseña
                </button>
            </div>

        </form>
    </div>

</div>

@endsection