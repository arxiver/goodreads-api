<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Book;

class ListReviews extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);

        /**
         * Login assertion
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];

        /**
         * Following assertion for GET following method
         */
        $response = $this->json('GET', 'api/user_reviews', ['token' => $token, 'token_type' => 'bearer']);
        $response->assertStatus(200)->assertSee('reviews');

        $reviewsArray = json_decode($response->content(), true);
        $i = 0;
        while ($i < sizeof($reviewsArray["reviews"])) {
            $this->assertDatabaseHas('reviews', [
                'user_id' => $randomUserId,
                'id' => $reviewsArray["reviews"][$i]["review_id"]
            ]);
            $i++;
        }
    }
}
