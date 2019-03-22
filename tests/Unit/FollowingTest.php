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
        $usersCount = User::all()->count();
        $randomUserId = rand(1, $usersCount);
        $user = User::find( $randomUserId);
        $loginResponse = $this->json('POST', 'api/logIn', ['email' =>$user['email'], 'password' => 'password']);
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        $token = $jsonArray['token'];
        $response = $this->json('GET', 'api/following', [ 'token'=> $token ,'token_type' =>'bearer']);
        //echo $response->content();
        $response->assertStatus(200)->assertSee('following');
        //$this->assertTrue(true);
    }
}
