<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App;

class likesNotification extends Notification
{
    use Queueable;

    private $likeId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->likeId = $id;
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
            //
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $like = App\Likes::find($this->likeId);
        $user = App\User::find($like->user_id);
        $rev = App\Review::find($like->resourse_id);
        $revUser = App\User::find($rev->user_id);
        $book = App\Book::find($rev->book_id);
        $arr = [
            //
            'id' => $like->id,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_image_link' => $user->image_link,
            'review_id' =>$rev->id,
            'review_user_id'=>$revUser->id,
            'review_user_name'=>$revUser->name,
            'book_id'=>$book->id,
            'book_title' =>$book->title,
            'type' =>1 //like
            
        ];
        return  $arr;
    }
}
