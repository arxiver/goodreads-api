<?php
use App\User;
use App\Book;
use Faker\Generator as Faker;

$factory->define(App\Shelf::class, function (Faker $faker) {
    $usersCount = User::all()->count();
    $randomUserId = rand(1, $usersCount);

    $booksCount = Book::all()->count();
    $randomBookId = rand(1, $booksCount);

    return [
        'user_id' => $randomUserId,
        'book_id' => $randomBookId,
        'type' => rand(1,3)
    ];
});
