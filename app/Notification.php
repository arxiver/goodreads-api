<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
       'read_at','read','data'
    ];
    protected $hidden = [
        'id' , 'type'
    ];
    protected $table = 'notifications';
    protected $casts = [
        'data' => 'array'
    ];
}
