<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <ul class="menu menu-horizontal p-0">
                <li tabindex="0">
                    <a>
                        Operaciones
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2 bg-base-100 z-50">
                    <li><a href="/administracion/crearplan">Crear nuevo plan de materia</a></li>
                    <li><a href="/administracion/crearprofesor">Crear nuevo profesor</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!--
        <div class="dropdown">
            <ul class="menu menu-horizontal p-0">
                <li tabindex="0">
                    <a>
                        Consultas
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2 bg-base-100 z-50">
                        <li><a href="/alumno/miscarreras">Ver mis carreras</a></li>
                        <li><a href="/alumno/misfinales">Ver mis inscripciones a finales</a></li>
                        <li><a href="/alumno/mismaterias">Ver mis materias</a></li>
                        <li><a href="/alumno/historiaacademica">Ver mi historia académica</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-center">
        <a class="btn btn-primary normal-case text-2xl">Universidad Estatal</a>
    </div>
    <div class="navbar-end "> 
-->

<!--
        <ul class="menu menu-horizontal p-0">
            <li tabindex="0">
                <a>
                {{ Auth::user()->nombre}}  {{Auth::user()->apellido }}
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24">
                        <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                </a>
                <ul class="btn btn-outline">
                    <li>
                        <form id="logout-form" action="{{ route('alumno.logout') }}" method="POST">
                            <a onclick="document.getElementById('logout-form').submit();">
                                <span class=" ">Cerrar sesión</span>
                            </a>
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
-->
</div>
