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

    public function DeleteReview($token,$review_id)
    {
        $response = $this->json('DELETE', 'api/reviwes/delete', [ 'token'=> $token ,
        'token_type' =>'bearer' , 'reviewId' =>$review_id ]);
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
 

    public function deleteComment($token,$review_id,$commentId)
    {
        $comment = Comment::find($commentId);
        $review = Review::find($review_id);
        $numberComments =$review['comments_count'];
        $response = $this->json('DELETE', 'api/deleteComment', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $comment['id']]);
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'Message'
        ]);
        $numberComments-=1;
        if ($numberComments < 0){$numberComments=0;}
        $reviewtwo = Review::find($review_id);
        $numberCommentstwo =$reviewtwo['comments_count'];
        
        if ($numberCommentstwo < 0){$numberCommentstwo=0;}
        $this->assertEquals($numberComments,$numberCommentstwo );
    }

    /**
     * 
     * @return void
     */
    public function testmakeComment()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 7;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        $this->CreateReview($token);
        $reviewsCount = Review::all()->max('id');
        $review = Review::find($reviewsCount);
        
        $numberComments =$review['comments_count'];
        
        $response = $this->json('POST', 'api/makeComment', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $review['id'],'body' =>'Woooooooooooooow  it is a great booooook']);
        $commentId = Comment::all()->max('id');
        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'user',
            'resourse_id',
            'comment_body'
         ]);
      // Get the record of this Review
      $numberComments+=1;
      $reviewtwo = Review::find($reviewsCount);
      $numberCommentstwo =$reviewtwo['comments_count'];
      $this->assertEquals($numberComments,$numberCommentstwo);
      $review_id=$reviewtwo['id'];
      $this->deleteComment($token,$review_id,$commentId);
      $this->DeleteReview($token,$review_id);
    }
}
