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
    @include('administracion.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form action="/administracion/crearplan" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo plan de materia</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Materia</span></label>
                    <select name="materia_id" id="materia_id" class="input input-bordered w-full" tabindex="1" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}" data-profesor="{{ $materia->profesor->apellido_profesor }}, {{ $materia->profesor->nombre_profesor }}">{{ $materia->nombre_materia }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Profesor</span></label>
                    <input id="profesor" type="text" class="input input-bordered w-full" readonly>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Año</span></label>
                    <select name="anio" id="anio" class="input input-bordered w-full" tabindex="2" required>
                        <option value="">Seleccione el año</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Horas totales</span> </label>
                    <input id="horas_totales" name="horas_totales" type="number" class="input input-bordered w-full"
                        tabindex="3" required value="{{ old('horas_totales') }}" placeholder="Ingrese las horas totales.">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Horas teóricas</span> </label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" class="input input-bordered w-full"
                        tabindex="4" required value="{{ old('horas_teoricas') }}" placeholder="Ingrese las horas teoricas.">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Horas prácticas</span> </label>
                    <input id="horas_practicas" name="horas_practicas" type="number" class="input input-bordered w-full"
                        tabindex="5" required value="{{ old('horas_practicas') }}" placeholder="Ingrese las horas prácticas">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">DTE</span> </label>
                    <input id="DTE" name="DTE" type="number" class="input input-bordered w-full"
                        tabindex="6" required value="{{ old('DTE') }}" placeholder="Ingrese el DTE">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">RTF</span> </label>
                    <input id="RTF" name="RTF" type="number" class="input input-bordered w-full"
                        tabindex="7" required value="{{ old('RTF') }}" placeholder="Ingrese el RTF">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Créditos académicos</span> </label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" class="input input-bordered w-full"
                        tabindex="8" required value="{{ old('creditos_academicos') }}" placeholder="Ingrese cantidad de créditos académicos">
                </div>
                <div class="flex flex-col items-center mt-4 space-y-2">
                <button type="submit" name="action" value="guardar_borrador" class="btn btn-warning w-1/3 text-black" tabindex="9" onclick="removeRequiredAttributes()">Guardar borrador</button>
                <button type="submit" name="action" value="guardar" class="btn btn-success w-1/3 text-black" tabindex="10">Guardar</button>
                    <button type="button" class="btn btn-secondary w-1/3 text-black" tabindex="11" onclick="window.location.href='/administracion'">Cancelar</button>
                    <!--<button type="submit" name="preview" value="1" class="btn btn-outline">Vista Previa</button>-->

                </div>
            </div>
            <script>
                document.getElementById('materia_id').addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var profesor = selectedOption.getAttribute('data-profesor');
                    document.getElementById('profesor').value = profesor;
                });
            </script>
            <script>
                function removeRequiredAttributes() {
                    const fields = document.querySelectorAll('input');
                    fields.forEach(field => {
                        if (field.id !== 'materia_id' && field.id !== 'profesor') {
                            field.removeAttribute('required');
                        }
                    });
                }
            </script>
        </form>        
    </div>
</body>
</html>