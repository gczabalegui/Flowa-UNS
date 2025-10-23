<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .navbar {
            order: -1;
            /* Cambiado de 1 a -1 */
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: -10rem;
            /* Puedes ajustar el valor según sea necesario */
        }
    </style>

    <title>Cargar programa de materia anterior</title>
</head>

<body>
    @include('administracion.layouts.navbar')
    <div class="container mx-auto">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-2xl font-bold">Cargar programa de materia</h2>
            </div>
            <div class="panel-body">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Hubo un problema al subir el archivo.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('archivo.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Nombre materia - versión</label>
                            <input type="text" name="title" id="title" class="mt-1 p-2 block w-full rounded-md border-2">
                        </div>

                        <div>
                            <label for="pdf_file" class="block text-sm font-medium text-gray-700">PDF File</label>
                            <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" class="mt-1 p-2 block w-full rounded-md border-2">
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <button type="submit" class="btn btn-success">Cargar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>