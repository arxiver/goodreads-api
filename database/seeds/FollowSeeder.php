<?php

use Illuminate\Database\Seeder;
use App\Following;
class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Create = array(
            'user_id' => 1,
            'follower_id' => 2,
         );
        Following::create($Create);


        $Create2 = array(
            'user_id' => 1,
            'follower_id' => 3,
         );
        Following::create($Create2);

        $Create3 = array(
            'user_id' => 1,
            'follower_id' => 4,
           );
        Following::create($Create3);

        $Create4 = array(
            'user_id' => 1,
            'follower_id' => 5,
          );
        Following::create($Create4);

        $Create5 = array(
            'user_id' => 1,
            'follower_id' => 6,
           );
        Following::create($Create5);

        $Create6 = array(
            'user_id' => 1,
            'follower_id' => 7,
            );
        Following::create($Create6);

        $Create7 = array(
            'user_id' => 2,
            'follower_id' => 1,
            );
        Following::create($Create7);

        $Create8 = array(
            'user_id' => 2,
            'follower_id' => 3,
            );
        Following::create($Create8);

        $Create9 = array(
            'user_id' => 2,
            'follower_id' => 4,
            );
        Following::create($Create9);

        $Create10 = array(
            'user_id' => 2,
            'follower_id' => 5,
            );
        Following::create($Create10);

        $Create11 = array(
            'user_id' => 2,
            'follower_id' => 6,
            );
        Following::create($Create11);

        $Create12 = array(
            'user_id' => 2,
            'follower_id' => 7,
            );
        Following::create($Create12);

        $Create13 = array(
            'user_id' => 3,
            'follower_id' => 1,
            );
        Following::create($Create13);


        $Create14 = array(
            'user_id' => 3,
            'follower_id' => 2,
            );
        Following::create($Create14);

        $Create15 = array(
            'user_id' => 3,
            'follower_id' => 4,
            );
        Following::create($Create15);

        $Create16 = array(
            'user_id' => 3,
            'follower_id' => 5,
            );
        Following::create($Create16);

        $Create17 = array(
            'user_id' => 3,
            'follower_id' => 6,
            );
        Following::create($Create17);

        $Create18 = array(
            'user_id' => 3,
            'follower_id' => 7,
            );
        Following::create($Create18);

        $Create19 = array(
            'user_id' => 4,
            'follower_id' => 1,
            );
        Following::create($Create19);

        $Create20 = array(
            'user_id' => 4,
            'follower_id' => 2,
            );
        Following::create($Create20);

        $Create21 = array(
            'user_id' => 4,
            'follower_id' => 3,
            );
        Following::create($Create21);

        $Create22 = array(
            'user_id' => 4,
            'follower_id' => 5,
            );
        Following::create($Create22);

        $Create23 = array(
            'user_id' => 4,
            'follower_id' => 6,
            );
        Following::create($Create23);

        $Create24 = array(
            'user_id' => 4,
            'follower_id' => 7,
            );
        Following::create($Create24);

        $Create25 = array(
            'user_id' => 5,
            'follower_id' => 1,
            );
        Following::create($Create25);


        $Create26 = array(
            'user_id' => 5,
            'follower_id' => 2,
            );
        Following::create($Create26);


        $Create27 = array(
            'user_id' => 5,
            'follower_id' => 3,
            );
        Following::create($Create27);


        $Create28 = array(
            'user_id' => 5,
            'follower_id' => 4,
            );
        Following::create($Create28);


        $Create29 = array(
            'user_id' => 5,
            'follower_id' => 6,
            );
        Following::create($Create29);


        $Create30 = array(
            'user_id' => 5,
            'follower_id' => 7,
            );
        Following::create($Create30);
    }
}
