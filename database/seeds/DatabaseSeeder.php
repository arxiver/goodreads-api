<?php

use Illuminate\Database\Seeder;
use App\Following;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();
        //factory(App\Following::class,10)->create();
        factory(App\Review::class, 100)->create();

   }
        //factory(App\User::class, 10)->create();
        //factory(App\Following::class,10)->create();
    public function seedFollowing()
    {
    $i = 2;
    while ($i <= 100) {
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
