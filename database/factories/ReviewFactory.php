<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    $users = \App\User::all()->pluck('id')->toArray();
    $books = \App\Book::all()->pluck('id')->toArray();
    return [
        //
        'user_id' =>$faker->randomElement($users),
        'book_id'=>$faker->randomElement($books),
        'body'=> Str::random(10),
        'shelf_name'=>$faker->numberBetween(0, 2),
        'rating'=> $faker->randomFloat(3,0,5),
        'likes_count'=> 0,
        'comments_count'=> 0,
    ];
});
