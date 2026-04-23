<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends VerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verifica tu cuenta en SQL Trainer')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Gracias por registrarte en eSQLa.')
            ->line('Haz clic en el botón para verificar tu cuenta.')
            ->action('Verificar email', $verificationUrl)
            ->line('Si no has creado esta cuenta, ignora este mensaje.')
            ->salutation('Un saludo, SQL Trainer');
    }
}