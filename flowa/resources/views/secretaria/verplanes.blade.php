@extends('secretaria.layouts.secretaria-layout')

@section('title', 'Ver programas de materias')

@section('content')
<div class="min-h-screen px-4 sm:px-8 lg:px-12 xl:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Programas de materias</h1>
            <p class="text-gray-600 mt-2">Listado de todos los programas para revisión y consulta</p>
        </div>

        <div>
            <div class="hidden lg:block bg-white rounded-lg shadow border border-gray-200">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200 bg-gray-50">
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nombre de la materia</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Profesor responsable</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Año del programa</th>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Estado del programa</th>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($planes as $plan)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-900 text-left">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 text-left">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 text-left">{{ $plan->anio }}</td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($plan->estado == 'Aprobado por secretaría académica.') bg-green-100 text-green-800
                                            @elseif(str_contains($plan->estado, 'Rechazado')) bg-red-100 text-red-800
                                            @elseif(str_contains($plan->estado, 'Incompleto')) bg-yellow-100 text-yellow-800
                                            @else bg-blue-100 text-blue-800
                                            @endif">
                                            {{ $plan->estado }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-center">
                                        <div class="flex flex-col items-center gap-2 w-full">
                                            @if($plan->estado === 'Aprobado por secretaría académica.')
                                            <a href="{{ route('secretaria.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
                                                hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                VER
                                            </a>
                                            @else
                                            <a href="{{ route('secretaria.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
                                                hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                REVISAR
                                            </a>
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
            
            <div class="lg:hidden space-y-4">
                @foreach($planes as $plan)
                <div class="p-4 bg-white rounded-lg shadow border border-gray-200 hover:shadow-md transition duration-200 text-center
                            w-full sm:max-w-md sm:mx-auto"> 
                    
                    <div class="flex flex-wrap justify-center items-start border-b border-gray-100 pb-2 mb-2">
                        <div class="text-base font-bold text-gray-900">
                            {{ $plan->materia->nombre_materia }}
                        </div>
                        <div class="text-sm font-medium text-gray-500 mt-0.5 ml-1">
                            ({{ $plan->materia->codigo_materia }})
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="text-sm text-gray-700">
                            <span class="font-semibold">Profesor:</span> 
                            {{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}
                        </div>
                        <div class="text-sm text-gray-700">
                            <span class="font-semibold">Año:</span> {{ $plan->anio }}
                        </div>

                        <div class="flex items-center pt-1 justify-center">
                            <span class="text-sm font-semibold text-gray-700 mr-2">Estado:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($plan->estado == 'Aprobado por secretaría académica.') bg-green-100 text-green-800
                                @elseif(str_contains($plan->estado, 'Rechazado')) bg-red-100 text-red-800
                                @elseif(str_contains($plan->estado, 'Incompleto')) bg-yellow-100 text-yellow-800
                                @else bg-blue-100 text-blue-800
                                @endif">
                                {{ $plan->estado }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 pt-4 justify-center border-t border-gray-100 mt-4">
                        @if($plan->estado === 'Aprobado por secretaría académica.')
                        <a href="{{ route('secretaria.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-full sm:w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
                            hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            VER
                        </a>
                        @else
                        <a href="{{ route('secretaria.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-full sm:w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
                            hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            REVISAR
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<div class="h-16"></div>
@endsection