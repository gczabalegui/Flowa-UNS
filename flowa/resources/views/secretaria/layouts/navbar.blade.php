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
                        <li><a href="/secretaria/crearsecretaria">Crear usuario secretaría académica</a></li>
                        <li><a href="/secretaria/crearprofesor">Crear usuario profesor</a></li>
                        <li><a href="/secretaria/crearcomision">Crear usuario coordinador comisión curricular</a></li>
                        <li><a href="/secretaria/verplanes">Crear usuario coordinador comisión curricular</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-center flex items-center justify-center">
        <a href="/secretaria" class="btn btn-primary normal-case text-2xl">Flowa - UNS</a>
    </div>

    <div class="navbar-end">
        <a href="{{ route('cerrar-sesion') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-black mr-4">Cerrar sesión</a>

        <form id="logout-form" action="{{ route('cerrar-sesion') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

</div>

{{-- Notificación Popup --}}
@include('components.notification-popup')
@include('components.confirm-modal')