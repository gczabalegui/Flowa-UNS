@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Crear Profesor')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:pl-[18rem] lg:pr-12 xl:pl-[20rem] xl:pr-16 transition-all duration-300">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nuevo Profesor</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar un nuevo usuario</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/secretaria/crearprofesor" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_profesor" name="nombre_profesor" type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="1" required value="{{ old('nombre_profesor') }}" placeholder="Ingrese el nombre">
                        @error('nombre_profesor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                        <input id="apellido_profesor" name="apellido_profesor" type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="2" required value="{{ old('apellido_profesor') }}" placeholder="Ingrese el apellido">
                        @error('apellido_profesor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                        <input id="DNI_profesor" name="DNI_profesor" type="number" min="1" step="1"
                            class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="3" required value="{{ old('DNI_profesor') }}" placeholder="Ingrese el DNI">
                        @error('DNI_profesor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Legajo</label>
                        <input id="legajo_profesor" name="legajo_profesor" type="number" min="1" step="1"
                            class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="4" required value="{{ old('legajo_profesor') }}" placeholder="Ingrese el legajo">
                        @error('legajo_profesor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email_profesor" name="email_profesor" type="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="5" required value="{{ old('email_profesor') }}" placeholder="Ingrese el email">
                        @error('email_profesor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                        <input id="contraseña_profesor" name="contraseña_profesor" type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="6" required placeholder="Ingrese la contraseña">
                        @error('contraseña_profesor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                        <input id="contraseña_profesor_confirmation" name="contraseña_profesor_confirmation" type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="7" required placeholder="Confirme la contraseña">
                        @error('contraseña_profesor_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200"
                        tabindex="8">
                        GUARDAR
                    </button>

                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200"
                        tabindex="9" onclick="window.location.href='/secretaria'">
                        CANCELAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Espacio final -->
<div class="h-16"></div>

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
