<!DOCTYPE html>
<html data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Revisar plan</title>
</head>
<body>
    @include('secretaria.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form action="{{ route('modificarinfoplan', ['id' => $plan->id]) }}" method="POST">
            @csrf
                @method('PUT')
                <input type="hidden" name="mode" value="modificar">
                <div class="mx-5 my-5">
                    <h2 class="card-title mx-auto">Modificar la información del plan</h2>
                   <!-- <div class="my-3">
                        <label class="label"><span class="label-text">Materia</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->materia->nombre_materia }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Profesor</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Año</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->anio }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Horas Totales</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->horas_totales }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Horas Teóricas</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->horas_teoricas }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Horas Prácticas</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->horas_practicas }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">DTE</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->DTE }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">RTF</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->RTF }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Créditos Académicos</span></label>
                        <textarea class="textarea textarea-bordered w-full">{{ $plan->creditos_academicos }}</p>
                    </div>
                    -->
                    <div class="my-3">
                        <label class="label"><span class="label-text">Área Temática</span></label>
                        <textarea class="textarea textarea-bordered w-full" name="area_tematica" required>{{ $plan->area_tematica }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Fundamentación</span></label>
                        <p class="help-text" style="text-align: justify;">&#x2754; Redacte un párrafo de <b>hasta 200 palabras</b> teniendo como guía la siguiente pregunta: <em>¿por qué los estudiantes deben adquirir los conocimientos de esta asignatura en la carrera de Ingeniería Agronómica?</em></p>
                        <textarea id="fundamentacion" name="fundamentacion" class="textarea textarea-bordered w-full" 
                            style="height: 250px; resize: none;"     
                            tabindex="2" required oninput="limitarPalabras(this)" 
                            placeholder="Ingrese una fundamentación">{{ $plan->fundamentacion }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos generales</span> </label>
        
                        <div class="my-3">
                            <label class="label"><span class="label-text">Objetivos conceptuales</span></label>
                            <textarea id="obj_conceptuales" name="obj_conceptuales" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos conceptuales">{{ $plan->obj_conceptuales }}</textarea>
                        </div>                    
                        <div class="my-3">
                            <label class="label"><span class="label-text">Objetivos procedimentales</span></label>
                            <textarea id="obj_procedimentales" name="obj_procedimentales" class="textarea textarea-bordered w-full" 
                                style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos procedimentales">{{ $plan->obj_procedimentales }}</textarea>
                        </div>

                        <div class="my-3">
                            <label class="label"><span class="label-text">Objetivos actitudinales</span></label>
                            <textarea id="obj_actitudinales" name="obj_actitudinales" class="textarea textarea-bordered w-full" 
                                style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos actitudinales">{{ $plan->obj_actitudinales }}</textarea>
                        </div>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos específicos</span> </label>
                        <textarea id="obj_especificos" name="obj_especificos" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los objetivos específicos">{{ $plan->obj_especificos }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Contenidos mínimos</span></label>
                        <p class="help-text" style="text-align: justify;">&#x2754; Enunciar los contenidos curriculares básicos que se tratan en la asignatura siguiendo la Resolución 1537/21, Anexo I para asegurar la inclusión de aquellos allí definidos y aquellos que se agreguen al Plan de Estudio en función de los alcances del título. 
                        <br><b>Aclaración.</b> Los descriptores de conocimiento correspondientes a la Formación Profesional incluyen enunciados multidimensionales y transversales. Los mismos requieren la articulación de conocimientos y de prácticas y fundamentan el ejercicio profesional. No involucran una referencia directa a una disciplina o asignatura del plan de estudios.</br></p>
                        <textarea id="cont_minimos" name="cont_minimos" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese los contenidos mínimos">{{ $plan->cont_minimos }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Programa analítico</span></label>
                        <textarea id="programa_analitico" name="programa_analitico" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese el programa analítico">{{ $plan->programa_analitico }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Actividades prácticas</span></label>
                        <textarea id="act_practicas" name="act_practicas" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese las actividades prácticas">{{ $plan->act_practicas }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Modalidad</span></label>
                        <textarea id="modalidad" name="modalidad" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese la modalidad">{{ $plan->modalidad }}</textarea>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Bibliografía</span></label>
                        <textarea id="bibliografia" name="bibliografia" class="textarea textarea-bordered w-full" 
                            style="height: 150px; resize: none;" tabindex="2" required placeholder="Ingrese la bibliografía">{{ $plan->bibliografia }}</textarea>
                    </div>
                </div>  
                <div class="flex justify-center space-x-4 mt-6">
                    <a href="/profesor" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <!-- <button type="submit" name="preview" value="1" class="btn btn-outline">Vista Previa</button>-->
                    <button type="submit" class="btn btn-success" tabindex="8">Modificar información del plan</button>
                </div>     
            </div>
        </form>              
    </div>
</body>
</html>