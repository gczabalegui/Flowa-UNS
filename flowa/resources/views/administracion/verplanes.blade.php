<!DOCTYPE html>
<html data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ver los planes de materia existentes</title>
</head>
<body>
@include('administracion.layouts.navbar')

    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        @csrf
        <div class="mx-5 my-5">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nombre de la materia</th>
                        <th class="px-4 py-2">Profesor</th>
                        <th class="px-4 py-2">Año del plan</th>
                        <th class="px-4 py-2">Estado del plan</th>
                        <th class="px-4 py-2">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planes as $plan)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</td>
                        <td class="border px-4 py-2 text-center">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</td>
                        <td class="border px-4 py-2 text-center">{{ $plan->anio }}</td>
                        <td class="border px-4 py-2 text-center">{{ $plan->estado }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex flex-col space-y-2">
                                <a href="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" class="btn btn-info w-full">Vista previa</a>
                                @if($plan->estado === 'Incompleto por administración.' || $plan->estado === 'Rechazado para administración por profesor.' || $plan->estado === 'Rechazado para administración por secretaría académica.') 
                                    <a href="{{ route('administracion.editarplan', ['id' => $plan->id]) }}" class="btn btn-warning w-full">Editar</a>
                                @else
                                    <button class="btn btn-warning w-full" disabled>Editar</button>
                                @endif                               
                                <form id="delete-form-{{ $plan->id }}" action="{{ route('administracion.eliminarplan', ['id' => $plan->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-error w-full delete-plan-btn" data-plan-id="{{ $plan->id }}">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing delete buttons');
            
            // Agregar event listeners a todos los botones de eliminar
            var deleteButtons = document.querySelectorAll('.delete-plan-btn');
            console.log('Found delete buttons:', deleteButtons.length);
            
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    var planId = this.getAttribute('data-plan-id');
                    console.log('Delete button clicked for plan:', planId);
                    
                    confirmDeletePlan(planId);
                });
            });
        });

        function confirmDeletePlan(planId) {
            console.log('confirmDeletePlan called with planId:', planId);
            
            // Verificar que la función showConfirmModal existe
            if (typeof showConfirmModal !== 'function') {
                console.error('showConfirmModal function not found');
                // Fallback al confirm nativo
                if (confirm('¿Estás seguro de que deseas eliminar este plan de la materia?')) {
                    var form = document.getElementById('delete-form-' + planId);
                    if (form) {
                        form.submit();
                    }
                }
                return false;
            }
            
            showConfirmModal(
                'Eliminar plan',
                '¿Estás seguro de que deseas eliminar este plan de la materia? Esta acción no se puede deshacer.',
                function() {
                    console.log('User confirmed deletion, submitting form');
                    var form = document.getElementById('delete-form-' + planId);
                    if (form) {
                        form.submit();
                    } else {
                        console.error('Form not found:', 'delete-form-' + planId);
                    }
                }
            );
        }

        // Prevenir que el modal se abra automáticamente
        window.addEventListener('load', function() {
            var modal = document.getElementById('confirm-modal');
            if (modal && !modal.classList.contains('hidden')) {
                console.log('Modal was visible on page load, hiding it');
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>