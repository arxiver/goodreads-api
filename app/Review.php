<?php

namespace App;

use Illuminate\Http\Request;
use DB;
use Response;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class Review extends Model
{
    protected $fillable = [
        "user_id", 
        "book_id",                  
        "body" ,   
        "shelf_name",      
        "rating",
        'updated_at',
        'created_at'
    ];
    //function to get the reviews activity of certain users
    public static function reviewsUsersArr($Arr)
    {
        $monda = Review::whereIn('reviews.user_id',$Arr)
        ->join('books','reviews.book_id','=','books.id')
        ->join('users','reviews.user_id','=','users.id')
        ->join('authors','books.author_id','=','authors.id')
        ->select('Reviews.id','body','rating','likes_count','comments_count','reviews.updated_at'
        ,'books.id as book_id','title','description','books.img_url','reviews_count','ratings_count'
        ,'ratings_avg','pages_no','users.id as user_id','users.name','users.image_link','author_name')
        ->get();
        $t = array();
        $j=0;
        //$auth_id = $this->ID;
       foreach($monda as $l)
        {

           // $shelf = Shelf::where('user_id',$auth_id)->where('book_id',$l->book_id)->get(); 
            //if(count($shelf)==0)
                $shelf = 3;
            $l = collect($l);
            $l ->put('update_type',0);
            $l ->put('shelf',$shelf);
           $t[$j]=$l;
           $j++;
        }
        $monda = collect($t);
        return $monda;
    }
        public $userid,$bookid,$revid;

//        public function setshowReviewOfBook(Request $request){
        public function setshowReviewOfBook($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
          $res = DB::insert('insert into reviews values(?,?,?,?,?,?,?,?,?,?)',[$a,$b,$c,$d,$e,$f,$g,$h,$i,$j]);
        }
        public function deleteshowReviewOfBook($a){
            $res = DB::delete('delete from reviews where id=?',[$a]);
        }
        public function getuser(){
             $res = DB::select('select MAX(id) from users');
             return (int)$res;
          }
}
