<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class NewBill extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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

    public function toSlack($notifiable)
    {
        $job = $this->job;

        return (new SlackMessage)
                ->success()
                ->content('You have a new bill available! You will have 30 days from ' . $job->created_at->toDayDateTimeString() . ' to pay this bill. Please visit fundamentalshape.com/home to pay this bill online.')
                ->attachment(function ($attachment) use ($job) {
                    $attachment->fields([
                                    'Account Holder' => $job->user->name,
                                    'Account Balance' => '$' . number_format(($job->user->balance / 100), 2, '.', ' '),
                                    'Work Description' => $job->description,
                                ]);
                });
    }
}
