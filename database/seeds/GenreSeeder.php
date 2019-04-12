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
            'type' =>"Young Adult,Historical,Fiction,Adult"
        );
        Genre::create($Create);

        $Create2 = array(
            'book_id'=>2,
            'type' =>"Young Adult,Retellings,Fantacy"
        );
        Genre::create($Create2);

        $Create3 = array(
            'book_id'=>3,
            'type' =>"Young Adult,Contemporary,Fiction,"
        );
        Genre::create($Create3);

        $Create4 = array(
            'book_id'=>4,
            'type' =>"Young Adult,Contemporary,Fiction,Science Fiction > Dystopia"
        );
        Genre::create($Create4);
    }
}
