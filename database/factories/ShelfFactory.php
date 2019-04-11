<?php
use App\User;
use App\Book;
use Faker\Generator as Faker;

$factory->define(App\Shelf::class, function (Faker $faker) {
    $usersCount = User::all()->count();
    $randomUserId = rand(1, $usersCount);

    $booksCount = Book::all()->count();
    $randomBookId = rand(1, $booksCount);

    $users = \App\User::all()->pluck('id')->toArray();
    $books = \App\Book::all()->pluck('id')->toArray();
    return [
        'user_id' =>$faker->randomElement($users),
        'book_id' => $faker->randomElement($books),
        'type' => rand(1,3)
    ];
});
