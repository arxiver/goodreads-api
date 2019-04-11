<?php
use App\User;
use Faker\Generator as Faker;


$factory->define(App\Following::class, function (Faker $faker) {
    $usersCount = User::all()->count();
    $randomUserId = rand(1,2 /*$usersCount*/);
    $users = \App\User::all()->pluck('id')->toArray();
    $follower = $faker->randomElement($users);
    while(true)
    {
        //$user = $faker->randomElement($users);
        if($randomUserId !=$follower)
            break;
    }
    return [
        'user_id' => $randomUserId ,
        'follower_id' => $follower,
    ];
});
