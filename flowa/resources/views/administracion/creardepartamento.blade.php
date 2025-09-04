<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear nuevo departamento</title>
</head>

<body>
    @include('administracion.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administracion/creardepartamento" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo departamento</h2>
                <div class="my-3">
                <div class="my-3">
                    <label class="label"><span class="label-text">Código</span></label>
                    <input id="codigo_departamento" name="codigo_departamento" type="number" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('codigo_departamento') }}" placeholder="Ingrese el código del departamento">
                </div>
                    <label class="label"><span class="label-text">Nombre</span> </label>
                    <input id="nombre_departamento" name="nombre_departamento" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('nombre_departamento') }}" placeholder="Ingrese el nombre del departamento">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Dirección</span> </label>
                    <div class="grid grid-cols-2 gap-4">
                        <input id="calle_departamento" name="calle_departamento" type="text" class="input input-bordered w-full" tabindex="3" required value="{{ old('calle_departamento') }}" placeholder="Ingrese la calle">
                        <input id="numero_departamento" name="numero_departamento" type="number" class="input input-bordered w-full" tabindex="4" required value="{{ old('numero_departamento') }}" placeholder="Ingrese el número">
                    </div>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Sitio Web</span> </label>
                    <input id="sitio_web_departamento" name="sitio_web_departamento" type="url" class="input input-bordered w-full" tabindex="5" required value="{{ old('sitio_web_departamento') }}" placeholder="Ingrese el sitio web">
                </div>
                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administracion" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
                </div>
            </div>
        </form>
    </div>   
</body>

</html>