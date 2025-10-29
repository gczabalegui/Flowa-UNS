@extends('administracion.layouts.admin-layout')

@section('title', 'Ver programas de materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Programas de materias</h1>
            <p class="text-gray-600 mt-2">Gestiona todos los programas de materias del sistema</p>
        </div>

        <div>
            <div class="hidden lg:block bg-white rounded-lg shadow border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse min-w-[900px]">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre de la materia
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Profesor responsable
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-[80px]">
                                    Año
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Operaciones
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($planes as $plan)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-900 w-[80px]">
                                    {{ $plan->anio }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                    @if(str_contains($plan->estado, 'Completo') || str_contains($plan->estado, 'Aprobado'))
                                    bg-green-100 text-green-800
                                    @elseif(str_contains($plan->estado, 'Rechazado'))
                                    bg-red-100 text-red-800
                                    @elseif(str_contains($plan->estado, 'Incompleto'))
                                    bg-yellow-100 text-yellow-800
                                    @else
                                    bg-gray-100 text-gray-800
                                    @endif">
                                        {{ $plan->estado }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-center">
                                    <div class="flex flex-col items-center gap-1 w-full">

                                        {{-- Ver --}}
                                        <a href="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" class="w-28 inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md 
                                        text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 
                                        transition-colors duration-200">
                                            VER
                                        </a>

                                        {{-- Editar --}}
                                        @if($plan->estado === 'Incompleto por administración.' ||
                                        $plan->estado === 'Rechazado para administración por profesor responsable.' ||
                                        $plan->estado === 'Rechazado para administración por secretaría académica.')
                                        <a href="{{ route('administracion.editarplan', ['id' => $plan->id]) }}" class="w-28 inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md 
                                            text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 
                                            transition-colors duration-200">
                                            EDITAR
                                        </a>
                                        @else
                                        <button class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded-md 
                                            text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed" disabled>
                                            EDITAR
                                        </button>
                                        @endif

                                        {{-- Eliminar --}}
                                        <form id="delete-form-{{ $plan->id }}" action="{{ route('administracion.eliminarplan', ['id' => $plan->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="w-28 inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md 
                                            text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 
                                            transition-colors duration-200 delete-plan-btn" data-plan-id="{{ $plan->id }}">
                                                ELIMINAR
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:hidden space-y-4">
                @foreach($planes as $plan)
                <div class="p-4 bg-white rounded-lg shadow border border-gray-200 hover:shadow-md transition duration-200 text-center
                            w-full sm:max-w-md sm:mx-auto"> 
                    
                    <div class="flex flex-wrap justify-center items-start border-b border-gray-100 pb-2 mb-2">
                        <div class="text-base font-bold text-gray-900">
                            {{ $plan->materia->nombre_materia }}
                        </div>
                        <div class="text-sm font-medium text-gray-500 mt-0.5 ml-1"> 
                            ({{ $plan->materia->codigo_materia }})
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="text-sm text-gray-700">
                            <span class="font-semibold">Profesor:</span> 
                            {{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}
                        </div>
                        <div class="text-sm text-gray-700">
                            <span class="font-semibold">Año:</span> {{ $plan->anio }}
                        </div>

                        <div class="flex items-center pt-1 justify-center">
                            <span class="text-sm font-semibold text-gray-700 mr-2">Estado:</span>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                @if(str_contains($plan->estado, 'Completo') || str_contains($plan->estado, 'Aprobado'))
                                bg-green-100 text-green-800
                                @elseif(str_contains($plan->estado, 'Rechazado'))
                                bg-red-100 text-red-800
                                @elseif(str_contains($plan->estado, 'Incompleto'))
                                bg-yellow-100 text-yellow-800
                                @else
                                bg-gray-100 text-gray-800
                                @endif">
                                {{ $plan->estado }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 pt-4 justify-center border-t border-gray-100 mt-4">

                        {{-- Ver --}}
                        <a href="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" class="w-full sm:w-28 inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md 
                        text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 
                        transition-colors duration-200">
                            VER
                        </a>

                        {{-- Editar --}}
                        @if($plan->estado === 'Incompleto por administración.' ||
                        $plan->estado === 'Rechazado para administración por profesor responsable.' ||
                        $plan->estado === 'Rechazado para administración por secretaría académica.')
                        <a href="{{ route('administracion.editarplan', ['id' => $plan->id]) }}" class="w-full sm:w-28 inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md 
                            text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 
                            transition-colors duration-200">
                            EDITAR
                        </a>
                        @else
                        <button class="w-full sm:w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded-md 
                            text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed" disabled>
                            EDITAR
                        </button>
                        @endif

                        {{-- Eliminar --}}
                        <form id="delete-form-mobile-{{ $plan->id }}" action="{{ route('administracion.eliminarplan', ['id' => $plan->id]) }}" method="POST" class="w-full sm:w-28">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="w-full inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md 
                            text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 
                            transition-colors duration-200 delete-plan-btn" data-plan-id="{{ $plan->id }}">
                                ELIMINAR
                            </button>
                        </form>

                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<script>
    // La lógica de JavaScript para el botón de eliminar se mantiene
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-plan-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var planId = this.getAttribute('data-plan-id');
                confirmDeletePlan(planId);
            });
        });
    });

    function confirmDeletePlan(planId) {
        if (typeof showConfirmModal !== 'function') {
            if (confirm('¿Estás seguro de que deseas eliminar el programa de esta materia?')) {
                var formDesktop = document.getElementById('delete-form-' + planId);
                var formMobile = document.getElementById('delete-form-mobile-' + planId);
                if (formDesktop) {
                    formDesktop.submit();
                } else if (formMobile) {
                    formMobile.submit();
                }
            }
            return false;
        }

        showConfirmModal(
            'Eliminar programa de materia',
            '¿Estás seguro de que deseas eliminar el programa de esta materia? Esta acción no se puede deshacer.',
            function() {
                var formDesktop = document.getElementById('delete-form-' + planId);
                var formMobile = document.getElementById('delete-form-mobile-' + planId);
                
                if (formDesktop) {
                    formDesktop.submit();
                } else if (formMobile) {
                    formMobile.submit();
                }
            }
        );
    }

    window.addEventListener('load', function() {
        var modal = document.getElementById('confirm-modal');
        if (modal && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
        }
    });
</script>

<div class="h-16"></div>
@endsection