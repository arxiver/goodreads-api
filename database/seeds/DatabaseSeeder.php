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
        factory(App\User::class, 4)->create();
        DB::update( 'update users set password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi" where 1 = 1');
        factory(Book::class,4)->create();
        factory(Comment::class,20)->create();
        factory(Likes::class,20)->create();
        factory(App\Review::class,4)->create();
        factory(App\Shelf::class,10)->create();
        $i = 1;
        while ($i <= 5) {
            factory(App\Following::class)->create(
                [
                    'user_id' => 1,
                    'follower_id' => $i,
                ]
            );
            $i++;
            }
        }
    }
}

