<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class agreeanddisagreebookingNotification extends Notification
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->line($this->details['title'])
                    ->line($this->details['status'])
                    ->line($this->details['date'])
                    ->line($this->details['time'])
                    ->line($this->details['advisor_name']);
    }


    public function toDatabase($notifiable)
    {
        return [
     
            'title' => $this->details['title'],
            'status' => $this->details['status'],
            'date'=>$this->details['date'],
            'time'=>$this->details['time'],
            'advisor_name'=>$this->details['advisor_name'],
            'advisor_id'=>$this->details['advisor_id'],
            'purchase_id'=>$this->details['purchase_id'],
        ];
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
