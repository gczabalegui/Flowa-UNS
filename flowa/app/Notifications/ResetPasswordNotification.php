<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public $token;

    /**
     * Crear una nueva instancia.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Define los canales de notificación.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Armar el mensaje de correo.
     */
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Flowa - Restablecer contraseña')
            ->markdown('vendor.notifications.email', [
                'actionUrl' => $url,
                'displayableActionUrl' => $url,
                'actionText' => 'Restablecer contraseña',
            ]);
    }
}
