@extends('comision.layouts.comision-layout')

@section('title', 'Dashboard')

@section('content')

    <div class="min-h-full">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Dashboard Comisión curricular 📋</h2>

        {{-- Contenido del dashboard, como solicitaste --}}
        <div class="flex flex-col items-center justify-center p-10 border border-dashed rounded-lg bg-white shadow-lg">
            <h3 class="text-2xl font-semibold mb-4 text-gray-700">¿Qué desea hacer?</h3>
            
            <a href="/comision/verplanes" class="btn btn-primary m-2 w-full max-w-xs text-center">
                Ver planes de materias
            </a>

            <div class="mt-8 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 rounded-md max-w-md text-center">
                <p class="text-sm font-medium">
                    Próximamente agregaremos más tarjetas e información clave en este espacio. 🏗️
                </p>
            </div>
        </div>
        
    </div>

@endsection