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
        $Create1 = array(
            'book_id'=>1,
            'type' =>"Historical"
        );
        Genre::create($Create1);

        $Create2 = array(
            'book_id'=>2,
            'type' =>"Fantacy"
        );
        Genre::create($Create2);

        $Create3 = array(
            'book_id'=>3,
            'type' =>"Young Adult"
        );
        Genre::create($Create3);

        $Create4 = array(
            'book_id'=>4,
            'type' =>"Fiction"
        );
        Genre::create($Create4);
    }
}
