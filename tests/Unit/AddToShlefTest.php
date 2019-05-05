<?php

namespace Tests\Unit;

use App\User;
use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class AddToShlefTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddToShelf()
    {
        /**
         * Get a random user for authentication
         */
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);

        /**
         * Getting random book_id
         */

        //  $randomBookId =(DB::select('SELECT id FROM books ORDER BY RAND() LIMIT 1'))[0]->id;
        $randomBook = (DB::select('SELECT id FROM books WHERE id NOT IN
        (SELECT book_id FROM shelves WHERE user_id = ?) ORDER BY RAND() LIMIT 1', [$randomUserId]));
        if (sizeof($randomBook) == 0) {
            $this->assertTrue(true);
            return;
        }
        $randomBookId = $randomBook[0]->id;
        /**
         * Getting random shelf_id
         */
        $shelfId = rand(0, 2);

        /**
         * Login assertion and getting token
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];

        /**
         * Add to shelf assertion
         */
        $response = $this->json('POST', 'api/shelf/add_book', ['token' => $token, 'token_type' => 'bearer', 'book_id' => $randomBookId, 'shelf_id' => $shelfId]);
        $response->assertJson(["status" => "true"])->assertStatus(201);
    }


    public function testAddToShelfBadRequest()

    {
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);

        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];

        /**
         * Add to shelf assertion
         */
        $response = $this->json('POST', 'api/shelf/add_book', ['token' => $token, 'token_type' => 'bearer', 'book_id' => -1, 'shelf_id' => -1]);
        $response->assertStatus(404);
    }
}
