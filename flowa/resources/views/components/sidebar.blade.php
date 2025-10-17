{{-- Componente de barra lateral moderna --}}{{-- Componente de barra lateral moderna --}}{{-- Componente de barra lateral moderna --}}{{-- Componente de barra lateral moderna desplegable --}}{{-- Componente de barra lateral moderna desplegable --}}

@props(['userRole' => 'admin'])

@props(['userRole' => 'admin'])

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

@props(['userRole' => 'admin'])

<div class="md:flex flex-col md:flex-row md:min-h-screen w-full">

  <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white flex-shrink-0" x-data="{ open: false }"><script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">

      @if ($userRole === 'admin')@props(['userRole' => 'admin'])@props(['userRole' => 'admin'])

        <a href="/administracion" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

      @elseif ($userRole === 'profesor')<div class="md:flex flex-col md:flex-row md:min-h-screen w-full">

        <a href="/profesor" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

      @elseif ($userRole === 'secretaria')  <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white flex-shrink-0" x-data="{ open: false }"><script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <a href="/secretaria" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

      @elseif ($userRole === 'comision')    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">

        <a href="/comision" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

      @endif      @if ($userRole === 'admin')

      <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">

        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">        <a href="/administracion" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>

          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>      @elseif ($userRole === 'profesor')<div class="md:flex flex-col md:flex-row md:min-h-screen w-full" x-data="{ sidebarOpen: false }">

        </svg>

      </button>        <a href="/profesor" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

    </div>

          @elseif ($userRole === 'secretaria')  <div @click.away="sidebarOpen = false" <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script><script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">

      <!-- Dashboard Link -->        <a href="/secretaria" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

      @if ($userRole === 'admin')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion">Dashboard</a>      @elseif ($userRole === 'comision')       class="flex flex-col text-gray-700 bg-white shadow-lg flex-shrink-0 transition-all duration-300"

      @elseif ($userRole === 'profesor')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profesor">Dashboard</a>        <a href="/comision" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowa</a>

      @elseif ($userRole === 'secretaria')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria">Dashboard</a>      @endif       :class="sidebarOpen ? 'w-full md:w-64' : 'w-full md:w-64'"

      @elseif ($userRole === 'comision')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/comision">Dashboard</a>      <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">

      @endif

        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">       x-show="sidebarOpen || window.innerWidth >= 768">

      <!-- Opciones específicas por rol -->

      @if ($userRole === 'admin')          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>

        <!-- Ver Planes -->

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/verplanes">Ver Planes</a>          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>    <div x-data="{ <div x-data="{ 

        

        <!-- Crear Nuevo - Dropdown -->        </svg>

        <div @click.away="createOpen = false" class="relative" x-data="{ createOpen: false }">

          <button @click="createOpen = !createOpen" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">      </button>    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between border-b border-gray-200">

            <span>Crear Nuevo</span>

            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': createOpen, 'rotate-0': !createOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">    </div>

              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>

            </svg>          <a href="/administracion" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">    sidebarOpen: false,     sidebarOpen: false, 

          </button>

          <div x-show="createOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">

            <div class="px-2 py-2 bg-white rounded-md shadow">

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearplan">Crear Plan</a>      <!-- Dashboard Link -->        Flowa

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearmateria">Crear Materia</a>

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearcarrera">Crear Carrera</a>      @if ($userRole === 'admin')

            </div>

          </div>        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion">Dashboard</a>      </a>    sidebarExpanded: false,    sidebarExpanded: false,

        </div>

      @elseif ($userRole === 'profesor')

        <!-- Gestión de Usuarios - Dropdown -->

        <div @click.away="usersOpen = false" class="relative" x-data="{ usersOpen: false }">        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profesor">Dashboard</a>      <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="sidebarOpen = !sidebarOpen">

          <button @click="usersOpen = !usersOpen" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

            <span>Gestión de Usuarios</span>      @elseif ($userRole === 'secretaria')

            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': usersOpen, 'rotate-0': !usersOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">

              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria">Dashboard</a>        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">    userRole: '{{ $userRole }}'     userRole: '{{ $userRole }}' 

            </svg>

          </button>      @elseif ($userRole === 'comision')

          <div x-show="usersOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">

            <div class="px-2 py-2 bg-white rounded-md shadow">        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/comision">Dashboard</a>          <path x-show="!sidebarOpen" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearsecretaria">Crear Secretaría</a>

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearadministrativo">Crear Administración</a>      @endif

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearprofesor">Crear Profesor</a>

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearcomision">Crear Comisión</a>          <path x-show="sidebarOpen" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>}" class="flex min-h-screen bg-gray-50">}" class="flex min-h-screen bg-gray-50">

            </div>

          </div>      <!-- Opciones específicas por rol -->

        </div>

      @if ($userRole === 'admin')        </svg>

        <!-- Otras opciones -->

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/cargarplan">Cargar Plan Excel</a>        <!-- Ver Planes -->

      @endif

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/verplanes">Ver Planes</a>      </button>        

      @if ($userRole === 'profesor')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profesor/verplanes">Ver Planes</a>        

      @endif

        <!-- Crear Nuevo - Dropdown -->    </div>

      @if ($userRole === 'secretaria')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/crearsecretaria">Crear Secretaría</a>        <div @click.away="createOpen = false" class="relative" x-data="{ createOpen: false }">

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/crearprofesor">Crear Profesor</a>

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/crearcomision">Crear Comisión</a>          <button @click="createOpen = !createOpen" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">        <!-- Mobile menu overlay -->    <!-- Mobile menu overlay -->

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/verplanes">Listar Planes</a>

      @endif            <span>Crear Nuevo</span>



      @if ($userRole === 'comision')            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': createOpen, 'rotate-0': !createOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">    <nav :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/comision/verplanes">Ver Planes de Materias</a>

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/comision/pdfprueba">Crear PDF Prueba</a>              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>

      @endif

            </svg>      <!-- Dashboard -->    <div x-show="sidebarOpen"     <div x-show="sidebarOpen" 

      <!-- Logout -->

      <div class="mt-8 pt-4 border-t border-gray-200">          </button>

        <form action="{{ route('logout') }}" method="POST">

          @csrf          <div x-show="createOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">      @if ($userRole === 'admin')

          <button type="button" 

                  onclick="showConfirmModal('Cerrar Sesión', '¿Estás seguro de que deseas cerrar sesión?', () => this.closest('form').submit())"            <div class="px-2 py-2 bg-white rounded-md shadow">

                  class="block w-full text-left px-4 py-2 text-sm font-semibold text-red-600 bg-transparent rounded-lg hover:text-red-800 hover:bg-red-50 focus:outline-none focus:shadow-outline">

            Cerrar sesión              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearplan">Crear Plan</a>        <a href="/administracion"          @click="sidebarOpen = false"         @click="sidebarOpen = false"

          </button>

        </form>              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearmateria">Crear Materia</a>

      </div>

    </nav>              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearcarrera">Crear Carrera</a>           class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

  </div>

            </div>

  <!-- Contenido principal -->

  <div class="flex-1 bg-gray-50">          </div>            Dashboard         x-transition:enter="transition-opacity ease-linear duration-300"         x-transition:enter="transition-opacity ease-linear duration-300"

    @if (session('success'))

        @include('components.notification-popup', ['type' => 'success', 'message' => session('success')])        </div>

    @endif

    @if (session('error'))        </a>

        @include('components.notification-popup', ['type' => 'error', 'message' => session('error')])

    @endif        <!-- Gestión de Usuarios - Dropdown -->

    

    @include('components.confirm-modal')        <div @click.away="usersOpen = false" class="relative" x-data="{ usersOpen: false }">      @endif         x-transition:enter-start="opacity-0"         x-transition:enter-start="opacity-0"

    

    {{ $content ?? '' }}          <button @click="usersOpen = !usersOpen" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

  </div>

