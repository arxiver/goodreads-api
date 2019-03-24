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
   // use RefreshDatabase;
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function testUpdates()
    {
        $faker = \Faker\Factory::create();
        //$users = factory(\App\User::class,rand(2,10))->make();
        

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
        //$auth_user = \App\User::find(1);
        $auth_user = \App\User::find($faker->randomElement(\App\User::all()->pluck('id')->toArray()));
        /**
         * Login assertion
         * getting authenictaion token
         */
    
        $response = $this ->post('/api/login',[
            'email'=>$auth_user['email'],
            'password'=>'password'
        ]);
        $jsonArray = json_decode($response->content(),true);
        $token = $jsonArray['token'];

        /**
         * Assertion updates GET method
         */
        
        $response1 = $this->json('GET', '/api/updates',[ 'token'=> $token ,'token_type' =>'bearer']);
        $response->assertSuccessful();
        
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
        //select a random user and random updates of him
        $rand = \App\User::find($faker->randomElement($users_ids));
        $r_id =\DB::table('reviews')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $f_id =\DB::table('followings')->where('follower_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $s_id =\DB::table('shelves')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $c_id =\DB::table('comments')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        $l_id =\DB::table('likes')->where('user_id','=',$rand->id)->select('id')->inRandomOrder()->first();
        //check if he is followed by auth_user and whether his updates should appear in the auth user updates
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
        //if a user_id is sent then check that the updates only belongs to that user
        $response2 = $this ->get('/api/updates?user_id=' .$auth_user['id'].'');
        $response2->assertSuccessful();
        if($rand->id==$auth_user->id)
        {
            $response2->assertJsonFragment([
                'user_id'=>$rand->id
            ]);

        }else{
            $response2->assertJsonMissing([
                'user_id'=>$rand->id
            ]);
        }
        $max=rand(1,200);
        $response3 = $this ->get('/api/updates?max_updates=' .$max.'');
        $response3->assertSuccessful();
        $u = $response3->getData()->updates;
        $this->assertTrue(count($u)<$max);
    }
}
