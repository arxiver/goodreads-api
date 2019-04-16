<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;


class FollowersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFollowers()
    {
        /**
         * Get a random user for authentication
         */
        $randomUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;
        $user = User::find($randomUserId);

        $AnoterUserId = (DB::select('SELECT id FROM users ORDER BY RAND() LIMIT 1'))[0]->id;

        /**
         * Login assertion
         * getting authenictaion token
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];

        /**
         * Assertion followers GET method
         */
        $response = $this->json('GET', 'api/followers', [ 'token'=> $token ,'token_type' =>'bearer']);
        $response->assertStatus(200)->assertSee('followers');


        $response = $this->json('GET', 'api/followers', ['token' => $token, 'token_type' => 'bearer', 'user_id' => $AnoterUserId]);
        $response->assertStatus(200)->assertSee('followers');

        $response = $this->json('GET', 'api/followers', ['token' => $token, 'token_type' => 'bearer', 'user_id' => "xzcxzc"]);
        $response->assertStatus(404);


        $response = $this->json('GET', 'api/followers', ['token' => $token, 'token_type' => 'bearer', 'user_id' => -102221]);
        $response->assertStatus(404);


    }
}


//echo $response->content();
//echo $response->content();
//$this->assertTrue(true);
