<?php

use Faker\Generator as Faker;

$factory->define(App\Genre::class, function (Faker $faker) {
    $books = \App\Book::all()->pluck('id')->toArray();
    return [
        'book_id'=>$faker->randomElement($books),
        'type' =>$faker->colorName,
    ];
});
