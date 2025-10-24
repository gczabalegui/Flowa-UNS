@extends('comision.layouts.comision-layout')

@section('title', 'Revisar programa de materia')

@section('content')

<div class="max-w-4xl mx-auto px-6 transition-all duration-500"> 
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Información del programa</h1>
        <p class="text-gray-600 mt-2">Revise los detalles completos del programa de la materia</p>
    </div>

    <div class="bg-white rounded-lg shadow border border-gray-200">
        <div class="p-6">
            <form action="{{ route('comision.traerinfoplan', ['id' => $plan->id]) }}" method="GET">
                <input type="hidden" name="role" value="comision">

                <div class="space-y-6">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                            <p class="text-lg font-semibold text-gray-900">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profesor responsable</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->anio }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->horas_teoricas }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->horas_practicas }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->horas_totales }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">DTE</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->DTE }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">RTF</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->RTF }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Créditos académicos</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->creditos_academicos }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-4 text-gray-900">Materias correlativas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas fuertes</label>
                                    <div class="bg-gray-50 p-3 rounded-md border min-h-[6rem]">
                                        @if($plan->materia->correlativasFuertes->count() > 0)
                                            @foreach($plan->materia->correlativasFuertes as $correlativa)
                                                <p class="text-sm text-gray-900 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                                            @endforeach
                                        @else
                                            <p class="text-sm text-gray-500">No posee correlativas fuertes.</p>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas débiles</label>
                                    <div class="bg-gray-50 p-3 rounded-md border min-h-[6rem]">
                                        @if($plan->materia->correlativasDebiles->count() > 0)
                                            @foreach($plan->materia->correlativasDebiles as $correlativa)
                                                <p class="text-sm text-gray-900 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                                            @endforeach
                                        @else
                                            <p class="text-sm text-gray-500">No posee correlativas débiles.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        
                    @if($plan->area_tematica)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Área temática</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $plan->area_tematica)) }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->fundamentacion)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fundamentación</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900 text-justify">{{ $plan->fundamentacion }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->obj_conceptuales || $plan->obj_procedimentales || $plan->obj_actitudinales)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">Objetivos Generales</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @if($plan->obj_conceptuales)
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Objetivos Conceptuales</label>
                                <div class="bg-gray-50 p-3 rounded-md border">
                                    <p class="text-gray-900">{{ $plan->obj_conceptuales }}</p>
                                </div>
                            </div>
                            @endif
                            @if($plan->obj_procedimentales)
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Objetivos Procedimentales</label>
                                <div class="bg-gray-50 p-3 rounded-md border">
                                    <p class="text-gray-900">{{ $plan->obj_procedimentales }}</p>
                                </div>
                            </div>
                            @endif
                            @if($plan->obj_actitudinales)
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Objetivos Actitudinales</label>
                                <div class="bg-gray-50 p-3 rounded-md border">
                                    <p class="text-gray-900">{{ $plan->obj_actitudinales }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($plan->obj_especificos)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Específicos</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->obj_especificos }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->cont_minimos)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contenidos Mínimos</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->cont_minimos }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->programa_analitico)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Programa Analítico</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->programa_analitico }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->act_practicas)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Actividades Prácticas</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->act_practicas }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->modalidad)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Modalidad</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->modalidad }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->bibliografia)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bibliografía</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->bibliografia }}</p>
                        </div>
                    </div>
                    @endif
                    
                </div>
            </form>

            <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                
                <a href="{{ route('comision.generarPdf', ['id' => $plan->id]) }}" target="_blank"
                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                    GENERAR PDF
                </a>
                
                <a href="/comision/verplanes" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    VOLVER
                </a>
            </div>
        </div>
    </div>
</div>
@endsection