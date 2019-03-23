<?php

namespace Tests\Unit;

use Tests\TestCase;
use DB;
use App\User;
use App\Book;
use App\Shelf;
use App\Review;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function nottest()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        // check in the respone about the status in the firstplace
        // check that the respone is valid (The request is done)
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // Get the record of this Review
        $review = Review::find(1);
        $numberLikes =$review['likes_count'];
        // Show the response in the cmd
        echo "\n";
        echo "numberLikes  => ";
        echo $numberLikes;
        echo "\n";
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('POST', 'api/makeLike', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> 1 ,'type'=>0]);
        // Show the response in the cmd
        echo "\n";
        echo $response->content();
        echo "\n";
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'user',
            'resourse_id',
            'resourse_type'
     ]);
      // Get the record of this Review
      $reviewtwo = Review::find(1);
      $numberlikestwo =$reviewtwo['likes_count'];
      // Show the response in the cmd
      echo "\n";
      echo "numberlikes  => ";
      echo $numberlikestwo;
      echo "\n";
    }


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function nottest2()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        // check in the respone about the status in the firstplace
        // check that the respone is valid (The request is done)
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // Get the record of this Review
        $review = Review::find(1);
        $numberlikes =$review['likes_count'];
        // Show the response in the cmd
        echo "\n";
        echo "numberlikes  => ";
        echo $numberlikes;
        echo "\n";
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('DELETE', 'api/unlike', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> 21]);
        // Show the response in the cmd
        echo "\n";
        echo $response->content();
        echo "\n";
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'Message'
        ]);
      // Get the record of this Review
      $reviewtwo = Review::find(1);
      $numberlikestwo =$reviewtwo['likes_count'];
      // Show the response in the cmd
      echo "\n";
      echo "numberlikes  => ";
      echo $numberlikestwo;
      echo "\n";
    }
}
