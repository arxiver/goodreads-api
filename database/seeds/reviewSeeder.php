<?php

use Illuminate\Database\Seeder;
use App\Review;
use Illuminate\Support\Arr;


class reviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shelf = [0,1,2];
        $rate  = [0,1,2,3,4,5];
        $Create = array(
            'user_id' =>1,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
        );
        Review::create($Create);


        $Create2 = array(
            'user_id' =>1,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
         );
        Review::create($Create2);

        $Create3 = array(
            'user_id' =>1,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
           );
        Review::create($Create3);

        $Create4 = array(
            'user_id' =>1,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
          );
        Review::create($Create4);

        $Create5 = array(
            'user_id' =>2,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
           );
        Review::create($Create5);

        $Create6 = array(
            'user_id' =>2,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create6);

        $Create7 = array(
            'user_id' =>2,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create7);

        $Create8 = array(
            'user_id' =>2,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create8);

        $Create9 = array(
            'user_id' =>3,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create9);

        $Create10 = array(
            'user_id' =>3,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create10);

        $Create11 = array(
            'user_id' =>3,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create11);

        $Create12 = array(
            'user_id' =>3,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create12);

        $Create13 = array(
            'user_id' =>4,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create13);


        $Create14 = array(
            'user_id' =>4,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create14);

        $Create15 = array(
            'user_id' =>4,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create15);

        $Create16 = array(
            'user_id' =>4,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create16);

        $Create17 = array(
            'user_id' =>5,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create17);

        $Create18 = array(
            'user_id' =>5,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create18);

        $Create19 = array(
            'user_id' =>5,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create19);

        $Create20 = array(
            'user_id' =>5,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create20);

        $Create21 = array(
            'user_id' =>6,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create21);

        $Create22 = array(
            'user_id' =>6,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create22);

        $Create23 = array(
            'user_id' =>6,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create23);

        $Create24 = array(
            'user_id' =>6,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create24);

        /*$Create25 = array(
            'user_id' =>7,
            'book_id'=>1,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create25);


        $Create26 = array(
            'user_id' =>7,
            'book_id'=>2,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create26);


        $Create27 = array(
            'user_id' =>7,
            'book_id'=>3,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create27);


        $Create28 = array(
            'user_id' =>7,
            'book_id'=>4,
            'body'=> Str::random(10),
            'shelf_name' => Arr::random($shelf),
            'rating'=> Arr::random($rate),
            'likes_count'=> 0,
            'comments_count'=> 0,
            'updated_at' =>now(),
            'created_at'=>now(),
            );
        Review::create($Create28);*/
    }
}
