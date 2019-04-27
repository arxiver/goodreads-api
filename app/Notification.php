<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
       'read_at'
    ];
    protected $table = 'notifications';
    protected $casts = [
        'data' => 'array'
    ];
}
