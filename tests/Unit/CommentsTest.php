<?php

namespace Tests\Unit;
use App\User;
use App\Book;
use App\Review;
use App\Shelf;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{
    /**
     * 
     * @return void
     */
    public function testmakeComment()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // show the user id 
        /*echo "\n";
        echo 'userId  => ';
        echo $randomUserId;
        echo "\n";*/
        //select a review from the review of this user to edit it 
        $reviewByUser = (DB::select( 'SELECT id FROM reviews WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
        // assertion fail when a user doesn't have a review 
        $this->assertNotEmpty($reviewByUser);
        // show the reviewId
        /*echo "\n";
        echo 'reviewId => ';
        echo $reviewByUser[0]->id;
        echo "\n";*/
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
        $numberComments =$review['comments_count'];
        // Show the response in the cmd
        /*echo "\n";
        echo "numberComments  => ";
        echo $numberComments;
        echo "\n";*/
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('POST', 'api/makeComment', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $reviewId ,'type'=>0,'body' =>'Woooooooooooooow  it is a great booooook']);
        // Show the response in the cmd
        /*echo "\n";
        echo $response->content();
        echo "\n";*/
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'user',
            'resourse_id',
            'resourse_type',
            'comment_body'
     ]);
      // Get the record of this Review
      $reviewtwo = Review::find($reviewId );
      $numberCommentstwo =$reviewtwo['comments_count'];
      // Show the response in the cmd
      /*echo "\n";
      echo "numberComments  => ";
      echo $numberCommentstwo;
      echo "\n";*/
    }


    /**
     * 
     * @return void
     */
    public function testdeleteComment()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // show the user id 
        /*echo "\n";
        echo 'userId  => ';
        echo $randomUserId;
        echo "\n";*/
        //select a review from the review of this user to edit it 
        $commentByUser = (DB::select( 'SELECT id FROM comments WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
        // assertion fail when a user doesn't have a review 
        $this->assertNotEmpty($commentByUser);
        // show the reviewId
        /*echo "\n";
        echo 'commentId => ';
        echo $commentByUser[0]->id;
        echo "\n";*/
        // store the reviewId
        $commentId = $commentByUser[0]->id;
        // Get the record of this review
        $comment = Comment::find($commentId);
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        // Get the record of this Review
        $number=$comment['resourse_id'];
        $review = Review::find($number);
        $numberComments =$review['comments_count'];
        // Show the response in the cmd
        /*echo "\n";
        echo "numberComments  => ";
        echo $numberComments;
        echo "\n";*/
        // delete request will  
        // delete a record in the comments table 
        // update some atributes in the tables of users & book 
        $response = $this->json('DELETE', 'api/deleteComment', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $comment['id']]);
        // Show the response in the cmd
        /*echo "\n";
        echo $response->content();
        echo "\n";*/
        // Check from the structure of the return json 
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'Message'
     ]);
      // Get the record of this Review
      $reviewtwo = Review::find($number);
      $numberCommentstwo =$reviewtwo['comments_count'];
      // Show the response in the cmd
      /*echo "\n";
      echo "numberComments  => ";
      echo $numberCommentstwo;
      echo "\n";*/
    }

}