</div>            <span>Gestión de Usuarios</span>

            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': usersOpen, 'rotate-0': !usersOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">

              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>      @if ($userRole === 'profesor')         x-transition:enter-end="opacity-100"         x-transition:enter-end="opacity-100"

            </svg>

          </button>        <a href="/profesor" 

          <div x-show="usersOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">

            <div class="px-2 py-2 bg-white rounded-md shadow">           class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">         x-transition:leave="transition-opacity ease-linear duration-300"         x-transition:leave="transition-opacity ease-linear duration-300"

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearsecretaria">Crear Secretaría</a>

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearadministrativo">Crear Administración</a>            Dashboard

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearprofesor">Crear Profesor</a>

              <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/crearcomision">Crear Comisión</a>        </a>         x-transition:leave-start="opacity-100"         x-transition:leave-start="opacity-100"

            </div>

          </div>      @endif

        </div>

         x-transition:leave-end="opacity-0"         x-transition:leave-end="opacity-0"

        <!-- Otras opciones -->

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/administracion/cargarplan">Cargar Plan Excel</a>      @if ($userRole === 'secretaria')

      @endif

        <a href="/secretaria"          class="fixed inset-0 z-30 bg-gray-600 bg-opacity-75 lg:hidden">         class="fixed inset-0 z-30 bg-gray-600 bg-opacity-75 lg:hidden">

      @if ($userRole === 'profesor')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profesor/verplanes">Ver Planes</a>           class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

      @endif

            Dashboard    </div>    </div>

      @if ($userRole === 'secretaria')

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/crearsecretaria">Crear Secretaría</a>        </a>

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/crearprofesor">Crear Profesor</a>

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/crearcomision">Crear Comisión</a>      @endif

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/secretaria/verplanes">Listar Planes</a>

      @endif



      @if ($userRole === 'comision')      @if ($userRole === 'comision')    <!-- Sidebar -->    <!-- Sidebar -->

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/comision/verplanes">Ver Planes de Materias</a>

        <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/comision/pdfprueba">Crear PDF Prueba</a>        <a href="/comision" 

      @endif

           class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"

      <!-- Logout -->

      <div class="mt-8 pt-4 border-t border-gray-200">            Dashboard

        <form action="{{ route('logout') }}" method="POST">

          @csrf        </a>         @mouseenter="sidebarExpanded = true"         @mouseenter="sidebarExpanded = true"

          <button type="button" 

                  onclick="showConfirmModal('Cerrar Sesión', '¿Estás seguro de que deseas cerrar sesión?', () => this.closest('form').submit())"      @endif

                  class="block w-full text-left px-4 py-2 text-sm font-semibold text-red-600 bg-transparent rounded-lg hover:text-red-800 hover:bg-red-50 focus:outline-none focus:shadow-outline">

            Cerrar sesión         @mouseleave="sidebarExpanded = false"         @mouseleave="sidebarExpanded = false"

          </button>

        </form>      <!-- Opciones específicas por rol -->

      </div>

    </nav>      @if ($userRole === 'admin')         class="fixed inset-y-0 left-0 z-40 bg-white shadow-lg transform transition-all duration-300 ease-in-out          class="fixed inset-y-0 left-0 z-40 bg-white shadow-lg transform transition-all duration-300 ease-in-out 

  </div>

        <!-- Plans section -->

  <!-- Contenido principal -->

  <div class="flex-1 bg-gray-50">        <div class="mt-4">                lg:translate-x-0 lg:static lg:inset-0 flex flex-col"                lg:translate-x-0 lg:static lg:inset-0 flex flex-col"

    @if (session('success'))

        @include('components.notification-popup', ['type' => 'success', 'message' => session('success')])            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Planes</h3>

    @endif

    @if (session('error'))            <div class="mt-2 space-y-1">         :class="sidebarExpanded || sidebarOpen ? 'w-64' : 'w-16'">         :class="sidebarExpanded || sidebarOpen ? 'w-64' : 'w-16'">

        @include('components.notification-popup', ['type' => 'error', 'message' => session('error')])

    @endif                <a href="/administracion/verplanes" 

    

    @include('components.confirm-modal')                   class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">                

    

    {{ $content ?? '' }}                    Ver Planes

  </div>

