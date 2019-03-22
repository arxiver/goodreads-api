<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        //
        'user_id' =>$faker->numberBetween(1, 4),
        'book_id'=>$faker->numberBetween(1, 4),
        'body'=> Str::random(10),
        'shelf_name'=>$faker->numberBetween(1, 3),
        'rating'=> $faker->randomFloat(3,0,5),
        'numberLikes'=> $faker->numberBetween(1, 100),
        'numberComments'=> $faker->numberBetween(1, 100),
    ];
});
