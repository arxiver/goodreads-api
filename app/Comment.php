<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "resourse_id",
        "resourse_type" ,
        "body",
        'updated_at',
        'created_at'
    ];
}
