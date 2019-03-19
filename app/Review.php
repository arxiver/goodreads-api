<?php

namespace App;

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
}
