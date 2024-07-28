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
                    <label class="label"><span class="label-text">ESTADO</span> </label>
                    <select id="area_tematica" name="area_tematica" class="select select-bordered w-full" tabindex="2" required>
                        @foreach(\App\Models\Plan::ESTADO as $estado)
                        <option value="{{ $estado }}">{{ ucfirst(str_replace('', ' ', $estado)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">AÑO</span></label>
                    <input id="anio" name="anio" type="number" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('anio') }}" placeholder="Ingrese el año">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">HORAS TOTALES</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales.">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">HORAS TEORICAS</span> </label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('horas_teoricas') }}" placeholder="Ingrese las horas teoricas.">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">HORAS PRACTICAS</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">DTE</span> </label>
                    <input id="DTE" name="DTE" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('DTE') }}" placeholder="Ingrese el DTE">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">RTF</span> </label>
                    <input id="RTF" name="RTF" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('RTF') }}" placeholder="Ingrese el RTF">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">CRÉDITOS ACADÉMICOS</span> </label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">ÁREA TEMÁTICA</span> </label>
                    <select id="area_tematica" name="area_tematica" class="select select-bordered w-full" tabindex="2" required>
                        @foreach(\App\Models\Plan::AREA_TEMATICA as $area)
                        <option value="{{ $area }}">{{ ucfirst(str_replace('', ' ', $area)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">FUNDAMENTACIÓN</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta: <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em></p>
                    <textarea id="fundamentacion" name="fundamentacion" class="input input-bordered w-full" 
                        style="height: 250px; resize: none;"     
                        tabindex="2" required oninput="limitarPalabras(this)" 
                        placeholder="Ingrese una fundamentación">{{ old('fundamentacion') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">CONTENIDOS MÍNIMOS</span> </label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título. 
                    <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br></p>

                    <input id="cont_minimos" name="cont_minimos" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('cont_minimos') }}" placeholder="Ingrese los contenidos mínimos">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">PROGRAMA ANALÍTICO</span> </label>
                    <input id="programa_analitico" name="programa_analitico" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('programa_analitico') }}" placeholder="Ingrese un detalle del programa analítico">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">ACTIVIDADES PRÁCTICAS</span> </label>
                    <input id="act_practicas" name="act_practicas" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('act_practicas') }}" placeholder="Ingrese un detalle de las actividades prácticas">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">MODALIDAD</span> </label>
                    <input id="modalidad" name="modalidad" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('modalidad') }}" placeholder="Ingrese la modalidad">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">BIBLIOGRAFÍA</span> </label>
                    <input id="bibliografia" name="bibliografia" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('bibliografia') }}" placeholder="Ingrese la bibliografía">
                </div>
                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administracion" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" name="preview" value="1" class="btn btn-outline">Vista Previa</button>
                    <button type="submit" class="btn btn-success" tabindex="8">Guardar y Descargar PDF</button>
                </div>
            </div>
        </form>
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
    </div>
</body>

</html>