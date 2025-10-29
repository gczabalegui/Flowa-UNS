@extends('comision.layouts.comision-layout')

@section('title', 'Dashboard comisión curricular')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <!-- Encabezado -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard comisión curricular</h1>
            <p class="text-gray-600 mt-2">Resumen de programas de materias y profesores</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Card de Datos Numéricos -->
            <div class="bg-white p-6 rounded-lg shadow border flex flex-col space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Datos de gestión</h3>
                <div class="flex justify-between items-center text-center">
                    <div>
                        <p class="text-gray-600">Total de programas de materias</p>
                        <h2 class="text-3xl font-bold text-blue-600">{{ $totalPlanes }}</h2>
                    </div>
                    <div>
                        <p class="text-gray-600">Programas aprobados por secretaría académica</p>
                        <h2 class="text-3xl font-bold text-green-600">{{ $totalPlanesAprobados }}</h2>
                    </div>
                    <div>
                        <p class="text-gray-600">Programas esperando a profesor responsable</p>
                        <h2 class="text-3xl font-bold text-red-600">{{ $planesPendientesProfesor }}</h2>
                    </div>
                </div>
            </div>

            <!-- Card de Gráfico -->
            <div class="bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Profesores responsables con mayor cantidad de programas asociados</h3>
                <div class="flex-grow" style="max-height: 400px;">
                    <canvas id="chartProfesores"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxProfesores = document.getElementById('chartProfesores').getContext('2d');
    new Chart(ctxProfesores, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topProfesores->keys()) !!},
            datasets: [{
                label: 'Cantidad de programas',
                data: {!! json_encode($topProfesores->values()) !!},
                backgroundColor: '#3b82f6',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y', // Horizontal bar
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        precision:0
                    }
                }
            }
        }
    });
</script>
@endsection