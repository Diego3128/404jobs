<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    public $vacancy_id;
    public $vacancy_title;
    public $vacancy_candidate_id;

    //Create a new notification instance.
    public function __construct($vacancy_id, $vacancy_title, $vacancy_candidate_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_title = $vacancy_title;
        $this->vacancy_candidate_id = $vacancy_candidate_id; //user applying for the job
    }

    /**
     * Get the notification's delivery channels.
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    //Get the mail representation of the notification.
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications/');

        return (new MailMessage)
            ->line('You have a new candidate for: ' . $this->vacancy_title)
            ->line('You can check your notifications now. ')
            ->action('Notifications', $url);
    }

    // Saves notificaitons in the database
    public function toDatabase(object $notifiable)
    {
        return [
            'vacancy_id' =>  $this->vacancy_id,
            'vacancy_title' =>  $this->vacancy_title,
            'vacancy_user' =>  $this->vacancy_candidate_id,
        ];
    }

    /**
     * Get the array representation of the notification.
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
