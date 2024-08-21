<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Completar plan</title>
</head>

<body>
    @include('profesor.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <!-- ver abajo con plan id -->
        <form action="{{ route('profesor.completarinfoplan') }}" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h3 class="card-title">Plan: {{ $plan->nombre }}</h3>
                <div class="my-3">
                    <label class="label"><span class="label-text">Nombre de la Materia</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $materia->codigo_materia }}: {{ $materia->nombre_materia }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Profesor</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">Legajo ({{ $profesor->legajo_profesor }}): {{ $profesor->apellido_profesor }}, {{ $profesor->nombre_profesor }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Año</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->anio }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Totales</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->horas_totales }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Teóricas</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->horas_teoricas }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Prácticas</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->horas_practicas }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">DTE</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->DTE }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">RTF</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->RTF }}</p>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Créditos Académicos</span></label>
                    <p class="text-gray-700 bg-gray-100 border border-gray-300 p-2 rounded">{{ $plan->creditos_academicos }}</p>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Area temática</span> </label>
                    <select id="area_tematica" name="area_tematica" class="select select-bordered w-full" tabindex="2" required>
                        @foreach(\App\Models\Plan::AREA_TEMATICA as $area)
                        <option value="{{ $area }}">{{ ucfirst(str_replace('', ' ', $area)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Fundamentación</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta: <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em></p>
                    <textarea id="fundamentacion" name="fundamentacion" class="input input-bordered w-full" style="height: 250px; resize: none;" tabindex="2" required oninput="limitarPalabras(this)" placeholder="Ingrese una fundamentación">{{ old('fundamentacion') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos generales</span> </label>

                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos conceptuales</span> </label>
                        <input id="obj_conceptuales" name="obj_conceptuales" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('obj_conceptuales') }}" placeholder="Ingrese los objetivos conceptuales">
                    </div>

                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos procedimentales</span> </label>
                        <input id="obj_procedimentales" name="obj_procedimentales" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('obj_procedimentales') }}" placeholder="Ingrese los objetivos procedimentales">
                    </div>

                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos actitudinales</span> </label>
                        <input id="obj_actitudinales" name="obj_actitudinales" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('obj_actitudinales') }}" placeholder="Ingrese los objetivos actitudinales">
                    </div>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos específicos</span> </label>
                    <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos específicos">{{ old('obj_especificos') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Contenidos mínimos</span> </label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título.
                        <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br>
                    </p>

                    <input id="cont_minimos" name="cont_minimos" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('cont_minimos') }}" placeholder="Ingrese los contenidos mínimos">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Programa analítico</span> </label>
                    <input id="programa_analitico" name="programa_analitico" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('programa_analitico') }}" placeholder="Ingrese un detalle del programa analítico">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Actividades prácticas</span> </label>
                    <input id="act_practicas" name="act_practicas" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('act_practicas') }}" placeholder="Ingrese un detalle de las actividades prácticas">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Modalidad</span> </label>
                    <input id="modalidad" name="modalidad" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('modalidad') }}" placeholder="Ingrese la modalidad">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Bibliografía</span> </label>
                    <input id="bibliografia" name="bibliografia" type="text" class="input input-bordered w-full" tabindex="2" required value="{{ old('bibliografia') }}" placeholder="Ingrese la bibliografía">
                </div>
                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administracion" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <!-- <button type="submit" name="preview" value="1" class="btn btn-outline">Vista Previa</button>-->
                    <button type="submit" class="btn btn-success" tabindex="8">Completar información del plan</button>
                </div>
            </div>
            <script>
                function limitarPalabras(textarea) {
                    var maxPalabras = 200;
                    var palabras = textarea.value.split(' ');
                    if (palabras.length > maxPalabras) {
                        alert('Has superado el límite de ' + maxPalabras + ' palabras');
                        textarea.value = palabras.slice(0, maxPalabras).join(' ');
                    }
                }
            </script>
        </form>
    </div>
</body>

</html>