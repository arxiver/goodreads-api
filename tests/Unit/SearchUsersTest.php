<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;

class SearchUsersTest extends TestCase
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
        $randomName = (DB::select('SELECT name FROM users ORDER BY RAND() LIMIT 1'))[0]->name;
        $randomUsername = (DB::select('SELECT username FROM users ORDER BY RAND() LIMIT 1'))[0]->username;

        /**
         * Login assertion
         * getting authenictaion token
         */
        $loginResponse = $this->json('POST', 'api/login', ['email' => $user['email'], 'password' => 'password']);
        $loginResponse->assertSee("token")->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(), true);
        $token = $jsonArray['token'];

        $response = $this->json('GET', 'api/search_by_name', ['token' => $token, 'token_type' => 'bearer', 'name' => $randomName]);
        $response->assertStatus(200)->assertSee('users')->assertSee($randomName);

        $response = $this->json('GET', 'api/search_by_username', ['token' => $token, 'token_type' => 'bearer', 'username' => $randomUsername]);
        $response->assertStatus(200)->assertSee('users')->assertSee($randomUsername);

        $response = $this->json('GET', 'api/search_by_name_username', ['token' => $token, 'token_type' => 'bearer', 'name' => $randomName]);
        $response->assertStatus(200)->assertSee('users')->assertSee($randomName);

        $response = $this->json('GET', 'api/search_by_name', ['token' => $token, 'token_type' => 'bearer', 'name' => ' ']);
        $response->assertStatus(404);

        $response = $this->json('GET', 'api/search_by_username', ['token' => $token, 'token_type' => 'bearer', 'name' => ' ']);
        $response->assertStatus(404);

        $response = $this->json('GET', 'api/search_by_name_username', ['token' => $token, 'token_type' => 'bearer', 'name' => ' ']);
        $response->assertStatus(404);
    }
}
