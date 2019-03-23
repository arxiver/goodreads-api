<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => str_random(6),
        'isbn' => $faker->numberBetween(10000, 1500000),
        'img_url' => str_random(5),
        'publication_date'=> $faker->date(),
        'publisher' => str_random(10),
        'language' => str_random(5),
        'description' => str_random(20),
        'link'=>$faker->url,
        'author_id' => $faker->numberBetween(1, 100)

    ];
});
