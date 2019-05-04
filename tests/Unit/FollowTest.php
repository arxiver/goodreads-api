<?php

namespace Tests\Unit;

use App\User;
use App\Following;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFollow()
    {
        /**
         * Get a random user for authentication and making follow function
         * $followingCount is kept for db assertion test
         */
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);

        $followingCount = $user->following_count;
        /**
         * Get a random user_id that is not followed by the authenticated user before
         */
        $nonFollowedUser = (DB::select('SELECT id FROM users WHERE id NOT IN
        (SELECT user_id FROM followings WHERE follower_id = ?) ORDER BY RAND() LIMIT 1', [$randomUserId]));


        if (sizeof($nonFollowedUser) < 1 || $nonFollowedUser[0]->id == $randomUserId) {
            $this->testFollow();
            return;
        }

        $randomFollowingId = $nonFollowedUser[0]->id;

        /**
         * Login assertion for getting authentication token
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];

        /**
         * Follow request assertion
         */
        $response = $this->json('POST', 'api/follow', ['token' => $token, 'type' => 'bearer', 'user_id' => $randomFollowingId]);
        if (sizeof(array($response->getContent())) > 0)
            /**
             * Database assertion
             */
            $followingCount++;
        $this->assertDatabaseHas('users', [
            'id' => $randomUserId,
            'following_count' => $followingCount
        ]);
        $this->assertDatabaseHas('followings', [
            'user_id' => $randomFollowingId,
            'follower_id' => $randomUserId
        ]);
    }
    public function login()
    {
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);
        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];
        return $token;
    }

    public function testBadParamaters()
    {
        $token = FollowTest::login();
        $response = $this->json('POST', 'api/follow', ['token' => $token, 'type' => 'bearer']);
        $response->assertStatus(404);
    }

    public function testNegativeId()
    {
        $token = FollowTest::login();
        $response = $this->json('POST', 'api/follow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => -1]);
        $response->assertStatus(404);
    }
}
