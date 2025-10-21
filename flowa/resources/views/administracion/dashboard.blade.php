@extends('administracion.layouts.admin-layout')

@section('title', 'Dashboard Administración')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard administración</h1>
            <p class="text-gray-600 mt-2">Gestión de usuarios, materias, carreras y planes de materia</p>
        </div>

        <!-- Tarjetas de acceso rápido -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Crear Materia -->
            <a href="/administracion/crearmateria" class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M12 4h9M4 12h16"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Crear materia</h3>
                <p class="text-sm text-gray-600">Registrar una nueva materia en el sistema.</p>
            </a>

            <!-- Crear Carrera -->
            <a href="/administracion/crearcarrera" class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Crear carrera</h3>
                <p class="text-sm text-gray-600">Registrar una nueva carrera universitaria.</p>
            </a>

            <!-- Crear Plan -->
            <a href="/administracion/crearplan" class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Crear plan</h3>
                <p class="text-sm text-gray-600">Registrar un nuevo plan de materia para una carrera.</p>
            </a>

            <!-- Crear Usuarios (Secretaría) -->
            <a href="/administracion/crearsecretaria" class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Crear usuario secretaría</h3>
                <p class="text-sm text-gray-600">Registrar nuevo usuario de secretaría académica.</p>
            </a>

            <!-- Ver planes -->
            <a href="/administracion/verplanes" class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Listar planes</h3>
                <p class="text-sm text-gray-600">Consulta todos los planes de materia existentes.</p>
            </a>

        </div>
    </div>
</div>

<!-- Espacio adicional al final de la página -->
<div class="h-16"></div>
@endsection