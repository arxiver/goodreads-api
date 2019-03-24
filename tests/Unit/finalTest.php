<?php

namespace Tests\Unit;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JWTAuth;
use Illuminate\Support\Facades\Auth;

class finalTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    private $User;


    private function failedAssertion($SendingData , $ReceivingData ,$Status)
    {
        $response = $this->json('POST', 'api/login', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function logOut($SendingData , $ReceivingData ,$Status)
    {
        $response = $this->json('DELETE', 'api/logout', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }
    

    private function login($SendingData , $ReceivingData ,$Status)
    {
        
    }


    public function test()
    {


        /**
         * Test Cases
         * ===========
         * [1] Login without email                              => Done
         * [2] Login without password                           => Done
         * [3] Login with invalid email                         => Done    
         * [4] Login with invalid password                      => Done   
         * [5] Login with string instead of email               => Done      
         * [6] Login without email and without password         => Done      
         * [7] Login with invalid email and invalid password    => Done              
         * [8] Login with valid email and valid password        => Done       
         * [9] Authorization                                    => Done                
         * [10] Logout                                          => UnDone
         * [11] UnAuthorization                                 => UnDone
         */

        
        // LogIn without email
        $Status = 405;
        $SendingData = array(
                                            'email' => '' ,
                                            'password' => 'password'
                                        );
        $ReceivingData = array("errors" =>  "The email field is required.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);

        



        // LogIn without password
        $Status = 405;
        $SendingData = array(
                                            'email' => 'test@yahoo.com' ,
                                            'password' => ''
                                        );
        $ReceivingData = array("errors" =>  "The password field is required.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);

        // logIn with invalid email
        $Status = 405;
        $SendingData = array(
            'email' => 'testinvalid@yahoo.com' ,
            'password' => 'password'
        );
        $ReceivingData = array("errors" => "The email or password is invalid.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);
        
        
        // logIn with invalid password
        $Status = 405;
        $SendingData = array(
            'email' => 'test@yahoo.com' ,
            'password' => 'passwordinvalid'
        );
        $ReceivingData = array("errors" => "The email or password is invalid.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);
        
        
        // logIn with non email
        $Status = 405;
        $SendingData = array(
            'email' => 'test' ,
            'password' => 'password'
        );
        $ReceivingData = array("errors" => "The email must be a valid email address.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);
        
        
        
        // logIn without email and without password
        $Status = 405;
        $SendingData = array(
            'email' => '' ,
            'password' => ''
        );
        $ReceivingData = array("errors" =>  "The email field is required.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);
        
        
        // logIn with invalid email and invalid password
        $Status = 405;
        $SendingData = array(
            'email' => 'testinvalid@yahoo.com' ,
            'password' => 'passwordinvalid'
        );
        $ReceivingData = array("errors" => "The email or password is invalid.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);
        
        
        
        // logOut with UnAuthonticated user
        $Status = 405;
        $SendingData = array();
        $ReceivingData = array("errors" => "UnAuthorized");
        $this->logOut($SendingData , $ReceivingData , $Status);
        
        
        // logIn with valid email and valid password
        $this->User = User::where("email" , "test@yahoo.com")->first();
        $Status = 200;
        $SendingData = array(
            'email' => 'test@yahoo.com' ,
            'password' => 'password'
        );
        $ReceivingData = array  (
                                    "token_type"    => "bearer" ,
                                    "name"          => $this->User["name"] ,
                                    "expires_in"    => 3600 * 24 ,
                                    "username"      => $this->User["username"],
                                    "image_link"    => $this->User["image_link"]
                                );
        $responsesec = $this->json('POST', 'api/login', $SendingData);
        $responsesec
            ->assertStatus($Status)
            ->assertJsonFragment($ReceivingData);
        $this->assertAuthenticatedAs($this->User);
        
        
        // logIn with Authorized user
        $Status = 405;
        $SendingData = array(
            'email' => 'test@yahoo.com' ,
            'password' => 'password'
        );
        $ReceivingData = array("errors" => "Alredy authorized");
        $response = $this->json('POST', 'api/login', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
        
        
            
            
            
        // logOut with Authorized user
        $token2 = JWTAuth::fromUser($this->User);
        $Status = 200;
        $SendingData = array('token'=> $token2 ,'token_type' =>'bearer');
        $ReceivingData = array("message" => "You have loged out");
        $response = $this->json('DELETE', 'api/logout', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);



        // logOut with UnAuthonticated user
        $Status = 405;
        $SendingData = array();
        $ReceivingData = array("errors" => "UnAuthorized");
        $this->logOut($SendingData , $ReceivingData , $Status);
    }
}
