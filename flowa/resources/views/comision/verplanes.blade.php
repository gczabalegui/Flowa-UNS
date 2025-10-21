@extends('comision.layouts.comision-layout')
@section('title', 'Ver Planes de Materia')

@section('content')
<div class="flex justify-center w-full p-6">
    <div class="w-full max-w-6xl ml-24"> {{-- <-- margen izquierdo moderado --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Planes de materias</h1>
            <p class="text-gray-600 mt-2">Consulta los planes aprobados por secretaría académica</p>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse min-w-[1000px]">
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
                                    <a href="{{ route('comision.traerinfoplan', ['id' => $plan->id]) }}" class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded text-white bg-blue-600 hover:bg-blue-700 transition">
                                        VER
                                    </a>

                                    <a href="{{ route('comision.generarPdf', ['id' => $plan->id]) }}" target="_blank" class="w-28 inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded text-white bg-green-600 hover:bg-green-700 transition">
                                        Generar PDF
                                    </a>
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