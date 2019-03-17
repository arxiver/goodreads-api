<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        //
        'user_id' =>$faker->numberBetween(1, 100),
        'book_id'=>$faker->numberBetween(1, 100),
        'body'=> Str::random(10),
        'shelf_name'=> $faker->randomElement(['read','to-read','currently-reading']),
        'rating'=> $faker->randomFloat(3,0,5),
        'number_likes'=> $faker->numberBetween(1, 100),
        'number_comments'=> $faker->numberBetween(1, 100),
    ];
});
