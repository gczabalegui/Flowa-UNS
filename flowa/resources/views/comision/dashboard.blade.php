@extends('comision.layouts.comision-layout')

@section('title', 'Dashboard Comisión')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <!-- Encabezado -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard comisión académica </h1>
            <p class="text-gray-600 mt-2">Bienvenido al panel principal de la comisión académica</p>
        </div>

        <!-- Tarjetas de acción -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ver planes -->
            <a href="/comision/verplanes" class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Ver programas de materias</h2>
                <p class="text-sm text-gray-600">Accedé a la lista completa de programas para revisión y seguimiento.</p>
            </a>
        </div>
    </div>
</div>

<!-- Espacio al final -->
<div class="h-16"></div>
@endsection