<?php

use Faker\Generator as Faker;

$factory->define(App\Likes::class, function (Faker $faker) {
    return [
        'user_id' =>$faker->numberBetween(1, 1),
        'resourse_id' =>$faker->numberBetween(1, 4),
        'resourse_type'=>$faker->numberBetween(0, 2),
    ];
});
