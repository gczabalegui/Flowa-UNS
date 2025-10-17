@extends('administracion.layouts.admin-layout')

@section('title', 'Crear profesor')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nuevo profesor</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar un nuevo profesor</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="/administracion/crearprofesor" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input id="nombre_profesor" name="nombre_profesor" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1" required value="{{ old('nombre_profesor') }}" placeholder="Ingrese el nombre">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                        <input id="apellido_profesor" name="apellido_profesor" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required value="{{ old('apellido_profesor') }}" placeholder="Ingrese el apellido">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                        <input id="DNI_profesor" name="DNI_profesor" type="number" min="1" step="1" inputmode="numeric" class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="3" required value="{{ old('DNI_profesor') }}" placeholder="Ingrese el DNI" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Legajo</label>
                        <input id="legajo_profesor" name="legajo_profesor" type="number" min="1" step="1" inputmode="numeric" class="no-spinners w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="4" required value="{{ old('legajo_profesor') }}" placeholder="Ingrese el legajo" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email_profesor" name="email_profesor" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="5" required value="{{ old('email_profesor') }}" placeholder="Ingrese el email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                        <input id="contraseña_profesor" name="contraseña_profesor" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="6" required placeholder="Ingrese la contraseña">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                        <input id="contraseña_profesor_confirmation" name="contraseña_profesor_confirmation" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="7" required placeholder="Confirme la contraseña">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="8" id="guardarBtn" disabled>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            GUARDAR
                        </button>
                    </div>

                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="9" onclick="window.location.href='/administracion'">
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

<script>
    // Campos requeridos para el botón "Guardar"
    const requiredFields = ['nombre_completo_profesor', 'email_profesor', 'contraseña_profesor', 'contraseña_profesor_confirmation'];
    
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
        
        // Validación adicional: las contraseñas deben coincidir
        const password = document.getElementById('contraseña_profesor').value;
        const confirmPassword = document.getElementById('contraseña_profesor_confirmation').value;
        if (password !== confirmPassword) {
            allValid = false;
        }
        
        if (allValid) {
            guardarBtn.disabled = false;
            guardarTooltip.setAttribute('data-tip', 'Listo para guardar');
        } else {
            guardarBtn.disabled = true;
            guardarTooltip.setAttribute('data-tip', 'Complete todos los campos requeridos');
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
