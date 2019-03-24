<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Response;

class Book extends Model
{
    protected $fillable = [
        'id',
        'title',
        'isbn',
        'img_url',
        'publication_date',
        'publisher',
        'language',
        'description',
        'reviews_count',
        'ratings_count',
        'ratings_avg',
        'link',
        'author_id',
        'pages_no',
        'updated_at',
        'created_at'
    ];
    public function setBook($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p){
        $res = DB::insert('insert into books values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p]);
    }
    public function setgenre($a,$b,$c){
        $res = DB::insert('insert into genre values(?,?,?)',[$a,$b,$c]);
    }
    public function setauthor($a,$b,$c,$d){
        $res = DB::insert('insert into authors values(?,?,?,?)',[$a,$b,$c,$d]);
    }
    public function deleteBook($a){
        $res = DB::delete('delete from books where id=?',[$a]);
    }
    public function deletegenre($a){
        $res = DB::delete('delete from genre where id=?',[$a]);
    }
    public function deleteauthor($a){
        $res = DB::delete('delete from authors where id=?',[$a]);
    }
}
