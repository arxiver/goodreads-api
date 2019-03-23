<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function nottest()
    {
        /**
         * Get a random user for authentication
         */
        $usersCount = User::all()->count();
        $randomUserId = rand(1, $usersCount);
        $user = User::find( $randomUserId);

        /**
         * Login assertion
         * getting authenictaion token
         */
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];

        /**
         * Assertion followers GET method
         */
        $response = $this->json('GET', 'api/followers', [ 'token'=> $token ,'token_type' =>'bearer']);
        $response->assertStatus(200)->assertSee('followers');


    }
}


//echo $response->content();
//echo $response->content();
//$this->assertTrue(true);
