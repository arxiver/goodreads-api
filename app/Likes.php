<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = [
        "user_id",
        "resourse_id",
        "resourse_type" ,
        'updated_at',
        'created_at'

    ];
    protected $table = 'likes';
    //function to get the likes activity of certain users
    public static function likesUsersArr($Arr,$auth_id)
    {
        
        $likes = Likes::where('resourse_type','=','0')->whereIn('likes.user_id',$Arr)
        ->join('reviews','resourse_id','=','reviews.id')
        ->join('books','reviews.book_id','=','books.id')
        ->join('users as rev_u','reviews.user_id','=','rev_u.id')
        ->join('users as u','likes.user_id','=','u.id')
        ->join('authors','books.author_id','=','authors.id')
        ->select('likes.id','resourse_type','likes.updated_at','u.id as user_id',
        'u.name','u.image_link as image_link','Reviews.id as review_id','body',
        'rating','likes_count','comments_count','reviews.updated_at as review_updated_at'
        ,'books.id as book_id','title','description','books.img_url','reviews_count',
        'ratings_count','ratings_avg','pages_no','rev_u.id as rev_user_id',
        'rev_u.name as rev_user_name','rev_u.image_link as rev_user_imageLink','author_name')
        ->get();
        $t = array();
        $j=0;
       foreach($likes as $l)
        {

            $shelf = Shelf::where('user_id',$auth_id)->where('book_id',$l->book_id)->select('type')->first(); 
            if($shelf)
               $shelf = $shelf->type;
            else
                $shelf = 3; 
                
            $l = collect($l);
            $l ->put('update_type',3);
            $l ->put('shelf',$shelf);
            //$like = 0;
           // $l ->put('auth_like',$like);
           $t[$j]=$l;
           $j++;
        }
        $likes = collect($t);
        return  $likes;
    }
}
