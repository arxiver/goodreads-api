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

    private function failedAssertion($SendingData , $ReceivingData ,$Status)
    {
        $response = $this->json('POST', 'api/logIn', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function logOut($SendingData , $ReceivingData ,$Status)
    {
        $response = $this->json('GET', 'api/logOut', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }


    public function testExample()
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
                                            'password' => 'testpassword'
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
                                            'password' => 'testpassword'
                                        );
        $ReceivingData = array("errors" => "The email or password is invalid.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);


        // logIn with invalid password
        $Status = 405;
        $SendingData = array(
                                            'email' => 'test@yahoo.com' ,
                                            'password' => 'testpasswordinvalid'
                                        );
        $ReceivingData = array("errors" => "The email or password is invalid.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);


        // logIn with non email
        $Status = 405;
        $SendingData = array(
                                            'email' => 'test' ,
                                            'password' => 'testpassword'
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
                                            'password' => 'testpasswordinvalid'
                                        );
        $ReceivingData = array("errors" => "The email or password is invalid.");
        $this->failedAssertion($SendingData , $ReceivingData , $Status);



        // logOut with UnAuthonticated user
        $Status = 404;
        $SendingData = array();
        $ReceivingData = array("errors" => "UnAuthorized");
        $response = $this->json('GET', 'api/logOut', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);




        // logIn with valid email and valid password
        $User = User::find(37);
        $Status = 200;
        $SendingData = array(
                                            'email' => 'test@hotmail.com' ,
                                            'password' => 'test21'
                                        );
        $ReceivingData = array("token_type" => "bearer" , "email" => "test@hotmail.com" , "name" => $User["name"]);
        $response = $this->json('POST', 'api/logIn', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJsonFragment($ReceivingData);

            $this->assertAuthenticatedAs($User);


        // logIn with Authorized user
        $Status = 404;
        $SendingData = array(
                                            'email' => 'test@hotmail.com' ,
                                            'password' => 'test21'
                                        );
        $ReceivingData = array("errors" => "Alredy authorized");
        $response = $this->json('POST', 'api/logIn', $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);




        
        // logOut with Authorized user
        //$variable = json_decode($response->content() ,true);
        //$token = $variable[$token];
        //echo $variable;

        $token = JWTAuth::fromUser($User);
        $contentType = $response->headers->get('content-type');
        

        $Status = 200;
        $SendingData = array("Authorization" => $token);
        $ReceivingData = array("message" => "You have loged out");
        $response = $this->json('GET', 'api/logOut', ['HTTP_Authorization' => 'bearer' . $token]);
        //$response
        //    ->assertStatus($Status)
        //    ->assertJson($ReceivingData);

        //$this->assertAuthenticatedAs($User);


        


        


        

        

        
        
    }
}
