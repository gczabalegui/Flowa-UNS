<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear nuevo usuario Coordinador de la Comisión Curricular</title>
</head>

<body>
    @include('secretaria.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/secretaria/crearcomision" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo usuario Coordinador de la Comisión Curricular</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Nombre</span></label>
                    <input id="nombre_comision" name="nombre_comision" type="text" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('nombre_comision') }}" placeholder="Ingrese el nombre">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Apellido</span> </label>
                    <input id="apellido" name="apellido" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('apellido') }}" placeholder="Ingrese el apellido">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">DNI</span> </label>
                    <input id="DNI" name="DNI" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('DNI') }}" placeholder="Ingrese el DNI">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Legajo</span> </label>
                    <input id="legajo" name="legajo" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('legajo') }}" placeholder="Ingrese el legajo">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Cantidad de materias</span> </label>
                    <input id="email" name="email" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('email') }}" placeholder="Ingrese el email">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Carrera</span></label>
                    <input id="carrera_responsable" name="carrera_responsable" type="text" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('carrera_responsable') }}" placeholder="Ingrese el nombre de la carrera de la cual es responsable">
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