@extends('administracion.layouts.admin-layout')

@section('title', 'Editar plan')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Editar plan</h1>
            <p class="text-gray-600 mt-2">Modifique los campos necesarios para actualizar el plan de materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="{{ route('administracion.updateplan', ['id' => $plan->id]) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <!-- Materia (full width) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                               value="{{ $plan->materia->nombre_materia }}" readonly>
                        <input type="hidden" name="materia_id" value="{{ $plan->materia_id }}">
                    </div>

                    <!-- Profesor y Año en la misma fila -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Profesor</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly 
                                   value="{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                            <select name="anio" id="anio" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ $plan->anio == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Todas las horas juntas en otra fila -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                            <input id="horas_teoricas" name="horas_teoricas" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                tabindex="4" value="{{ old('horas_teoricas', $plan->horas_teoricas) }}" placeholder="Ingrese las horas teóricas">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                            <input id="horas_practicas" name="horas_practicas" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                tabindex="5" value="{{ old('horas_practicas', $plan->horas_practicas) }}" placeholder="Ingrese las horas prácticas">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                            <input id="horas_totales" name="horas_totales" type="number" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                tabindex="3" value="{{ old('horas_totales', $plan->horas_totales) }}" placeholder="Ingrese las horas totales">
                        </div>
                    </div>

                    <!-- DTE, RTF y Créditos académicos juntos -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">DTE</label>
                            <input id="DTE" name="DTE" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                tabindex="6" value="{{ old('DTE', $plan->DTE) }}" placeholder="Ingrese el DTE">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">RTF</label>
                            <input id="RTF" name="RTF" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                tabindex="7" value="{{ old('RTF', $plan->RTF) }}" placeholder="Ingrese el RTF">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Créditos académicos</label>
                            <input id="creditos_academicos" name="creditos_academicos" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                tabindex="8" value="{{ old('creditos_academicos', $plan->creditos_academicos) }}" placeholder="Ingrese los créditos académicos">
                        </div>
                    </div>

                    <!-- Materias Correlativas -->
                    <div>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-4 text-gray-900">Materias Correlativas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas Fuertes</label>
                                    <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas fuertes (obligatorias) para esta materia:</p>
                                    <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                                        @foreach($materias as $materia)
                                            <div class="flex items-center">
                                                <input type="checkbox" 
                                                       name="correlativas_fuertes[]" 
                                                       value="{{ $materia->id }}" 
                                                       class="correlativa-checkbox" 
                                                       data-materia-id="{{ $materia->id }}"
                                                       @if(in_array($materia->id, $plan->materia->correlativasFuertes->pluck('id')->toArray())) checked @endif>
                                                <label class="ml-2 text-sm">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas Débiles</label>
                                    <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas débiles (recomendadas) para esta materia:</p>
                                    <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                                        @foreach($materias as $materia)
                                            <div class="flex items-center">
                                                <input type="checkbox" 
                                                       name="correlativas_debiles[]" 
                                                       value="{{ $materia->id }}" 
                                                       class="correlativa-checkbox" 
                                                       data-materia-id="{{ $materia->id }}"
                                                       @if(in_array($materia->id, $plan->materia->correlativasDebiles->pluck('id')->toArray())) checked @endif>
                                                <label class="ml-2 text-sm">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campos de texto del plan -->
                    @if($plan->estado === 'Incompleto por administración.' || 
                        $plan->estado === 'Rechazado para administración por profesor.' || 
                        $plan->estado === 'Rechazado para administración por secretaría académica.')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Generales</label>
                            <textarea name="obj_generales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="9" placeholder="Ingrese los objetivos generales">{{ old('obj_generales', $plan->obj_generales) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Conceptuales</label>
                            <textarea name="obj_conceptuales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="10" placeholder="Ingrese los objetivos conceptuales">{{ old('obj_conceptuales', $plan->obj_conceptuales) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Procedimentales</label>
                            <textarea name="obj_procedimentales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="11" placeholder="Ingrese los objetivos procedimentales">{{ old('obj_procedimentales', $plan->obj_procedimentales) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Actitudinales</label>
                            <textarea name="obj_actitudinales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="12" placeholder="Ingrese los objetivos actitudinales">{{ old('obj_actitudinales', $plan->obj_actitudinales) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Específicos</label>
                            <textarea name="obj_especificos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="13" placeholder="Ingrese los objetivos específicos">{{ old('obj_especificos', $plan->obj_especificos) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contenidos Mínimos</label>
                            <textarea name="cont_minimos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="14" placeholder="Ingrese los contenidos mínimos">{{ old('cont_minimos', $plan->cont_minimos) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Programa Analítico</label>
                            <textarea name="programa_analitico" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="15" placeholder="Ingrese el programa analítico">{{ old('programa_analitico', $plan->programa_analitico) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Actividades Prácticas</label>
                            <textarea name="act_practicas" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="16" placeholder="Ingrese las actividades prácticas">{{ old('act_practicas', $plan->act_practicas) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Modalidad</label>
                            <textarea name="modalidad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="17" placeholder="Ingrese la modalidad">{{ old('modalidad', $plan->modalidad) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bibliografía</label>
                            <textarea name="bibliografia" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      rows="4" tabindex="18" placeholder="Ingrese la bibliografía">{{ old('bibliografia', $plan->bibliografia) }}</textarea>
                        </div>
                    </div>
                    @else
                    <!-- Campos de solo lectura cuando el plan no es editable -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos Generales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->obj_generales }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos Conceptuales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->obj_conceptuales }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos Procedimentales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->obj_procedimentales }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos Actitudinales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->obj_actitudinales }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos Específicos</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->obj_especificos }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Contenidos Mínimos</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->cont_minimos }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Programa Analítico</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->programa_analitico }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Actividades Prácticas</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->act_practicas }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Modalidad</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->modalidad }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Bibliografía</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                      rows="3" readonly>{{ $plan->bibliografia }}</textarea>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top" data-tip="No se puede guardar como borrador al rectificar un plan. Solo puede guardar el plan." id="borradorTooltip">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 opacity-50 cursor-not-allowed transition-colors duration-200" tabindex="18" disabled>
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                            </svg>
                            Guardar borrador
                        </button>
                    </div>

                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="19" id="guardarBtn" disabled>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            GUARDAR
                        </button>
                    </div>
                    
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="20" onclick="window.location.href='/administracion'">
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

