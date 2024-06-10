<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class advisorbookingNotification extends Notification
{
    use Queueable;

    private $deta;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($deta)
    {
        $this->deta = $deta;
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
        //اشعار تنبية للمستشار بوصول طلب حجز جديد

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->deta['greeting'])
                    ->line($this->deta['body'])
                    ->line($this->deta['username'])
                    ->line($this->deta['price'])
                    ->line($this->deta['details'])
                    ->action($this->deta['actionText'], $this->deta['actionURL']);                    
    }
  
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    //اشعار تنبية للمستشار بوصول طلب حجز جديد
    public function toDatabase($notifiable)
    {
        return [
            'greeting' => $this->deta['greeting'],
            'body'=>$this->deta['body'],
            'actionText'=>$this->deta['actionText'], 
            'actionURL'=>$this->deta['actionURL'], 
            'username'=>$this->deta['username'], 
            'price'=>$this->deta['price'], 
            'details'=>$this->deta['details'], 
               ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
