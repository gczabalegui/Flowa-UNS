@extends('profesor.layouts.profesor-layout')

@section('title', 'Dashboard profesor responsable')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <!-- Encabezado -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard profesor responsable</h1>
            <p class="text-gray-600 mt-2">Resumen de tus programas de materia</p>
        </div>

        <!-- Grid con 3 columnas -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Card 1: Datos Numéricos -->
            <div class="bg-white p-6 rounded-lg shadow border flex flex-col space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Datos de gestión</h3>
                <div class="flex justify-between items-center text-center">
                    <div>
                        <p class="text-gray-600">Total de planes asignados</p>
                        <h2 class="text-3xl font-bold text-blue-600">{{ $totalPlanes }}</h2>
                    </div>
                    <div>
                        <p class="text-gray-600">Planes pendientes de completar</p>
                        <h2 class="text-3xl font-bold text-red-600">{{ $planesPendientes }}</h2>
                    </div>
                </div>
            </div>

            <!-- Card 2: Gráfico de planes por estado -->
            <div class="bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Planes por estado</h3>
                <div class="flex-grow" style="max-height: 400px;">
                    <canvas id="chartEstado"></canvas>
                </div>
            </div>

            <!-- Card 3: Últimas modificaciones -->
            <div class="bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Últimas modificaciones</h3>
                <ul class="space-y-2 flex-grow overflow-y-auto" style="max-height: 400px;">
                    @foreach($ultimasModificaciones as $plan)
                        <li class="flex justify-between border-b py-2 items-start">
                            <span class="flex-1 mr-2 break-words">
                                @if($plan->materia)
                                    {{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})
                                @else
                                    Sin materia
                                @endif
                            </span>
                            <span class="text-gray-500 flex-shrink-0">{{ $plan->updated_at->format('d/m/Y H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxEstado = document.getElementById('chartEstado').getContext('2d');
    new Chart(ctxEstado, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($planesPorEstado->keys()) !!},
            datasets: [{
                data: {!! json_encode($planesPorEstado->values()) !!},
                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>
@endsection
