<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = [
        "user_id", 
        "book_id",                  
        "type" ,         
        'updated_at',
        'created_at'
    ];
    //function to get the shelves activity of certain users
    public static function shelvesUsersArr($Arr)
    {
        $shelf= Shelf::whereIn('shelves.user_id',$Arr)->join('books','shelves.book_id','=','books.id')
        ->join('users','shelves.user_id','=','users.id')
        ->join('authors','books.author_id','=','authors.id')
        ->select('shelves.id','type as shelf_type','shelves.updated_at','likes_count','comments_count',
        'books.id as book_id','title','description','books.img_url','reviews_count','ratings_count','ratings_avg',
        'pages_no','users.id as user_id','users.name','users.image_link','author_name')->get();
        $t = array();
        $j=0;
       foreach($shelf as $l)
        {
            //$like = Likes::where('user_id',$auth_id)->where('resourse_type','0')->where('resourse_id',Arr::get($r,'id'))->get()->isNotEmpty();
            $l = collect($l);
            $l ->put('update_type',1);
           $t[$j]=$l;
           $j++;
        }
        $shelf = collect($t);
        return $shelf;
    }

    public function setshelf($a,$b,$c,$d,$e,$f){
        $res = DB::insert('insert into shelves values(?,?,?,?,?,?)',[$a,$b,$c,$d,$e,$f]);
    }
    public function deleteshelf($a){
        $res = DB::delete('delete from shelves where id=?',[$a]);
    }
}
