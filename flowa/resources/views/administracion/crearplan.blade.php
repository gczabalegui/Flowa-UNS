<form action="{{ route('plan.store') }}" method="POST">
    @csrf

    <div class="my-3">
        <label class="label disabled-label">
            <span class="label-text">Actividades prácticas</span>
        </label>
        <input type="text" id="act_practicas" name="act_practicas"
               class="input input-bordered w-full readonly-field" readonly>
    </div>

    <div class="my-3">
        <label class="label disabled-label">
            <span class="label-text">Modalidad</span>
        </label>
        <input type="text" id="modalidad" name="modalidad"
               class="input input-bordered w-full readonly-field" readonly>
    </div>

    <div class="my-3">
        <label class="label disabled-label">
            <span class="label-text">Bibliografía</span>
        </label>
        <input type="text" id="bibliografia" name="bibliografia"
               class="input input-bordered w-full readonly-field" readonly>
    </div>

    <div class="flex flex-col items-center mt-4 space-y-2">
        <button type="submit" name="action" value="borrador"
                class="btn btn-warning w-1/3 text-black" tabindex="9">
            Guardar borrador
        </button>

        <button type="submit" name="action" value="guardar"
                class="btn btn-success w-1/3 text-black" tabindex="10">
            Guardar
        </button>

        <button type="button"
                class="btn btn-secondary w-1/3 text-black"
                tabindex="11"
                onclick="window.location.href='/administracion'">
            Cancelar
        </button>

        {{-- Vista previa en nueva pestaña con POST --}}
        <button type="submit"
                formaction="{{ route('plan.preview.pdf') }}"
                formmethod="POST"
                formtarget="_blank"
                class="btn btn-outline">
            Vista Previa
        </button>
    </div>
</form>

<script>
    document.getElementById('materia_id').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var profesor = selectedOption.getAttribute('data-profesor');
        document.getElementById('profesor').value = profesor;
    });
</script>
