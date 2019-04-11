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
        $Create = array(
            "email"         => "test1@yahoo.com",
            "password"      => "password",
            "name"          => "test1",
            "gender"        => "female",
            "username"      => "test1",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Canada",
            "city"          => "Atawwa",
            "image_link"    => "default.jpg"
        );
        User::create($Create);
        $Create2 = array(
            "email"         => "test2@yahoo.com",
            "password"      => "password",
            "name"          => "test2",
            "gender"        => "female",
            "username"      => "test2",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Canada",
            "city"          => "Atawwa",
            "image_link"    => "default.jpg"
        );
        User::create($Create2);

    }
}
