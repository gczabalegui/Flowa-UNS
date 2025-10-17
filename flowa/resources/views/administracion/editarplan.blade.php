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
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                               value="{{ $plan->materia->nombre_materia }}" readonly>
                        <input type="hidden" name="materia_id" value="{{ $plan->materia_id }}">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Profesor</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly 
                               value="{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                        <select name="anio" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2" required>
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ $plan->anio == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                        <input name="horas_totales" type="number" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="3" value="{{ old('horas_totales', $plan->horas_totales) }}" placeholder="Ingrese las horas totales">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                        <input name="horas_teoricas" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="4" value="{{ old('horas_teoricas', $plan->horas_teoricas) }}" placeholder="Ingrese las horas teóricas">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                        <input name="horas_practicas" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="5" value="{{ old('horas_practicas', $plan->horas_practicas) }}" placeholder="Ingrese las horas prácticas">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DTE</label>
                        <input name="DTE" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="6" value="{{ old('DTE', $plan->DTE) }}" placeholder="Ingrese el DTE">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">RTF</label>
                        <input name="RTF" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="7" value="{{ old('RTF', $plan->RTF) }}" placeholder="Ingrese el RTF">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Créditos académicos</label>
                        <input name="creditos_academicos" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            tabindex="8" value="{{ old('creditos_academicos', $plan->creditos_academicos) }}" placeholder="Ingrese los créditos académicos">
                    </div>

                    <div class="md:col-span-2">
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
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-2 correlativa-checkbox" 
                                                       data-materia-id="{{ $materia->id }}"
                                                       id="fuerte_edit_{{ $materia->id }}"
                                                       {{ in_array($materia->id, old('correlativas_fuertes', $plan->materia->correlativasFuertes->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label for="fuerte_edit_{{ $materia->id }}" class="text-sm text-gray-700 cursor-pointer">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
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
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-2 correlativa-checkbox" 
                                                       data-materia-id="{{ $materia->id }}"
                                                       id="debil_edit_{{ $materia->id }}"
                                                       {{ in_array($materia->id, old('correlativas_debiles', $plan->materia->correlativasDebiles->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label for="debil_edit_{{ $materia->id }}" class="text-sm text-gray-700 cursor-pointer">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($plan->area_tematica)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Área Temática</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                               value="{{ $plan->area_tematica }}" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Fundamentación</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" 
                                  rows="4" readonly>{{ $plan->fundamentacion }}</textarea>
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
                    @endif
                </div>

                @php
                    $estadosRechazados = [
                        'Rechazado para administración por secretaría académica.',
                        'Rechazado para profesor por secretaría académica.',
                        'Rechazado para administración por profesor.'
                    ];
                    $esPlanRechazado = in_array($plan->estado, $estadosRechazados);
                @endphp

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    @if($esPlanRechazado)
                        <div class="tooltip" data-tip="No se puede guardar como borrador. Debe rectificar y enviar.">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-yellow-300 text-sm font-medium rounded-md text-yellow-700 bg-yellow-50 opacity-50 cursor-not-allowed" disabled tabindex="9">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                                </svg>
                                GUARDAR BORRADOR
                            </button>
                        </div>
                    @else
                        <button type="submit" name="action" value="guardar_borrador" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200" tabindex="9">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                            </svg>
                            GUARDAR BORRADOR
                        </button>
                    @endif
                    
                    <div class="tooltip" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="10" id="guardarBtn">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            ACTUALIZAR
                        </button>
                    </div>
                    
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="11" onclick="window.location.href='/administracion/verplanes'">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        function validateForm() {
            const requiredFields = [
                'materia_id',
                'anio',
                'horas_totales', 
                'horas_teoricas',
                'horas_practicas',
                'DTE',
                'RTF',
                'creditos_academicos'
            ];
            
            let allFieldsValid = true;
            
            requiredFields.forEach(fieldName => {
                const field = document.getElementsByName(fieldName)[0];
                if (!field) {
                    allFieldsValid = false;
                    return;
                }
                
                if (field.value === '' || field.value === null || field.value === undefined) {
                    allFieldsValid = false;
                }
            });
            
            const guardarBtn = document.getElementById('guardarBtn');
            const guardarTooltip = document.getElementById('guardarTooltip');
            
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
                
                <div class="my-3">
                    <label class="label"><span class="label-text">Año</span></label>
                    <select id="anio" name="anio" class="select select-bordered w-full" tabindex="2" required>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ $plan->anio == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Totales</span></label>
                    <input id="horas_totales" name="horas_totales" type="number" min="1" class="input input-bordered w-full"
                        tabindex="3" value="{{ old('horas_totales', $plan->horas_totales) }}" placeholder="Ingrese las horas totales">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Teóricas</span></label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" min="0" class="input input-bordered w-full"
                        tabindex="4" value="{{ old('horas_teoricas', $plan->horas_teoricas) }}" placeholder="Ingrese las horas teóricas">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Prácticas</span></label>
                    <input id="horas_practicas" name="horas_practicas" type="number" min="0" class="input input-bordered w-full"
                        tabindex="5" value="{{ old('horas_practicas', $plan->horas_practicas) }}" placeholder="Ingrese las horas prácticas">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">DTE</span></label>
                    <input id="DTE" name="DTE" type="number" min="0" class="input input-bordered w-full"
                        tabindex="6" value="{{ old('DTE', $plan->DTE) }}" placeholder="Ingrese el DTE">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">RTF</span></label>
                    <input id="RTF" name="RTF" type="number" min="0" class="input input-bordered w-full"
                        tabindex="7" value="{{ old('RTF', $plan->RTF) }}" placeholder="Ingrese el RTF">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Créditos Académicos</span></label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" min="0" class="input input-bordered w-full"
                        tabindex="8" value="{{ old('creditos_academicos', $plan->creditos_academicos) }}" placeholder="Ingrese los créditos académicos">
                </div>
                
                <div class="my-5 border border-gray-300 rounded-lg p-4">
                    <h3 class="text-lg font-bold mb-4">Materias Correlativas</h3>
                    <div class="my-3">
                        <label class="label" style="font-weight: bold;">
                            <span class="label-text">Correlativas Fuertes</span>
                        </label>
                        <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas fuertes (obligatorias) para esta materia:</p>
                        <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                            @foreach($materias as $materia)
                                <div class="form-control">
                                    <label class="cursor-pointer label justify-start">
                                        <input type="checkbox" 
                                               name="correlativas_fuertes[]" 
                                               value="{{ $materia->id }}" 
                                               class="checkbox checkbox-sm mr-2 correlativa-checkbox" 
                                               data-materia-id="{{ $materia->id }}"
                                               {{ in_array($materia->id, old('correlativas_fuertes', $plan->materia->correlativasFuertes->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <span class="label-text text-sm">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="my-3">
                        <label class="label" style="font-weight: bold;">
                            <span class="label-text">Correlativas Débiles</span>
                        </label>
                        <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas débiles (recomendadas) para esta materia:</p>
                        <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                            @foreach($materias as $materia)
                                <div class="form-control">
                                    <label class="cursor-pointer label justify-start">
                                        <input type="checkbox" 
                                               name="correlativas_debiles[]" 
                                               value="{{ $materia->id }}" 
                                               class="checkbox checkbox-sm mr-2 correlativa-checkbox" 
                                               data-materia-id="{{ $materia->id }}"
                                               {{ in_array($materia->id, old('correlativas_debiles', $plan->materia->correlativasDebiles->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <span class="label-text text-sm">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if($plan->area_tematica)
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Área Temática</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" 
                           value="{{ $plan->area_tematica }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Fundamentación</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 150px; resize: none;" readonly>{{ $plan->fundamentacion }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Conceptuales</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_conceptuales }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Procedimentales</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_procedimentales }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Actitudinales</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_actitudinales }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Específicos</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_especificos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Contenidos Mínimos</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->cont_minimos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Programa Analítico</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->programa_analitico }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Actividades Prácticas</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->act_practicas }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Modalidad</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->modalidad }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Bibliografía</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->bibliografia }}</textarea>
                </div>
                @endif

                @php
                    $estadosRechazados = [
                        'Rechazado para administración por secretaría académica.',
                        'Rechazado para profesor por secretaría académica.',
                        'Rechazado para administración por profesor.'
                    ];
                    $esPlanRechazado = in_array($plan->estado, $estadosRechazados);
                @endphp

                <div class="flex justify-center space-x-4 mt-6 mb-6">
                    @if($esPlanRechazado)
                        <div class="tooltip tooltip-top" data-tip="No se puede guardar como borrador. Debe rectificar y enviar.">
                            <button type="button" class="btn btn-warning w-auto text-black opacity-50 cursor-not-allowed" disabled tabindex="9">
                                Guardar borrador
                            </button>
                        </div>
                    @else
                        <button type="submit" name="action" value="guardar_borrador" class="btn btn-warning w-auto text-black" tabindex="9">Guardar borrador</button>
                    @endif
                    
                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" class="btn btn-success w-auto text-white" tabindex="10" id="guardarBtn">Guardar</button>
                    </div>
                    <a href="/administracion/verplanes" class="btn btn-secondary w-auto text-black" tabindex="11">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            
            function validateForm() {
                
                const requiredFields = [
                    'materia_id',
                    'anio',
                    'horas_totales', 
                    'horas_teoricas',
                    'horas_practicas',
                    'DTE',
                    'RTF',
                    'creditos_academicos'
                ];
                
                let allFieldsValid = true;
                
                requiredFields.forEach(fieldName => {
                    const field = document.getElementsByName(fieldName)[0];
                    if (!field) {
                        allFieldsValid = false;
                        return;
                    }
                    
                    if (field.value === '' || field.value === null || field.value === undefined) {
                        allFieldsValid = false;
                    }
                });
                
                const guardarBtn = document.querySelector('button[value="guardar"]');
                const guardarTooltip = document.getElementById('guardarTooltip');
                
                if (guardarBtn && guardarTooltip) {
                    guardarBtn.disabled = !allFieldsValid;
                    
                    if (allFieldsValid) {
                        guardarBtn.classList.remove('btn-disabled');
                        guardarBtn.classList.add('btn-success');
                        guardarTooltip.classList.remove('tooltip');
                    } else {
                        guardarBtn.classList.add('btn-disabled');
                        guardarBtn.classList.remove('btn-success');
                        guardarTooltip.classList.add('tooltip', 'tooltip-top');
                    }
                }
            }

            const materiaSelect = document.getElementById('materia_id');
            if (materiaSelect) {
                materiaSelect.addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var profesor = selectedOption.getAttribute('data-profesor');
                    document.getElementById('profesor').value = profesor || '';
                    validateForm(); 
                });
            }
            
            validateForm();
            
            const formInputs = document.querySelectorAll('input[type="number"], select');
            formInputs.forEach(input => {
                input.addEventListener('input', validateForm);
                input.addEventListener('change', validateForm);
            });

            // Función para manejar la disponibilidad de correlativas
            function updateCorrelativasAvailability() {
                const materiaId = '{{ $plan->materia_id }}';
                const checkboxes = document.querySelectorAll('.correlativa-checkbox');
                
                checkboxes.forEach(checkbox => {
                    if (checkbox.dataset.materiaId === materiaId) {
                        checkbox.disabled = true;
                        checkbox.checked = false;
                        checkbox.closest('label').style.opacity = '0.5';
                        checkbox.closest('label').style.pointerEvents = 'none';
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

            // Deshabilitar auto-correlativas al cargar la página
            updateCorrelativasAvailability();
        });
    </script>

    <style>
        .readonly-field {
            background-color: #f5f5f5;
            color: #6c757d;
            border-color: #ced4da;
        }

        .disabled-label .label-text {
            color: #6c757d;
            font-weight: bold;
        }

        .btn-disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background-color: #9ca3af !important;
            border-color: #9ca3af !important;
            color: #ffffff !important;
        }

        .btn-disabled:hover {
            background-color: #9ca3af !important;
            border-color: #9ca3af !important;
            color: #ffffff !important;
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
</body>
</html>