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

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Correlativas Fuertes</span></label>
                    @if($plan->materia->correlativasFuertes->count() > 0)
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded">
                        @foreach($plan->materia->correlativasFuertes as $correlativa)
                        <p class="text-sm text-gray-700 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                        @endforeach
                    </div>
                    @else
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded">
                        <p class="text-sm text-gray-500">No posee correlativas fuertes.</p>
                    </div>
                    @endif
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Correlativas Débiles</span></label>
                    @if($plan->materia->correlativasDebiles->count() > 0)
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded">
                        @foreach($plan->materia->correlativasDebiles as $correlativa)
                        <p class="text-sm text-gray-700 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                        @endforeach
                    </div>
                    @else
                    <div class="p-3 bg-gray-50 border border-gray-200 rounded">
                        <p class="text-sm text-gray-500">No posee correlativas débiles.</p>
                    </div>
                    @endif
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
                    <textarea id="fundamentacion" name="fundamentacion" class="textarea textarea-bordered w-full" style="height: 250px; resize: none;" tabindex="2" oninput="limitarPalabras(this)" placeholder="Ingrese una fundamentación">{{ $plan->fundamentacion }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos generales</span></label>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos conceptuales</span></label>
                        <textarea id="obj_conceptuales" name="obj_conceptuales" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="3" placeholder="Ingrese los objetivos conceptuales">{{ $plan->obj_conceptuales }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos procedimentales</span></label>
                        <textarea id="obj_procedimentales" name="obj_procedimentales" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="4" placeholder="Ingrese los objetivos procedimentales">{{ $plan->obj_procedimentales }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos actitudinales</span></label>
                        <textarea id="obj_actitudinales" name="obj_actitudinales" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="5" placeholder="Ingrese los objetivos actitudinales">{{ $plan->obj_actitudinales }}</textarea>
                    </div>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos específicos</span></label>
                    <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="6" placeholder="Ingrese los objetivos específicos">{{ $plan->obj_especificos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Contenidos mínimos</span></label>
                    <p class="help-text" style="text-align: justify;">
                        &#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título.
                        <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br>
                    </p>
                    <textarea id="cont_minimos" name="cont_minimos" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="7" placeholder="Ingrese los contenidos mínimos">{{ $plan->cont_minimos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Programa analítico</span></label>
                    <textarea id="programa_analitico" name="programa_analitico" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="8" placeholder="Ingrese el programa analítico">{{ $plan->programa_analitico }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Actividades prácticas</span></label>
                    <textarea id="act_practicas" name="act_practicas" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="9" placeholder="Ingrese las actividades prácticas">{{ $plan->act_practicas }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Modalidad</span></label>
                    <textarea id="modalidad" name="modalidad" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="10" placeholder="Ingrese la modalidad">{{ $plan->modalidad }}</textarea>
                </div>

                <div class="my-3 relative">
                    <label class="label flex items-center justify-between">
                        <span class="label-text">Bibliografía</span>
                        <button type="button" id="btnSugerirIA" class="btn btn-sm btn-outline btn-info flex items-center space-x-2" title="Sugerir formato APA con IA">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                                <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.384.44.821.572 1.324.084.314.072.643-.036.927-.197.518-.335 1.012-.428 1.488a9.92 9.92 0 0 0 .45 2.75 7.152 7.152 0 0 1 2.372 4.777c.307.426.495.92.564 1.445.028.205.04.413.04.622A6.75 6.75 0 0 1 18 20.25H6A6.75 6.75 0 0 1 1.75 16.5c0-.209.012-.417.04-.622.069-.526.257-1.019.564-1.445A7.152 7.152 0 0 1 4.5 9.75a9.92 9.92 0 0 0 .45-2.75c-.093-.476-.231-.97-.428-1.488-.108-.284-.12-.613-.036-.927.132-.503.332-.94.572-1.324l.822-1.317c.502-.805 1.364-1.338 2.332-1.39ZM6.75 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12 10.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.75 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                            <span>Sugerir con IA</span>
                        </button>
                    </label>

                    <textarea id="bibliografia" name="bibliografia" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="11" placeholder="Ingrese la bibliografía">{{ $plan->bibliografia }}</textarea>

                    <div id="iaSugerencia" class="hidden bg-blue-50 border border-blue-200 p-3 rounded mt-2">
                        <p class="text-sm font-semibold mb-2">💡 Sugerencia de IA:</p>
                        <pre id="iaTexto" class="whitespace-pre-wrap text-sm text-gray-700"></pre>
                        <div class="flex justify-end space-x-2 mt-2">
                            <button type="button" id="aceptarIA" class="btn btn-sm btn-success">Aceptar</button>
                            <button type="button" id="descartarIA" class="btn btn-sm btn-ghost">Descartar</button>
                        </div>
                    </div>
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
                    e.preventDefault();

                    if (typeof showConfirmModal === 'function') {
                        showConfirmModal(
                            'Rechazar Plan',
                            '¿Está seguro de que desea rechazar este plan? Esta acción lo devolverá a administración.',
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
                        if (confirm('¿Está seguro de que desea rechazar este plan? Esta acción lo devolverá a administración.')) {
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
            <span class="loading loading-spinner loading-xs"></span> 
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
                    console.error('Error de API:', data);
                }
            } catch (error) {
                alert('Error al conectarse con el servicio de IA. Verifique su clave API y la configuración.');
                console.error('Error de red/fetch:', error);
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

</body>

</html>