<!DOCTYPE html>
<html data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar plan</title>
</head>

<body>
    @include('administracion.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-6xl mx-auto mt-12">
        <form action="{{ route('administracion.updateplan', ['id' => $plan->id]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Editar plan</h2>

                <div class="my-3">
                    <label class="label"><span class="label-text">Materia</span></label>
                    <input type="text" class="input input-bordered w-full" 
                           value="{{ $plan->materia->nombre_materia }}" readonly>
                    <input type="hidden" name="materia_id" value="{{ $plan->materia_id }}">
                </div>

                <div class="my-3">
                    <label class="label" style="font-weight: bold;"><span class="label-text">Profesor</span></label>
                    <input id="profesor" type="text" class="input input-bordered w-full" readonly 
                           value="{{ $plan->materia->profesor->apellido_profesor }}, {{ $plan->materia->profesor->nombre_profesor }}">
                </div>
                
                <div class="my-3">
                    <label class="label"><span class="label-text">Año</span></label>
                    <select id="anio" name="anio" class="select select-bordered w-full" tabindex="2" required>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ $plan->anio == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Totales</span></label>
                    <input id="horas_totales" name="horas_totales" type="number" min="1" class="input input-bordered w-full"
                        tabindex="3" value="{{ old('horas_totales', $plan->horas_totales) }}" placeholder="Ingrese las horas totales">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Teóricas</span></label>
                    <input id="horas_teoricas" name="horas_teoricas" type="number" min="0" class="input input-bordered w-full"
                        tabindex="4" value="{{ old('horas_teoricas', $plan->horas_teoricas) }}" placeholder="Ingrese las horas teóricas">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Horas Prácticas</span></label>
                    <input id="horas_practicas" name="horas_practicas" type="number" min="0" class="input input-bordered w-full"
                        tabindex="5" value="{{ old('horas_practicas', $plan->horas_practicas) }}" placeholder="Ingrese las horas prácticas">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">DTE</span></label>
                    <input id="DTE" name="DTE" type="number" min="0" class="input input-bordered w-full"
                        tabindex="6" value="{{ old('DTE', $plan->DTE) }}" placeholder="Ingrese el DTE">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">RTF</span></label>
                    <input id="RTF" name="RTF" type="number" min="0" class="input input-bordered w-full"
                        tabindex="7" value="{{ old('RTF', $plan->RTF) }}" placeholder="Ingrese el RTF">
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Créditos Académicos</span></label>
                    <input id="creditos_academicos" name="creditos_academicos" type="number" min="0" class="input input-bordered w-full"
                        tabindex="8" value="{{ old('creditos_academicos', $plan->creditos_academicos) }}" placeholder="Ingrese los créditos académicos">
                </div>

                @if($plan->area_tematica)
                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Área Temática</span></label>
                    <input type="text" class="input input-bordered w-full readonly-field" 
                           value="{{ $plan->area_tematica }}" readonly>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Fundamentación</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 150px; resize: none;" readonly>{{ $plan->fundamentacion }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Conceptuales</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_conceptuales }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Procedimentales</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_procedimentales }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Actitudinales</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_actitudinales }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Objetivos Específicos</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->obj_especificos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Contenidos Mínimos</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->cont_minimos }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Programa Analítico</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->programa_analitico }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Actividades Prácticas</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->act_practicas }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Modalidad</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->modalidad }}</textarea>
                </div>

                <div class="my-3">
                    <label class="label disabled-label"><span class="label-text">Bibliografía</span></label>
                    <textarea class="textarea textarea-bordered w-full readonly-field" 
                              style="height: 100px; resize: none;" readonly>{{ $plan->bibliografia }}</textarea>
                </div>
                @endif

                @php
                    $estadosRechazados = [
                        'Rechazado para administración por secretaría académica.',
                        'Rechazado para profesor por secretaría académica.',
                        'Rechazado para administración por profesor.'
                    ];
                    $esPlanRechazado = in_array($plan->estado, $estadosRechazados);
                @endphp

                <div class="flex justify-center space-x-4 mt-6 mb-6">
                    @if($esPlanRechazado)
                        <div class="tooltip tooltip-top" data-tip="No se puede guardar como borrador. Debe rectificar y enviar.">
                            <button type="button" class="btn btn-warning w-auto text-black opacity-50 cursor-not-allowed" disabled tabindex="9">
                                Guardar borrador
                            </button>
                        </div>
                    @else
                        <button type="submit" name="action" value="guardar_borrador" class="btn btn-warning w-auto text-black" tabindex="9">Guardar borrador</button>
                    @endif
                    
                    <div class="tooltip tooltip-top" data-tip="Complete todos los campos requeridos" id="guardarTooltip">
                        <button type="submit" name="action" value="guardar" class="btn btn-success w-auto text-white" tabindex="10" id="guardarBtn">Guardar</button>
                    </div>
                    <a href="/administracion/verplanes" class="btn btn-secondary w-auto text-black" tabindex="11">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            
            function validateForm() {
                
                const requiredFields = [
                    'materia_id',
                    'anio',
                    'horas_totales', 
                    'horas_teoricas',
                    'horas_practicas',
                    'DTE',
                    'RTF',
                    'creditos_academicos'
                ];
                
                let allFieldsValid = true;
                
                requiredFields.forEach(fieldName => {
                    const field = document.getElementsByName(fieldName)[0];
                    if (!field) {
                        allFieldsValid = false;
                        return;
                    }
                    
                    if (field.value === '' || field.value === null || field.value === undefined) {
                        allFieldsValid = false;
                    }
                });
                
                const guardarBtn = document.querySelector('button[value="guardar"]');
                const guardarTooltip = document.getElementById('guardarTooltip');
                
                if (guardarBtn && guardarTooltip) {
                    guardarBtn.disabled = !allFieldsValid;
                    
                    if (allFieldsValid) {
                        guardarBtn.classList.remove('btn-disabled');
                        guardarBtn.classList.add('btn-success');
                        guardarTooltip.classList.remove('tooltip');
                    } else {
                        guardarBtn.classList.add('btn-disabled');
                        guardarBtn.classList.remove('btn-success');
                        guardarTooltip.classList.add('tooltip', 'tooltip-top');
                    }
                }
            }

            const materiaSelect = document.getElementById('materia_id');
            if (materiaSelect) {
                materiaSelect.addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var profesor = selectedOption.getAttribute('data-profesor');
                    document.getElementById('profesor').value = profesor || '';
                    validateForm(); 
                });
            }
            
            validateForm();
            
            const formInputs = document.querySelectorAll('input[type="number"], select');
            formInputs.forEach(input => {
                input.addEventListener('input', validateForm);
                input.addEventListener('change', validateForm);
            });
        });
    </script>

    <style>
        .readonly-field {
            background-color: #f5f5f5;
            color: #6c757d;
            border-color: #ced4da;
        }

        .disabled-label .label-text {
            color: #6c757d;
            font-weight: bold;
        }

        .btn-disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background-color: #9ca3af !important;
            border-color: #9ca3af !important;
            color: #ffffff !important;
        }

        .btn-disabled:hover {
            background-color: #9ca3af !important;
            border-color: #9ca3af !important;
            color: #ffffff !important;
        }
    </style>
</body>
</html>