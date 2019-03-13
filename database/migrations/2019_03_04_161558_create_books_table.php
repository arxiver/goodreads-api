<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('isbn');
            $table->string('imgUrl');
            $table->date('publicationDate');
            $table->string('publisher');
            $table->string('description');
            $table->integer('reviewsCount');
            $table->integer('ratingsCount');
            $table->float('ratingsAvg');
            $table->string('link');
            $table->integer('authorId');
            $table->integer('pagesNum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
