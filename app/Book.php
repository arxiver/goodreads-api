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
        $res = DB::insert('insert into genre (id,book_id,type) values(?,?,?)',[$a,$b,$c]);
    }
    public function setauthor($a,$b,$c,$d){
        $res = DB::insert('insert into authors values(?,?,?,?)',[$a,$b,$c,$d]);
    }
    public function setshelves($a,$b,$c,$d){
        $res = DB::insert('insert into shelves(id,book_id,user_id,type) values(?,?,?,?)',[$a,$b,$c,$d]);
    }
    public function setuser($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$M,$N,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y){
        $res = DB::insert('INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `link`, `image_link`, `small_image_link`, `about`, `age`, `gender`, `country`, `city`, `joined_at`, `last_active`, `followers_count`, `following_count`, `rating_avg`, `rating_count`, `books_count`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$M,$N,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y]);
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
    public function deleteshelves($a){
        $res = DB::delete('delete from shelves where id=?',[$a]);
    }
    public function deleteuser($a){
        $res = DB::delete('delete from users where id=?',[$a]);
    }
}
