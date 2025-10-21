@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Crear nuevo usuario Coordinador de la Comisión Curricular')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-[18rem] xl:px-[20rem] flex justify-center">
    <div class="w-full max-w-5xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nuevo Coordinador de la Comisión Curricular</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar un nuevo usuario</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/secretaria/crearcomision" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_comision" name="nombre_comision" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1" required value="{{ old('nombre_comision') }}" placeholder="Ingrese el nombre">
                        @error('nombre_comision')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                        <input id="apellido" name="apellido" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required value="{{ old('apellido') }}" placeholder="Ingrese el apellido">
                        @error('apellido')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                        <input id="DNI" name="DNI" type="number" min="1" step="1" inputmode="numeric" class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="3" required value="{{ old('DNI') }}" placeholder="Ingrese el DNI" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        @error('DNI')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Legajo</label>
                        <input id="legajo" name="legajo" type="number" min="1" step="1" inputmode="numeric" class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="4" required value="{{ old('legajo') }}" placeholder="Ingrese el legajo" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        @error('legajo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" name="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="5" required value="{{ old('email') }}" placeholder="Ingrese el email">
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Carrera</label>
                        <input id="carrera_responsable" name="carrera_responsable" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="6" required value="{{ old('carrera_responsable') }}" placeholder="Ingrese el nombre de la carrera de la cual es responsable">
                        @error('carrera_responsable')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top" data-tip="Todos los campos son requeridos para guardar el usuario." id="guardarTooltip">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="7" id="guardarBtn" disabled>
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

<script>
    const requiredFields = ['nombre_comision', 'apellido', 'DNI', 'legajo', 'email', 'carrera_responsable'];
    const guardarBtn = document.getElementById('guardarBtn');
    const guardarTooltip = document.getElementById('guardarTooltip');

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

    validateForm();
    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            field.addEventListener('input', validateForm);
            field.addEventListener('change', validateForm);
        }
    });
</script>

<div class="h-16"></div>
@endsection