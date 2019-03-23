<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();                // The id
            $table->string('name');                                        // The name             
            $table->string('userName')->unique();                          // The username (unique)
            $table->string('email')->unique();                             // The Email
            $table->timestamp('email_verified_at')->nullable();            
            $table->string('password');                                    // Password
            $table->string('link')->nullable();                                        // The link of the user
            $table->string('imageLink')->nullable();                                   // The link of the image
            $table->string('smallImageUrl')->nullable();                               
            $table->string('about')->nullable();                                       // bio about the user
            $table->integer('age')->nullable();                                        // The age of the user
            $table->char('gender');                                        // The gender of the user
            $table->string('country');                                     // The country of the user
            $table->string('city');                                        // The city of the user
            $table->date('joinedAt')->default(now());                                      // The date of his joining in the website
            $table->datetime('lastActive')->default(now());                                // Last active
            $table->integer('followersCount')->default(0);                             // followers count
            $table->integer('followingCounts')->default(0);                            // following count
            $table->float('ratingAvg')->default(0);                                    // Raging average
            $table->integer('ratingCount')->default(0); 
            $table->integer('bookCount')->default(0);                                // Book count
            $table->date("birthDay")->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
