@extends('comision.layouts.comision-layout')
@section('title', 'Ver Planes de Materia')

@section('content')
<div class="flex w-full p-6" x-data="{ sidebarOpen: true }">
    <div :class="sidebarOpen ? 'w-full' : 'w-full'">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Planes de materias</h1>
            <p class="text-gray-600 mt-2">Consultá los planes aprobados por secretaría académica.</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div :class="sidebarOpen ? 'transition-all duration-500' : 'transition-all duration-500'">
                <table class="w-full border-collapse" x-bind:class="sidebarOpen ? '' : 'w-full'">
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
                                    @if(str_contains($plan->estado, 'Completo') || str_contains($plan->estado, 'Aprobado'))
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
                                    <!-- Botón Ver -->
                                    <a href="{{ route('comision.traerinfoplan', ['id' => $plan->id]) }}" class="inline-flex items-center justify-center w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
          hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                        VER
                                    </a>

                                    <!-- Botón Generar PDF con estilo clean -->
                                    <a href="{{ route('comision.generarPdf', ['id' => $plan->id]) }}" target="_blank" class="inline-flex items-center justify-center w-32 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white 
          hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                        GENERAR PDF
                                    </a>


                                    <!-- Ejemplo deshabilitado -->
                                    {{--
                                    <span class="inline-flex items-center justify-center px-4 py-2 border border-gray-200 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed opacity-70">
                                        GENERAR PDF
                                    </span> 
                                    --}}
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
@endsection