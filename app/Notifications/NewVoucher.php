<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewVoucher extends Notification implements ShouldQueue
{
    use Queueable;

    public $voucher;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($voucher)
    {
        $this->voucher = $voucher;
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
                    ->greeting('Hello,' . $this->voucher->owner->fullname())
                    ->line('Congratulations! You just own a new voucher from one of your referrals')
                    ->line('Use this voucher on any product to slash the price by 1K. Just copy and paste it at checkout.')
                    ->action($this->voucher->name, url('/'))
                    ->line('Note: You can only use this voucher once.')
                    ->line('Thank you for using our application!');
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
