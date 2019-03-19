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
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title');
            $table->integer('isbn')->unique();
            $table->string('imgUrl');
            $table->date('publicationDate');
            $table->string('publisher');
            $table->string('language');
            $table->string('description');
            $table->integer('reviewsCount')->nullable();
            $table->integer('ratingsCount')->nullable();
            $table->float('ratingsAvg')->nullable();
            $table->string('link');
            $table->integer('authorId');
            $table->integer('pagesNum')->nullable();
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
