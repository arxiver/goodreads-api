<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id',
        'title',
        'isbn',
        'img_url',
        'publication_date',
        'publisher',
        'language',
        'description',
        'reviews_count',
        'ratings_count',
        'ratings_avg',
        'link',
        'author_id',
        'pages_no',
        'updated_at',
        'created_at'
    ];
}
