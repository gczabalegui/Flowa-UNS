<!DOCTYPE html>
<html data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ver planes pendientes de revisión</title>
</head>
<body>
@include('profesor.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form action="/profesor/verplanes" method="GET">
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
                            <td class="border px-4 py-2 text-center" >{{ $plan->materia->nombre_materia }}</td>
                            <td class="border px-4 py-2 text-center">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</td>
                            <td class="border px-4 py-2 text-center">{{ $plan->anio }}</td>
                            <td class="border px-4 py-2 text-center">{{ $plan->estado }}</td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex flex-col space-y-2">
                                    <a href="{{ route('profesor.traerinfoplan', ['id' => $plan->id]) }}" class="btn btn-info">Vista previa</a>
                                    @if(in_array($plan->estado, [
                                        'Completo por administración.',
                                        'Rechazado para profesor por secretaría académica.',
                                        'Incompleto por profesor.',
                                        'Rectificado por administración para profesor.'
                                    ]))
                                        <a href="{{ route('profesor.editarplan', ['id' => $plan->id]) }}" class="btn btn-warning">Editar</a>
                                    @else
                                        <button class="btn btn-warning" disabled>Editar</button>
                                    @endif
                                </div>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </form>    
    </div>
</body>
</html>