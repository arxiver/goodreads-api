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
}
