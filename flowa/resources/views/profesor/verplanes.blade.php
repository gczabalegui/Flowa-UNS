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
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Nombre de la materia</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Profesor</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Año del plan</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Estado del plan</th>                            
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($planes as $plan)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $plan->anio }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($plan->estado == 'Aprobado por secretaría académica.') bg-green-100 text-green-800
                                        @elseif(str_contains($plan->estado, 'Rechazado')) bg-red-100 text-red-800
                                        @elseif(str_contains($plan->estado, 'Incompleto')) bg-yellow-100 text-yellow-800
                                        @else bg-blue-100 text-blue-800
                                        @endif">
                                        {{ $plan->estado }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('profesor.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center px-3 py-1.5 border border-blue-600 text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            Vista previa
                                        </a>
                                        @if(in_array($plan->estado, [
                                            'Completo por administración.',
                                            'Rechazado para profesor por secretaría académica.',
                                            'Incompleto por profesor.',
                                            'Rectificado por administración para profesor.',
                                            'Aprobado por secretaría académica.'
                                        ]))
                                            <a href="{{ route('profesor.editarplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center px-3 py-1.5 border border-yellow-600 text-sm font-medium rounded-md text-yellow-600 bg-white hover:bg-yellow-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                                                Editar
                                            </a>
                                        @else
                                            <button class="inline-flex items-center justify-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed" disabled>
                                                Editar
                                            </button>
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