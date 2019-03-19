<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id',
        'title',
        'isbn',
        'imgUrl',
        'publicationDate',
        'publisher',
        'language',
        'description',
        'reviewsCount',
        'ratingsCount',
        'ratingsAvg',
        'link',
        'authorId',
        'pagesNum',
        'updated_at',
        'created_at'
    ];
}
