<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = [
        "user_id",
        "resourse_id",
        "resourse_type" ,
        'updated_at',
        'created_at'
    ];
}
