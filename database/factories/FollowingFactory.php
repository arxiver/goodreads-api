<?php

use Faker\Generator as Faker;

$factory->define(App\Following::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 4),
        'follower_id' => $faker->numberBetween(1, 4),
    ];
});
