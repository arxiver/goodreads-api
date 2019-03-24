<?php
use \Faker\Factory ;
use \App\User;
use \App\Author;
use \App\Book;
use \App\Review;
use \App\Comment;
use \App\Likes;
use \App\Following;
use \App\Shelf;
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use  Illuminate\Http\JsonResponse;
class updatesTest extends TestCase
{
   // use RefreshDatabase;
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function testUpdates()
    {
        $faker = \Faker\Factory::create();
       /* $users = factory(\App\User::class,rand(2,10))->make([
            'email'=>$faker->unique()->email
        ]);*/

        \DB::table('authors')->insert(['author_name'=>$faker->name]);
        factory(\App\Book::class,rand(1,10))->make([
            'author_id'=>$faker->randomElement(\App\Author::all()->pluck('id')->toArray())
        ]);
        $users_ids = \App\User::all()->pluck('id')->toArray();
        $books_ids = \App\Book::all()->pluck('id')->toArray();

        factory(\App\Review::class,rand(0,50))->make([
            'user_id'=>$faker->randomElement($users_ids),
            'book_id'=>$faker->randomElement($books_ids)
        ]);   
        factory(\App\Shelf::class,rand(0,50))->make([
            'user_id'=>$faker->randomElement($users_ids),
            'book_id'=>$faker->randomElement($books_ids)
        ]);    
        factory(\App\Following::class,rand(1,50))->make([
            'user_id'=>$faker->randomElement($users_ids),
            'follower_id'=>$faker->randomElement($users_ids)
        ]);
        $reviews_ids = \App\Review::all()->pluck('id')->toArray();
        factory(\App\Likes::class,rand(0,50))->make([
            'user_id'=>$faker->randomElement($users_ids),
            'resourse_id'=>$faker->randomElement($reviews_ids),
            'resourse_type'=>0
        ]);
        factory(\App\Comment::class,rand(0,50))->make([
            'user_id'=>$faker->randomElement($users_ids),
            'resourse_id'=>$faker->randomElement($reviews_ids),
            'resourse_type'=>0
        ]);
        $auth_user = \App\User::find(1);
       // $auth_user = \App\User::find($faker->randomElement(\App\Following::all()->pluck('follower_id')->toArray()));
        /**
         * Login assertion
         * getting authenictaion token
         */
    
       /* $loginResponse = $this->json('POST', 'api/login', ['email' =>$auth_user['email'], 'password' => 'password']);
        // Convert the response to array to be able to access the elements of the response
        $loginResponse->assertJson(["status"=>"true"])->assertStatus(200);
        $jsonArray = json_decode($loginResponse->content(),true);
        // store the token in the variable  $token
        $token = $jsonArray['token'];*/
        $response = $this ->post('/api/logIn',[
            'email'=>'aisha91@example.net',
            'password'=>'password'
        ]);
        $jsonArray = json_decode($response->content(),true);
        $token = $jsonArray['token'];

        /**
         * Assertion updates GET method
         */
        
        $response1 = $this->json('GET', '/api/updates',[ 'token'=> $token ,'token_type' =>'bearer']);
        //$response = $this ->get('/api/updates?user_id=' .$auth_user['id'].'');
        $response->assertStatus(200);
        
        $jsonArray = $response1->getData();
        $arr = array_column($jsonArray->updates,('update_type'));
        $this->assertTrue((min($arr)>-1)&&(max($arr)<5));

    }
}
