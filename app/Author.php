<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function setauthor($a,$b,$c,$d){
        $res = DB::insert('insert into authors values(?,?,?,?)',[$a,$b,$c,$d]);
    }
    public function deleteauthor($a){
        $res = DB::delete('delete from authors where id=?',[$a]);
    }
}
