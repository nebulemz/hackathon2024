<?php

namespace App\Notifications;

use App\Models\Junkshop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatedBooking extends Notification
{
    use Queueable;

    public function __construct(public Junkshop $junkshop)
    {
    }


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
            ->line('You have been selected for booking.')
            ->action('View available bookings', route('junkshop.pages.index'))
            ->line('Thank you for selecting ' . $this->junkshop->name . ' junkshop.');
    }
}
