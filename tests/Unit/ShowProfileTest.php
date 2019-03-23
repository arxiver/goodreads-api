<?php

namespace Tests\Unit;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowProfileTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testShowProfile()
    {
        /**
         * Getting random user
         */
        $usersCount = User::all()->count();
        $randomUserId = rand(1, $usersCount);
        $user = User::find($randomUserId);

        /**
         * Login assertion
         * getting authenictaion token
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' =>$user ['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true) ;
        $token = $jsonArray['token'];

        /**
         * Assertion followers GET method
         */
        $response = $this->json('GET', 'api/showProfile', ['token'=> $token ,'token_type' =>'bearer'] );
        $response->assertStatus(200)->assertSee('id');

        $this->assertTrue(true);
    }
}
