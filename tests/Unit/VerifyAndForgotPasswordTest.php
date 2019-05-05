<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




/*
forgot password
[1] forgot password with authorized user                         Done
[2] forgot password with empty email                             Done
[3] forgot password with non email type                          Done
[4] forgot password with invalid email                           Done
[5] forgot password with invalid email                           Done


reset password
[1] reset password with authorized user                         Done
[2] reset password with empty password                          Done
[3] reset password with empty password confirmation             Done
[4] reset password with long password                           Done
[5] reset password with short password                          Done
[6] reset password with different passwords                     Done


verify
[1] Verify with non authorized user                             Done
[2] Verify with authorized user                                 Done


*/
class VerifyAndForgotPasswordTest extends TestCase
{
    private $User;
    private $Array;
    private $token;
    private $tokenType;
    private $ErrorStatus;
    private $SuccessfulStatus;
    private $Random;
    private $YoungerThan;
    private $OlderThan;
    private $table;

    public function setUp(): void
    {

        parent::setUp();
        $this->Random = rand(3, 3);                    // i made it 3 cause it's not sure that the ids are countinious
        $this->User = User::find($this->Random);
        $this->token = JWTAuth::fromUser($this->User);
        $this->tokenType = "bearer";
    }

    public function __construct()
    {
        parent::__construct();
        $this->Array = array(
                                "Non email type" =>"email",
                                "Invalid email" =>"emailinvalid@yahoo.com",
                                "Invalid password" => "passwordinvalid",
                                "Valid password" => "password",
                                "Long input" => "password111111111111111111111111wwww1111111552222222222",
                                "Short input" => "pa",
                                "Valid name" => "soyfan",
                                "Empty input" => "",
                                "Non string input" => 111,
                                "Valid birthday" => date("Y-n-j" , strtotime("1998-2-21")),
                                "Non date input" => 111,
                                "Younger birthday" => date("Y-n-j"),
                                "Older birthday" => date("Y-n-j" , strtotime("1910-2-21")),
                                "Only me" => "onlyMe",
                                "Everyone" => "Everyone",
                                "Friends" => "Friends"
                            );
        $this->ErrorStatus = 405;
        $this->SuccessfulStatus = 200;
        $this->table = "users";
    }

    private function forgotPassword($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("POST", "api/forgotpassword", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function resetPassword($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("POST", "api/resetpassword", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function verify($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/verify", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[1] forgot password with authorized user 
    public function test1()
    {
        $SendingData = array(
                                "email"         => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "error" => "You are already loged in"
                                );
        $this->forgotPassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[2] forgot password with empty email 
    public function test2()
    {
        $this->token = null;
        $SendingData = array(
                                "email"         => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'error' => 'The email field is required.'
                                );
        $this->forgotPassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    

    /**
     * @group sofyan
     */
    //[3] forgot password with non email type  
    public function test3()
    {
        $this->token = null;
        $SendingData = array(
                                "email"         => $this->Array["Non email type"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'error' => 'The email must be a valid email address.'
                                );
        $this->forgotPassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[4] forgot password with invalid email  
    public function test4()
    {
        $this->token = null;
        $SendingData = array(
                                "email"         => $this->Array["Invalid email"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'error' => 'The email is invalid'
                                );
        $this->forgotPassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[5] forgot password with invalid email  
    public function test5()
    {
        $this->token = null;
        $SendingData = array(
                                "email"         => $this->User->email,
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now , you can go to " .$this->User->email. " to reset your password"
                                );
        $this->forgotPassword($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }



    //reset password
    //[1] reset password with authorized user  
    /**
     * @group sofyan
     */                       
    public function test6()
    {
        $SendingData = array(
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                'token'                 => $this->token ,
                                'token_type'            => $this->tokenType
                            );
        $ReceivingData = array(
                                    'error' => 'You are already loged in'
                                );
        $this->resetPassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }



    //[2] reset password with empty password    
    /**
     * @group sofyan
     */                        
    public function test7()
    {
        $this->token = null;
        $SendingData = array(
                                "password"              => $this->Array["Empty input"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "userId"                => $this->User->id,
                                'token'                 => $this->token ,
                                'token_type'            => $this->tokenType
                            );
        $ReceivingData = array(
                                    'error' => 'The password field is required.'
                                );
        $this->resetPassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    //[3] reset password with empty password confirmation             
    /**
     * @group sofyan
     */                        
     public function test8()
     {
         $this->token = null;
         $SendingData = array(
                                 "password"              => $this->Array["Valid password"],
                                 "password_confirmation" => $this->Array["Empty input"],
                                 "userId"                => $this->User->id,
                                 'token'                 => $this->token ,
                                 'token_type'            => $this->tokenType
                             );
         $ReceivingData = array(
                                    'error' => 'The password confirmation does not match.'
                                 );
         $this->resetPassword($this->ErrorStatus, $SendingData, $ReceivingData);
     }




    //[4] reset password with long password                          
    /**
     * @group sofyan
     */                        
     public function test9()
     {
         $this->token = null;
         $SendingData = array(
                                 "password"              => $this->Array["Long input"],
                                 "password_confirmation" => $this->Array["Empty input"],
                                 "userId"                => $this->User->id,
                                 'token'                 => $this->token ,
                                 'token_type'            => $this->tokenType
                             );
         $ReceivingData = array(
                                    'error' => 'The password may not be greater than 30 characters.'
                                 );
         $this->resetPassword($this->ErrorStatus, $SendingData, $ReceivingData);
     }



    //[5] reset password with short password   
     /**
     * @group sofyan
     */                        
    public function test10()
     {
         $this->token = null;
         $SendingData = array(
                                 "password"              => $this->Array["Short input"],
                                 "password_confirmation" => $this->Array["Empty input"],
                                 "userId"                => $this->User->id,
                                 'token'                 => $this->token ,
                                 'token_type'            => $this->tokenType
                             );
         $ReceivingData = array(
                                    'error' => 'The password must be at least 5 characters.'
                                 );
         $this->resetPassword($this->ErrorStatus, $SendingData, $ReceivingData);
     }



    //[6] reset password with different passwords                    
    /**
     * @group sofyan
     */                        
     public function test11()
     {
         $this->token = null;
         $SendingData = array(
                                 "password"              => $this->Array["Valid password"],
                                 "password_confirmation" => $this->Array["Valid password"],
                                 "userId"                => $this->User->id,
                                 'token'                 => $this->token ,
                                 'token_type'            => $this->tokenType
                             );
         $ReceivingData = array(
                                    'message' => 'You have reseted your password'
                                 );
         $this->resetPassword($this->SuccessfulStatus, $SendingData, $ReceivingData);
     }


    //[1] Verify with non authorized user                             Done
    /**
     * @group sofyan
     */                        
     public function test12()
     {
         $this->token = null;
         $SendingData = array(
                                 'token'                 => $this->token ,
                                 'token_type'            => $this->tokenType
                             );
         $ReceivingData = array(
                                    'errors' => 'You are not loged in'
                                 );
         $this->verify($this->ErrorStatus, $SendingData, $ReceivingData);
     }
    //[2] Verify with authorized user                                 
    /**
     * @group sofyan
     */                        
     public function test13()
     {
         $SendingData = array(
                                 'token'                 => $this->token ,
                                 'token_type'            => $this->tokenType
                             );
         $ReceivingData = array(
                                    'message' => 'Now , you can go to '. $this->User->email .' to verify your account',
                                 );
         $this->verify($this->SuccessfulStatus, $SendingData, $ReceivingData);
     }



}
