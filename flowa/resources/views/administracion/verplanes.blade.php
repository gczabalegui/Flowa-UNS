@extends('administracion.layouts.admin-layout')

@section('title', 'Ver Planes de Materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-none mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Planes de materias</h1>
            <p class="text-gray-600 mt-2">Gestiona todos los planes de materias del sistema</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="overflow-x-auto">                
                <table class="w-full border-collapse min-w-[900px]">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre de la materia
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Profesor
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
                                <a href="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" 
                                class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded text-white bg-blue-600 hover:bg-blue-700 transition">
                                VER
                                </a>

                                @if($plan->estado === 'Incompleto por administración.' || 
                                    $plan->estado === 'Rechazado para administración por profesor.' || 
                                    $plan->estado === 'Rechazado para administración por secretaría académica.')
                                <a href="{{ route('administracion.editarplan', ['id' => $plan->id]) }}" 
                                    class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded text-white bg-yellow-600 hover:bg-yellow-700 transition">
                                    EDITAR
                                </a>
                                @else
                                <button class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed" disabled>
                                    EDITAR
                                </button>
                                @endif

                                <form id="delete-form-{{ $plan->id }}" action="{{ route('administracion.eliminarplan', ['id' => $plan->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded text-white bg-red-600 hover:bg-red-700 transition delete-plan-btn"
                                    data-plan-id="{{ $plan->id }}">
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
    </div>
</div>

    <script>
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
                if (confirm('¿Estás seguro de que deseas eliminar el plan de esta materia?')) {
                    var form = document.getElementById('delete-form-' + planId);
                    if (form) {
                        form.submit();
                    }
                }
                return false;
            }
            
            showConfirmModal(
                'Eliminar plan',
                '¿Estás seguro de que deseas eliminar el plan de esta materia? Esta acción no se puede deshacer.',
                function() {
                    var form = document.getElementById('delete-form-' + planId);
                    if (form) {
                        form.submit();
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

    <!-- Espacio adicional al final de la página -->
    <div class="h-16"></div>
@endsection