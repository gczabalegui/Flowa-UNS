@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Crear nuevo usuario Secretaría Académica')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16 ml-0 lg:ml-64 transition-all duration-300">
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nuevo usuario Secretaría Académica</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar un nuevo usuario.</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/secretaria/crearsecretaria" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nombre_secretaria" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_secretaria" name="nombre_secretaria" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1" required value="{{ old('nombre_secretaria') }}" placeholder="Ingrese el nombre">
                        @error('nombre_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="apellido_secretaria" class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                        <input id="apellido_secretaria" name="apellido_secretaria" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required value="{{ old('apellido_secretaria') }}" placeholder="Ingrese el apellido">
                        @error('apellido_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="DNI_secretaria" class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                        <input id="DNI_secretaria" name="DNI_secretaria" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="3" required value="{{ old('DNI_secretaria') }}" placeholder="Ingrese el DNI" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        @error('DNI_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="legajo_secretaria" class="block text-sm font-medium text-gray-700 mb-2">Legajo</label>
                        <input id="legajo_secretaria" name="legajo_secretaria" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="4" required value="{{ old('legajo_secretaria') }}" placeholder="Ingrese el legajo" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        @error('legajo_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="email_secretaria" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email_secretaria" name="email_secretaria" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="5" required value="{{ old('email_secretaria') }}" placeholder="Ingrese el email">
                        @error('email_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200" tabindex="7">
                        GUARDAR
                    </button>
                    <button type="button" onclick="window.location.href='/secretaria'" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="8">
                        CANCELAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .no-spinners::-webkit-outer-spin-button,
    .no-spinners::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .no-spinners {
        -moz-appearance: textfield;
        appearance: textfield;
    }
</style>
@endsection