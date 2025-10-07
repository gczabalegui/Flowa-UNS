<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear nuevo plan de materia</title>
</head>

<body>
    @include('administracion.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form id="crearPlanForm" action="{{ route('storeplan') }}" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo plan de materia</h2>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Materia</span></label>
                    <select name="materia_id" id="materia_id" class="input input-bordered w-full" tabindex="1">
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                        <option value="{{ $materia->id }}" data-profesor="{{ $materia->profesor->apellido_profesor }}, {{ $materia->profesor->nombre_profesor }}">{{ $materia->nombre_materia }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label class="label" style="font-weight: bold;">
                        <span class="label-text">Profesor</span>
                    </label>
                    <select id="profesor" name="profesor_id" class="input input-bordered w-full">
                        <option value="">Seleccione un profesor</option>
                        @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id }}">
                            {{ $profesor->apellido_profesor }}, {{ $profesor->nombre_profesor }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Año</span></label>
                    <select name="anio" id="anio" class="input input-bordered w-full" tabindex="2">
                        <option value="">Seleccione el año</option>
                        @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Horas teóricas</span> </label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" class="input input-bordered w-full no-spinners" tabindex="3" value="{{ old('horas_teoricas') }}" placeholder="Ingrese las horas teoricas" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Horas prácticas</span> </label>
                    <input id="horas_practicas" name="horas_practicas" type="number" class="input input-bordered w-full no-spinners" tabindex="4" value="{{ old('horas_practicas') }}" placeholder="Ingrese las horas prácticas" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Horas totales</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full no-spinners readonly-field" tabindex="5" value="{{ old('horas_totales') }}" readonly>
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">DTE</span> </label>
                    <input id="DTE" name="DTE" type="number" class="input input-bordered w-full no-spinners" tabindex="6" value="{{ old('DTE') }}" placeholder="Ingrese el DTE" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">RTF</span> </label>
                    <input id="RTF" name="RTF" type="number" class="input input-bordered w-full no-spinners" tabindex="7" value="{{ old('RTF') }}" placeholder="Ingrese el RTF" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Créditos académicos</span> </label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" class="input input-bordered w-full no-spinners" tabindex="8" value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Área Temática</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" name="area_tematica" style="resize: none;" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Fundamentación</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta: <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em></p>
                    <input type="text" id="fundamentacion" name="fundamentacion" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Objetivos generales</span> </label>

                    <div class="my-3">
                        <label class="label disabled-sublabel"><span class="label-text">Objetivos conceptuales</span></label>
                        <input type="text" id="obj_conceptuales" name="obj_conceptuales" class="input input-bordered w-full readonly-field" readonly>
                    </div>
                    <div class="my-3">
                        <label class="label disabled-sublabel"><span class="label-text">Objetivos procedimentales</span></label>
                        <input type="text" id="obj_procedimentales" name="obj_procedimentales" class="input input-bordered w-full readonly-field" readonly>
                    </div>

                    <div class="my-3">
                        <label class="label disabled-sublabel"><span class="label-text">Objetivos actitudinales</span></label>
                        <input type="text" id="obj_actitudinales" name="obj_actitudinales" class="input input-bordered w-full readonly-field" readonly>
                    </div>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos específicos</span> </label>
                    <input type="text" id="obj_especificos" name="obj_especificos" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Contenidos mínimos</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título.
                        <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br>
                    </p>
                    <input type="text" id="cont_minimos" name="cont_minimos" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Programa analítico</span></label>
                    <input type="text" id="programa_analitico" name="programa_analitico" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Actividades prácticas</span></label>
                    <input type="text" id="act_practicas" name="act_practicas" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Modalidad</span></label>
                    <input type="text" id="modalidad" name="modalidad" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Bibliografía</span></label>
                    <input type="text" id="bibliografia" name="bibliografia" class="input input-bordered w-full readonly-field" readonly>
                </div>
                <div class="flex justify-center space-x-4 mt-6 mb-6">
                    <button type="submit" name="action" value="guardar_borrador" class="btn btn-warning w-auto text-black" tabindex="9">Guardar borrador</button>
                    
                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" class="btn btn-success w-auto text-white" tabindex="10" id="guardarBtn" disabled>Guardar</button>
                    </div>
                    
                    <button type="button" class="btn btn-secondary w-auto text-black" tabindex="11" onclick="window.location.href='/administracion'">Cancelar</button>
                    <!--<button type="submit" name="preview" value="1" class="btn btn-outline">Vista Previa</button>-->
                </div>
            </div>
            <script>
                // Campos requeridos para el botón "Guardar" (horas_totales se calcula automáticamente)
                const requiredFields = ['materia_id', 'anio', 'horas_teoricas', 'horas_practicas', 'DTE', 'RTF', 'creditos_academicos'];
                
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
                    
                    if (allValid) {
                        guardarBtn.disabled = false;
                        guardarBtn.classList.remove('btn-disabled');
                        guardarBtn.classList.add('btn-success');
                        guardarBtn.classList.remove('text-black');
                        guardarBtn.classList.add('text-white');
                        if (guardarTooltip) {
                            guardarTooltip.classList.remove('tooltip');
                        }
                    } else {
                        guardarBtn.disabled = true;
                        guardarBtn.classList.add('btn-disabled');
                        guardarBtn.classList.remove('btn-success');
                        guardarBtn.classList.add('text-black');
                        guardarBtn.classList.remove('text-white');
                        if (guardarTooltip) {
                            guardarTooltip.classList.add('tooltip', 'tooltip-top');
                        }
                    }
                }
                
                // Validar al cargar la página
                calculateTotalHours(); // Calcular horas totales al cargar
                validateForm();
                
                // Función para calcular horas totales automáticamente
                function calculateTotalHours() {
                    const horasTeoricas = parseInt(document.getElementById('horas_teoricas').value) || 0;
                    const horasPracticas = parseInt(document.getElementById('horas_practicas').value) || 0;
                    const horasTotales = horasTeoricas + horasPracticas;
                    
                    document.getElementById('horas_totales').value = horasTotales > 0 ? horasTotales : '';
                    
                    // Validar formulario después de calcular
                    validateForm();
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

                // Mantener funcionalidad existente
                document.getElementById('materia_id').addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var profesorNombre = selectedOption.getAttribute('data-profesor');

                    // buscar el option del select profesor que coincide con el nombre
                    var profesorSelect = document.getElementById('profesor');
                    for (let i = 0; i < profesorSelect.options.length; i++) {
                        if (profesorSelect.options[i].text === profesorNombre) {
                            profesorSelect.selectedIndex = i;
                            break;
                        }
                    }
                });
            </script>

        </form>
    </div>
    <style>
        /* Ocultar flechas en Chrome, Safari, Edge, Opera */
        .no-spinners::-webkit-outer-spin-button,
        .no-spinners::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .readonly-field {
            background-color: #f5f5f5;
            /* Color de fondo gris claro */
            color: #6c757d;
            /* Color de texto gris */
            border-color: #ced4da;
            /* Color del borde gris */
        }

        /* Estilo para etiquetas deshabilitadas */
        .disabled-label .label-text {
            color: #6c757d;
            /* Color de texto gris */
            font-weight: bold;
            /* Texto en negrita */
        }

        .disabled-sublabel .label-text {
            color: #6c757d;
            /* Color de texto gris */
            font-weight: normal;
            /* Texto no en negrita */
        }
    </style>
</body>

</html>