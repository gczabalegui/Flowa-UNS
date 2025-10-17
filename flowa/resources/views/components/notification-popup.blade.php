{{-- Componente de notificación popup --}}
@if(session('estado') || session('success') || session('warning') || session('error') || $errors->any())
<div id="notification-popup" class="notification-popup" style="display: none;">
    @if(session('estado') || session('success'))
    <div role="alert" class="rounded-lg border-2 border-green-400 bg-gradient-to-r from-green-50 to-emerald-50 p-4 shadow-xl">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div class="flex-1">
                @php
                    $mensaje = session('estado') ?? session('success');
                    $titulo = '¡Éxito!';
                    
                    // Personalizar título según el mensaje
                    if (str_contains($mensaje, 'guardado')) {
                        $titulo = '🎉 ¡Plan guardado!';
                    } elseif (str_contains($mensaje, 'actualizado')) {
                        $titulo = '🔄 ¡Plan actualizado!';
                    } elseif (str_contains($mensaje, 'creado') || str_contains($mensaje, 'Nueva')) {
                        $titulo = '✨ ¡Creado exitosamente!';
                    } elseif (str_contains($mensaje, 'aprobado')) {
                        $titulo = '✅ ¡Plan aprobado!';
                    } elseif (str_contains($mensaje, 'rechazado')) {
                        $titulo = '❌ ¡Plan rechazado!';
                    } elseif (str_contains($mensaje, 'eliminado')) {
                        $titulo = '🗑️ ¡Plan eliminado!';
                    }
                @endphp
                <strong class="font-bold text-green-800">{{ $titulo }}</strong>
                <p class="mt-1 text-sm text-green-700 font-medium">{{ $mensaje }}</p>
            </div>

            <button class="notification-close -m-2 rounded-full p-2 text-green-600 hover:bg-green-100 hover:text-green-800 transition-all duration-200 transform hover:scale-110" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('warning'))
    <div role="alert" class="rounded-lg border-2 border-amber-400 bg-gradient-to-r from-amber-50 to-yellow-50 p-4 shadow-xl">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-gradient-to-r from-amber-500 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>
            </div>

            <div class="flex-1">
                <strong class="font-bold text-amber-800">⚠️ Advertencia</strong>
                <p class="mt-1 text-sm text-amber-700 font-medium">{{ session('warning') }}</p>
            </div>

            <button class="notification-close -m-2 rounded-full p-2 text-amber-600 hover:bg-amber-100 hover:text-amber-800 transition-all duration-200 transform hover:scale-110" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div role="alert" class="rounded-lg border-2 border-red-400 bg-gradient-to-r from-red-50 to-pink-50 p-4 shadow-xl">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-rose-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                        <path
                            fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
            </div>

            <div class="flex-1">
                <strong class="font-bold text-red-800">🚨 Error</strong>
                <p class="mt-1 text-sm text-red-700 font-medium">{{ session('error') }}</p>
            </div>
            
            <button class="notification-close -m-2 rounded-full p-2 text-red-600 hover:bg-red-100 hover:text-red-800 transition-all duration-200 transform hover:scale-110" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if($errors->any())
    <div role="alert" class="rounded-lg border-2 border-red-400 bg-gradient-to-r from-red-50 to-rose-50 p-4 shadow-xl">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-rose-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                        <path
                            fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
            </div>

            <div class="flex-1">
                <strong class="font-bold text-red-800">🔍 Error de validación</strong>
                <div class="mt-1 text-sm text-red-700 font-medium">
                    @foreach($errors->all() as $error)
                        <p class="mb-1">• {{ $error }}</p>
                    @endforeach
                </div>
            </div>
            
            <button class="notification-close -m-2 rounded-full p-2 text-red-600 hover:bg-red-100 hover:text-red-800 transition-all duration-200 transform hover:scale-110" type="button" aria-label="Dismiss alert">
                <span class="sr-only">Cerrar notificación</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
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
    min-width: 380px;
    max-width: 500px;
    filter: drop-shadow(0 20px 25px rgb(0 0 0 / 0.15));
}

.notification-popup.show {
    display: block !important;
    animation: slideInRight 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.notification-popup.hide {
    animation: slideOutRight 0.5s ease-in-out;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%) scale(0.9);
        opacity: 0;
    }
    to {
        transform: translateX(0) scale(1);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0) scale(1);
        opacity: 1;
    }
    to {
        transform: translateX(100%) scale(0.95);
        opacity: 0;
    }
}

/* Pulso suave para el ícono circular */
.notification-popup [role="alert"] .w-8.h-8 {
    animation: pulse-soft 2s infinite;
}

