<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Following;
use App\User;
use App\Book;
use App\Review;
//use App\UserSeeder;
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
        factory(App\User::class, 10)->create();
        $this->call(UserSeeder::class);
        //factory(App\Following::class,10)->create();
        factory(App\Book::class, 100)->create();
        //factory(App\Following::class, 100)->create();
        factory(Comment::class,20)->create();
        factory(Likes::class,20)->create();
        factory(App\Review::class,4)->create();
        factory(App\Shelf::class,10)->create();

        }
}