</div>                </a>        <!-- Logo/Header -->        <!-- Logo/Header -->

                <a href="/administracion/crearplan" 

                   class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">        <div class="flex items-center justify-between h-16 px-4 bg-orange-500 text-white flex-shrink-0">        <div class="flex items-center justify-between h-16 px-4 bg-orange-500 text-white flex-shrink-0">

                    Crear Plan

                </a>            <div class="flex items-center">            <div class="flex items-center">

                <a href="/administracion/cargarplan" 

                   class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">                <svg class="w-8 h-8 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">                <svg class="w-8 h-8 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">

                    Cargar Plan Excel

                </a>                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>

            </div>

        </div>                </svg>                </svg>



        <!-- Management section -->                <h1 x-show="sidebarExpanded || sidebarOpen"                 <h1 x-show="sidebarExpanded || sidebarOpen" 

        <div class="mt-4">

            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Gestión</h3>                    x-transition:enter="transition-opacity duration-300"                    x-transition:enter="transition-opacity duration-300"

            <div class="mt-2 space-y-1">

                <a href="/administracion/crearmateria"                     x-transition:enter-start="opacity-0"                    x-transition:enter-start="opacity-0"

                   class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                    Crear Materia                    x-transition:enter-end="opacity-100"                    x-transition:enter-end="opacity-100"

                </a>

                <a href="/administracion/crearcarrera"                     x-transition:leave="transition-opacity duration-300"                    x-transition:leave="transition-opacity duration-300"

                   class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                    Crear Carrera                    x-transition:leave-start="opacity-100"                    x-transition:leave-start="opacity-100"

                </a>

            </div>                    x-transition:leave-end="opacity-0"                    x-transition:leave-end="opacity-0"



            <!-- Users subsection -->                    class="ml-3 text-xl font-bold whitespace-nowrap">Flowa</h1>                    class="ml-3 text-xl font-bold whitespace-nowrap">Flowa</h1>

            <div class="mt-4">

                <h4 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Usuarios</h4>            </div>            </div>

                <div class="mt-2 space-y-1">

                    <a href="/administracion/crearsecretaria"             <button @click="sidebarOpen = false" class="lg:hidden">            <button @click="sidebarOpen = false" class="lg:hidden">

                       class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                        Crear Secretaría                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    </a>

                    <a href="/administracion/crearadministrativo"                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

                       class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                        Crear Administración                </svg>                </svg>

                    </a>

                    <a href="/administracion/crearprofesor"             </button>            </button>

                       class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                        Crear Profesor        </div>        </div>

                    </a>

                    <a href="/administracion/crearcomision" 

                       class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                        Crear Comisión        <!-- Navigation -->        <!-- Navigation -->

                    </a>

                </div>        <nav class="flex-1 mt-8 px-2 space-y-2 overflow-y-auto">        <nav class="flex-1 mt-8 px-2 space-y-2 overflow-y-auto">

            </div>

        </div>            <!-- Dashboard -->            <!-- Dashboard según el rol -->

      @endif

            <div class="space-y-1">            <template x-if="userRole === 'admin'">

      @if ($userRole === 'profesor')

        <div class="mt-4">                <template x-if="userRole === 'admin'">                <a href="/administracion" 

          <a href="/profesor/verplanes" 

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">                    <a href="/administracion"                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group"

              Ver Planes

          </a>                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                   :class="window.location.pathname === '/administracion' ? 'bg-orange-100 text-orange-600' : ''">

        </div>

      @endif                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">



      @if ($userRole === 'secretaria')                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>

        <div class="mt-4 space-y-1">

          <a href="/secretaria/crearsecretaria"                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

              Crear Secretaría                        </svg>                    </svg>

          </a>

          <a href="/secretaria/crearprofesor"                         <span x-show="sidebarExpanded || sidebarOpen"                     <span x-show="sidebarExpanded || sidebarOpen" 

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

              Crear Profesor                              x-transition:enter="transition-opacity duration-300 delay-100"                          x-transition:enter="transition-opacity duration-300 delay-100"

          </a>

          <a href="/secretaria/crearcomision"                               class="ml-3 whitespace-nowrap">Dashboard</span>                          class="ml-3 whitespace-nowrap">Dashboard</span>

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

              Crear Comisión                    </a>                </a>

          </a>

          <a href="/secretaria/verplanes"                 </template>            </template>

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

              Listar Planes                            

          </a>

        </div>                <template x-if="userRole === 'profesor'">            <template x-if="userRole === 'profesor'">

      @endif

                    <a href="/profesor"                 <a href="/profesor" 

      @if ($userRole === 'comision')

        <div class="mt-4 space-y-1">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group"

          <a href="/comision/verplanes" 

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                   :class="window.location.pathname === '/profesor' ? 'bg-orange-100 text-orange-600' : ''">

              Ver Planes de Materias

          </a>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

          <a href="/comision/pdfprueba" 

             class="block px-4 py-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>

              Crear PDF Prueba

          </a>                        </svg>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>

        </div>

      @endif                        <span x-show="sidebarExpanded || sidebarOpen"                     </svg>

    </nav>

                                  x-transition:enter="transition-opacity duration-300 delay-100"                    <span x-show="sidebarExpanded || sidebarOpen" 

    <!-- Logout section -->

    <div class="border-t border-gray-200 p-4">                              class="ml-3 whitespace-nowrap">Dashboard</span>                          x-transition:enter="transition-opacity duration-300 delay-100"

      <form action="{{ route('logout') }}" method="POST">

        @csrf                    </a>                          class="ml-3 whitespace-nowrap">Dashboard</span>

        <button type="button" 

                onclick="showConfirmModal('Cerrar Sesión', '¿Estás seguro de que deseas cerrar sesión?', () => this.closest('form').submit())"                </template>                </a>

                class="w-full text-left px-4 py-2 text-sm font-semibold text-red-600 bg-transparent rounded-lg hover:text-red-800 hover:bg-red-50 focus:outline-none focus:shadow-outline">

          Cerrar sesión                            </template>

        </button>

      </form>                <template x-if="userRole === 'secretaria'">            

    </div>

  </div>                    <a href="/secretaria"             <template x-if="userRole === 'secretaria'">

  

  <!-- Mobile menu button (visible only on mobile when sidebar is closed) -->                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                <a href="/secretaria" 

  <div class="md:hidden bg-white shadow-sm border-b" x-show="!sidebarOpen">

    <div class="flex items-center justify-between h-16 px-4">                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group"

      <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-600">

        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>                   :class="window.location.pathname === '/secretaria' ? 'bg-orange-100 text-orange-600' : ''">

          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>

        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

      </button>

      <h1 class="text-lg font-semibold text-gray-900">Flowa</h1>                        </svg>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>

      <div class="w-6"></div> <!-- Spacer -->

    </div>                        <span x-show="sidebarExpanded || sidebarOpen"                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>

  </div>

                                x-transition:enter="transition-opacity duration-300 delay-100"                    </svg>

  <!-- Contenido principal -->

  <div class="flex-1 bg-gray-50">                              class="ml-3 whitespace-nowrap">Dashboard</span>                    <span x-show="sidebarExpanded || sidebarOpen" 

    @if (session('success'))

        @include('components.notification-popup', ['type' => 'success', 'message' => session('success')])                    </a>                          x-transition:enter="transition-opacity duration-300 delay-100"

    @endif

    @if (session('error'))                </template>                          class="ml-3 whitespace-nowrap">Dashboard</span>

        @include('components.notification-popup', ['type' => 'error', 'message' => session('error')])

    @endif                                </a>

    

    @include('components.confirm-modal')                <template x-if="userRole === 'comision'">            </template>

    

    {{ $content ?? '' }}                    <a href="/comision"             

  </div>

