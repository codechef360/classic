<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\AdsReview;
use App\Models\Ad;
use Auth;

class NewReviewNotification extends Notification
{
    use Queueable;
    public $review;
    public $advert;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AdsReview $review, Ad $advert)
    {
        $this->review = $review;
        $this->advert = $advert;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'title'=>config('app.name').' - New Review notification.',
            'content'=>$this->review->review,
            'author'=>Auth::user()->first_name.' '.Auth::user()->surname ?? '',
            'url'=>$this->advert->slug,
            'customer'=>Auth::user()->id,
            'type'=>1,//1=advert,2=message
        ];
    }
}
