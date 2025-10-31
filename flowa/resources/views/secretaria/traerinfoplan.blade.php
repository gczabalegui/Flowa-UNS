@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Revisar programa')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Información del programa</h1>
            <p class="text-gray-600 mt-2">Revise los detalles completos del programa de materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="p-6">
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
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas débiles</label>
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Área temática</label>
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
                        <label class="block text-sm font-medium text-gray-700 mb-4">Objetivos generales</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @if($plan->obj_conceptuales)
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Objetivos conceptuales</label>
                                <div class="bg-gray-50 p-3 rounded-md border">
                                    <p class="text-gray-900">{{ $plan->obj_conceptuales }}</p>
                                </div>
                            </div>
                            @endif
                            @if($plan->obj_procedimentales)
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Objetivos procedimentales</label>
                                <div class="bg-gray-50 p-3 rounded-md border">
                                    <p class="text-gray-900">{{ $plan->obj_procedimentales }}</p>
                                </div>
                            </div>
                            @endif
                            @if($plan->obj_actitudinales)
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Objetivos actitudinales</label>
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos específicos</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->obj_especificos }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->cont_minimos)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contenidos mínimos</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->cont_minimos }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->programa_analitico)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Programa analítico</label>
                        <div class="bg-gray-50 p-4 rounded-md border">
                            <p class="text-gray-900">{{ $plan->programa_analitico }}</p>
                        </div>
                    </div>
                    @endif

                    @if($plan->act_practicas)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Actividades prácticas</label>
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

                <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">

                    {{-- Botón Rechazar para administración (gris) --}}
                    @if($plan->estado === 'Aprobado por secretaría académica.')
                    <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-70 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed opacity-70" disabled title="Una vez aprobado, solo puede ser rechazado hacia el profesor asociado.">
                                    RECHAZAR PARA ADMINISTRACIÓN
                                </button>
                    @else
                    <form id="reject-admin-form" action="{{ route('secretaria.rechazarplan', ['id' => $plan->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="secretaria">
                        <input type="hidden" name="type" value="administracion">
                        <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-70 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200 reject-btn" data-form="reject-admin-form" data-message="¿Está seguro de que desea rechazar este programa? Esta acción lo devolverá a administración.">
                            RECHAZAR PARA ADMINISTRACIÓN
                        </button>
                    </form>
                    @endif

                    {{-- Botón Rechazar para profesor (gris) --}}
                    <form id="reject-profesor-form" action="{{ route('secretaria.rechazarplan', ['id' => $plan->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="secretaria">
                        <input type="hidden" name="type" value="profesor">
                        <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-70 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200 reject-btn" data-form="reject-profesor-form" data-message="¿Está seguro de que desea rechazar este programa? Esta acción lo devolverá al profesor.">
                            RECHAZAR PARA PROFESOR RESPONSABLE
                        </button>
                    </form>

                    {{-- Botón Aprobar plan (verde) --}}
                    @if($plan->estado === 'Aprobado por secretaría académica.')
                    <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-600 bg-white opacity-60 cursor-not-allowed" disabled title="El programa ya fue aprobado por secretaría académica.">
                                    APROBAR PROGRAMA
                                </button>
                    @else
                    <form id="approve-form" action="{{ route('secretaria.aprobarplan', ['id' => $plan->id]) }}" method="POST">
                        @csrf
                        <button type="button" class="inline-flex items-center justify-center px-5 py-2 w-50 border border-green-600 text-sm font-medium rounded-md text-green-700 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 approve-btn" data-form="approve-form" data-message="¿Está seguro que desea aprobar este programa?">
                            APROBAR PROGRAMA
                        </button>
                    </form>
                    @endif

                    {{-- Botón Volver (gris) --}}
                    <a href="/secretaria" class="inline-flex items-center justify-center px-5 py-2 w-40 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200">
                        VOLVER
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar botones de rechazar
        const rejectButtons = document.querySelectorAll('.reject-btn');
        const approveButtons = document.querySelectorAll('.approve-btn');

        rejectButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const formId = this.getAttribute('data-form');
                const message = this.getAttribute('data-message');

                if (typeof showConfirmModal === 'function') {
                    showConfirmModal(
                        'Rechazar programa',
                        message,
                        function() {
                            document.getElementById(formId).submit();
                        }
                    );
                } else {
                    if (confirm(message)) {
                        document.getElementById(formId).submit();
                    }
                }
            });
        });

        approveButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const formId = this.getAttribute('data-form');
                const message = this.getAttribute('data-message');

                if (typeof showConfirmModal === 'function') {
                    showConfirmModal(
                        'Aprobar progama',
                        message,
                        function() {
                            document.getElementById(formId).submit();
                        }
                    );
                } else {
                    if (confirm(message)) {
                        document.getElementById(formId).submit();
                    }
                }
            });
        });
    });
</script>
@endsection