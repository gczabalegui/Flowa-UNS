<!DOCTYPE html>
<html data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ver los planes de materia existentes</title>
</head>
<body>
@include('administracion.layouts.navbar')

@if(session('estado'))
    <div class="alert alert-success shadow-lg my-4 w-1/2 mx-auto flex items-center text-white" style="justify-content: flex-start;">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9" stroke="white" stroke-width="2" fill="none"/>
            <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="text-lg">{{ session('estado') }}</span>
    </div>
@endif

    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        @csrf
        <div class="mx-5 my-5">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nombre de la materia</th>
                        <th class="px-4 py-2">Profesor</th>
                        <th class="px-4 py-2">Año del plan</th>
                        <th class="px-4 py-2">Estado del plan</th>
                        <th class="px-4 py-2">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planes as $plan)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $plan->materia->nombre_materia }}</td>
                        <td class="border px-4 py-2 text-center">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</td>
                        <td class="border px-4 py-2 text-center">{{ $plan->anio }}</td>
                        <td class="border px-4 py-2 text-center">{{ $plan->estado }}</td>
                        <td class="border px-4 py-2 text-center">
                        <td class="flex flex-col space-y-2">
                            <a href="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" class="btn btn-info">Vista previa</a>
                                @if($plan->estado === 'Incompleto por administración.' || $plan->estado === 'Rechazado para administración por profesor.' || $plan->estado === 'Rechazado para administración por secretaría.') 
                                    <a href="{{ route('administracion.traerinfoplan', ['id' => $plan->id]) }}" class="btn btn-warning">Editar</a>
                                @else
                                    <button class="btn btn-warning" disabled>Editar</button>
                                @endif                               
                                <form action="{{ route('administracion.eliminarplan', ['id' => $plan->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este plan de la materia?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error">Eliminar</button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
</body>
</html>