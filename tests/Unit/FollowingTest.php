<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class FollowingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFollowing()
    {
        /**
         * Get a random user for authentication
         */
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);

        /**
         * Login assertion
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);

        /**
         * Getting the token
         */
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];

        /**
         * Following assertion for GET following method
         */
        $response = $this->json('GET', 'api/following', [ 'token'=> $token ,'token_type' =>'bearer']);
        $response->assertStatus(200)->assertSee('following');

        // bad request with negative id
        $response = $this->json('GET', 'api/following', ['token' => $token, 'token_type' => 'bearer' , 'user_id'=> -1 ]);
        $response->assertStatus(404);


    }
}
