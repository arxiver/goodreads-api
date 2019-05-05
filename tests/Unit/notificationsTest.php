<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class notificationsTest extends TestCase
{
    
    
    /**
     * A basic unit test example.
     *
     * @return void
     * @test
     * @group nour
     */
    public function shouldBeEmpty()
    {
        factory(\App\User::class,1)->create();
        $user = \App\User::orderBy('id','desc')->first();
        $response = $this->json('POST','/api/login',[
            'email'=>$user['email'],
            'password'=>"password"
        ]);
        
        $jsonArray = json_decode($response->content(),true);
        $token = $jsonArray['token'];
        $response->assertSuccessful();

        $response1 = $this->json('GET','/api/notification',[ 'token'=> $token ,'token_type' =>'bearer']);
        $response1->assertSuccessful();
        $this->assertEmpty(json_decode($response1->content(),true));
    }
     /**
     * set up test
     * @group nour
     * @test
     * @return void
     */
    public function testFollowingNotification()
    {
        factory(\App\User::class,1)->create();
        $users = \App\User::orderBy('id','desc')->limit(2)->get();
        //login
        $response = $this->json('POST','/api/login',[
            'email'=>$users[0]['email'],
            'password'=>"password"
        ]);
        
        $jsonArray = json_decode($response->content(),true);
        $token = $jsonArray['token'];
        $response->assertSuccessful();

       

        //follow
        $response1 = $this->json('POST','/api/follow',[
            'token'=> $token ,'token_type' =>'bearer','user_id'=>$users[1]->id
        ]);
        $response1->assertSuccessful();

        $response5 = $this->json('GET','/api/notification',[ 'token'=> $token ,'token_type' =>'bearer']);
        $response5->assertSuccessful();
        echo $response5->content();
        //logout
        $response2 = $this->json('DELETE','/api/logout',[
            'token'=> $token ,'token_type' =>'bearer'
        ]);
        $response2->assertSuccessful();

        //login
        $response3 = $this->json('POST','/api/login',[
            'email'=>/*"test@yahoo.com"*/$users[1]['email'],
            'password'=>"password"
        ]);
        $jsonArray = json_decode($response3->content(),true);
        $token1 = $jsonArray['token'];
        $response3->assertSuccessful();
        echo $users[1]->id;
        //echo $token;
        echo $token1;
        //notifications
        //$response4 = $this->json('GET','/api/notification',[ 'token'=> $token1 ,'token_type' =>'bearer']);
        $response4 =  $this->withHeaders([
            'Authorization' => "bearer ".$token1,
        ])->json('GET', '/api/notification');

        $response4->assertSuccessful();
        echo $response4->content();
        //$this->assertNotEmpty(json_decode($response4->content(),true));

        $this->assertTrue(true);

       
    }
    /**
     * 
     * @group nour
     * 
     * @return void
     */
    public function markNotification()
    {
        $n = \App\Notification::orderBy('n_id','desc')->first();
        $user = \App\Notification::where('id',$n->notifiable_id)->first();
        echo $n->notifiable_id;
        echo $user['email'];
         //login
         $response = $this->json('POST','/api/login',[
            'email'=>$user['email'],
            'password'=>"password"
        ]);
        
        $jsonArray = json_decode($response->content(),true);
        //$token = $jsonArray['token'];
        $response->assertSuccessful();
        //mark notification
        $response1 = $this->json('POST','/api/mark_notification',[
            'token'=> $token ,'token_type' =>'bearer','id'=>$n->n_id
        ]);
        $response1->assertSuccessful();
    }
    

    /**
     * clean up test
     * @group nour
     * @test
     * @return void
     */
    public function cleanUp()
    {
        
        $user = \App\User::orderBy('id','desc')->first();
        \App\User::find($user->id)->delete();
        $user = \App\User::orderBy('id','desc')->first();
        \App\User::find($user->id)->delete();
        $this->assertTrue(true);

       
    }
    

}
