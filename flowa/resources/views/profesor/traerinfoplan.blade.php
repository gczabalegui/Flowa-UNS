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
    @include('profesor.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <div class="mx-5 my-5">
            <h2 class="card-title mx-auto">Revisar la información del plan</h2>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Materia</span></label>
                    <p class="text-lg">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Profesor</span></label>
                    <p class="text-lg">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Año</span></label>
                    <p class="text-lg">{{ $plan->anio }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Horas Totales</span></label>
                    <p class="text-lg">{{ $plan->horas_totales }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Horas Teóricas</span></label>
                    <p class="text-lg">{{ $plan->horas_teoricas }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Horas Prácticas</span></label>
                    <p class="text-lg">{{ $plan->horas_practicas }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">DTE</span></label>
                    <p class="text-lg">{{ $plan->DTE }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">RTF</span></label>
                    <p class="text-lg">{{ $plan->RTF }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Créditos Académicos</span></label>
                    <p class="text-lg">{{ $plan->creditos_academicos }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Correlativas Fuertes</span></label>
                    @if($plan->materia->correlativasFuertes->count() > 0)
                        @foreach($plan->materia->correlativasFuertes as $correlativa)
                            <p class="text-lg">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                        @endforeach
                    @else
                        <p class="text-lg text-gray-500">No posee correlativas fuertes.</p>
                    @endif
                </div>                
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Correlativas Débiles</span></label>
                    @if($plan->materia->correlativasDebiles->count() > 0)
                        @foreach($plan->materia->correlativasDebiles as $correlativa)
                            <p class="text-lg">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                        @endforeach
                    @else
                        <p class="text-lg text-gray-500">No posee correlativas débiles.</p>
                    @endif
                </div>                
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Área Temática</span></label>
                    <p class="text-lg">{{ ucfirst(str_replace('_', ' ', $plan->area_tematica)) }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Fundamentación</span></label>
                    <p class="text-lg" style="text-align: justify;">{{ $plan->fundamentacion }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Objetivos generales</span> </label>

                    <div class="my-3">
                        <label class="disabled-sublabel"><span class="label-text">Objetivos Conceptuales</span></label>
                        <p class="text-lg">{{ $plan->obj_conceptuales }}</p>
                    </div>
                    <div class="my-3">
                        <label class="disabled-sublabel"><span class="label-text">Objetivos Procedimentales</span></label>
                        <p class="text-lg">{{ $plan->obj_procedimentales }}</p>
                    </div>
                    <div class="my-3">
                        <label class="disabled-sublabel"><span class="label-text">Objetivos Actitudinales</span></label>
                        <p class="text-lg">{{ $plan->obj_actitudinales }}</p>
                    </div>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Objetivos Específicos</span></label>
                    <p class="text-lg">{{ $plan->obj_especificos }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Contenidos Mínimos</span></label>
                    <p class="text-lg">{{ $plan->cont_minimos }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Programa Analítico</span></label>
                    <p class="text-lg">{{ $plan->programa_analitico }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Actividades Prácticas</span></label>
                    <p class="text-lg">{{ $plan->act_practicas }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Modalidad</span></label>
                    <p class="text-lg">{{ $plan->modalidad }}</p>
                </div>
                <div class="my-3">
                    <label class="disabled-label"><span class="label-text">Bibliografía</span></label>
                    <p class="text-lg">{{ $plan->bibliografia }}</p>
                </div>
            </div>
        </div>

        {{-- Botones de acción --}}
        <div class="flex justify-center space-x-4 mt-6 mb-6">
            <form action="{{ route('profesor.rechazarplan', ['id' => $plan->id]) }}" method="POST" class="flex-1 max-w-xs">
                @csrf
                <input type="hidden" name="role" value="profesor">
                <input type="hidden" name="type" value="administracion">
                <button type="submit" class="btn btn-error w-full text-white" tabindex="9" 
                        onclick="return confirm('¿Está seguro que desea rechazar este plan? Esta acción lo devolverá a administración.')">
                    Rechazar plan
                </button>
            </form>
            
            <a href="{{ route('profesor.editarplan', ['id' => $plan->id]) }}" class="btn btn-warning flex-1 max-w-xs text-center" tabindex="10">
                Editar plan
            </a>
            
            <a href="/profesor/verplanes" class="btn btn-secondary flex-1 max-w-xs text-center" tabindex="11">Cancelar</a>
        </div>
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