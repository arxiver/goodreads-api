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
            "email"         => "test@yahoo.com",
            "password"      => "password",
            "name"          => "test",
            "gender"        => "female",
            "username"      => "test",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Canada",
            "city"          => "Atawwa",
            "image_link"    => "default.jpg"
        );
        User::create($Create);


        $Create2 = array(
            "email"         => "ta7a@yahoo.com",
            "password"      => "password",
            "name"          => "ta7a",
            "gender"        => "male",
            "username"      => "ta7a",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Egypt",
            "city"          => "Cairo",
            "image_link"    => "ta7a.jpg"
        );
        User::create($Create2);

        $Create3 = array(
            "email"         => "waleed@yahoo.com",
            "password"      => "password",
            "name"          => "waleed",
            "gender"        => "male",
            "username"      => "waleed",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Egypt",
            "city"          => "Cairo",
            "image_link"    => "waleed.jpg"
        );
        User::create($Create3);

        $Create4 = array(
            "email"         => "Nour@yahoo.com",
            "password"      => "password",
            "name"          => "Nour",
            "gender"        => "female",
            "username"      => "Nour",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Egypt",
            "city"          => "Cairo",
            "image_link"    => "default.jpg"
        );
        User::create($Create4);

        $Create5 = array(
            "email"         => "Salma@yahoo.com",
            "password"      => "password",
            "name"          => "Salma",
            "gender"        => "female",
            "username"      => "Salma",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Egypt",
            "city"          => "Cairo",
            "image_link"    => "default.jpg"
        );
        User::create($Create5);

        $Create6 = array(
            "email"         => "TheLeader@yahoo.com",
            "password"      => "password",
            "name"          => "TheLeader",
            "gender"        => "male",
            "username"      => "LoLo",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Egypt",
            "city"          => "Cairo",
            "image_link"    => "Leader.jpg"
        );
        User::create($Create6);

        $Create7 = array(
            "email"         => "Mohamed@yahoo.com",
            "password"      => "password",
            "name"          => "Mohamed",
            "gender"        => "male",
            "username"      => "Mido",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Egypt",
            "city"          => "Cairo",
            "image_link"    => "mohamed.jpg"
        );
        User::create($Create7);

    }
}
