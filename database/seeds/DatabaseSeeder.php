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
        $this->call(UserSeeder::class);
        factory(App\User::class, 10)->create();
        //DB::update('update users set password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi" where 1 = 1');
        //factory(App\Following::class,10)->create();
        factory(App\Book::class, 100)->create();
        //factory(App\Following::class, 100)->create();
        factory(App\Comment::class,50)->create();
        factory(App\Likes::class,50)->create();
        factory(App\Review::class,4)->create();
        factory(App\Shelf::class,10)->create();
        factory(App\Following::class,10)->create();

    }
}

