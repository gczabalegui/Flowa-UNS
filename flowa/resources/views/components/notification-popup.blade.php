{{-- Componente de notificación popup --}}
@if(session('estado') || session('success') || session('warning') || session('error') || $errors->any())
<div id="notification-popup" class="notification-popup" style="display: none;">
    @if(session('estado') || session('success'))
    <div role="alert" class="rounded-md border border-green-300 bg-white p-4 shadow-lg">
        <div class="flex items-start gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <div class="flex-1">
                @php
                    $mensaje = session('estado') ?? session('success');
                    $titulo = '¡Éxito!';
                    
                    // Personalizar título según el mensaje
                    if (str_contains($mensaje, 'guardado')) {
                        $titulo = '¡Plan guardado!';
                    } elseif (str_contains($mensaje, 'actualizado')) {
                        $titulo = '¡Plan actualizado!';
                    } elseif (str_contains($mensaje, 'creado') || str_contains($mensaje, 'Nueva')) {
                        $titulo = '¡Creado exitosamente!';
                    } elseif (str_contains($mensaje, 'aprobado')) {
                        $titulo = '¡Plan aprobado!';
                    } elseif (str_contains($mensaje, 'rechazado')) {
                        $titulo = '¡Plan rechazado!';
                    } elseif (str_contains($mensaje, 'eliminado')) {
                        $titulo = '¡Plan eliminado!';
                    }
                @endphp
                <strong class="font-medium text-gray-900">{{ $titulo }}</strong>
                <p class="mt-0.5 text-sm text-gray-700">{{ $mensaje }}</p>
            </div>

            <button class="notification-close -m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('warning'))
    <div role="alert" class="rounded-md border border-orange-300 bg-white p-4 shadow-lg">
        <div class="flex items-start gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-orange-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>

            <div class="flex-1">
                <strong class="font-medium text-gray-900">Advertencia</strong>
                <p class="mt-0.5 text-sm text-gray-700">{{ session('warning') }}</p>
            </div>

            <button class="notification-close -m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div role="alert" class="border-s-4 border-red-700 bg-red-50 p-4 shadow-lg">
        <div class="flex items-center gap-2 text-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path
                    fill-rule="evenodd"
                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                    clip-rule="evenodd"
                />
            </svg>

            <strong class="font-medium">Algo salió mal</strong>
            
            <button class="notification-close ml-auto -m-1 rounded-full p-1 text-red-700 transition-colors hover:bg-red-100" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <p class="mt-2 text-sm text-red-700">
            {{ session('error') }}
        </p>
    </div>
    @endif

    @if($errors->any())
    <div role="alert" class="border-s-4 border-red-700 bg-red-50 p-4 shadow-lg">
        <div class="flex items-center gap-2 text-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path
                    fill-rule="evenodd"
                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                    clip-rule="evenodd"
                />
            </svg>

            <strong class="font-medium">Error de validación</strong>
            
            <button class="notification-close ml-auto -m-1 rounded-full p-1 text-red-700 transition-colors hover:bg-red-100" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="mt-2 text-sm text-red-700">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
    @endif
</div>

<style>
.notification-popup {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 350px;
    max-width: 500px;
}

.notification-popup.show {
    display: block !important;
    animation: slideInRight 0.5s ease-out;
}

.notification-popup.hide {
    animation: slideOutRight 0.5s ease-out;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

/* Estilos para hacer que funcione sin Tailwind completo */
.rounded-md { border-radius: 0.375rem; }
.border { border-width: 1px; }
.border-green-300 { border-color: rgb(134 239 172); }
.border-orange-300 { border-color: rgb(253 186 116); }
.border-red-300 { border-color: rgb(252 165 165); }
.bg-white { background-color: rgb(255 255 255); }
.p-4 { padding: 1rem; }
.shadow-lg { 
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1); 
}
.flex { display: flex; }
.items-start { align-items: flex-start; }
.gap-4 { gap: 1rem; }
.size-6 { width: 1.5rem; height: 1.5rem; }
.size-5 { width: 1.25rem; height: 1.25rem; }
.text-green-600 { color: rgb(22 163 74); }
.text-orange-600 { color: rgb(234 88 12); }
.text-red-600 { color: rgb(220 38 38); }
.flex-1 { flex: 1 1 0%; }
.font-medium { font-weight: 500; }
.text-gray-900 { color: rgb(17 24 39); }
.mt-0\.5 { margin-top: 0.125rem; }
.text-sm { font-size: 0.875rem; }
.text-gray-700 { color: rgb(55 65 81); }
.-m-3 { margin: -0.75rem; }
.rounded-full { border-radius: 9999px; }
.p-1\.5 { padding: 0.375rem; }
.text-gray-500 { color: rgb(107 114 128); }
.transition-colors { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke; }
.hover\:bg-gray-50:hover { background-color: rgb(249 250 251); }
.hover\:text-gray-700:hover { color: rgb(55 65 81); }
.sr-only { 
    position: absolute; 
    width: 1px; 
    height: 1px; 
    padding: 0; 
    margin: -1px; 
    overflow: hidden; 
    clip: rect(0, 0, 0, 0); 
    white-space: nowrap; 
    border-width: 0; 
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('notification-popup');
    
    if (popup) {
        // Mostrar el popup
        popup.classList.add('show');
        
        // Auto-cerrar después de 5 segundos
        setTimeout(function() {
            hideNotification();
        }, 5000);
        
        // Manejar click del botón cerrar
        const closeButtons = popup.querySelectorAll('.notification-close');
        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                hideNotification();
            });
        });
    }
    
    function hideNotification() {
        if (popup) {
            popup.classList.remove('show');
            popup.classList.add('hide');
            
            setTimeout(function() {
                popup.style.display = 'none';
            }, 500);
        }
    }
});
</script>
@endif