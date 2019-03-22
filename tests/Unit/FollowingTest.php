<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowingTest extends TestCase
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
        $user = User::find( $randomUserId);

        /**
         * Login assertion
         */
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);

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
    }
}