@keyframes pulse-soft {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* Efecto hover mejorado para el botón cerrar */
.notification-close:hover {
    transform: scale(1.1) rotate(90deg);
}

/* Estilos adicionales para Tailwind */
.rounded-lg { border-radius: 0.5rem; }
.border-2 { border-width: 2px; }
.border-green-400 { border-color: rgb(74 222 128); }
.border-amber-400 { border-color: rgb(251 191 36); }
.border-red-400 { border-color: rgb(248 113 113); }
.bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
.from-green-50 { --tw-gradient-from: rgb(240 253 244); --tw-gradient-to: rgb(240 253 244 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
.to-emerald-50 { --tw-gradient-to: rgb(236 253 245); }
.from-amber-50 { --tw-gradient-from: rgb(255 251 235); --tw-gradient-to: rgb(255 251 235 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
.to-yellow-50 { --tw-gradient-to: rgb(254 252 232); }
.from-red-50 { --tw-gradient-from: rgb(254 242 242); --tw-gradient-to: rgb(254 242 242 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
.to-pink-50 { --tw-gradient-to: rgb(253 242 248); }
.shadow-xl { box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); }
.flex-shrink-0 { flex-shrink: 0; }
.from-green-500 { --tw-gradient-from: rgb(34 197 94); --tw-gradient-to: rgb(34 197 94 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
.to-emerald-500 { --tw-gradient-to: rgb(16 185 129); }
.from-amber-500 { --tw-gradient-from: rgb(245 158 11); --tw-gradient-to: rgb(245 158 11 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
.to-orange-500 { --tw-gradient-to: rgb(249 115 22); }
.from-red-500 { --tw-gradient-from: rgb(239 68 68); --tw-gradient-to: rgb(239 68 68 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
.to-rose-500 { --tw-gradient-to: rgb(244 63 94); }
.font-bold { font-weight: 700; }
.text-green-800 { color: rgb(22 101 52); }
.text-amber-800 { color: rgb(146 64 14); }
.text-red-800 { color: rgb(153 27 27); }
.text-green-700 { color: rgb(21 128 61); }
.text-amber-700 { color: rgb(180 83 9); }
.text-red-700 { color: rgb(185 28 28); }
.text-green-600 { color: rgb(22 163 74); }
.text-amber-600 { color: rgb(217 119 6); }
.text-red-600 { color: rgb(220 38 38); }
.hover\:bg-green-100:hover { background-color: rgb(220 252 231); }
.hover\:bg-amber-100:hover { background-color: rgb(254 243 199); }
.hover\:bg-red-100:hover { background-color: rgb(254 226 226); }
.hover\:text-green-800:hover { color: rgb(22 101 52); }
.hover\:text-amber-800:hover { color: rgb(146 64 14); }
.hover\:text-red-800:hover { color: rgb(153 27 27); }
.transition-all { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
.duration-200 { transition-duration: 200ms; }
.transform { transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)); }
.hover\:scale-110:hover { --tw-scale-x: 1.1; --tw-scale-y: 1.1; }

/* Mantener estilos originales compatibles */
.flex { display: flex; }
.items-start { align-items: flex-start; }
.gap-4 { gap: 1rem; }
.w-8 { width: 2rem; }
.h-8 { height: 2rem; }
.w-5 { width: 1.25rem; }
.h-5 { height: 1.25rem; }
.rounded-full { border-radius: 9999px; }
.flex-1 { flex: 1 1 0%; }
.mt-1 { margin-top: 0.25rem; }
.text-sm { font-size: 0.875rem; line-height: 1.25rem; }
.font-medium { font-weight: 500; }
.-m-2 { margin: -0.5rem; }
.p-2 { padding: 0.5rem; }
.p-4 { padding: 1rem; }
.text-white { color: rgb(255 255 255); }
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
        // Mostrar el popup con un ligero retraso para mejor efecto
        setTimeout(function() {
            popup.classList.add('show');
        }, 100);
        
        // Auto-cerrar después de 7 segundos (más tiempo para leer)
        const autoCloseTimer = setTimeout(function() {
            hideNotification();
        }, 7000);
        
        // Manejar click del botón cerrar
        const closeButtons = popup.querySelectorAll('.notification-close');
        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                clearTimeout(autoCloseTimer); // Cancelar auto-cierre
                hideNotification();
            });
        });

        // Pausar auto-cierre al hacer hover sobre la notificación
        popup.addEventListener('mouseenter', function() {
            clearTimeout(autoCloseTimer);
        });

        // Reanudar auto-cierre al quitar el mouse
        popup.addEventListener('mouseleave', function() {
            setTimeout(function() {
                hideNotification();
            }, 2000); // Dar 2 segundos adicionales después de quitar el mouse
        });
    }
    
    function hideNotification() {
        if (popup && !popup.classList.contains('hide')) {
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