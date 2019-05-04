<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Book;
use App\Review;
use App\Shelf;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testListComments()
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
         //select a review from the review of this user to edit it 
         $reviewByUser = (DB::select( 'SELECT id FROM reviews WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
         // assertion fail when a user doesn't have a review 
         $this->assertNotEmpty($reviewByUser);
         // show the reviewId
         ///echo "\n";
         ///echo 'reviewId => ';
         //echo $reviewByUser[0]->id;
         ///echo "\n";
         // store the reviewId
         $reviewId = $reviewByUser[0]->id;
         // Get the record of this review
         $review = Review::find($reviewId);
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('GET', 'api/listComments', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $review['id']]);
        $response->assertStatus(200);
    }


    public function testListLikes()
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
         //select a review from the review of this user to edit it 
         $reviewByUser = (DB::select( 'SELECT id FROM reviews WHERE user_id = ? ORDER BY RAND() LIMIT 1', [$randomUserId]));
         // assertion fail when a user doesn't have a review 
         $this->assertNotEmpty($reviewByUser);
         // show the reviewId
         ///echo "\n";
         ///echo 'reviewId => ';
         //echo $reviewByUser[0]->id;
         ///echo "\n";
         // store the reviewId
         $reviewId = $reviewByUser[0]->id;
         // Get the record of this review
         $review = Review::find($reviewId);
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('GET', 'api/listLikes', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $review['id']]);
        $response->assertStatus(200);
    }

    public function testShowShelf()
    {
        // Get the number of users in the database
        $usersCount = User::all()->count();
        // Get id for a user in the databas eto login with it 
        $randomUserId = 1;//rand(1, $usersCount);
        // Get the record of this user
        $user = User::find($randomUserId);
        // Get the number of books in the database
        $booksCount = Book::all()->count();
        // Get id for a book in the database to create review with it 
        $randomBookId = rand(1, $booksCount);
        // Get the record of this book
        $book = Book::find($randomBookId);
        // Post request for login 
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];
        $response = $this->json('GET', 'api/showShelf', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'bookId'=> $book['id']]);
        $response->assertStatus(200);
    }
}
