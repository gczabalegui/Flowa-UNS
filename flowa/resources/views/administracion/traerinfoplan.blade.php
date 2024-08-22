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
        <form action="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" method="GET">
            @csrf
                <input type="hidden" name="role" value="administracion">
                <div class="mx-5 my-5">
                    <h2 class="card-title mx-auto">Ver la información del plan</h2>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Materia</span></label>
                        <p class="text-lg">{{ $plan->materia->nombre_materia }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Profesor</span></label>
                        <p class="text-lg">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Año</span></label>
                        <p class="text-lg">{{ $plan->anio }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Horas Totales</span></label>
                        <p class="text-lg">{{ $plan->horas_totales }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Horas Teóricas</span></label>
                        <p class="text-lg">{{ $plan->horas_teoricas }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Horas Prácticas</span></label>
                        <p class="text-lg">{{ $plan->horas_practicas }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">DTE</span></label>
                        <p class="text-lg">{{ $plan->DTE }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">RTF</span></label>
                        <p class="text-lg">{{ $plan->RTF }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Créditos Académicos</span></label>
                        <p class="text-lg">{{ $plan->creditos_academicos }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Área Temática</span></label>
                        <p class="text-lg">{{ ucfirst(str_replace('_', ' ', $plan->area_tematica)) }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Fundamentación</span></label>
                        <p class="text-lg" style="text-align: justify;">{{ $plan->fundamentacion }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos generales</span> </label>
        
                        <div class="my-3">
                            <label class="label"><span class="label-text">Objetivos Conceptuales</span></label>
                            <p class="text-lg">{{ $plan->obj_conceptuales }}</p>
                        </div>
                        <div class="my-3">
                            <label class="label"><span class="label-text">Objetivos Procedimentales</span></label>
                            <p class="text-lg">{{ $plan->obj_procedimentales }}</p>
                        </div>
                        <div class="my-3">
                            <label class="label"><span class="label-text">Objetivos Actitudinales</span></label>
                            <p class="text-lg">{{ $plan->obj_actitudinales }}</p>
                        </div>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Objetivos Específicos</span></label>
                        <p class="text-lg">{{ $plan->obj_especificos }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Contenidos Mínimos</span></label>
                        <p class="text-lg">{{ $plan->cont_minimos }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Programa Analítico</span></label>
                        <p class="text-lg">{{ $plan->programa_analitico }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Actividades Prácticas</span></label>
                        <p class="text-lg">{{ $plan->act_practicas }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Modalidad</span></label>
                        <p class="text-lg">{{ $plan->modalidad }}</p>
                    </div>
                    <div class="my-3">
                        <label class="label"><span class="label-text">Bibliografía</span></label>
                        <p class="text-lg">{{ $plan->bibliografia }}</p>
                    </div>
                </div>    
            </div>
        </form> 
        <div class="flex justify-center mt-6">
            <a href="/administracion" class="btn btn-warning w-1/6" tabindex="10">Regresar</a>
        </div>                  
    </div>
</body>
</html>