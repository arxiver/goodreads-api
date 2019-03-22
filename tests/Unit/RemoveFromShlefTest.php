<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemoveFromShlefTest extends TestCase
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
        $randomUserArr = DB::select( 'SELECT user_id , book_id , type FROM shelves ORDER BY RAND() LIMIT 1');
        $randomUserId = $randomUserArr[0]->user_id;
        $bookId = $randomUserArr[0]->book_id;
        $shelfId = $randomUserArr[0]->type;
        $user = User::find($randomUserId);

        /**
         * Login assertion and getting token
         */
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertJson(["status"=>"true"] )->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];

        /**
         * Remove a book from shelf assertion
         */
        $response = $this->json('DELETE', 'api/shelf/remove_book', [ 'token'=> $token ,'token_type' =>'bearer' , 'book_id'=> $bookId  , 'shelf_id'=> $shelfId]);
        $response->assertJson(["status"=>"true"])->assertStatus(200);
    }
}
