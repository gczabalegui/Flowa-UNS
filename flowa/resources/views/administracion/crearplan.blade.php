<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear nuevo plan de materia</title>
</head>

<body>
    @include('administrador.layouts.navbar')
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

    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administracion/crearplan" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo plan de materia</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">AÑO</span></label>
                    <input id="anio" name="anio" type="number" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('anio') }}" placeholder="Ingrese el anio">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">HORAS TOTALES</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales.">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">HORAS TEORICAS</span> </label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('horas_teoricas') }}" placeholder="Ingrese las horas teoricas.">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">HORAS PRACTICAS</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">DTE</span> </label>
                    <input id="DTE" name="DTE" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('DTE') }}" placeholder="Ingrese el DTE">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">RTF</span> </label>
                    <input id="RTF" name="RTF" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('RTF') }}" placeholder="Ingrese el RTF">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">CRÉDITOS ACADÉMICOS</span> </label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">CRÉDITOS ACADÉMICOS</span> </label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">ÁREA TEMÁTICA</span> </label>
                    <input id="area_tematica" name="area_tematica" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('area_tematica') }}" placeholder="Seleccione el área temática">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">FUNDAMENTACIÓN</span> </label>
                    <input id="fundamentacion" name="fundamentacion" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('fundamentacion') }}" placeholder="Ingrese una fundamentación">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">CONTENIDOS MÍNIMOS</span> </label>
                    <input id="cont_minimos" name="cont_minimos" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('cont_minimos') }}" placeholder="Ingrese los contenidos mínimos">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">PROGRAMA ANALÍTICO</span> </label>
                    <input id="programa_analitico" name="programa_analitico" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('programa_analitico') }}" placeholder="Ingrese un detalle del programa analítico">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">ACTIVIDADES PRÁCTICAS</span> </label>
                    <input id="act_practicas" name="act_practicas" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('act_practicas') }}" placeholder="Ingrese un detalle de las actividades prácticas">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">MODALIDAD</span> </label>
                    <input id="modalidad" name="modalidad" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('modalidad') }}" placeholder="Ingrese la modalidad">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">BIBLIOGRAFÍA</span> </label>
                    <input id="bibliografia" name="bibliografia" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('bibliografia') }}" placeholder="Ingrese la bibliografía">
                </div>
                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administracion" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
                </div>
            </div>
        </form>
</body>

</html>