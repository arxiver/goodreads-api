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
            $table->unsignedInteger('actorId');
            $table->unsignedInteger('actionId');
            $table->unsignedInteger('actionType');
            $table->unsignedInteger('numComments');
            $table->unsignedInteger('numLikes');
            $table->foreign('actorId')->references('id')->on('users');
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
        //
        Schema::dropIfExists('updates');
    }
}
