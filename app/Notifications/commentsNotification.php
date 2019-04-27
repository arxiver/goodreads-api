<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App;
class commentsNotification extends Notification
{
    use Queueable;
    private $commentId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->commentId = $id;
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
    public function toDatabase($notifiable)
    {
        $comment = App\Comment::find($this->commentId);
        $user = App\User::find($comment->user_id);
        $rev = App\Review::find($comment->resourse_id);
        $revUser = App\User::find($rev->user_id);
        $book = App\Book::find($rev->book_id);
        $arr = [
            //
            'id' => $comment->id,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_image_link' => $user->image_link,
            'review_id' =>$rev->id,
            'review_user_id'=>$revUser->id,
            'review_user_name'=>$revUser->name,
            'book_title' =>$book->title,
            'type' =>0 //comment
            
        ];
        return  $arr;
    }
}
