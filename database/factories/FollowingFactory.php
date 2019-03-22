<?php
use App\User;
use Faker\Generator as Faker;


$factory->define(App\Following::class, function (Faker $faker) {
    $usersCount = User::all()->count();
    $randomUserId = rand(1, $usersCount);
    return [
        'user_id' => $randomUserId,
        'follower_id' => $faker->numberBetween(2, $usersCount),
    ];
});
