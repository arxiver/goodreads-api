<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Updates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('updates', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('actorId');
            $table->integer('actionId');
            $table->integer('actionType');
            $table->integer('numComments');
            $table->integer('numLikes');
            $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('updates');
    }
}
