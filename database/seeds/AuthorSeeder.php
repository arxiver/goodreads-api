<?php

use Illuminate\Database\Seeder;
use App\Author;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Create = array(
            'author_name' =>"G. Willow Wilson"
        );
        Author::create($Create);

        $Create2 = array(
            'author_name' =>"Meagan Spooner"
        );
        Author::create($Create2);

        $Create3 = array(
            'author_name' =>"Amy Rose Capetta"
        );
        Author::create($Create3);

        $Create4 = array(
            'author_name' =>"Samira Ahmed"
        );
        Author::create($Create4);
    }
}
