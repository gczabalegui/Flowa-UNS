<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ver planes aprobados</title>
</head>

<body>
    @include('comision.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form action="/comision/verplanes" method="GET">
            @csrf
            <div class="mx-5 my-5">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre de la materia</th>
                            <th class="px-4 py-2">Profesor</th>
                            <th class="px-4 py-2">Año del plan</th>
                            <th class="px-4 py-2">Estado del plan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($planes as $plan)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $plan->materia->nombre_materia }} ({{ $plan->materia->codigo_materia }})</td>
                            <td class="border px-4 py-2 text-center">{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}</td>
                            <td class="border px-4 py-2 text-center">{{ $plan->anio }}</td>
                            <td class="border px-4 py-2 text-center">{{ $plan->estado }}</td>
                            <td class="border px-4 py-2 text-center space-x-2">
                                <a href="{{ route('comision.traerinfoplan', ['id' => $plan->id]) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('comision.generarPdf', ['id' => $plan->id]) }}" target="_blank" class="btn btn-success">Generar PDF</a>
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