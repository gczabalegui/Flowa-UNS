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
        <form action="/administracion/crearplan" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo plan de materia</h2>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Materia</span></label>
                    <select name="materia_id" id="materia_id" class="input input-bordered w-full" tabindex="1" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}" data-profesor="{{ $materia->profesor->apellido_profesor }}, {{ $materia->profesor->nombre_profesor }}">{{ $materia->nombre_materia }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Profesor</span></label>
                    <input id="profesor" type="text" class="input input-bordered w-full" readonly>
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Año</span></label>
                    <select name="anio" id="anio" class="input input-bordered w-full" tabindex="2" required>
                        <option value="">Seleccione el año</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Horas totales</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full no-spinners"
                        tabindex="3" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Horas teóricas</span> </label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" class="input input-bordered w-full no-spinners"
                        tabindex="4" required value="{{ old('horas_teoricas') }}" placeholder="Ingrese las horas teoricas" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Horas prácticas</span> </label>
                    <input id="horas_practicas" name="horas_practicas" type="number" class="input input-bordered w-full no-spinners"
                        tabindex="5" required value="{{ old('horas_practicas') }}" placeholder="Ingrese las horas prácticas" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label"style="font-weight: bold;"><span class="label-text">DTE</span> </label>
                    <input id="DTE" name="DTE" type="number" class="input input-bordered w-full no-spinners"
                        tabindex="6" required value="{{ old('DTE') }}" placeholder="Ingrese el DTE" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">RTF</span> </label>
                    <input id="RTF" name="RTF" type="number" class="input input-bordered w-full no-spinners"
                        tabindex="7" required value="{{ old('RTF') }}" placeholder="Ingrese el RTF" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Créditos académicos</span> </label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" class="input input-bordered w-full no-spinners"
                        tabindex="8" required value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos" min="1" step="1" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
               <div class="my-3">
                        <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Área Temática</span></label>
                        <textarea class="textarea textarea-bordered w-full readonly-field" name="area_tematica" readonly placeholder="Ingrese el área temática"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Fundamentación</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta: <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em></p>
                    <textarea id="fundamentacion" name="fundamentacion" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 250px; resize: none;" tabindex="2" readonly placeholder="Ingrese una fundamentación"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Objetivos generales</span> </label>
    
                    <div class="my-3">
                        <label class="label disabled-label"><span class="label-text">Objetivos conceptuales</span></label>
                        <textarea id="obj_conceptuales" name="obj_conceptuales" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese los objetivos conceptuales"></textarea>
                    </div>                    
                    <div class="my-3">
                        <label class="label disabled-label"><span class="label-text">Objetivos procedimentales</span></label>
                        <textarea id="obj_procedimentales" name="obj_procedimentales" class="textarea textarea-bordered w-full readonly-field" 
                            style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese los objetivos procedimentales"></textarea>
                    </div>

                    <div class="my-3">
                        <label class="label disabled-label"><span class="label-text">Objetivos actitudinales</span></label>
                        <textarea id="obj_actitudinales" name="obj_actitudinales" class="textarea textarea-bordered w-full readonly-field" 
                            style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese los objetivos actitudinales"></textarea>
                    </div>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Objetivos específicos</span> </label>
                    <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese los objetivos específicos"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Contenidos mínimos</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título. 
                    <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br></p>
                    <textarea id="cont_minimos" name="cont_minimos" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese los contenidos mínimos"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Programa analítico</span></label>
                    <textarea id="programa_analitico" name="programa_analitico" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese el programa analítico"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Actividades prácticas</span></label>
                    <textarea id="act_practicas" name="act_practicas" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese las actividades prácticas"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Modalidad</span></label>
                    <textarea id="modalidad" name="modalidad" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese la modalidad"></textarea>
                </div>
                <div class="my-3">
                    <label class="label disabled-label" style="font-weight: bold;"><span class="label-text">Bibliografía</span></label>
                    <textarea id="bibliografia" name="bibliografia" class="textarea textarea-bordered w-full readonly-field" 
                        style="height: 150px; resize: none;" tabindex="2" readonly placeholder="Ingrese la bibliografía"></textarea>
                </div>
                <div class="flex flex-col items-center mt-4 space-y-2">
                <button type="submit" name="action" value="guardar_borrador" class="btn btn-warning w-1/3 text-black" tabindex="9" onclick="removeRequiredAttributes()">Guardar borrador</button>
                <button type="submit" name="action" value="guardar" class="btn btn-success w-1/3 text-black" tabindex="10">Guardar</button>
                    <button type="button" class="btn btn-secondary w-1/3 text-black" tabindex="11" onclick="window.location.href='/administracion'">Cancelar</button>
                    <!--<button type="submit" name="preview" value="1" class="btn btn-outline">Vista Previa</button>-->

                </div>
            </div>
            <script>
                document.getElementById('materia_id').addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var profesor = selectedOption.getAttribute('data-profesor');
                    document.getElementById('profesor').value = profesor;
                });
            </script>
            <script>
                function removeRequiredAttributes() {
                    const fields = document.querySelectorAll('input');
                    fields.forEach(field => {
                        if (field.id !== 'materia_id' && field.id !== 'profesor') {
                            field.removeAttribute('required');
                        }
                    });
                }
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

        /* Ocultar flechas en Firefox */
        .no-spinners[type=number] {
            -moz-appearance: textfield;
        }
        .readonly-field {
            background-color: #f5f5f5; /* Color de fondo gris claro */
            color: #6c757d; /* Color de texto gris */
            border-color: #ced4da; /* Color del borde gris */
        }

        /* Estilo para etiquetas deshabilitadas */
        .disabled-label .label-text {
            color: #6c757d; /* Color de texto gris */
            font-weight: bold; /* Texto no en negrita */
        }
    </style>
</body>
</html>