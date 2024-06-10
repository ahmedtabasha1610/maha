<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegisterNotification extends Notification
{
    use Queueable;

    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    //اشعار ترحيبي لزبون 
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Welcome to esteshari.com.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our platform!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
     
            'title' => $this->details['title'],
            'body'=>$this->details['body'],
            'user_id'=>$this->details['user_id'],
        ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
