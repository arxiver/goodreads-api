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
            "image_link"    => "https://www.kalw.org/sites/kalw/files/styles/medium/public/201601/Nature-Brain.jpg"
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
            "image_link"    => "https://drive.google.com/open?id=1x3U1Fikm5Y_gugc0z_w9Rw_YJaa49cMD"
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
            "image_link"    => "https://drive.google.com/open?id=1e4u3wVSMy5-vz_uMqETDpb6rQTroIsXq"
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
            "image_link"    => "https://natureconservancy-h.assetsadobe.com/is/image/content/dam/tnc/nature/en/photos/tnc_36722630_Full.jpg?crop=0,0,6549,4912&wid=580&hei=435&scl=11.291954022988506"
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
            "image_link"    => "https://www.popsci.com/sites/popsci.com/files/styles/1000_1x_/public/images/2018/06/edinburgh_meadows_2008_middle_meadow_walk_by_catharine_ward_thompson.jpg?itok=ysmDaSjD&fc=50,50"
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
            "image_link"    => "https://drive.google.com/open?id=1BqB_oeiQcUoO2XHWMZ-ddecan6c9krL2"
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
            "image_link"    => "https://drive.google.com/open?id=1ya-CNiHj3dffWoN_pvpMQ0EKzbsox7pE"
        );
        User::create($Create7);

    }
}
