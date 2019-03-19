<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = [
        "user_id", 
        "resourseId",                  
        "resourseType" ,         
        'updated_at',
        'created_at'
    ];
}
