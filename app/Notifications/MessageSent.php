<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->greeting($notifiable->name . ",")
                    ->subject('Mensaje recibido desde tu sitio web')
                    ->line('Has recibido un mensaje.')
                    ->action('Click aqui para ver el mensaje', route('messages.show', $this->message->id))
                    ->line('Gracias por usar nuestra aplicacion!');

        // return (new MailMessage)->view(
        //     'emails.notification', [
        //         'msg' => $this->message,
        //         'user' => $notifiable
        //     ])->subject('Mensaje recibido desde notifiaction');

        // return (new CustomMail($message))->($notifiable->email);
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
            "link" => route('messages.show', $this->message->id),
            'text' => 'Haz recibido un Mensaje de ' . $this->message->sender->name,
        ];
    }
}
