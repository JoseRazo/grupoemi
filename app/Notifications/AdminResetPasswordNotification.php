<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('admin.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email
        ], false));

        return (new MailMessage)
            ->subject('Restablecimiento de Contraseña')
            ->view('back.auth.notification-reset-password', [
                'resetUrl' => $resetUrl,
                'user' => $notifiable
            ]);
    }

}
