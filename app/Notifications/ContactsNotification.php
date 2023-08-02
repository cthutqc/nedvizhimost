<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactsNotification extends Notification
{
    use Queueable;

    public $name;
    public $phone;
    public $message;
    public function __construct($data)
    {
        $this->name = $data['name'];

        $this->phone = $data['phone'];

        $this->message = $data['message'];
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
            ->subject('Запрос c страницы контактов сайта ' . env('APP_NAME'))
            ->line('Имя:' . $this->name)
            ->line('Телефон:' . $this->phone)
            ->line('Сообщение:' . $this->message);
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
