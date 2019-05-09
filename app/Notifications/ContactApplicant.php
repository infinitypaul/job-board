<?php

namespace App\Notifications;

use App\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactApplicant extends Notification
{
    use Queueable;
    /**
     * @var \App\Job
     */
    public $job;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param \App\Job $job
     * @param $message
     */
    public function __construct(Job $job, $message)
    {
        //
        $this->job = $job;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->greeting('Hello '.$notifiable->name)
            ->from($this->job->user->email, $this->job->user->name)
            ->replyTo($this->job->user->email)
            ->subject('Re: '.$this->job->job_title)
            ->line($this->message)
            ->action('Visit Home', route('home'))
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
            'icon' => 'icon-material-outline-group',
            'username' => $this->job->user->name,
            'message' => 'Replied Your Application For  '.$this->job->job_title,
        ];
    }
}
