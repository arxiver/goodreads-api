<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    //
    protected $hidden = [
        'user_id' , 'updated_at'
    ];

}
