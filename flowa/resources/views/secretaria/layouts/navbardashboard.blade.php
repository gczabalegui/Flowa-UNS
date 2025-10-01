<div class="navbar bg-base-100">
    <div class="navbar-start">
    <a href="/secretaria">
            <img src="{{ asset('logouns.png') }}" alt="Logo" class="h-8 w-auto ml-4" style="width: 80px; height: 80px;" >
        </a>
    </div>

    <div class="navbar-center flex items-center justify-center">
        <a href="/secretaria" class="btn btn-primary normal-case text-2xl">Flowa - UNS</a>
    </div>

    <div class="navbar-end">
    <form action="{{ route('cerrar-sesion') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="text-black mr-4 bg-transparent border-none cursor-pointer">Cerrar sesión</button>
    </form>
</div>
</div>

</div>