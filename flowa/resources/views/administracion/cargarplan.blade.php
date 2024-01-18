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

    <title>Cargar plan anterior</title>
</head>

<body>
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <ul class="menu menu-horizontal p-0">
                    <li tabindex="0">
                        <a>
                            Operaciones
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                            </svg>
                        </a>
                        <ul class="p-2 bg-base-100 z-50">
                        <li><a href="/administracion/crearplan">Crear nuevo plan de materia</a></li>
                        <li><a href="/administracion/modificarplan">Modificar plan de materia</a></li>
                        <li><a href="/administracion/eliminarplan">Eliminar plan de materia</a></li>
                        <li><a href="/administracion/crearsecretaria">Crear usuario de Secretaría Académica</a></li>
                        <li><a href="/administracion/crearprofesor">Crear usuario Administración</a></li>
                        <li><a href="/administracion/cargarplan">Cargar plan de materia - versión anterior</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="navbar-center flex items-center justify-center">
                <a class="btn btn-primary normal-case text-2xl">Flowa - UNS</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-2xl font-bold">Cargar plan de materia</h2>
            </div>
            <div class="panel-body">

                @if (Session::get('message'))
                <div class="alert alert-success alert-block">
                    <strong>{{Session::get('message')}}</strong>
                </div>
                @endif

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