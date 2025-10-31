@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Dashboard Secretaría')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard secretaría académica</h1>
            <p class="text-gray-600 mt-2">Resumen de gestión de programas de materias</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">

             <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800">Datos de gestión</h3>
                
                    <div class="bg-white p-6 rounded-lg shadow border">
                        <p class="text-gray-600">Total de programas de materias</p>
                        <h2 class="text-3xl font-bold text-blue-600">{{ $totalPlanes }}</h2>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow border">
                        <p class="text-gray-600">Programas pendientes de aprobación</p>
                        <h2 class="text-3xl font-bold text-yellow-600">{{ $planesPendientes }}</h2>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow border">
                        <p class="text-gray-600">Programas observados</p>
                        <h2 class="text-3xl font-bold text-red-600">{{ $planesObservados }}</h2>
                    </div>
                
            </div>

            <div class="bg-white p-6 rounded-lg shadow border flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center" >Distribución de programas por estado</h3>
                <div class="flex-grow flex items-center justify-center" style="max-height: 400px;">
                    <canvas id="chartEstado"></canvas>
                </div>
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
