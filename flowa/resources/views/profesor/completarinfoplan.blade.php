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
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Completar la información del plan</h2>
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
                    <textarea id="fundamentacion" name="fundamentacion" class="input input-bordered w-full" 
                        style="height: 250px; resize: none;"     
                        tabindex="2" required oninput="limitarPalabras(this)" 
                        placeholder="Ingrese una fundamentación">{{ old('fundamentacion') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos generales</span> </label>
    
                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos conceptuales</span></label>
                        <textarea id="obj_conceptuales" name="obj_conceptuales" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos conceptuales">{{ old('obj_conceptuales') }}</textarea>
                    </div>                    
                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos procedimentales</span></label>
                        <textarea id="obj_procedimentales" name="obj_procedimentales" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos procedimentales">{{ old('obj_procedimentales') }}</textarea>
                    </div>

                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos actitudinales</span></label>
                        <textarea id="obj_actitudinales" name="obj_actitudinales" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos actitudinales">{{ old('obj_actitudinales') }}</textarea>
                    </div>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Objetivos específicos</span> </label>
                    <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos específicos">{{ old('obj_especificos') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Contenidos mínimos</span></label>
                    <p class="help-text" style="text-align: justify;">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título. 
                    <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br></p>
                    <textarea id="cont_minimos" name="cont_minimos" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los contenidos mínimos">{{ old('cont_minimos') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Programa analítico</span></label>
                    <textarea id="programa_analitico" name="programa_analitico" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese el programa analítico">{{ old('programa_analitico') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Actividades prácticas</span></label>
                    <textarea id="act_practicas" name="act_practicas" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese las actividades prácticas">{{ old('act_practicas') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Modalidad</span></label>
                    <textarea id="modalidad" name="modalidad" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese la modalidad">{{ old('modalidad') }}</textarea>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Bibliografía</span></label>
                    <textarea id="bibliografia" name="bibliografia" class="textarea textarea-bordered w-full" 
                        style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese la bibliografía">{{ old('bibliografia') }}</textarea>
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