<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id", 
        "resourseId",                  
        "resourseType" ,         
        "body",
        'updated_at',
        'created_at'
    ];
}
