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
            "username"      => "test21",
            "age"           => 21,
            "birthday"      => date("Y-n-j", strtotime("1998-2-21")),
            "country"       => "Canada",
            "city"          => "Atawwa",
            "image_link"    => "default.jpg"
        );
        User::create($Create);

    }
}
