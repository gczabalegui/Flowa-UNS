@extends('administracion.layouts.admin-layout')

@section('title', 'Revisar plan')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Información del plan</h1>
            <p class="text-gray-600 mt-2">Revise los detalles completos del plan de materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Profesor</label>
                        <p class="text-lg text-gray-900">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                        <p class="text-lg text-gray-900">{{ $plan->anio }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas Totales</label>
                        <p class="text-lg text-gray-900">{{ $plan->horas_totales }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas Teóricas</label>
                        <p class="text-lg text-gray-900">{{ $plan->horas_teoricas }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Horas Prácticas</label>
                        <p class="text-lg text-gray-900">{{ $plan->horas_practicas }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DTE</label>
                        <p class="text-lg text-gray-900">{{ $plan->DTE }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">RTF</label>
                        <p class="text-lg text-gray-900">{{ $plan->RTF }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Créditos Académicos</label>
                        <p class="text-lg text-gray-900">{{ $plan->creditos_academicos }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-4 text-gray-900">Materias Correlativas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas Fuertes</label>
                                    <div class="bg-gray-50 p-3 rounded-md border">
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
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas Débiles</label>
                                    <div class="bg-gray-50 p-3 rounded-md border">
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
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Área Temática</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $plan->area_tematica)) }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->fundamentacion)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fundamentación</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900 text-justify">{{ $plan->fundamentacion }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->obj_conceptuales || $plan->obj_procedimentales || $plan->obj_actitudinales)
                    <div class="md:col-span-2">
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
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos Específicos</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->obj_especificos }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->cont_minimos)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contenidos Mínimos</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->cont_minimos }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->programa_analitico)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Programa Analítico</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->programa_analitico }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->act_practicas)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Actividades Prácticas</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->act_practicas }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->modalidad)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Modalidad</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->modalidad }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->bibliografia)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bibliografía</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->bibliografia }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    @if ($plan->estado === 'Incompleto por administración.' || $plan->estado === 'Rechazado para administración por profesor.' || $plan->estado === 'Rechazado para administración por secretaría académica.') 
                        <a href="{{ route('administracion.editarplan', ['id' => $plan->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200" tabindex="11">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            EDITAR
                        </a>
                    @endif
                    
                    <a href="/administracion/verplanes" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200" tabindex="10">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        VOLVER
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection