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
                        <li><a href="/administracion/crearmateria">Crear materia</a></li>
                        <li><a href="/administracion/crearcarrera">Crear carrera</a></li>
                        <li><a href="/administracion/crearplan">Crear programa de materia</a></li>
                        <li><a href="/administracion/crearsecretaria">Crear usuario Secretaría Académica</a></li>
                        <li><a href="/administracion/crearadministrativo">Crear usuario Administración</a></li>
                        <li><a href="/administracion/crearprofesor">Crear usuario Profesor</a></li>
                        <li><a href="/administracion/crearcomision">Crear usuario Coordinador Comisión Curricular</a></li>
                        <li><a href="/administracion/modificarplan">Modificar programa de materia</a></li>
                        <li><a href="/administracion/eliminarplan">Eliminar programa de materia</a></li>
                        <li><a href="/administracion/creardepartamento">Crear departamento</a></li>
                        <li><a href="/administracion/verplanes">Ver programas existentes</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="navbar-center flex items-center justify-center">
        <a href="/administracion" class="btn btn-primary normal-case text-2xl">Flowa - UNS</a>
    </div>

    <div class="navbar-end">
        <a href="{{ route('cerrar-sesion') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-black mr-4">Cerrar sesión</a>

        <form id="logout-form" action="{{ route('cerrar-sesion') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</div>

{{-- Notificación Popup --}}
@include('components.notification-popup')
@include('components.confirm-modal')