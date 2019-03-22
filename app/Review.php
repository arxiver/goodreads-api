<?php

namespace App;

use Illuminate\Http\Request;
use DB;
use Response;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "user_id", 
        "book_id",                  
        "body" ,         
        "rating",
        'updated_at',
        'created_at'
    ];
        public $userid,$bookid,$revid;

//        public function setshowReviewOfBook(Request $request){
        public function setshowReviewOfBook($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
          $res = DB::insert('insert into reviews values(?,?,?,?,?,?,?,?,?,?)',[$a,$b,$c,$d,$e,$f,$g,$h,$i,$j]);
        }
        public function deleteshowReviewOfBook($a){
            $res = DB::delete('delete from reviews where id=?',[$a]);
        }
}
