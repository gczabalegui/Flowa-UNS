@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Crear nuevo usuario Secretaría Académica')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nuevo usuario secretaria académica</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar un nuevo usuario</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/secretaria/crearsecretaria" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_secretaria" name="nombre_secretaria" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1" required value="{{ old('nombre_secretaria') }}" placeholder="Ingrese el nombre">
                        @error('nombre_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                        <input id="apellido_secretaria" name="apellido_secretaria" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required value="{{ old('apellido_secretaria') }}" placeholder="Ingrese el apellido">
                        @error('apellido_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                        <input id="DNI_secretaria" name="DNI_secretaria" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="3" required value="{{ old('DNI_secretaria') }}" placeholder="Ingrese el DNI" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        @error('DNI_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Legajo</label>
                        <input id="legajo_secretaria" name="legajo_secretaria" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="4" required value="{{ old('legajo_secretaria') }}" placeholder="Ingrese el legajo" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        @error('legajo_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email_secretaria" name="email_secretaria" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="5" required value="{{ old('email_secretaria') }}" placeholder="Ingrese el email">
                        @error('email_secretaria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top" data-tip="Todos los campos son requeridos para guardar el usuario." id="guardarTooltip">
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-700 bg-white 
                   hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="7" id="guardarBtn" disabled>
                            GUARDAR
                        </button>
                    </div>

                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="8" onclick="window.location.href='/secretaria'">
                        CANCELAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Ocultar flechas en Chrome, Safari, Edge, Opera */
    .no-spinners::-webkit-outer-spin-button,
    .no-spinners::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Ocultar flechas en Firefox */
    .no-spinners {
        -moz-appearance: textfield;
        appearance: textfield;
    }

    /* Personalizar flecha de dropdown para que aparezca más hacia adentro */
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center !important;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem !important;
    }

    select:focus {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%233b82f6' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    }
</style>

<script>
    // Campos requeridos para el botón "Guardar"
    const requiredFields = ['nombre_secretaria', 'apellido_secretaria', 'DNI_secretaria', 'email_secretaria'];

    // Referencias a elementos
    const guardarBtn = document.getElementById('guardarBtn');
    const guardarTooltip = document.getElementById('guardarTooltip');

    // Función para validar el formulario
    function validateForm() {
        let allValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && field.value.trim() === '') {
                allValid = false;
            }
        });

        if (allValid) {
            guardarBtn.disabled = false;
            guardarTooltip.setAttribute('data-tip', 'Listo para guardar.');
        } else {
            guardarBtn.disabled = true;
            guardarTooltip.setAttribute('data-tip', 'Todos los campos son requeridos para guardar el usuario.');
        }
    }

    // Validar al cargar la página
    validateForm();

    // Agregar listeners a todos los campos requeridos
    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            field.addEventListener('input', validateForm);
            field.addEventListener('change', validateForm);
        }
    });
</script>

<!-- Espacio adicional al final de la página -->
<div class="h-16"></div>

@endsection