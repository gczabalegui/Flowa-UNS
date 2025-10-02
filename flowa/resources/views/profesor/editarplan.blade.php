<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar plan</title>
</head>

<body>
    @include('profesor.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form action="{{ route('profesor.editarplan.update', ['id' => $plan->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Editar información del plan</h2>

                <!-- Campos readonly (administración) -->
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Materia</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->materia->nombre_materia }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Profesor</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Año</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->anio }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Horas Totales</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->horas_totales }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Horas Teóricas</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->horas_teoricas }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Horas Prácticas</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->horas_practicas }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">DTE</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->DTE }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">RTF</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->RTF }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Créditos Académicos</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->creditos_academicos }}" readonly>
                </div>

                <!-- Campos editables (profesor) -->
                <div class="my-3">
                    <label class="label"><span class="label-text">Área Temática</span></label>
                    <select id="area_tematica" name="area_tematica" class="select select-bordered w-full" tabindex="1">
                        <option value="">Seleccione un área temática</option>
                        @foreach(\App\Models\Plan::AREA_TEMATICA as $area)
                            <option value="{{ $area }}" {{ $plan->area_tematica == $area ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $area)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Fundamentación</span></label>
                    <p class="help-text" style="text-align: justify;">
                        &#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta:
                        <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em>
                    </p>
                    <textarea id="fundamentacion" name="fundamentacion" class="textarea textarea-bordered w-full" 
                        style="height: 250px; resize: none;" tabindex="2" oninput="limitarPalabras(this)" 
                        placeholder="Ingrese una fundamentación">{{ $plan->fundamentacion }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos generales</span></label>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos conceptuales</span></label>
                        <textarea id="obj_conceptuales" name="obj_conceptuales" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="3" 
                            placeholder="Ingrese los objetivos conceptuales">{{ $plan->obj_conceptuales }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos procedimentales</span></label>
                        <textarea id="obj_procedimentales" name="obj_procedimentales" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="4" 
                            placeholder="Ingrese los objetivos procedimentales">{{ $plan->obj_procedimentales }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos actitudinales</span></label>
                        <textarea id="obj_actitudinales" name="obj_actitudinales" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="5" 
                            placeholder="Ingrese los objetivos actitudinales">{{ $plan->obj_actitudinales }}</textarea>
                    </div>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos específicos</span></label>
                    <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="6" 
                        placeholder="Ingrese los objetivos específicos">{{ $plan->obj_especificos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Contenidos mínimos</span></label>
                    <p class="help-text" style="text-align: justify;">
                        &#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título.
                        <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br>
                    </p>
                    <textarea id="cont_minimos" name="cont_minimos" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="7" 
                        placeholder="Ingrese los contenidos mínimos">{{ $plan->cont_minimos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Programa analítico</span></label>
                    <textarea id="programa_analitico" name="programa_analitico" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="8" 
                        placeholder="Ingrese el programa analítico">{{ $plan->programa_analitico }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Actividades prácticas</span></label>
                    <textarea id="act_practicas" name="act_practicas" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="9" 
                        placeholder="Ingrese las actividades prácticas">{{ $plan->act_practicas }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Modalidad</span></label>
                    <textarea id="modalidad" name="modalidad" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="10" 
                        placeholder="Ingrese la modalidad">{{ $plan->modalidad }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Bibliografía</span></label>
                    <textarea id="bibliografia" name="bibliografia" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="11" 
                        placeholder="Ingrese la bibliografía">{{ $plan->bibliografia }}</textarea>
                </div>

                @php
                    $estadosRechazados = [
                        'Rechazado para administración por secretaría académica.',
                        'Rechazado para profesor por secretaría académica.',
                        'Rechazado para administración por profesor.'
                    ];
                    $esPlanRechazado = in_array($plan->estado, $estadosRechazados);
                @endphp

                <!-- Botones -->
                <div class="flex justify-center space-x-4 mt-6 mb-6">
                    <button type="submit" name="action" value="rechazar" class="btn btn-error w-auto text-white" tabindex="12">
                        Rechazar plan
                    </button>
                    
                    @if($esPlanRechazado)
                        <div class="tooltip tooltip-top" data-tip="No se puede guardar como borrador. Debe rectificar y enviar.">
                            <button type="button" class="btn btn-warning w-auto text-black opacity-50 cursor-not-allowed" disabled tabindex="13">
                                Guardar borrador
                            </button>
                        </div>
                    @else
                        <button type="submit" name="action" value="guardar_borrador" class="btn btn-warning w-auto text-black" tabindex="13">
                            Guardar borrador
                        </button>
                    @endif
                    
                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" id="guardarBtn" class="btn btn-success w-auto text-black" tabindex="14" disabled>
                            Guardar plan
                        </button>
                    </div>
                    <button type="button" class="btn btn-secondary w-auto text-black" tabindex="15" onclick="window.location.href='/profesor'">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <style>
        .readonly-field {
            background-color: #f5f5f5;
            color: #6c757d;
            border-color: #ced4da;
            cursor: not-allowed;
        }

        .disabled-label .label-text {
            color: #6c757d;
            font-weight: normal;
        }

        .sub-label .label-text {
            font-size: 0.9rem;
            margin-left: 1rem;
        }

        .help-text {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        /* Estilos para botón deshabilitado */
        .btn:disabled {
            background-color: #e5e7eb !important;
            color: #9ca3af !important;
            border-color: #d1d5db !important;
            cursor: not-allowed !important;
            opacity: 0.6 !important;
        }

        .btn:disabled:hover {
            background-color: #e5e7eb !important;
            color: #9ca3af !important;
            border-color: #d1d5db !important;
            transform: none !important;
        }
    </style>

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
                    guardarBtn.classList.remove('btn-disabled');
                    guardarBtn.classList.add('btn-success');
                    if (guardarTooltip) {
                        guardarTooltip.classList.remove('tooltip');
                    }
                } else {
                    guardarBtn.disabled = true;
                    guardarBtn.classList.add('btn-disabled');
                    guardarBtn.classList.remove('btn-success');
                    if (guardarTooltip) {
                        guardarTooltip.classList.add('tooltip', 'tooltip-top');
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
                        alert('Por favor complete todos los campos requeridos antes de guardar el plan.');
                        return false;
                    }
                } else if (submitButton && submitButton.value === 'rechazar') {
                    // Para rechazar, confirmar acción
                    if (!confirm('¿Está seguro que desea rechazar este plan? Esta acción lo devolverá a administración.')) {
                        e.preventDefault();
                        return false;
                    }
                    // Remover validación required para rechazar
                    requiredFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field) {
                            field.removeAttribute('required');
                        }
                    });
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
</body>

</html>