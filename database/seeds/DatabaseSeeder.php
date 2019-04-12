<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Following;
use App\User;
use App\Book;
use App\Review;
use App\Comment;
use App\Likes;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Author::class, 10)->create();
        factory(App\Book::class, 50)->create();
        factory(App\Review::class,5)->create();
        factory(App\Genre::class, 5)->create();
        factory(App\Comment::class,5)->create();
        factory(App\Likes::class,5)->create();
        factory(App\Shelf::class,5)->create();
        factory(App\Following::class,5)->create();

    }
}