</div>                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">            <template x-if="userRole === 'comision'">

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                <a href="/comision" 

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group"

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>                   :class="window.location.pathname === '/comision' ? 'bg-orange-100 text-orange-600' : ''">

                        </svg>                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <span x-show="sidebarExpanded || sidebarOpen"                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>

                              class="ml-3 whitespace-nowrap">Dashboard</span>                    </svg>

                    </a>                    <span x-show="sidebarExpanded || sidebarOpen" 

                </template>                          x-transition:enter="transition-opacity duration-300 delay-100"

            </div>                          class="ml-3 whitespace-nowrap">Dashboard</span>

                </a>

            <!-- Opciones para Administración -->            </template>

            <template x-if="userRole === 'admin'">

                <div class="space-y-2">            <!-- Opciones según el rol -->

                    <!-- Crear Nuevo -->            <template x-if="userRole === 'admin'">

                    <div x-data="{ createOpen: false }" class="space-y-1">                <div class="space-y-2">

                        <button @click="createOpen = !createOpen"                     <!-- Crear Nuevo -->

                                class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <div x-data="{ createOpen: false }" class="space-y-1">

                            <div class="flex items-center">                        <button @click="createOpen = !createOpen" 

                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                                class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>                            <div class="flex items-center">

                                </svg>                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <span x-show="sidebarExpanded || sidebarOpen"                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>

                                      x-transition:enter="transition-opacity duration-300 delay-100"                                </svg>

                                      class="ml-3 whitespace-nowrap">Crear Nuevo</span>                                <span x-show="sidebarExpanded || sidebarOpen" 

                            </div>                                      x-transition:enter="transition-opacity duration-300 delay-100"

                            <svg x-show="(sidebarExpanded || sidebarOpen) && createOpen"                                       class="ml-3 whitespace-nowrap">Crear Nuevo</span>

                                 class="w-4 h-4 transform rotate-180 transition-transform"                            </div>

                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <svg x-show="(sidebarExpanded || sidebarOpen) && createOpen" 

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>                                 class="w-4 h-4 transform rotate-180 transition-transform"

                            </svg>                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <svg x-show="(sidebarExpanded || sidebarOpen) && !createOpen"                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>

                                 class="w-4 h-4 transition-transform"                            </svg>

                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <svg x-show="(sidebarExpanded || sidebarOpen) && !createOpen" 

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>                                 class="w-4 h-4 transition-transform"

                            </svg>                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </button>                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>

                        <div x-show="createOpen && (sidebarExpanded || sidebarOpen)"                             </svg>

                             x-transition:enter="transition-all duration-200"                        </button>

                             x-transition:enter-start="opacity-0 max-h-0"                        <div x-show="createOpen && (sidebarExpanded || sidebarOpen)" 

                             x-transition:enter-end="opacity-100 max-h-96"                             x-transition:enter="transition-all duration-200"

                             x-transition:leave="transition-all duration-200"                             x-transition:enter-start="opacity-0 max-h-0"

                             x-transition:leave-start="opacity-100 max-h-96"                             x-transition:enter-end="opacity-100 max-h-96"

                             x-transition:leave-end="opacity-0 max-h-0"                             x-transition:leave="transition-all duration-200"

                             class="ml-6 space-y-1 overflow-hidden">                             x-transition:leave-start="opacity-100 max-h-96"

                            <a href="/administracion/crearmateria" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear materia</a>                             x-transition:leave-end="opacity-0 max-h-0"

                            <a href="/administracion/crearcarrera" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear carrera</a>                             class="ml-6 space-y-1 overflow-hidden">

                            <a href="/administracion/crearplan" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear plan de materia</a>                            <a href="/administracion/crearmateria" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear materia</a>

                                                        <a href="/administracion/crearcarrera" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear carrera</a>

                            <div class="mt-3 pt-2 border-t border-gray-200">                            <a href="/administracion/crearplan" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear plan de materia</a>

                                <p class="px-4 py-1 text-xs font-semibold text-gray-500 uppercase tracking-wide">Usuarios</p>                            

                                <a href="/administracion/crearsecretaria" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Secretaría</a>                            <div class="mt-3 pt-2 border-t border-gray-200">

                                <a href="/administracion/crearadministrativo" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Administración</a>                                <p class="px-4 py-1 text-xs font-semibold text-gray-500 uppercase tracking-wide">Usuarios</p>

                                <a href="/administracion/crearprofesor" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Profesor</a>                                <a href="/administracion/crearsecretaria" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Secretaría</a>

                                <a href="/administracion/crearcomision" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Comisión</a>                                <a href="/administracion/crearadministrativo" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Administración</a>

                            </div>                                <a href="/administracion/crearprofesor" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Profesor</a>

                        </div>                                <a href="/administracion/crearcomision" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Crear Comisión</a>

                    </div>                            </div>

                        </div>

                    <!-- Gestionar Planes -->                    </div>

                    <div x-data="{ plansOpen: false }" class="space-y-1">

                        <button @click="plansOpen = !plansOpen"                     <!-- Gestionar Planes -->

                                class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <div x-data="{ plansOpen: false }" class="space-y-1">

                            <div class="flex items-center">                        <button @click="plansOpen = !plansOpen" 

                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                                class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                            <div class="flex items-center">

                                </svg>                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <span x-show="sidebarExpanded || sidebarOpen"                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

                                      x-transition:enter="transition-opacity duration-300 delay-100"                                </svg>

                                      class="ml-3 whitespace-nowrap">Gestionar Planes</span>                                <span x-show="sidebarExpanded || sidebarOpen" 

                            </div>                                      x-transition:enter="transition-opacity duration-300 delay-100"

                            <svg x-show="(sidebarExpanded || sidebarOpen) && plansOpen"                                       class="ml-3 whitespace-nowrap">Gestionar Planes</span>

                                 class="w-4 h-4 transform rotate-180 transition-transform"                            </div>

                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <svg x-show="(sidebarExpanded || sidebarOpen) && plansOpen" 

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>                                 class="w-4 h-4 transform rotate-180 transition-transform"

                            </svg>                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <svg x-show="(sidebarExpanded || sidebarOpen) && !plansOpen"                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>

                                 class="w-4 h-4 transition-transform"                            </svg>

                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <svg x-show="(sidebarExpanded || sidebarOpen) && !plansOpen" 

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>                                 class="w-4 h-4 transition-transform"

                            </svg>                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </button>                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>

                        <div x-show="plansOpen && (sidebarExpanded || sidebarOpen)"                             </svg>

                             x-transition:enter="transition-all duration-200"                        </button>

                             x-transition:enter-start="opacity-0 max-h-0"                        <div x-show="plansOpen && (sidebarExpanded || sidebarOpen)" 

                             x-transition:enter-end="opacity-100 max-h-48"                             x-transition:enter="transition-all duration-200"

                             x-transition:leave="transition-all duration-200"                             x-transition:enter-start="opacity-0 max-h-0"

                             x-transition:leave-start="opacity-100 max-h-48"                             x-transition:enter-end="opacity-100 max-h-48"

                             x-transition:leave-end="opacity-0 max-h-0"                             x-transition:leave="transition-all duration-200"

                             class="ml-6 space-y-1 overflow-hidden">                             x-transition:leave-start="opacity-100 max-h-48"

                            <a href="/administracion/verplanes" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Ver planes existentes</a>                             x-transition:leave-end="opacity-0 max-h-0"

                            <a href="/administracion/cargarplan" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Cargar plan - versión anterior</a>                             class="ml-6 space-y-1 overflow-hidden">

                        </div>                            <a href="/administracion/verplanes" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Ver planes existentes</a>

                    </div>                            <a href="/administracion/cargarplan" class="block px-4 py-2 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg">Cargar plan - versión anterior</a>

                </div>                        </div>

            </template>                    </div>

                </div>

            <!-- Opciones para Profesor -->            </template>

            <template x-if="userRole === 'profesor'">

                <div class="space-y-2">            <!-- Opciones para Profesor -->

                    <a href="/profesor/verplanes"             <template x-if="userRole === 'profesor'">

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                <a href="/profesor/verplanes" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group"

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                   :class="window.location.pathname.includes('verplanes') ? 'bg-orange-100 text-orange-600' : ''">

                        </svg>                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <span x-show="sidebarExpanded || sidebarOpen"                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

                              x-transition:enter="transition-opacity duration-300 delay-100"                    </svg>

                              class="ml-3 whitespace-nowrap">Ver Planes</span>                    <span x-show="sidebarExpanded || sidebarOpen" 

                    </a>                          x-transition:enter="transition-opacity duration-300 delay-100"

                </div>                          class="ml-3 whitespace-nowrap">Ver Planes</span>

            </template>                </a>

            </template>

            <!-- Opciones para Secretaría -->

            <template x-if="userRole === 'secretaria'">            <!-- Opciones para Secretaría -->

                <div class="space-y-2">            <template x-if="userRole === 'secretaria'">

                    <a href="/secretaria/crearsecretaria"                 <div class="space-y-2">

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <a href="/secretaria/crearsecretaria" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>

                        <span x-show="sidebarExpanded || sidebarOpen"                         </svg>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <span x-show="sidebarExpanded || sidebarOpen" 

                              class="ml-3 whitespace-nowrap">Crear Secretaría</span>                              x-transition:enter="transition-opacity duration-300 delay-100"

                    </a>                              class="ml-3 whitespace-nowrap">Crear Secretaría</span>

                    <a href="/secretaria/crearprofesor"                     </a>

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <a href="/secretaria/crearprofesor" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>

                        <span x-show="sidebarExpanded || sidebarOpen"                         </svg>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <span x-show="sidebarExpanded || sidebarOpen" 

                              class="ml-3 whitespace-nowrap">Crear Profesor</span>                              x-transition:enter="transition-opacity duration-300 delay-100"

                    </a>                              class="ml-3 whitespace-nowrap">Crear Profesor</span>

                    <a href="/secretaria/crearcomision"                     </a>

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <a href="/secretaria/crearcomision" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>

                        <span x-show="sidebarExpanded || sidebarOpen"                         </svg>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <span x-show="sidebarExpanded || sidebarOpen" 

                              class="ml-3 whitespace-nowrap">Crear Comisión</span>                              x-transition:enter="transition-opacity duration-300 delay-100"

                    </a>                              class="ml-3 whitespace-nowrap">Crear Comisión</span>

                    <a href="/secretaria/verplanes"                     </a>

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <a href="/secretaria/verplanes" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

                        <span x-show="sidebarExpanded || sidebarOpen"                         </svg>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <span x-show="sidebarExpanded || sidebarOpen" 

                              class="ml-3 whitespace-nowrap">Listar Planes</span>                              x-transition:enter="transition-opacity duration-300 delay-100"

                    </a>                              class="ml-3 whitespace-nowrap">Listar Planes</span>

                </div>                    </a>

            </template>                </div>

            </template>

            <!-- Opciones para Comisión -->

            <template x-if="userRole === 'comision'">            <!-- Opciones para Comisión -->

                <div class="space-y-2">            <template x-if="userRole === 'comision'">

                    <a href="/comision/verplanes"                 <div class="space-y-2">

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <a href="/comision/verplanes" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

                        <span x-show="sidebarExpanded || sidebarOpen"                         </svg>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <span x-show="sidebarExpanded || sidebarOpen" 

                              class="ml-3 whitespace-nowrap">Ver Planes de Materias</span>                              x-transition:enter="transition-opacity duration-300 delay-100"

                    </a>                              class="ml-3 whitespace-nowrap">Ver Planes de Materias</span>

                    <a href="/comision/pdfprueba"                     </a>

                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">                    <a href="/comision/pdfprueba" 

                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors group">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        </svg>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

                        <span x-show="sidebarExpanded || sidebarOpen"                         </svg>

                              x-transition:enter="transition-opacity duration-300 delay-100"                        <span x-show="sidebarExpanded || sidebarOpen" 

                              class="ml-3 whitespace-nowrap">Crear PDF Prueba</span>                              x-transition:enter="transition-opacity duration-300 delay-100"

                    </a>                              class="ml-3 whitespace-nowrap">Crear PDF Prueba</span>

                </div>                    </a>

            </template>                </div>

        </nav>            </template>

        </nav>

        <!-- Logout button -->

        <div class="p-4 border-t border-gray-200 flex-shrink-0">        <!-- Logout button -->

            <form method="POST" action="{{ route('logout') }}">        <div class="p-4 border-t border-gray-200 flex-shrink-0">

                @csrf            <form method="POST" action="{{ route('logout') }}">

                <button type="button"                 @csrf

                        onclick="showConfirmModal('Cerrar Sesión', '¿Estás seguro de que deseas cerrar sesión?', () => this.closest('form').submit())"                <button type="button" 

                        class="w-full flex items-center justify-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors group"                        onclick="showConfirmModal('Cerrar Sesión', '¿Estás seguro de que deseas cerrar sesión?', () => this.closest('form').submit())"

                        title="Cerrar Sesión">                        class="w-full flex items-center justify-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors group"

                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">                        title="Cerrar Sesión">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    </svg>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>

                    <span x-show="sidebarExpanded || sidebarOpen"                     </svg>

                          x-transition:enter="transition-opacity duration-300 delay-100"                    <span x-show="sidebarExpanded || sidebarOpen" 

                          class="ml-3 whitespace-nowrap">Cerrar Sesión</span>                          x-transition:enter="transition-opacity duration-300 delay-100"

                </button>                          class="ml-3 whitespace-nowrap">Cerrar Sesión</span>

            </form>                </button>

        </div>            </form>

    </div>        </div>

    </div>

    <!-- Main content area -->

    <div class="flex-1 flex flex-col">    <!-- Main content area -->

        <!-- Top bar for mobile -->    <div class="flex-1 flex flex-col">

        <div class="lg:hidden bg-white shadow-sm border-b flex-shrink-0">        <!-- Top bar for mobile -->

            <div class="flex items-center justify-between h-16 px-4">        <div class="lg:hidden bg-white shadow-sm border-b flex-shrink-0">

                <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-600">            <div class="flex items-center justify-between h-16 px-4">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">                <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-600">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    </svg>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>

                </button>                    </svg>

                <h1 class="text-lg font-semibold text-gray-900">Flowa</h1>                </button>

                <div class="w-6"></div> <!-- Spacer -->                <h1 class="text-lg font-semibold text-gray-900">Flowa</h1>

            </div>                <div class="w-6"></div> <!-- Spacer -->

        </div>            </div>

        </div>

        <!-- Page content -->

        <main class="flex-1 p-6">        <!-- Page content -->

            @if (session('success'))        <main class="flex-1 p-6">

                @include('components.notification-popup', ['type' => 'success', 'message' => session('success')])            @if (session('success'))

            @endif                @include('components.notification-popup', ['type' => 'success', 'message' => session('success')])

            @if (session('error'))            @endif

                @include('components.notification-popup', ['type' => 'error', 'message' => session('error')])            @if (session('error'))

            @endif                @include('components.notification-popup', ['type' => 'error', 'message' => session('error')])

                        @endif

            @include('components.confirm-modal')            

                        @include('components.confirm-modal')

            {{ $content ?? '' }}            

        </main>            {{ $content ?? '' }}

    </div>        </main>

</div>    </div>
</div>