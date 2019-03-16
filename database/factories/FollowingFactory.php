<?php

use Faker\Generator as Faker;

$factory->define(App\Following::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(10, 100),
        'follower_id' => $faker->numberBetween(2, 558),
    ];
});
