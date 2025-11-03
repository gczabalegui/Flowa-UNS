@extends('administracion.layouts.admin-layout')

@section('title', 'Editar programa')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Editar programa de materia</h1>
            <p class="text-gray-600 mt-2">Modifique los campos necesarios para actualizar el programa de materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form action="{{ route('administracion.updateplan', ['id' => $plan->id]) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Materia (full width) -->
                    <div>
                        <label for="materia_id" class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" value="{{ $plan->materia->nombre_materia }}" readonly>
                        <input type="hidden" name="materia_id" value="{{ $plan->materia_id }}">
                    </div>

                    <!-- Profesor y Año en la misma fila -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="profesor_responsable" class="block text-sm font-medium text-gray-600 mb-2">Profesor responsable</label>
                            <input type="text" id="profesor_responsable" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly value="{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}">
                        </div>

                        <div>
                            <label for="anio" class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                            <select name="anio" id="anio" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
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
                            <label for="horas_teoricas" class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                            <input id="horas_teoricas" name="horas_teoricas" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('horas_teoricas', $plan->horas_teoricas) }}" placeholder="Ingrese las horas teóricas">
                        </div>

                        <div>
                            <label for="horas_practicas" class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                            <input id="horas_practicas" name="horas_practicas" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('horas_practicas', $plan->horas_practicas) }}" placeholder="Ingrese las horas prácticas">
                        </div>

                        <div>
                            <label for="horas_totales" class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                            <input id="horas_totales" name="horas_totales" type="number" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('horas_totales', $plan->horas_totales) }}" placeholder="Ingrese las horas totales">
                        </div>
                    </div>

                    <!-- DTE, RTF y Créditos académicos juntos -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="relative">
                            <label for="DTE" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                DTE
                                <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?</span>
                                <span class="tooltip-content">
                                    <b>Dedicación Total del Estudiante (DTE)</b><br>
                                    DTE = CHT × (K + 1)<br>
                                    Factor K:<br>
                                    • Ciencias Básicas = FB (1,25)<br>
                                    • Tecnolog. Básicas = FA (1,5)<br>
                                    • Tecnolog. Aplicadas = FP (2)<br>
                                    • Complementarias = FC (1)
                                </span>
                            </label>
                            <input id="DTE" name="DTE" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" value="{{ old('DTE', $plan->DTE) }}" placeholder="Ingrese el DTE" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <div class="relative">
                            <label for="RTF" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                RTF
                                <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?</span>
                                <span class="tooltip-content">
                                    <b>Reconocimiento De Trayecto Formativo (RTF)</b><br>
                                    RTF = DTE / 30
                                </span>
                            </label>
                            <input id="RTF" name="RTF" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" value="{{ old('RTF', $plan->RTF) }}" placeholder="Ingrese el RTF" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <div>
                            <label for="creditos_academicos" class="block text-sm font-medium text-gray-700 mb-2">Créditos académicos</label>
                            <input id="creditos_academicos" name="creditos_academicos" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" value="{{ old('creditos_academicos', $plan->creditos_academicos) }}" placeholder="Ingrese cantidad de créditos académicos" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>

                    <!-- Materias Correlativas -->
                    <div>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h2 class="text-lg font-bold mb-4 text-gray-900">Materias correlativas</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas fuertes</label>
                                    <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas fuertes (obligatorias) para esta materia:</p>
                                    <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                                        @foreach($materias as $materia)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="correlativas_fuertes[]" value="{{ $materia->id }}" class="correlativa-checkbox" data-materia-id="{{ $materia->id }}" @if(in_array($materia->id, $plan->materia->correlativasFuertes->pluck('id')->toArray())) checked @endif>
                                            <label class="ml-2 text-sm">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas débiles</label>
                                    <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas débiles (recomendadas) para esta materia:</p>
                                    <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                                        @foreach($materias as $materia)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="correlativas_debiles[]" value="{{ $materia->id }}" class="correlativa-checkbox" data-materia-id="{{ $materia->id }}" @if(in_array($materia->id, $plan->materia->correlativasDebiles->pluck('id')->toArray())) checked @endif>
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
                            <label for="obj_generales" class="block text-sm font-medium text-gray-700 mb-2">Objetivos generales</label>
                            <textarea name="obj_generales" id="obj_generales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese los objetivos generales">{{ old('obj_generales', $plan->obj_generales) }}</textarea>
                        </div>

                        <div>
                            <label for="obj_generales" class="block text-sm font-medium text-gray-700 mb-2">Objetivos conceptuales</label>
                            <textarea name="obj_conceptuales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese los objetivos conceptuales">{{ old('obj_conceptuales', $plan->obj_conceptuales) }}</textarea>
                        </div>

                        <div>
                            <label for="obj_procedimentales" class="block text-sm font-medium text-gray-700 mb-2">Objetivos procedimentales</label>
                            <textarea name="obj_procedimentales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese los objetivos procedimentales">{{ old('obj_procedimentales', $plan->obj_procedimentales) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos actitudinales</label>
                            <textarea name="obj_actitudinales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese los objetivos actitudinales">{{ old('obj_actitudinales', $plan->obj_actitudinales) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label for="obj_especificos" class="block text-sm font-medium text-gray-700 mb-2">Objetivos específicos</label>
                            <textarea name="obj_especificos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese los objetivos específicos">{{ old('obj_especificos', $plan->obj_especificos) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contenidos mínimos</label>
                            <textarea name="cont_minimos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese los contenidos mínimos">{{ old('cont_minimos', $plan->cont_minimos) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Programa analítico</label>
                            <textarea name="programa_analitico" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese el programa analítico">{{ old('programa_analitico', $plan->programa_analitico) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Actividades prácticas</label>
                            <textarea name="act_practicas" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese las actividades prácticas">{{ old('act_practicas', $plan->act_practicas) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Modalidad</label>
                            <textarea name="modalidad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese la modalidad">{{ old('modalidad', $plan->modalidad) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bibliografía</label>
                            <textarea name="bibliografia" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Ingrese la bibliografía">{{ old('bibliografia', $plan->bibliografia) }}</textarea>
                        </div>
                    </div>
                    @else
                    <!-- Campos de solo lectura cuando el plan no es editable -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos generales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->obj_generales }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos conceptuales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->obj_conceptuales }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos procedimentales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->obj_procedimentales }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos actitudinales</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->obj_actitudinales }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos específicos</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->obj_especificos }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Contenidos mínimos</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->cont_minimos }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Programa analítico</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->programa_analitico }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Actividades prácticas</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->act_practicas }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Modalidad</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->modalidad }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Bibliografía</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" rows="3" readonly>{{ $plan->bibliografia }}</textarea>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    @php
                        $estadosRechazados = [
                            'Rechazado para administración por secretaría académica.',
                            'Rechazado para administración por profesor responsable.',
                        ];
                        $esPlanRechazado = in_array($plan->estado, $estadosRechazados);
                    @endphp
                    @if($esPlanRechazado)
                        <div class="custom-tooltip" data-tip="No se puede guardar como borrador. Debe rectificar y enviar." id="borradorTooltip">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 opacity-70 cursor-not-allowed" disabled>
                                GUARDAR BORRADOR
                            </button>
                        </div>
                    @elseif($plan->estado === 'Incompleto por administración.')
                        <div class="custom-tooltip" id="borradorTooltip">
                            <button type="submit" name="action" value="guardar_borrador" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                GUARDAR BORRADOR
                            </button>
                        </div>
                    @else
                        <div class="custom-tooltip" data-tip="No es posible guardar este programa como borrador." id="borradorTooltip">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 opacity-70 cursor-not-allowed" disabled>
                                GUARDAR BORRADOR
                            </button>
                        </div>
                    @endif

                    <div class="custom-tooltip" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-400 bg-white 
                   hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 opacity-70 cursor-not-allowed" id="guardarBtn" disabled>
                            GUARDAR
                        </button>
                    </div>

                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" onclick="window.location.href='/administracion'">
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

    /* Tooltip estilo neutro gris/blanco */
    .tooltip-trigger {
        position: relative;
        display: inline-block;
        width: 1.25rem;
        height: 1.25rem;
        text-align: center;
        line-height: 1.25rem;
        border-radius: 9999px;
        background-color: #f3f4f6;
        /* gris claro */
        color: #6b7280;
        /* gris medio */
        font-weight: bold;
        transition: background-color 0.2s, color 0.2s;
    }

    .tooltip-trigger:hover {
        background-color: #e5e7eb;
        /* un poco más oscuro */
        color: #374151;
        /* gris más oscuro */
    }

    .tooltip-content {
        visibility: hidden;
        opacity: 0;
        width: 240px;
        background-color: #fff;
        color: #374151;
        text-align: left;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 0.75rem;
        position: absolute;
        z-index: 10;
        top: 100%;
        left: 0;
        transform: translateY(4px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: opacity 0.2s ease-in-out, visibility 0.2s ease-in-out;
        font-size: 0.75rem;
        line-height: 1rem;
    }

    .tooltip-trigger:hover+.tooltip-content {
        visibility: visible;
        opacity: 1;
    }

    /* Atenuar visualmente los botones deshabilitados */
    button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
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

            // En modo edición, solo validamos que los campos numéricos no sean negativos
            const numericFields = ['horas_totales', 'horas_teoricas', 'horas_practicas', 'DTE', 'RTF', 'creditos_academicos'];

            numericFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    const value = parseFloat(field.value);
                    if (isNaN(value) || value < 0) {
                        allFieldsValid = false;
                    }
                }
            });

            // El año debe estar seleccionado
            const anioField = document.getElementById('anio');
            if (anioField && anioField.value === '') {
                allFieldsValid = false;
            }

            if (guardarBtn && guardarTooltip) {
                guardarBtn.disabled = !allFieldsValid;
                if (!allFieldsValid) {
                    guardarTooltip.setAttribute('data-tip', 'Debe completar todos los campos requeridos para poder guardar el programa.');
                } else {
                    guardarTooltip.setAttribute('data-tip', 'Guardar programa.');
                }
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

        // Ejecutar validación adicional después de que la página cargue completamente
        setTimeout(validateForm, 100);
    });


    // Actualizar horas totales automáticamente
    function updateHorasTotales() {
        const teoricas = parseFloat(document.getElementById('horas_teoricas').value) || 0;
        const practicas = parseFloat(document.getElementById('horas_practicas').value) || 0;
        const totalField = document.getElementById('horas_totales');

        totalField.value = teoricas + practicas;
        validateForm(); // vuelve a validar el formulario
    }

    // Listeners para actualizar automáticamente
    document.getElementById('horas_teoricas').addEventListener('input', updateHorasTotales);
    document.getElementById('horas_practicas').addEventListener('input', updateHorasTotales);
</script>
@endsection