<x-mail::message>
{{-- Asunto personalizado --}}
# Flowa - Restablecer contraseña

{{-- Cuerpo --}}
Hola!

Recibiste este correo porque solicitaste restablecer tu contraseña en **Flowa**.  
Hacé clic en el siguiente botón para continuar con el proceso:

<x-mail::button :url="$actionUrl" color="primary">
Restablecer contraseña
</x-mail::button>

Si no realizaste esta solicitud, podés ignorar este mensaje.  
Tu cuenta seguirá segura y no se hará ningún cambio.

Gracias por usar Flowa 💚  
El equipo de **Guada y Flor**

{{-- Subcopy --}}
<x-slot:subcopy>
Si el botón no funciona, copiá y pegá este enlace en tu navegador:<br>
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
</x-mail::message>
