@extends('administracion.layouts.admin-layout')

@section('title', 'Crear nueva materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nueva materia</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar una nueva materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/administracion/crearmateria" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_materia" name="nombre_materia" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1" required value="{{ old('nombre_materia') }}" placeholder="Ingrese el nombre de la materia">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Código</label>
                        <input id="codigo_materia" name="codigo_materia" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required value="{{ old('codigo_materia') }}" placeholder="Ingrese el código de la materia">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Profesor</label>
                        <select id="profesor_id" name="profesor_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Seleccione un profesor</option>
                            @foreach($profesores as $profesor)
                            <option value="{{ $profesor->id }}">{{ $profesor->apellido_profesor }}, {{ $profesor->nombre_profesor }} ({{ $profesor->legajo_profesor}})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas semanales</label>
                        <input id="horas_semanales" name="horas_semanales" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="3" required value="{{ old('horas_semanales') }}" placeholder="Ingrese las horas semanales">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                        <input id="horas_totales" name="horas_totales" type="number" min="1" step="1" inputmode="numeric" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="4" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-4">Carreras asociadas</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($carreras as $carrera)
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" id="carrera_{{ $carrera->id }}" name="carreras[]" value="{{ $carrera->id }}" class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded flex-shrink-0">
                                <label for="carrera_{{ $carrera->id }}" class="text-sm text-gray-700 cursor-pointer leading-5">{{ $carrera->nombre_carrera }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top inline-block" data-tip="Complete todos los campos requeridos y seleccione al menos una carrera" id="guardarTooltip">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="7" id="guardarBtn" disabled>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            GUARDAR
                        </button>
                    </div>

                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="8" onclick="window.location.href='/administracion'">
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
    const requiredFields = ['nombre_materia', 'codigo_materia', 'profesor_id', 'horas_semanales', 'horas_totales'];
    
    // Referencias a elementos
    const guardarBtn = document.getElementById('guardarBtn');
    const guardarTooltip = document.getElementById('guardarTooltip');
    
    // Función para validar el formulario
    function validateForm() {
        let allValid = true;
        
        // Validar campos normales
        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && field.value.trim() === '') {
                allValid = false;
            }
        });
        
        // Validar que al menos una carrera esté seleccionada
        const carreraCheckboxes = document.querySelectorAll('input[name="carreras[]"]:checked');
        if (carreraCheckboxes.length === 0) {
            allValid = false;
        }
        
        if (allValid) {
            guardarBtn.disabled = false;
            guardarTooltip.setAttribute('data-tip', 'Listo para guardar');
        } else {
            guardarBtn.disabled = true;
            guardarTooltip.setAttribute('data-tip', 'Complete todos los campos requeridos y seleccione al menos una carrera');
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
    
    // Agregar listeners a los checkboxes de carreras
    document.querySelectorAll('input[name="carreras[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', validateForm);
    });
</script>

<!-- Espacio adicional al final de la página -->
<div class="h-16"></div>

@endsection