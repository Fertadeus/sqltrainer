<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
       $verificationUrl = VerifyEmail::createUrlUsing(function ($notifiable) {
        return url('/email/verify/' . $notifiable->id . '/' . sha1($notifiable->email));
        });

        return (new MailMessage)
            ->subject('Verifica tu cuenta en eSQLa')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Gracias por registrarte en eSQLa.')
            ->line('Haz clic en el botón para verificar tu cuenta.')
            ->action('Verificar email', $verificationUrl)
            ->line('Si no has creado esta cuenta, ignora este mensaje.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
