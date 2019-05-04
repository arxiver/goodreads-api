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
        $randomUserId = rand(1, $usersCount);
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
        // post request will add or update a record to the selves table 
        // becouse each book will be reviewed must be read 
        // then create a record in the reviews table 
        // update some atributes in the tables of users & book 
        $response = $this->json('GET', 'api/listComments', [ 'token'=> $token ,'token_type' =>'bearer' ,
        'id'=> $review['id']]);
        $response->assertStatus(200);
        $review_id=$review['id'];
        $this->DeleteReview($token,$review_id);
    }


    public function testListLikes()
    {
                // Get the number of users in the database
                $usersCount = User::all()->count();
                // Get id for a user in the databas eto login with it 
                $randomUserId = rand(1, $usersCount);
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
                // post request will add or update a record to the selves table 
                // becouse each book will be reviewed must be read 
                // then create a record in the reviews table 
                // update some atributes in the tables of users & book 
                $response = $this->json('GET', 'api/listLikes', [ 'token'=> $token ,'token_type' =>'bearer' ,
                'id'=> $review['id']]);
                $response->assertStatus(200);
                $review_id=$review['id'];
                $this->DeleteReview($token,$review_id);
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