<!-- Espacio adicional al final de la página -->
<div class="h-16"></div>

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
    document.addEventListener('DOMContentLoaded', function() {
        // Campos requeridos para el botón "Guardar"
        const requiredFields = ['anio', 'horas_totales', 'horas_teoricas', 'horas_practicas', 'DTE', 'RTF', 'creditos_academicos'];
        
        // Referencias a elementos
        const guardarBtn = document.getElementById('guardarBtn');
        const guardarTooltip = document.getElementById('guardarTooltip');
        
        // Función para validar el formulario
        function validateForm() {
            let allFieldsValid = true;
            
            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field && field.value.trim() === '') {
                    allFieldsValid = false;
                }
            });
            
            if (guardarBtn && guardarTooltip) {
                guardarBtn.disabled = !allFieldsValid;
            }
        }

        // Función para manejar la disponibilidad de correlativas
        function updateCorrelativasAvailability() {
            const materiaId = '{{ $plan->materia_id }}';
            const checkboxes = document.querySelectorAll('.correlativa-checkbox');
            
            checkboxes.forEach(checkbox => {
                if (checkbox.dataset.materiaId === materiaId) {
                    checkbox.disabled = true;
                    checkbox.checked = false;
                    const label = checkbox.closest('div');
                    label.classList.add('opacity-50');
                    label.style.pointerEvents = 'none';
                }
            });
        }

        // Función para prevenir selección duplicada entre correlativas fuertes y débiles
        function handleCorrelativaSelection(changedCheckbox) {
            const materiaId = changedCheckbox.dataset.materiaId;
            const isStrong = changedCheckbox.name === 'correlativas_fuertes[]';
            const otherName = isStrong ? 'correlativas_debiles[]' : 'correlativas_fuertes[]';
            const otherCheckbox = document.querySelector(`input[name="${otherName}"][data-materia-id="${materiaId}"]`);
            
            if (changedCheckbox.checked && otherCheckbox) {
                otherCheckbox.checked = false;
            }
        }

        // Agregar listeners a los checkboxes de correlativas
        document.querySelectorAll('input[name="correlativas_fuertes[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                handleCorrelativaSelection(this);
            });
        });

        document.querySelectorAll('input[name="correlativas_debiles[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                handleCorrelativaSelection(this);
            });
        });

        // Validar formulario al cargar y en cambios
        validateForm();
        
        const formInputs = document.querySelectorAll('input[type="number"], select');
        formInputs.forEach(input => {
            input.addEventListener('input', validateForm);
            input.addEventListener('change', validateForm);
        });

        // Deshabilitar auto-correlativas al cargar la página
        updateCorrelativasAvailability();
    });
</script>
@endsection