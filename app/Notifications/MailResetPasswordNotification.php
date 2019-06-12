<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
// add 
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class MailResetPasswordNotification extends ResetPasswordNotification
{
    use Queueable;

    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
         $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Réinitialisation de mon mot de passe - ' . config('app.name'))
        ->line('Vous recevez cet email car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.')
        ->action('Lien de réinitialisation', url('password/reset', $this->token))
        //->action('Reset Password', route('password.reset', ['token' => $this->token]))
        ->line('Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.')
        ->line('Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune autre action n\'est requise.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
