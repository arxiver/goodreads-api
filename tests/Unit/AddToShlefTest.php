<?php

namespace Tests\Unit;
use App\User;
use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddToShlefTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        /**
         * Get a random user for authentication
         */
        $usersCount = User::all()->count();
        $randomUserId = rand(1, $usersCount);
        $user = User::find($randomUserId);

        /**
         * Getting random book_id
         */
        $booksCount = Book::all()->count();
        $randomBookId = rand(1, $booksCount);

        /**
         * Getting random shelf_id
         */
        $shelfId = rand(0,2);

        /**
         * Login assertion and getting token
         */
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertJson(["status"=>"true"] )->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];

        /**
         * Add to shelf assertion
         */
        $response = $this->json('POST', 'api/shelf/add_book', [ 'token'=> $token ,'token_type' =>'bearer' , 'book_id'=> $randomBookId  , 'shelf_id'=> $shelfId]);
        $response->assertJson(["status"=>"true"])->assertStatus(201);

    }
}
