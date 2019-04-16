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
    public static function commentsUsersArr($Arr,$auth_id)
    {
        $comment=Comment::where('resourse_type','=','0')->whereIn('comments.user_id',$Arr)
        ->join('reviews','resourse_id','=','reviews.id')
        ->join('books','reviews.book_id','=','books.id')
        ->join('users as rev_u','reviews.user_id','=','rev_u.id')
        ->join('users as u','comments.user_id','=','u.id')
        ->join('authors','books.author_id','=','authors.id')
        ->select('comments.id','resourse_type','comments.updated_at','comments.body as comment_body'
        ,'u.id as user_id','u.name'
        ,'u.image_link as image_link','reviews.id as review_id','reviews.body'
        ,'rating','comments_count','comments_count','reviews.updated_at as review_updated_at'
        ,'books.id as book_id','title','description','books.img_url','reviews_count','ratings_count'
        ,'ratings_avg','pages_no','rev_u.id as rev_user_id','rev_u.name as rev_user_name'
        ,'rev_u.image_link as rev_user_imageLink','author_name')
        ->get();
        $t = array();
        $j=0;
       foreach($comment as $l)
        {

            $shelf = Shelf::where('user_id',$auth_id)->where('book_id',$l->book_id)->select('type')->first(); 
            if($shelf)
               $shelf = $shelf->type;
            else
                $shelf = 3; 
                
            $l = collect($l);
            $l ->put('update_type',4);
            $l ->put('shelf',$shelf);
            //$like = 0;
           // $l ->put('auth_like',$like);
           $t[$j]=$l;
           $j++;
        }
        $comment = collect($t);
        return $comment;
        
    }
    

}
