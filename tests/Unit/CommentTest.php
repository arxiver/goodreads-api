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

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testComment()
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
        $review = Review::find(2);
        $numberComments =$review['comments_count'];
        // Show the response in the cmd
        echo "\n";
        echo "numberComments  => ";
        echo $numberComments;
        echo "\n";
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('POST', 'api/makeComment', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> 2 ,'type'=>0,'body' =>'Woooooooooooooow  it is a great booooook']);
        // Show the response in the cmd
        echo "\n";
        echo $response->content();
        echo "\n";
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'user',
            'resourse_id',
            'resourse_type',
            'comment_body'
     ]);
      // Get the record of this Review
      $reviewtwo = Review::find(2);
      $numberCommentstwo =$reviewtwo['comments_count'];
      // Show the response in the cmd
      echo "\n";
      echo "numberComments  => ";
      echo $numberCommentstwo;
      echo "\n";
    }


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDeleteComment()
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
        $review = Review::find(2);
        $numberComments =$review['comments_count'];
        // Show the response in the cmd
        echo "\n";
        echo "numberComments  => ";
        echo $numberComments;
        echo "\n";
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('DELETE', 'api/deleteComment', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> 28]);
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
      $reviewtwo = Review::find(2);
      $numberCommentstwo =$reviewtwo['comments_count'];
      // Show the response in the cmd
      echo "\n";
      echo "numberComments  => ";
      echo $numberCommentstwo;
      echo "\n";
    }
}
