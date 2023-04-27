<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewActionRequestNotification extends Notification
{
    use Queueable;

    public $address;
    public $phone;
    public $action;
    public $variant;

    public function __construct($address, $phone, $action, $variant)
    {
        $this->address = $address;
        $this->phone = $phone;
        $this->action = $action;
        $this->variant = $variant;
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
        return (new MailMessage)
                    ->subject('Запрос операции с недвижимостью.')
                    ->line('Адрес:' . $this->address .'.')
                    ->line('Теелфон:' . $this->phone .'.')
                    ->line('Операция:' . $this->action .'.')
                    ->line('Тип недвижимости:' . $this->variant .'.');
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
