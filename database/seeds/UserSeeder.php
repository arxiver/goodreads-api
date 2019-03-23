<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$Create = array(
            "email"         => "test@yahoo.com",
            "password"      => Hash::make("testpassword"),
            "name"          => "test",
            "gender"        => "female",
            "userName"      => "test21",
            "age"           => 21,
            "birthDay"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Canada",
            "city"          => "Atawwa",
            "ratingCount"   => 0,
            "ratingAvg"     => 0,
            "followingCounts"=>0,
            "followersCount"=> 0,
            "bookCount"     => 0,
            "lastActive"    => now(),
            "joinedAt"      => date("Y-n-j")
        );
        User::create($Create);*/
        //factory(User::class)->create();

    }
}
