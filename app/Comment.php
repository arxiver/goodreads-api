<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "resourse_id",
        "resourse_type" ,
        "body",
        'updated_at',
        'created_at'
    ];
    //function to get the comments activity of certain users
    public static function commentsUsersArr($Arr)
    {
        $comment=Comment::where('resourse_type','=','0')->whereIn('comments.user_id',$Arr)
        ->join('reviews','resourse_id','=','reviews.id')
        ->join('books','reviews.book_id','=','books.id')
        ->join('users','reviews.user_id','=','users.id')
        ->join('authors','books.author_id','=','authors.id')
        ->select('comments.id','resourse_type','comments.updated_at','comments.body as comment_body','Reviews.id as review_id','reviews.body'
        ,'rating','comments_count','comments_count','reviews.updated_at as review_updated_at'
        ,'books.id as book_id','title','description','books.img_url','reviews_count','ratings_count'
        ,'ratings_avg','pages_no','users.id as user_id','users.name','users.image_link','author_name')
        ->get();
        $t = array();
        $j=0;
       foreach($comment as $l)
        {
            $l = collect($l);
            $l ->put('update_type',4);
           $t[$j]=$l;
           $j++;
        }
        $comment = collect($t);
        return $comment;
        
    }
    

}
