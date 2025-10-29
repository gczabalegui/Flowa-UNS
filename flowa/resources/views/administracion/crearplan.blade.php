@extends('administracion.layouts.admin-layout')

@section('title', 'Crear nuevo programa de materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear nuevo programa de materia</h1>
            <p class="text-gray-600 mt-2">Complete el formulario para registrar un nuevo programa de materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <form id="crearPlanForm" action="{{ route('storeplan') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-6">
                    <!-- Materia (full width) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <select name="materia_id" id="materia_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="1">
                            <option value="">Seleccione una materia</option>
                            @foreach($materias as $materia)
                            <option value="{{ $materia->id }}" data-profesor="{{ $materia->profesor->apellido_profesor }}, {{ $materia->profesor->nombre_profesor }}">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Profesor y Año en la misma fila -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profesor responsable</label>
                            <select id="profesor" name="profesor_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccione un profesor responsable</option>
                                @foreach($profesores as $profesor)
                                <option value="{{ $profesor->id }}">
                                    {{ $profesor->apellido_profesor }}, {{ $profesor->nombre_profesor }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                            <select name="anio" id="anio" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" tabindex="2">
                                <option value="">Seleccione el año</option>
                                @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Todas las horas juntas en otra fila -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                            <input id="horas_teoricas" name="horas_teoricas" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="3" value="{{ old('horas_teoricas') }}" placeholder="Ingrese las horas teoricas" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                            <input id="horas_practicas" name="horas_practicas" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="4" value="{{ old('horas_practicas') }}" placeholder="Ingrese las horas prácticas" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                            <input id="horas_totales" name="horas_totales" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600 no-spinners" tabindex="5" value="{{ old('horas_totales') }}" readonly>
                        </div>
                    </div>

                    <!-- DTE, RTF y Créditos académicos juntos -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">DTE</label>
                            <input id="DTE" name="DTE" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="6" value="{{ old('DTE') }}" placeholder="Ingrese el DTE" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">RTF</label>
                            <input id="RTF" name="RTF" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="7" value="{{ old('RTF') }}" placeholder="Ingrese el RTF" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Créditos académicos</label>
                            <input id="creditos_academicos" name="creditos_academicos" type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 no-spinners" tabindex="8" value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>

                    <div>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-4 text-gray-900">Materias correlativas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas fuertes</label>
                                    <p class="text-sm text-gray-600 mb-2">Seleccione las materias que son correlativas fuertes (obligatorias) para esta materia:</p>
                                    <div class="max-h-40 overflow-y-auto border border-gray-200 rounded p-2">
                                        @foreach($materias as $materia)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="correlativas_fuertes[]" value="{{ $materia->id }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-2 correlativa-checkbox" data-materia-id="{{ $materia->id }}" id="fuerte_{{ $materia->id }}" {{ in_array($materia->id, old('correlativas_fuertes', [])) ? 'checked' : '' }}>
                                            <label for="fuerte_{{ $materia->id }}" class="text-sm text-gray-700 cursor-pointer">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
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
                                            <input type="checkbox" name="correlativas_debiles[]" value="{{ $materia->id }}" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-2 correlativa-checkbox" data-materia-id="{{ $materia->id }}" id="debil_{{ $materia->id }}" {{ in_array($materia->id, old('correlativas_debiles', [])) ? 'checked' : '' }}>
                                            <label for="debil_{{ $materia->id }}" class="text-sm text-gray-700 cursor-pointer">{{ $materia->nombre_materia }} ({{ $materia->codigo_materia }})</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Área temática</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" name="area_tematica" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Fundamentación</label>
                        <p class="text-sm text-gray-600 mb-2">&#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta: <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em></p>
                        <input type="text" id="fundamentacion" name="fundamentacion" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-4">Objetivos generales</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm text-gray-600 mb-2">Objetivos conceptuales</label>
                                <input type="text" id="obj_conceptuales" name="obj_conceptuales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-2">Objetivos procedimentales</label>
                                <input type="text" id="obj_procedimentales" name="obj_procedimentales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-2">Objetivos actitudinales</label>
                                <input type="text" id="obj_actitudinales" name="obj_actitudinales" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Objetivos específicos</label>
                        <input type="text" id="obj_especificos" name="obj_especificos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Contenidos mínimos</label>
                        <p class="text-sm text-gray-600 mb-2">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título.</p>
                        <input type="text" id="cont_minimos" name="cont_minimos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Programa analítico</label>
                        <input type="text" id="programa_analitico" name="programa_analitico" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Actividades prácticas</label>
                        <input type="text" id="act_practicas" name="act_practicas" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Modalidad</label>
                        <input type="text" id="modalidad" name="modalidad" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Bibliografía</label>
                        <input type="text" id="bibliografia" name="bibliografia" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600" readonly>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <div class="tooltip tooltip-top" data-tip="Debe seleccionar una materia para guardar como borrador" id="borradorTooltip">
                        <button type="submit" name="action" value="guardar_borrador" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="9" id="borradorBtn" disabled>
                            GUARDAR BORRADOR
                        </button>
                    </div>

                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos." id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-700 bg-white 
                   hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed" tabindex="10" id="guardarBtn" disabled>
                            GUARDAR
                        </button>
                    </div>

                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="11" onclick="window.location.href='/administracion'">
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
    // Campos requeridos para el botón "Guardar" (horas_totales se calcula automáticamente)
    const requiredFields = ['materia_id', 'anio', 'horas_teoricas', 'horas_practicas', 'DTE', 'RTF', 'creditos_academicos'];

    // Referencias a elementos
    const guardarBtn = document.getElementById('guardarBtn');
    const guardarTooltip = document.getElementById('guardarTooltip');
    const borradorBtn = document.getElementById('borradorBtn');
    const borradorTooltip = document.getElementById('borradorTooltip');

    // Función para validar el formulario completo
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
        } else {
            guardarBtn.disabled = true;
        }
    }

    // Función para validar borrador (solo requiere materia)
    function validateBorrador() {
        const materiaField = document.getElementById('materia_id');

        if (materiaField && materiaField.value.trim() !== '') {
            borradorBtn.disabled = false;
            borradorTooltip.setAttribute('data-tip', 'Guardar como borrador');
        } else {
            borradorBtn.disabled = true;
            borradorTooltip.setAttribute('data-tip', 'Debe seleccionar una materia para guardar como borrador');
        }
    }

    // Validar al cargar la página
    calculateTotalHours(); // Calcular horas totales al cargar
    validateForm();
    validateBorrador(); // Validar botón de borrador al cargar

    // Función para calcular horas totales automáticamente
    function calculateTotalHours() {
        const horasTeoricas = parseInt(document.getElementById('horas_teoricas').value) || 0;
        const horasPracticas = parseInt(document.getElementById('horas_practicas').value) || 0;
        const horasTotales = horasTeoricas + horasPracticas;

        document.getElementById('horas_totales').value = horasTotales > 0 ? horasTotales : '';

        // Validar formulario después de calcular
        validateForm();
        validateBorrador(); // También validar borrador
    }

    // Agregar listeners para calcular horas totales
    document.getElementById('horas_teoricas').addEventListener('input', calculateTotalHours);
    document.getElementById('horas_practicas').addEventListener('input', calculateTotalHours);
    document.getElementById('horas_teoricas').addEventListener('change', calculateTotalHours);
    document.getElementById('horas_practicas').addEventListener('change', calculateTotalHours);

    // Agregar listeners a todos los campos requeridos
    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            field.addEventListener('input', validateForm);
            field.addEventListener('change', validateForm);
        }
    });

    // Agregar listener específico para validar borrador cuando cambia la materia
    document.getElementById('materia_id').addEventListener('change', validateBorrador);
    document.getElementById('materia_id').addEventListener('input', validateBorrador);

    // Mantener funcionalidad existente
    document.getElementById('materia_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var profesorNombre = selectedOption.getAttribute('data-profesor');
        var selectedMateriaId = this.value;

        // buscar el option del select profesor que coincide con el nombre
        var profesorSelect = document.getElementById('profesor');
        for (let i = 0; i < profesorSelect.options.length; i++) {
            if (profesorSelect.options[i].text === profesorNombre) {
                profesorSelect.selectedIndex = i;
                break;
            }
        }

        // Manejar correlativas: deshabilitar/habilitar checkboxes según la materia seleccionada
        updateCorrelativasAvailability(selectedMateriaId);
    });

    // Función para manejar la disponibilidad de correlativas
    function updateCorrelativasAvailability(selectedMateriaId) {
        const correlativaCheckboxes = document.querySelectorAll('.correlativa-checkbox');

        correlativaCheckboxes.forEach(checkbox => {
            const materiaId = checkbox.getAttribute('data-materia-id');
            const label = checkbox.closest('div');

            if (materiaId === selectedMateriaId) {
                // Deshabilitar la materia seleccionada para evitar autocorrelación
                checkbox.disabled = true;
                checkbox.checked = false;
                label.classList.add('opacity-50');
                label.style.cursor = 'not-allowed';
            } else {
                // Habilitar otras materias
                checkbox.disabled = false;
                label.classList.remove('opacity-50');
                label.style.cursor = 'pointer';
            }
        });
    }

    // Función para prevenir selección duplicada entre correlativas fuertes y débiles
    function handleCorrelativaSelection(changedCheckbox) {
        if (!changedCheckbox.checked) return;

        const materiaId = changedCheckbox.getAttribute('data-materia-id');
        const isStrong = changedCheckbox.name === 'correlativas_fuertes[]';
        const otherType = isStrong ? 'correlativas_debiles[]' : 'correlativas_fuertes[]';

        // Buscar y desmarcar la correlativa del otro tipo
        const otherCheckbox = document.querySelector(`input[name="${otherType}"][data-materia-id="${materiaId}"]`);
        if (otherCheckbox && otherCheckbox.checked) {
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

    // Ejecutar la función al cargar la página si ya hay una materia seleccionada
    const materiaSelect = document.getElementById('materia_id');
    if (materiaSelect.value) {
        updateCorrelativasAvailability(materiaSelect.value);
    }
</script>
@endsection