<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1, 4),
        'resourseId'=>$faker->numberBetween(1, 4),                  
        'resourseType'=>$faker->numberBetween(0, 2),        
        'body'=>Str::random(20),
    ];
});
