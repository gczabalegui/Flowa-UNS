@extends('profesor.layouts.profesor-layout')

@section('title', 'Ver planes de materia')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Mis planes de materia</h1>
            <p class="text-gray-600 mt-2">Listado de todos tus planes de materia</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de la materia</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profesor</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-[80px]">Año</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Operaciones</th>
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
                                        @if(str_contains($plan->estado, 'Aprobado'))
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
                                    <div class="flex flex-col items-center gap-2 w-full">
                                        <!-- Botón Vista previa -->
                                        <a href="{{ route('profesor.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
                                           hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            VISTA PREVIA
                                        </a>

                                        <!-- Botón Editar -->
                                        @if(in_array($plan->estado, [
                                        'Completo por administración.',
                                        'Rechazado para profesor por secretaría académica.',
                                        'Incompleto por profesor.',
                                        'Rectificado por administración para profesor.',
                                        'Aprobado por secretaría académica.'
                                        ]))
                                        <a href="{{ route('profesor.editarplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-32 px-4 py-2 border border-yellow-600 text-sm font-medium rounded-md text-yellow-600 bg-white 
                                               hover:bg-yellow-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                                            EDITAR
                                        </a>
                                        @else
                                        <span class="inline-flex items-center justify-center w-32 px-4 py-2 border border-gray-200 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed opacity-70">
                                            EDITAR
                                        </span>
                                        @endif
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
</div>

<!-- Espacio adicional al final de la página -->
<div class="h-16"></div>
@endsection