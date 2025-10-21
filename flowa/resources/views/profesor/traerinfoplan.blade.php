@extends('profesor.layouts.profesor-layout')

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
                <div class="space-y-6">
                    <!-- Materia (full width) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Materia</label>
                        <div class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50">
                            <p class="text-lg font-semibold text-gray-900">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</p>
                        </div>
                    </div>

                    <!-- Profesor y Año en la misma fila -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profesor</label>
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

                    <!-- Todas las horas juntas en otra fila -->
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

                    <!-- DTE, RTF y Créditos académicos juntos -->
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

                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <form id="reject-plan-form" action="{{ route('profesor.rechazarplan', ['id' => $plan->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="profesor">
                        <input type="hidden" name="type" value="administracion">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200 reject-btn" 
                                data-form="reject-plan-form" data-message="¿Está seguro de que desea rechazar este plan? Esta acción lo devolverá a administración.">
                            RECHAZAR
                        </button>
                    </form>

                    <a href="{{ route('profesor.editarplan', ['id' => $plan->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        EDITAR
                    </a>
                    
                    <a href="/profesor/verplanes" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
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
        
        rejectButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const formId = this.getAttribute('data-form');
                const message = this.getAttribute('data-message');
                
                if (typeof showConfirmModal === 'function') {
                    showConfirmModal(
                        'Rechazar Plan',
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
            <form id="reject-plan-form" action="{{ route('profesor.rechazarplan', ['id' => $plan->id]) }}" method="POST" class="flex-1 max-w-xs">
                @csrf
                <input type="hidden" name="role" value="profesor">
                <input type="hidden" name="type" value="administracion">
                <button type="button" class="btn btn-error w-full text-white reject-btn" tabindex="9" 
                        data-form="reject-plan-form" data-message="¿Está seguro de que desea rechazar este plan? Esta acción lo devolverá a administración.">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejar botones de rechazar
            const rejectButtons = document.querySelectorAll('.reject-btn');
            
            rejectButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const formId = this.getAttribute('data-form');
                    const message = this.getAttribute('data-message');
                    
                    if (typeof showConfirmModal === 'function') {
                        showConfirmModal(
                            'Rechazar Plan',
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
</body>

</html>