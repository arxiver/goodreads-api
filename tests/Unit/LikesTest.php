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
     * test
     * @return void
     */
    public function DeleteReview($review_id,$token)
    {
        $review = Review::find($review_id);
        //get reviewid
        $reviewId = $review['id'];
        $response = $this->json('DELETE', 'api/reviwes/delete', [ 'token'=> $token ,
        'token_type' =>'bearer' , 'reviewId' =>$reviewId ]);
    }

   public function CreateReview($token)
    {
        $rate=2;
        // Get the number of books in the database
        $booksCount = Book::all()->count();
        // Get id for a book in the database to create review with it 
        $randomBookId = rand(1, $booksCount);
        // Get the record of this book
        $book = Book::find($randomBookId);
        $response = $this->json('POST', 'api/reviwes/create', [ 'token'=> $token ,'token_type' =>'bearer',
        'bookId' => $book['id'], 'rating' => $rate ,'shelf'=> 2 ,
        'body' =>'Woooooooooooooow  it is a great booooook']);
    }


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function Unlike($token,$review_id)
    {
        $review = Review::find($review_id);
        $numberLikes =$review['likes_count'];
        
        $response = $this->json('POST', 'api/LikeOrUnLike', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $review['id']]);
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'Message'
     ]);
      // Get the record of this Review
      $reviewtwo = Review::find($review_id);
      $numberLikestwo =$reviewtwo['likes_count'];
      $this->assertGreaterThan($numberLikestwo, $numberLikes);
    }

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
       $randomUserId = 1;//rand(1, $usersCount);
       // Get the record of this user
       $user = User::find($randomUserId);
       // Post request for login 
       $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
       // Convert the response to array to be able to access the elements of the response
       $jsonArray = json_decode($loginResponse->content(),true);
       // store the token in the variable  $token
       $token = $jsonArray['token'];
       $this->CreateReview($token);
       $reviewsCount = Review::all()->count();
       $review = Review::find($reviewsCount);
       
       $numberLikes =$review['likes_count'];
       // post request will add or update a record to the selves table 
       // becouse each book will be reviewed must be read 
       // then create a record in the reviews table 
       // update some atributes in the tables of users & book 
       $response = $this->json('POST', 'api/LikeOrUnLike', [ 'token'=> $token ,'token_type' =>'bearer' ,
       'id'=> $review['id'] ]);
       // Show the response in the cmd
       /*echo "\n";
       echo $response->content();
       echo "\n";*/
       // Check from the structure of the return json 
       $response->assertStatus(200)->assertJsonStructure([
           'status',
           'Message',
           'user',
           'resourse_id'    
    ]);
     // Get the record of this Review
     $reviewtwo = Review::find($reviewsCount);
     $numberLikestwo =$reviewtwo['likes_count'];
     $this->assertGreaterThan($numberLikes,$numberLikestwo );
     $review_id=$reviewtwo['id'];
     $this->Unlike($token,$review_id);
     $this->DeleteReview($review_id,$token);
    }
}
