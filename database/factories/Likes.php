<?php

use Faker\Generator as Faker;

$factory->define(App\Likes::class, function (Faker $faker) {
    $users = \App\User::all()->pluck('id')->toArray();
    $rev = \App\Review::all()->pluck('id')->toArray();
    return [
        'user_id' =>$faker->numberBetween(1,2),
        'resourse_id' =>$faker->randomElement($rev),
        'resourse_type'=>$faker->numberBetween(0, 0),
    ];
});
