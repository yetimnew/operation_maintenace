<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PerformanceCreated extends Notification
{
    use Queueable;


    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
         
        ];
    }

    public function toDatabase($notifiable)
    {
        // dd($notifiable);
        return [
            'id'=> $notifiable->id,
            'name'=> $notifiable->name,
            'repliedTime'=> Carbon::now(),
            'title'=> 'New Performance Created!'
        ];
    }
}
