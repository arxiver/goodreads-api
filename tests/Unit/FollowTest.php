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
        $nonFollowedUser = (DB::select( 'SELECT id FROM users WHERE id NOT IN
        (SELECT user_id FROM followings WHERE follower_id = ?) ORDER BY RAND() LIMIT 1', [$randomUserId]));
        $randomFollowingId= $nonFollowedUser[0]->id;

        /**
         * Login assertion for getting authentication token
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];

        /**
         * Follow request assertion
         */
        $response = $this->json('POST', 'api/follow', [ 'token'=> $token ,'token_type' =>'bearer' , 'user_id'=> $randomFollowingId ]);
        $response->assertJson(["status"=>"true"])->assertStatus(201);

        $response = $this->json('POST', 'api/follow', ['token' => $token, 'token_type' => 'bearer', 'user_id' => $randomUserId ]);
        //$response->assertStatus(404);


        if (Following::where('follower_id', $randomFollowingId)->where('user_id', $randomUserId)->count() == 1)
            //$this->assertStatus(400);
        /**
         * Database assertion
         */
        $followingCount++;
        $this->assertDatabaseHas('users', [
            'id' => $randomUserId,
            'following_count' => $followingCount
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
        $response = $this->json('POST', 'api/follow', ['token' => $token, 'token_type' => 'bearer']);
        $response->assertStatus(404);
    }

    public function testNegativeId()
    {
        $token = FollowTest::login();
        $response = $this->json('POST', 'api/follow', ['token' => $token, 'token_type' => 'bearer','user_id'=>-1]);
        $response->assertStatus(404);
    }
}
