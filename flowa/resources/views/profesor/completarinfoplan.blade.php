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
        <form action="{{ route('completarinfoplan', ['id' => $plan->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="mode" value="completar">
            <input type="hidden" name="role" value="profesor">
            <input type="hidden" name="type" value="administracion">

            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Completar la información del plan</h2>

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
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->dte }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">RTF</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->rtf }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Créditos Académicos</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" value="{{ $plan->creditos_academicos }}" readonly>
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
                    <p class="help-text" style="text-align: justify;">
                        &#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta:
                        <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em>
                    </p>
                    <textarea id="fundamentacion" name="fundamentacion" class="input input-bordered w-full" style="height: 250px; resize: none;" tabindex="2" required oninput="limitarPalabras(this)" placeholder="Ingrese una fundamentación">{{ old('fundamentacion') }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos generales</span> </label>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos conceptuales</span></label>
                        <textarea id="obj_conceptuales" name="obj_conceptuales" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos conceptuales">{{ old('obj_conceptuales') }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos procedimentales</span></label>
                        <textarea id="obj_procedimentales" name="obj_procedimentales" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos procedimentales">{{ old('obj_procedimentales') }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label sub-label"><span class="label-text">Objetivos actitudinales</span></label>
                        <textarea id="obj_actitudinales" name="obj_actitudinales" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos actitudinales">{{ old('obj_actitudinales') }}</textarea>
                    </div>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos específicos</span> </label>
                    <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos específicos">{{ old('obj_especificos') }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Contenidos mínimos</span></label>
                    <p class="help-text" style="text-align: justify;">
                        &#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I...
                    </p>
                    <textarea id="cont_minimos" name="cont_minimos" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los contenidos mínimos">{{ old('cont_minimos') }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Programa analítico</span></label>
                    <textarea id="programa_analitico" name="programa_analitico" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese el programa analítico">{{ old('programa_analitico') }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Actividades prácticas</span></label>
                    <textarea id="act_practicas" name="act_practicas" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese las actividades prácticas">{{ old('act_practicas') }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Modalidad</span></label>
                    <textarea id="modalidad" name="modalidad" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese la modalidad">{{ old('modalidad') }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Bibliografía</span></label>
                    <textarea id="bibliografia" name="bibliografia" class="textarea textarea-bordered w-full" style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese la bibliografía">{{ old('bibliografia') }}</textarea>
                </div>

                <!-- Botones -->
                <div class="flex justify-center space-x-4 mt-4 w-full">
                    <!-- RECHAZAR: no valida y envía a la ruta de rechazo -->
                    <button type="submit" name="action" value="rechazar" formaction="{{ route('rechazarplan', ['id' => $plan->id]) }}" formmethod="POST" formnovalidate class="btn btn-warning w-1/3 text-black" tabindex="13">
                        Rechazar plan
                    </button>

                    <!-- GUARDAR: valida y envía al action original -->
                    <button type="submit" name="action" value="guardar" class="btn btn-success w-1/3 text-black" tabindex="14">
                        Guardar plan
                    </button>

                    <!-- CANCELAR: solo navega -->
                    <button type="button" class="btn btn-secondary w-1/3 text-black" tabindex="15" onclick="window.location.href='/profesor'">
                        Cancelar
                    </button>
                </div>
            </div>

            <script>
                function limitarPalabras(textarea) {
                    var maxPalabras = 200;
                    var palabras = textarea.value.trim().split(/\s+/);
                    if (palabras.length > maxPalabras) {
                        alert('Has superado el límite de ' + maxPalabras + ' palabras');
                        textarea.value = palabras.slice(0, maxPalabras).join(' ');
                    }
                }
            </script>
        </form>
    </div>

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
    </style>
</body>

</html>