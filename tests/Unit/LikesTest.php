<?php

namespace Tests\Unit;

use Tests\TestCase;
use DB;
use App\User;
use App\Book;
use App\Shelf;
use App\Review;
use App\Likes;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testmakeLike()
    {
       // Get the number of users in the database
       $usersCount = User::all()->count();
       // Get id for a user in the databas eto login with it 
       $randomUserId = rand(1, $usersCount);
       // Get the record of this user
       $user = User::find($randomUserId);
       // show the user id 
       echo "\n";
       echo 'userId  => ';
       echo $randomUserId;
       echo "\n";
       //select a review from the review of this user to edit it 
       $reviewByUser = (DB::select( 'SELECT id FROM reviews WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
       // assertion fail when a user doesn't have a review 
       $this->assertNotEmpty($reviewByUser);
       // show the reviewId
       echo "\n";
       echo 'reviewId => ';
       echo $reviewByUser[0]->id;
       echo "\n";
       // store the reviewId
       $reviewId = $reviewByUser[0]->id;
       // Get the record of this review
       $review = Review::find($reviewId);
       // Post request for login 
       $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
       // Convert the response to array to be able to access the elements of the response
       $jsonArray = json_decode($loginResponse->content(),true);
       // store the token in the variable  $token
       $token = $jsonArray['token'];
       $numberLikes =$review['likes_count'];
       // Show the response in the cmd
       echo "\n";
       echo "numberlikes  => ";
       echo $numberLikes;
       echo "\n";
       // post request will add or update a record to the selves table 
       // becouse each book will be reviewed must be read 
       // then create a record in the reviews table 
       // update some atributes in the tables of users & book 
       $response = $this->json('POST', 'api/makeLike', [ 'token'=> $token ,'token_type' =>'bearer' ,
       'id'=> $reviewId ,'type'=>0]);
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
     $reviewtwo = Review::find($reviewId );
     $numberLikestwo =$reviewtwo['likes_count'];
     // Show the response in the cmd
     echo "\n";
     echo "numberlikes  => ";
     echo $numberLikestwo;
     echo "\n";
    }


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUnlike()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // show the user id 
        echo "\n";
        echo 'userId  => ';
        echo $randomUserId;
        echo "\n";
        //select a review from the review of this user to edit it 
        $likeByUser = (DB::select( 'SELECT id FROM likes WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
        // assertion fail when a user doesn't have a review 
        $this->assertNotEmpty($likeByUser);
        // show the reviewId
        echo "\n";
        echo 'likeId => ';
        echo $likeByUser[0]->id;
        echo "\n";
        // store the reviewId
        $likeId = $likeByUser[0]->id;
        // Get the record of this review
        $like = Likes::find($likeId);
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // Get the record of this Review
        $number=$like['resourse_id'];
        $review = Review::find($number);
        $numberLikes =$review['likes_count'];
        // Show the response in the cmd
        echo "\n";
        echo "numberComments  => ";
        echo $numberLikes;
        echo "\n";
        // delete request will  
        // delete a record in the comments table 
        // update some atributes in the tables of users & book 
        $response = $this->json('DELETE', 'api/unlike', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $like['id']]);
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
      $reviewtwo = Review::find($number);
      $numberLikestwo =$reviewtwo['likes_count'];
      // Show the response in the cmd
      echo "\n";
      echo "numberComments  => ";
      echo $numberLikestwo;
      echo "\n";
      $this->assertGreaterThan($numberLikestwo, $numberLikes);
    }
}
