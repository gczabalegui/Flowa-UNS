@extends('profesor.layouts.profesor-layout')

@section('title', 'Revisar programa de materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Información del programa</h1>
            <p class="text-gray-600 mt-2">Revise los detalles completos del programa de la materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="p-6">
                <div class="space-y-6">

                    {{-- Materia --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})
                            </p>
                        </div>
                    </div>

                    {{-- Profesor y Año --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profesor responsable</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">
                                    {{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Año</label>
                            <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                                <p class="text-lg text-gray-900">{{ $plan->anio }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Distribución de horas --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas teóricas</label>
                            <div class="bg-gray-50 p-2 rounded-md border">
                                <p class="text-lg text-gray-900">{{ $plan->horas_teoricas }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas prácticas</label>
                            <div class="bg-gray-50 p-2 rounded-md border">
                                <p class="text-lg text-gray-900">{{ $plan->horas_practicas }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horas totales</label>
                            <div class="bg-gray-50 p-2 rounded-md border">
                                <p class="text-lg text-gray-900">{{ $plan->horas_totales }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- DTE, RTF, Créditos --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                DTE
                                <span class="tooltip-trigger">?</span>
                                <span class="tooltip-content">
                                    <b>Dedicación Total del Estudiante (DTE)</b><br>
                                    DTE = CHT × (K + 1)<br>
                                    K: FB=1,25 | FA=1,5 | FP=2 | FC=1
                                </span>
                            </label>
                            <div class="bg-gray-50 p-2 rounded-md border">
                                <p class="text-lg text-gray-900">{{ $plan->DTE }}</p>
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                RTF
                                <span class="tooltip-trigger">?</span>
                                <span class="tooltip-content">
                                    <b>Reconocimiento de Trayecto Formativo (RTF)</b><br>
                                    RTF = DTE / 30
                                </span>
                            </label>
                            <div class="bg-gray-50 p-2 rounded-md border">
                                <p class="text-lg text-gray-900">{{ $plan->RTF }}</p>
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                Créditos académicos
                                <span class="tooltip-trigger">?</span>
                                <span class="tooltip-content">
                                    <b>Créditos académicos</b><br>
                                    Asignados según la carga horaria total y trayecto formativo.
                                </span>
                            </label>
                            <div class="bg-gray-50 p-2 rounded-md border">
                                <p class="text-lg text-gray-900">{{ $plan->creditos_academicos }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Correlativas --}}
                    <div>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-4 text-gray-900">Materias correlativas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas fuertes</label>
                                    <div class="bg-gray-50 p-3 rounded-md border">
                                        @forelse($plan->materia->correlativasFuertes as $correlativa)
                                            <p class="text-sm text-gray-900 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                                        @empty
                                            <p class="text-sm text-gray-500">No posee correlativas fuertes.</p>
                                        @endforelse
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Correlativas débiles</label>
                                    <div class="bg-gray-50 p-3 rounded-md border">
                                        @forelse($plan->materia->correlativasDebiles as $correlativa)
                                            <p class="text-sm text-gray-900 mb-1">{{ $correlativa->nombre_materia }} ({{ $correlativa->codigo_materia }})</p>
                                        @empty
                                            <p class="text-sm text-gray-500">No posee correlativas débiles.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Campos condicionales --}}
                    @foreach ([
                        'Área temática' => $plan->area_tematica ? ucfirst(str_replace('_', ' ', $plan->area_tematica)) : null,
                        'Fundamentación' => $plan->fundamentacion,
                        'Objetivos específicos' => $plan->obj_especificos,
                        'Contenidos mínimos' => $plan->cont_minimos,
                        'Programa analítico' => $plan->programa_analitico,
                        'Actividades prácticas' => $plan->act_practicas,
                        'Modalidad' => $plan->modalidad,
                        'Bibliografía' => $plan->bibliografia
                    ] as $label => $value)
                        @if($value)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
                            <div class="bg-gray-50 p-4 rounded-md border">
                                <p class="text-gray-900 text-justify">{{ $value }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

                {{-- Botones --}}
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">

                    {{-- Rechazar --}}
                    <form id="reject-plan-form" action="{{ route('profesor.rechazarplan', ['id' => $plan->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="profesor">
                        <input type="hidden" name="type" value="administracion">
                        <button 
                            type="button"
                            class="inline-flex items-center justify-center px-5 py-2 w-72 border border-gray-300 text-sm font-medium rounded-md
                                @if(!in_array($plan->estado, ['Completo por administración.', 'Incompleto por profesor.', 'Rectificado por administración para profesor responsable.']))
                                    text-gray-400 bg-gray-100 cursor-not-allowed opacity-70
                                @else
                                    text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200 reject-btn
                                @endif"
                            data-form="reject-plan-form"
                            data-message="¿Está seguro de que desea rechazar este programa? Esta acción lo devolverá a administración."
                            @if(!in_array($plan->estado, ['Completo por administración.', 'Incompleto por profesor.', 'Rectificado por administración para profesor responsable.'])) 
                                disabled 
                            @endif>
                            RECHAZAR PARA ADMINISTRACIÓN
                        </button>
                    </form>

                    {{-- Editar --}}
                    <a href="{{ route('profesor.editarplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center px-5 py-2 w-40 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 transition-colors duration-200">
                        EDITAR
                    </a>

                    {{-- Volver --}}
                    <a href="/profesor/verplanes" class="inline-flex items-center justify-center px-5 py-2 w-40 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200">
                        VOLVER
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script para confirmación --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.reject-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const formId = this.dataset.form;
                const message = this.dataset.message;
                if (typeof showConfirmModal === 'function') {
                    showConfirmModal('Rechazar programa', message, () => document.getElementById(formId).submit());
                } else if (confirm(message)) {
                    document.getElementById(formId).submit();
                }
            });
        });
    });
</script>

{{-- Tooltip --}}
<style>
.tooltip-trigger {
    position: relative;
    display: inline-block;
    width: 1.25rem;
    height: 1.25rem;
    text-align: center;
    line-height: 1.25rem;
    border-radius: 9999px;
    background-color: #f3f4f6;
    color: #6b7280;
    font-weight: bold;
    cursor: pointer;
}
.tooltip-trigger:hover + .tooltip-content {
    visibility: visible;
    opacity: 1;
}
.tooltip-content {
    visibility: hidden;
    opacity: 0;
    width: 220px;
    background: white;
    color: #374151;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.75rem;
    position: absolute;
    z-index: 10;
    top: 100%;
    left: 0;
    transform: translateY(4px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: opacity 0.2s ease-in-out;
    font-size: 0.75rem;
}
</style>
@endsection
