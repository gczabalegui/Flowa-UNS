{{-- Modal de confirmación moderno --}}
<div id="confirm-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden" style="display: none !important;">
    <div class="bg-orange-50 border border-orange-200 rounded-lg shadow-xl p-6 m-4 max-w-md w-full">
        <div class="flex items-center mb-4">
            <div class="flex-shrink-0">
                <svg class="h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-lg font-medium text-orange-800" id="confirm-title">
                    Confirmar acción
                </h3>
            </div>
        </div>
        <div class="mt-2">
            <p class="text-sm text-orange-700" id="confirm-message">
                ¿Estás seguro de que deseas realizar esta acción?
            </p>
        </div>
        <div class="mt-5 flex justify-end space-x-3">
            <button type="button" id="confirm-cancel" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Cancelar
            </button>
            <button type="button" id="confirm-accept" class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                Aceptar
            </button>
        </div>
    </div>
</div>

<script>
let confirmCallback = null;
let isModalInitialized = false;

function showConfirmModal(title, message, callback) {
    console.log('showConfirmModal called:', title, message);
    
    const modal = document.getElementById('confirm-modal');
    const titleElement = document.getElementById('confirm-title');
    const messageElement = document.getElementById('confirm-message');
    
    if (!modal || !titleElement || !messageElement) {
        console.error('Modal elements not found');
        // Fallback al confirm nativo
        if (confirm(message)) {
            if (callback) callback();
        }
        return;
    }
    
    // Asegurar que el modal esté completamente oculto primero
    modal.style.display = 'none';
    modal.classList.add('hidden');
    
    // Luego configurar y mostrar
    titleElement.textContent = title;
    messageElement.textContent = message;
    confirmCallback = callback;
    
    // Mostrar el modal
    modal.style.display = 'flex';
    modal.classList.remove('hidden');
    
    console.log('Modal shown successfully');
}

function hideConfirmModal() {
    const modal = document.getElementById('confirm-modal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.add('hidden');
    }
    confirmCallback = null;
    console.log('Modal hidden');
}

// Forzar que el modal esté oculto al cargar
document.addEventListener('DOMContentLoaded', function() {
    if (isModalInitialized) return;
    isModalInitialized = true;
    
    const modal = document.getElementById('confirm-modal');
    const cancelBtn = document.getElementById('confirm-cancel');
    const acceptBtn = document.getElementById('confirm-accept');

    // Forzar ocultación completa
    if (modal) {
        modal.style.display = 'none';
        modal.classList.add('hidden');
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Cancel clicked');
            hideConfirmModal();
        });
    }

    if (acceptBtn) {
        acceptBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Accept clicked');
            if (confirmCallback && typeof confirmCallback === 'function') {
                confirmCallback();
            }
            hideConfirmModal();
        });
    }

    // Cerrar modal al hacer click fuera
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                hideConfirmModal();
            }
        });
    }
    
    console.log('Confirm modal initialized and hidden');
});

// También forzar ocultación inmediatamente
(function() {
    const modal = document.getElementById('confirm-modal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.add('hidden');
    }
})();
</script>