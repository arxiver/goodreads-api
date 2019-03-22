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
    public static function likesUsersArr($Arr)
    {
        
        $likes = Likes::where('resourse_type','=','0')->whereIn('likes.user_id',$Arr)
        ->join('reviews','resourse_id','=','reviews.id')
        ->join('books','reviews.book_id','=','books.id')
        ->join('users','reviews.user_id','=','users.id')
        ->join('authors','books.author_id','=','authors.id')
        ->select('likes.id','resourse_type','likes.updated_at','Reviews.id as review_id','body'
        ,'rating','likes_count','comments_count','reviews.updated_at as review_updated_at'
        ,'books.id as book_id','title','description','books.img_url','reviews_count','ratings_count'
        ,'ratings_avg','pages_no','users.id as user_id','users.name','users.image_link','author_name')
        ->get();
        $t = array();
        $j=0;
       foreach($likes as $l)
        {
            //$like = Likes::where('user_id',$auth_id)->where('resourse_type','0')->where('resourse_id',Arr::get($r,'id'))->get()->isNotEmpty();
            $l = collect($l);
            $l ->put('update_type',3);
           $t[$j]=$l;
           $j++;
        }
        $likes = collect($t);
        return  $likes;
    }
}
