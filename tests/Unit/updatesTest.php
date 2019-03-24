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
use Illuminate\Support\Facades\DB;
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use  Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
class updatesTest extends TestCase
{
    //use RefreshDatabase;
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
            'email'=>'jonas77@example.net',
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
        $updates = $jsonArray->updates;
        $arr = array_column($updates,('update_type'));
        if(count($arr)>0)
        $this->assertTrue((min($arr)>-1)&&(max($arr)<5));
        \Log::info('This is some useful information.');
        //get users followed by auth_user then compare it with user_ids in the updates returned
        $fol = \App\Following::where('follower_id','=',$auth_user->id)->select('user_id');
        $arr = array_unique(array_column($updates,('user_id')));
        $fol= json_decode( json_encode($fol), true);
        $fol = Arr::flatten($fol);
        //select a random user
        $rand = \App\User::find($faker->randomElement($users_ids));
        $r_id =\DB::table('reviews')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $f_id =\DB::table('followings')->where('follower_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $s_id =\DB::table('shelves')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $c_id =\DB::table('comments')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $l_id =\DB::table('likes')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
    
        if(\DB::table('followings')->where('follower_id','=',$auth_user->id)->where('user_id','=',$rand->id)->exists())
        {
            $response1->assertJsonFragment([
                'id'=>$r_id,
                'update_type'=>0
            ]);
            $response1->assertJsonFragment([
                'id'=>$s_id,
                'update_type'=>1
            ]);
            $response1->assertJsonFragment([
                'id'=>$f_id,
                'update_type'=>2
            ]);
            $response1->assertJsonFragment([
                'id'=>$l_id,
                'update_type'=>3
            ]);
            $response1->assertJsonFragment([
                'id'=>$c_id,
                'update_type'=>4
            ]);
        }else{
            $response1->assertJsonMissing([
                'id'=>$r_id,
                'update_type'=>0
            ]);
            $response1->assertJsonMissing([
                'id'=>$s_id,
                'update_type'=>1
            ]);
            $response1->assertJsonMissing([
                'id'=>$f_id,
                'update_type'=>2
            ]);
            $response1->assertJsonMissing([
                'id'=>$l_id,
                'update_type'=>3
            ]);
            $response1->assertJsonMissing([
                'id'=>$c_id,
                'update_type'=>4
            ]);
        }
    }
}
