<?php

namespace App\Notifications;

use App\Models\Junkshop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingRejected extends Notification
{
    use Queueable;

    public function __construct(public Junkshop $junkshop)
    {
        //
    }
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->line("The {$this->junkshop->name} has rejected your booking.")
                ->action('Book another shop', route('user.pages.index'));
    }
}
