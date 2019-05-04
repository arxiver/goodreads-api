<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnfollowTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUnfollow()
    {
        /**
         * Selecting a random user that follows users [Following]
         * Getting a random one of the following list to be un followed
         * Keeps the following_count of the user before making unfollow to one of them
         * $followingCount is kept for db assertion test
         */
        /**
         *     $usersCount = User::all()->count();
         *$counter = 0 ;
         *do{
         *$randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
         *$user = User::find($randomUserId);
         *
         *$counter++;
         *}
         *while($followingCount == 0 && $usersCount > $counter );
         */
        $followingRes = (DB::select('SELECT user_id , follower_id FROM followings ORDER BY RAND() LIMIT 1'));
        if (sizeof($followingRes) == 0) {
            $this->assertTrue(true);
            return;
        }
        $randomUserId = $followingRes[0]->follower_id;
        $toBeUnfollowed = $followingRes[0]->user_id;
        $user = User::find($randomUserId);
        $followingCount = $user->following_count;
        /**
         * Login assertion
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);

        /**
         * Decoding the response array
         */
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];

        /**
         * Unfollow assertion
         */
        $response = $this->json('DELETE', 'api/unfollow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => $toBeUnfollowed]);
        $response->assertJson(["status" => "true"])->assertStatus(200);

        /**
         * FollowingCount is decreased assertion
         */
        $followingCount--;
        $this->assertDatabaseHas('users', [
            'id' => $randomUserId,
            'following_count' => $followingCount
        ]);

        $this->assertDatabaseMissing('followings', [
            'user_id' => $toBeUnfollowed,
            'follower_id' => $randomUserId
        ]);

        $response = $this->json('DELETE', 'api/unfollow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => -1]);
        $response->assertStatus(404);

        $response = $this->json('DELETE', 'api/unfollow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => -$randomUserId]);
        $response->assertStatus(404);

        $response = $this->json('DELETE', 'api/unfollow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => "adssda"]);
        $response->assertStatus(404);

        $response = $this->json('DELETE', 'api/unfollow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => "0x898ABD"]);
        $response->assertStatus(404);
    }
}
