@extends('administracion.layouts.admin-layout')

@section('title', 'Dashboard Administración')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard administración</h1>
            <p class="text-gray-600 mt-2">Resumen general de programas, profesores y materias</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">

            <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow border flex flex-col">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Datos de gestión</h2>
                
                <div class="bg-white p-6 rounded-lg shadow border">
                    <p class="text-gray-600 mt-1">Total de programas de materias</p>
                    <h2 class="text-4xl font-bold text-blue-600">{{ $totalPlanes }}</h2>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow border">
                    <p class="text-gray-600 mt-1">Materias</p>
                    <h2 class="text-4xl font-bold text-green-600">{{ $totalMaterias }}</h2>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow border">
                    <p class="text-gray-600 mt-1">Profesores responsables</p>
                    <h2 class="text-4xl font-bold text-purple-600">{{ $totalProfesores }}</h2>
                </div>
            </div>

            <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Programas de materias por estado</h3>
                <div class="flex-grow flex items-center justify-center" style="max-height: 400px;">
                    <canvas id="chartEstado"></canvas>
                </div>
            </div>

            <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Programas por año</h3>
                <div class="flex-grow" style="max-height: 400px;">
                    <canvas id="chartAnio"></canvas>
                </div>
            </div>

        </div> 
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Tu código JavaScript ya estaba correcto, se mantiene igual.
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
            // Esto ayuda a que el gráfico de dona se vea mejor en contenedores pequeños
            responsive: true,
            maintainAspectRatio: false,
        }
    });

    const ctxAnio = document.getElementById('chartAnio').getContext('2d');
    new Chart(ctxAnio, {
        type: 'bar',
        data: {
            labels: {!! json_encode($planesPorAnio->keys()) !!},
            datasets: [{
                label: 'Programas',
                data: {!! json_encode($planesPorAnio->values()) !!},
                backgroundColor: '#3b82f6',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection