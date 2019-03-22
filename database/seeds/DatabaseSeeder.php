<?php
use Illuminate\Support\Facades\DB;
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
        factory(App\User::class, 10)->create();
        factory(App\Following::class, 10)->create();
        factory(App\Book::class, 100)->create();
        factory(App\Shelf::class,10)->create();
        DB::update('update users set password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi" where 1 = 1');
    }
}

/*
        $i = 20;
        while ($i <= 30) {
            factory(App\Following::class)->create(
                [
                    'user_id' => 1,
                    'follower_id' => $i,
                ]
            );
            $i++;
             */
/*$i=1;
            while($i <= 5){
            DB::table('users')->insert([
            'name' => Str::random(4),
            'email' => Str::random(4).'@gmail.com',
            'password' => bcrypt('secret'),                                      // The name
            'userName' => Str::random(4),
            'gender'=> 'Male',                                        // The gender of the user
            'country'=>'Egypt',                                     // The country of the user
            'city' => 'Cairo',                                        // The city of the user
            'ratingAvg' => 0.0,                                  // Raging average
            'ratingCount' => 0,
            ]);
            $i++;
            }*/
