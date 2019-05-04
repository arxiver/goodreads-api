<?php

use Illuminate\Database\Seeder;
use App\Genre;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Create = array(
            'book_id'=>1,
            'type' =>"Young Adult"
        );
        Genre::create($Create);
        $Create2 = array(
            'book_id'=>1,
            'type' =>"Historical"
        );
        Genre::create($Create2);
        $Create3 = array(
            'book_id'=>1,
            'type' =>"Fiction"
        );
        Genre::create($Create3);
        $Create4 = array(
            'book_id'=>1,
            'type' =>"Adult"
        );
        Genre::create($Create4);

        $Create5 = array(
            'book_id'=>2,
            'type' =>"Fantacy"
        );
        Genre::create($Create5);
        $Create6 = array(
            'book_id'=>2,
            'type' =>"Retellings"
        );
        Genre::create($Create6);
        $Create7 = array(
            'book_id'=>2,
            'type' =>"Young Adult"
        );
        Genre::create($Create7);

        $Create8 = array(
            'book_id'=>3,
            'type' =>"Young Adult"
        );
        Genre::create($Create8);
        $Create9 = array(
            'book_id'=>3,
            'type' =>"Contemporary"
        );
        Genre::create($Create9);
        $Create10 = array(
            'book_id'=>3,
            'type' =>"Fiction"
        );
        Genre::create($Create10);

        $Create11 = array(
            'book_id'=>4,
            'type' =>"Young Adult"
        );
        Genre::create($Create11);
        $Create12 = array(
            'book_id'=>4,
            'type' =>"Contemporary"
        );
        Genre::create($Create12);
        $Create13 = array(
            'book_id'=>4,
            'type' =>"Fiction"
        );
        Genre::create($Create13);
        $Create14 = array(
            'book_id'=>4,
            'type' =>"Science Fiction > Dystopia"
        );
        Genre::create($Create14);
    }
}
