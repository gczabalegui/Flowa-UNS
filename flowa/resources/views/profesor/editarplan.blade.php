@extends('profesor.layouts.profesor-layout')

@section('title', 'Editar programa de materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Información del programa</h1>
            <p class="text-gray-600 mt-2">Revise los detalles completos del programa de la materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="p-6">
                <div class="space-y-6">

                    {{-- Materia --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                            <p class="text-lg font-semibold text-gray-900">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</p>
                        </div>
                    </div>

                    {{-- Profesor y Año --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profesor responsable</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->anio }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Distribución de horas --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->horas_teoricas }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->horas_practicas }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->horas_totales }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        {{-- DTE --}}
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                DTE
                                <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?
                                    <span class="tooltip-content">
                                        <b>Dedicación Total del Estudiante (DTE)</b><br>
                                        DTE = CHT × (K + 1)<br>
                                        Factor K:<br>
                                        • Ciencias Básicas = FB (1,25)<br>
                                        • Tecnolog. Básicas = FA (1,5)<br>
                                        • Tecnolog. Aplicadas = FP (2)<br>
                                        • Complementarias = FC (1)
                                    </span>
                                </span>
                            </label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->DTE }}</p>
                            </div>
                        </div>

                        {{-- RTF --}}
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                RTF
                                <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?
                                    <span class="tooltip-content">
                                        <b>Reconocimiento De Trayecto Formativo (RTF)</b><br>
                                        RTF = DTE / 30
                                    </span>
                                </span>
                            </label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->RTF }}</p>
                            </div>
                        </div>

                        {{-- Créditos académicos --}}
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                Créditos académicos
                                <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?
                                    <span class="tooltip-content">
                                        <b>Créditos académicos</b><br>
                                        Cantidad de créditos asignados según la carga horaria total y el trayecto formativo.
                                    </span>
                                </span>
                            </label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->creditos_academicos }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Correlativas --}}
                    <div>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-4 text-gray-900">Materias correlativas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas fuertes</label>
                                    <div class="bg-gray-50 p-3 rounded-md border">
                                        @if($plan->materia->correlativasFuertes->count() > 0)
                                        @foreach($plan->materia->correlativasFuertes as $correlativa)
                                        <p class="text-sm text-gray-900 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                                        @endforeach
                                        @else
                                        <p class="text-sm text-gray-500">No posee correlativas fuertes.</p>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas débiles</label>
                                    <div class="bg-gray-50 p-3 rounded-md border">
                                        @if($plan->materia->correlativasDebiles->count() > 0)
                                        @foreach($plan->materia->correlativasDebiles as $correlativa)
                                        <p class="text-sm text-gray-900 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                                        @endforeach
                                        @else
                                        <p class="text-sm text-gray-500">No posee correlativas débiles.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección: Campos editables por el profesor -->
                    <form method="POST" action="{{ route('profesor.editarplan.update', $plan->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="action" id="formAction" value="">

                        <!-- Sección: Campos editables por el profesor -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Contenido académico</h3>

                            <!-- Área Temática + sugerencia IA -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Área Temática</label>
                                <div class="flex flex-wrap items-center gap-2">
                                    <select id="area_tematica" name="area_tematica" class="flex-grow px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1">
                                        <option value="">Seleccione un área temática</option>
                                        @foreach(\App\Models\Plan::AREA_TEMATICA as $area)
                                        <option value="{{ $area }}" {{ $plan->area_tematica == $area ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $area)) }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <button type="button" id="btnSugerirArea" class="inline-flex items-center px-4 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 whitespace-nowrap flex-shrink-0">
                                        💡 Sugerir con IA
                                    </button>
                                </div>

                                <!-- Resultado de la sugerencia -->
                                <div id="sugerenciaAreaContainer" class="hidden mt-3">
                                    <div id="sugerenciaCard" class="border rounded-lg p-4 bg-blue-50 border-blue-200">
                                        <div class="flex items-start justify-between gap-2 mb-2">
                                            <div class="flex-grow min-w-0">
                                                <p class="text-sm text-gray-700 mb-1">Sugerencia de la IA:</p>
                                                <p id="sugerenciaArea" class="font-bold text-lg text-gray-900 break-words"></p>
                                            </div>
                                            <button type="button" id="btnUsarSugerencia" class="hidden inline-flex items-center px-3 py-1.5 border border-blue-600 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 flex-shrink-0">
                                                Usar sugerencia
                                            </button>
                                        </div>
                                        <p id="razonamientoArea" class="text-sm text-gray-600"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Fundamentación -->
                            <div class="mb-4 relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                    Fundamentación
                                    <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?
                                        <span class="tooltip-content">
                                            Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta:<br>
                                            <em>¿Por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em>
                                        </span>
                                    </span>
                                </label>
                                <textarea id="fundamentacion" name="fundamentacion" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height:200px; resize:vertical;" tabindex="2" oninput="limitarPalabras(this)" placeholder="Ingrese una fundamentación">{{ $plan->fundamentacion }}</textarea>
                            </div>

                            <!-- Objetivos generales -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Objetivos generales</label>

                                <div class="space-y-4 ml-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos conceptuales</label>
                                        <textarea id="obj_conceptuales" name="obj_conceptuales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="3" placeholder="Ingrese los objetivos conceptuales">{{ $plan->obj_conceptuales }}</textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos procedimentales</label>
                                        <textarea id="obj_procedimentales" name="obj_procedimentales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="4" placeholder="Ingrese los objetivos procedimentales">{{ $plan->obj_procedimentales }}</textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos actitudinales</label>
                                        <textarea id="obj_actitudinales" name="obj_actitudinales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="5" placeholder="Ingrese los objetivos actitudinales">{{ $plan->obj_actitudinales }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Objetivos específicos -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos específicos</label>
                                <textarea id="obj_especificos" name="obj_especificos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="6" placeholder="Ingrese los objetivos específicos">{{ $plan->obj_especificos }}</textarea>
                            </div>

                            <!-- Contenidos mínimos -->
                            <div class="mb-4 relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                    Contenidos mínimos
                                    <span class="tooltip-trigger text-gray-400 cursor-pointer font-semibold text-base leading-none">?
                                        <span class="tooltip-content">
                                            Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la <b>Resolución 1537/21, Anexo I</b> para asegurar la inclusión de aquellos allí definidos y los que se agreguen al Plan de Estudio según los alcances del título.
                                        </span>
                                    </span>
                                </label>
                                <textarea id="contenidos_minimos" name="contenidos_minimos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height:200px; resize:vertical;" tabindex="3" placeholder="Ingrese los contenidos mínimos">{{ $plan->cont_minimos }}</textarea>
                            </div>

                            <!-- Programa analítico -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Programa analítico</label>
                                <textarea id="programa_analitico" name="programa_analitico" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="8" placeholder="Ingrese el programa analítico">{{ $plan->programa_analitico }}</textarea>
                            </div>

                            <!-- Actividades prácticas -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Actividades prácticas</label>
                                <textarea id="act_practicas" name="act_practicas" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="9" placeholder="Ingrese las actividades prácticas">{{ $plan->act_practicas }}</textarea>
                            </div>

                            <!-- Modalidad -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Modalidad</label>
                                <textarea id="modalidad" name="modalidad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="10" placeholder="Ingrese la modalidad">{{ $plan->modalidad }}</textarea>
                            </div>

                            <!-- Bibliografía -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center justify-between">
                                    <span>Bibliografía</span>
                                    <button type="button" id="btnSugerirIA" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
               hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" title="Formatear bibliografía en estilo APA con IA">
                                        📚
                                        <span class="ml-2">Formatear con IA</span>
                                    </button>
                                </label>


                                <textarea id="bibliografia" name="bibliografia" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="height: 120px; resize: vertical;" tabindex="11" placeholder="Ingrese la bibliografía">{{ $plan->bibliografia }}</textarea>

                                <div id="iaSugerencia" class="hidden bg-blue-50 border border-blue-200 p-4 rounded-lg mt-3">
                                    <p class="text-sm font-semibold mb-2">💡 Sugerencia de IA:</p>
                                    <pre id="iaTexto" class="whitespace-pre-wrap text-sm text-gray-700 bg-white p-3 rounded border border-blue-100"></pre>
                                    <div class="flex justify-end space-x-2 mt-3">
                                        <button type="button" id="aceptarIA" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">Aceptar</button>
                                        <button type="button" id="descartarIA" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">Descartar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                        $estadosRechazados = [
                        'Rechazado para administración por secretaría académica.',
                        'Rechazado para profesor responsable por secretaría académica.',
                        'Rechazado para administración por profesor responsable.'
                        ];
                        $esPlanRechazado = in_array($plan->estado, $estadosRechazados);
                        @endphp

                        <!-- Botones -->
                        <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 pt-6">

                            <!-- Rechazar plan -->
                            <button type="submit" name="action" value="rechazar" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
               hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200" tabindex="12">
                                RECHAZAR
                            </button>

                            <!-- Guardar borrador -->
                            @if($esPlanRechazado)
                            <div class="custom-tooltip" data-tip="No se puede guardar como borrador. Debe rectificar y enviar.">
                                <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-45 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed opacity-70" disabled tabindex="13">
                                    GUARDAR BORRADOR
                                </button>
                            </div>
                            @else
                            <button type="submit" name="action" value="guardar_borrador" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
                   hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200" tabindex="13">
                                GUARDAR BORRADOR
                            </button>
                            @endif

                            <!-- Guardar plan (resaltado con texto verde y fondo blanco) -->
                            <div class="custom-tooltip" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                                <button type="submit" name="action" value="guardar" id="guardarBtn" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-700 bg-white 
                   hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="14" disabled>
                                    GUARDAR
                                </button>
                            </div>

                            <!-- Cancelar -->
                            <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-40 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
               hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200" tabindex="15" onclick="window.location.href='/profesor'">
                                CANCELAR
                            </button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Espacio adicional al final de la página -->
    <div class="h-16"></div>

    <script>
        function limitarPalabras(textarea) {
            var maxPalabras = 200;
            var palabras = textarea.value.trim().split(/\s+/);
            if (palabras.length > maxPalabras) {
                alert('Has superado el límite de ' + maxPalabras + ' palabras');
                textarea.value = palabras.slice(0, maxPalabras).join(' ');
            }
        }

        // Validación dinámica para habilitar/deshabilitar botón "Guardar"
        document.addEventListener('DOMContentLoaded', function() {
            const requiredFields = [
                'area_tematica',
                'fundamentacion',
                'obj_conceptuales',
                'obj_procedimentales',
                'obj_actitudinales',
                'obj_especificos',
                'cont_minimos',
                'programa_analitico',
                'act_practicas',
                'modalidad',
                'bibliografia'
            ];

            const guardarBtn = document.getElementById('guardarBtn');
            const guardarTooltip = document.getElementById('guardarTooltip');
            const form = document.querySelector('form');

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
                    if (guardarTooltip) {
                        guardarTooltip.classList.remove('tooltip');
                        guardarTooltip.setAttribute('data-tip', 'Listo para guardar');
                    }
                } else {
                    guardarBtn.disabled = true;
                    if (guardarTooltip) {
                        guardarTooltip.classList.remove('tooltip');
                        guardarTooltip.setAttribute('data-tip', 'Complete todos los campos requeridos');
                    }
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

            // Manejar submit del formulario
            form.addEventListener('submit', function(e) {
                const submitButton = e.submitter;

                // Si es "Guardar plan", validar campos requeridos
                if (submitButton && submitButton.value === 'guardar') {
                    let isEmpty = false;
                    requiredFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field && field.value.trim() === '') {
                            field.setAttribute('required', 'required');
                            isEmpty = true;
                        } else if (field) {
                            field.removeAttribute('required');
                        }
                    });

                    if (isEmpty) {
                        e.preventDefault();
                        alert('Por favor complete todos los campos requeridos antes de guardar el programa.');
                        return false;
                    }
                } else if (submitButton && submitButton.value === 'rechazar') {
                    // Para rechazar, confirmar acción
                    e.preventDefault();

                    if (typeof showConfirmModal === 'function') {
                        showConfirmModal(
                            'Rechazar programa de materia',
                            '¿Está seguro de que desea rechazar este programa? Esta acción lo devolverá a administración.',
                            function() {
                                // Remover validación required para rechazar
                                requiredFields.forEach(fieldName => {
                                    const field = document.getElementById(fieldName);
                                    if (field) {
                                        field.removeAttribute('required');
                                    }
                                });
                                // Enviar formulario
                                e.target.submit();
                            }
                        );
                    } else {
                        if (confirm('¿Está seguro de que desea rechazar este programa? Esta acción lo devolverá a administración.')) {
                            // Remover validación required para rechazar
                            requiredFields.forEach(fieldName => {
                                const field = document.getElementById(fieldName);
                                if (field) {
                                    field.removeAttribute('required');
                                }
                            });
                            // Continuar con el envío
                            return true;
                        }
                    }
                    return false;
                } else {
                    // Si es "Guardar borrador", remover validación required
                    requiredFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field) {
                            field.removeAttribute('required');
                        }
                    });
                }
            });
        });
    </script>

    <script>
        document.getElementById('btnSugerirIA').addEventListener('click', async () => {
            const bib = document.getElementById('bibliografia').value.trim();
            const iaSugerenciaDiv = document.getElementById('iaSugerencia');

            if (!bib) {
                alert('Por favor escriba la bibliografía antes de solicitar una sugerencia.');
                return;
            }

            const btn = document.getElementById('btnSugerirIA');

            // Indicador de carga visual
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `
            <span class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></span> 
            <span>Generando...</span>
        `;
            iaSugerenciaDiv.classList.add('hidden'); // Oculta sugerencia anterior si existe

            try {
                const response = await fetch('{{ route("profesor.sugerenciaIA") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        texto: bib
                    })
                });

                const data = await response.json();

                if (response.ok && data.sugerencia) {
                    document.getElementById('iaTexto').textContent = data.sugerencia;
                    iaSugerenciaDiv.classList.remove('hidden');
                } else {
                    // Muestra un mensaje de error detallado
                    const errorMessage = data.error || 'No se pudo generar la sugerencia (error desconocido).';
                    alert('Error de IA: ' + errorMessage);
                }
            } catch (error) {
                alert('Error al conectarse con el servicio de IA. Verifique su clave API y la configuración.');
            }

            // Restaura el botón
            btn.disabled = false;
            btn.innerHTML = originalText;
        });

        // Lógica para aceptar la sugerencia (frontend)
        document.getElementById('aceptarIA').addEventListener('click', () => {
            let sugerencia = document.getElementById('iaTexto').textContent || '';

            // 1. Quitar etiquetas HTML (por si la IA devolvió HTML)
            sugerencia = sugerencia.replace(/<\/?[^>]+(>|$)/g, '');

            // 2. Eliminar caracteres de control no deseados (excepto tab y newline)
            sugerencia = sugerencia.replace(/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/g, '');

            // 3. Normalizar saltos de línea (CRLF -> LF) y colapsar 3+ saltos a 2
            sugerencia = sugerencia.replace(/\r\n?/g, '\n').replace(/\n{3,}/g, '\n\n');

            // 4. Trim final
            sugerencia = sugerencia.trim();

            const bibliografiaField = document.getElementById('bibliografia');
            bibliografiaField.value = sugerencia;
            document.getElementById('iaSugerencia').classList.add('hidden');

            // Disparar evento input para revalidar el form
            const event = new Event('input', {
                bubbles: true
            });
            bibliografiaField.dispatchEvent(event);
        });

        // Lógica para descartar la sugerencia
        document.getElementById('descartarIA').addEventListener('click', () => {
            document.getElementById('iaSugerencia').classList.add('hidden');
        });
    </script>
    <script>
        document.getElementById('btnSugerirArea').addEventListener('click', async function() {
            document.getElementById('btnSugerirArea').addEventListener('click', async function() {
                const btn = this;
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block w-4 h-4 border-2 border-blue-600 border-t-transparent rounded-full animate-spin mr-2"></span> Analizando...';

                const campos = {
                    fundamentacion: document.querySelector('[name="fundamentacion"]')?.value || '',
                    obj_conceptuales: document.querySelector('[name="obj_conceptuales"]')?.value || '',
                    obj_procedimentales: document.querySelector('[name="obj_procedimentales"]')?.value || '',
                    obj_actitudinales: document.querySelector('[name="obj_actitudinales"]')?.value || '',
                    cont_minimos: document.querySelector('[name="cont_minimos"]')?.value || '',
                    act_practicas: document.querySelector('[name="act_practicas"]')?.value || '',
                    programa_analitico: document.querySelector('[name="programa_analitico"]')?.value || ''
                };

                const minCampos = ['fundamentacion', 'obj_conceptuales', 'obj_procedimentales', 'obj_actitudinales', 'cont_minimos'];
                const vacios = minCampos.filter(c => campos[c].trim() === '').length;
                if (vacios > 0) {
                    alert('Por favor, complete al menos la fundamentación, objetivos y contenidos mínimos antes de solicitar la sugerencia.');
                    btn.disabled = false;
                    btn.innerHTML = '💡 Sugerir con IA';
                    return;
                }

                const AREA_TEMATICA_MAP = {
                    'formacion basica': 'Formación básica',
                    'formación basica': 'Formación básica',
                    'formacion básica': 'Formación básica',
                    'básica': 'Formación básica',
                    'basica': 'Formación básica',
                    'fundamental': 'Formación básica',
                    'formacion aplicada': 'Formación aplicada',
                    'formación aplicada': 'Formación aplicada',
                    'aplicada': 'Formación aplicada',
                    'cientifica aplicada': 'Formación aplicada',
                    'tecnica': 'Formación aplicada',
                    'formacion profesional': 'Formación profesional',
                    'formación profesional': 'Formación profesional',
                    'profesional': 'Formación profesional',
                    'profesionalizante': 'Formación profesional',
                    'orientada a la profesion': 'Formación profesional'
                };

                function normalizarTexto(texto) {
                    return texto.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z\s]/g, '').toLowerCase().trim();
                }

                try {
                    const response = await fetch('/ia/sugerir-area', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(campos)
                    });

                    const text = await response.text();
                    let data;
                    try {
                        data = JSON.parse(text);
                    } catch (e) {
                        alert('Error: no se recibió un formato válido de IA.');
                        btn.disabled = false;
                        btn.innerHTML = '💡 Sugerir con IA';
                        return;
                    }

                    const container = document.getElementById('sugerenciaAreaContainer');
                    const areaSpan = document.getElementById('sugerenciaArea');
                    const razonamiento = document.getElementById('razonamientoArea');
                    const card = document.getElementById('sugerenciaCard');
                    const btnUsar = document.getElementById('btnUsarSugerencia');
                    const selectArea = document.getElementById('area_tematica');

                    btnUsar.classList.add('hidden');
                    container.classList.remove('hidden');

                    if (response.ok && data.area) {
                        let sugerenciaIA = data.area.trim();
                        const sugerenciaNormalizada = normalizarTexto(sugerenciaIA);
                        sugerenciaIA = sugerenciaIA.replace(/^(Formación|Formacion|formación|formacion)\s*/i, '').trim();

                        if (sugerenciaIA.length > 0) {
                            sugerenciaIA = sugerenciaIA.charAt(0).toUpperCase() + sugerenciaIA.slice(1);
                        }

                        const valorOficial = AREA_TEMATICA_MAP[sugerenciaNormalizada];
                        let areaFinalParaMostrar = '';
                        if (sugerenciaIA.length > 0 && sugerenciaIA !== 'Formación') {
                            areaFinalParaMostrar = 'Formación ' + sugerenciaIA;
                        } else if (valorOficial) {
                            areaFinalParaMostrar = valorOficial;
                        } else {
                            areaFinalParaMostrar = data.area;
                        }

                        areaSpan.textContent = areaFinalParaMostrar;
                        razonamiento.textContent = data.razonamiento || '';

                        card.classList.remove('border-blue-200', 'border-green-200', 'border-yellow-200', 'bg-blue-50', 'bg-green-50', 'bg-yellow-50');
                        let colorClass = 'border-blue-200';
                        let bgClass = 'bg-blue-50';
                        if (areaFinalParaMostrar.toLowerCase().includes('básica')) {
                            colorClass = 'border-blue-200';
                            bgClass = 'bg-blue-50';
                        } else if (areaFinalParaMostrar.toLowerCase().includes('profesional')) {
                            colorClass = 'border-green-200';
                            bgClass = 'bg-green-50';
                        } else if (areaFinalParaMostrar.toLowerCase().includes('aplicada')) {
                            colorClass = 'border-yellow-200';
                            bgClass = 'bg-yellow-50';
                        }
                        card.classList.add(colorClass, bgClass);

                        if (valorOficial) {
                            btnUsar.classList.remove('hidden');
                            btnUsar.onclick = () => {
                                const option = Array.from(selectArea.options).find(
                                    o => o.textContent.trim().toLowerCase() === valorOficial.toLowerCase()
                                );

                                if (option) {
                                    selectArea.value = option.value;
                                    selectArea.dispatchEvent(new Event('input', {
                                        bubbles: true
                                    }));
                                    selectArea.dispatchEvent(new Event('change', {
                                        bubbles: true
                                    }));
                                    btnUsar.classList.add('hidden');
                                    selectArea.focus();
                                    areaSpan.innerHTML = `✔️ Se seleccionó: <b>${valorOficial}</b>`;
                                } else {
                                    alert(`⚠️ No se encontró la opción "${valorOficial}" en el select.`);
                                }
                            };
                        } else {
                            razonamiento.textContent = (data.razonamiento || '') + ' (No se pudo mapear a una opción oficial. Seleccione manualmente.)';
                            card.classList.remove('border-blue-200', 'border-green-200');
                            card.classList.add('border-yellow-200', 'bg-yellow-50');
                        }
                    } else {
                        areaSpan.textContent = 'No hay sugerencia disponible.';
                        razonamiento.textContent = data.error || 'No se pudo obtener la sugerencia de IA o la respuesta fue inválida.';
                        card.classList.remove('border-blue-200', 'border-green-200', 'border-yellow-200', 'bg-blue-50', 'bg-green-50', 'bg-yellow-50');
                        card.classList.add('border-blue-200', 'bg-blue-50');
                    }
                } catch (error) {
                    alert('Ocurrió un error al conectar con la IA.');
                    document.getElementById('sugerenciaAreaContainer').classList.remove('hidden');
                    document.getElementById('sugerenciaArea').textContent = 'Error de conexión con la IA.';
                    document.getElementById('razonamientoArea').textContent = 'Revise la consola para más detalles.';
                    document.getElementById('btnUsarSugerencia').classList.add('hidden');
                    document.getElementById('sugerenciaCard').classList.remove('border-blue-200');
                    document.getElementById('sugerenciaCard').classList.add('border-red-200', 'bg-red-50');
                } finally {
                    btn.disabled = false;
                    btn.innerHTML = '💡 Sugerir con IA';
                }
            });
        });
    </script>

    <style>
        /* Tooltip estilo neutro gris/blanco */
        .tooltip-trigger {
            position: relative;
            /* CLAVE: Ahora el trigger es el contenedor de referencia */
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
            /* Sigue siendo absoluto, pero respecto al .tooltip-trigger */
            z-index: 20;

            /* --- CAMBIOS CLAVE AQUI --- */
            top: 50%;
            /* Centra verticalmente respecto al '?' */
            left: 150%;
            /* Coloca a la derecha del icono '?' (más allá del 100% de su ancho) */
            transform: translate(0, -50%);
            /* Ajusta: 0px de separación horizontal, -50% para centrado vertical */
            /* --------------------------- */

            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: opacity 0.2s ease-in-out, visibility 0.2s ease-in-out;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        /* Regla para activar el tooltip al pasar el ratón */
        .tooltip-trigger:hover .tooltip-content {
            /* CLAVE: El selector debe ser para un hijo del trigger */
            visibility: visible;
            opacity: 1;
        }

        /* Atenuar visualmente los botones deshabilitados */
        button:disabled {
            pointer-events: none;
        }
    </style>

    @endsection