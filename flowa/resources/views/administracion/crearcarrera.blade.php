@extends('administracion.layouts.admin-layout')

@section('title', 'Crear nueva carrera')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nueva carrera</h1>
            <p class="text-gray-600 mt-2">Completa los datos para registrar una nueva carrera</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/administracion/crearcarrera" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_carrera" name="nombre_carrera" type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="1" required value="{{ old('nombre_carrera') }}"
                            placeholder="Ingrese el nombre de la carrera">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
                        <select id="departamento_id" name="departamento_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="2" required readonly>
                            <option value="1" selected>Departamento de Agronomía</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Código</label>
                        <input id="codigo_carrera" name="codigo_carrera" type="number" min="1" step="1" inputmode="numeric" 
                            class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="3" required value="{{ old('codigo_carrera') }}" placeholder="Código" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">N° versión del plan</label>
                        <input id="plan_version" name="plan_version" type="number" min="1" step="1" inputmode="numeric" 
                            class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="4" required value="{{ old('plan_version') }}" placeholder="Versión" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Duración (cuatrimestres)</label>
                        <input id="duracion" name="duracion" type="number" min="1" step="1" inputmode="numeric" 
                            class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="5" required value="{{ old('duracion') }}" placeholder="Duración" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cantidad materias</label>
                        <input id="cant_materias" name="cant_materias" type="number" min="1" step="1" inputmode="numeric" 
                            class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="6" required value="{{ old('cant_materias') }}" placeholder="Cantidad" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top inline-block" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="7" id="guardarBtn" disabled>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            GUARDAR
                        </button>
                    </div>

                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200"
                        tabindex="8" onclick="window.location.href='/administracion'">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
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

<!-- Espacio adicional al final de la página -->
<div class="h-16"></div>

@endsection
