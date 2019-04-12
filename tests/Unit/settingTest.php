<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
change password
    [1] Change password with non authorized user                             Done
    [2] Change password with empty old password                              Done
    [3] Change password with empty new password                              Done
    [4] Change password with empty new password confirmation                 Done
    [5] Change password with invalid old password                            Done
    [6] Change password with invalid new password (long)                     Done
    [7] Change password with invalid new password confirmation (short)       Done
    [8] Successful changing name                                             Done

change name
    [1] Change name with non authorized user                 Done
    [2] Change name with empty password                      Done
    [3] Change name with empty invalid password              Done
    [4] Change name with empty invalid name (long)           Done
    [5] Change name with invalid name (short)                Done
    [6] Change name with invalid name (non string)           Done
    [7] Successful changing name                             Done

 */

class settingTest extends TestCase
{ 
    private $User;
    private $Array;
    private $token;
    private $tokenType;
    private $ErrorStatus;
    private $SuccessfulStatus;
    private $Random;

    public function setUp(): void
    {

        parent::setUp();
        $this->Random = rand(3, User::all()->count());
        $this->User = User::find($this->Random);
        $this->token = JWTAuth::fromUser($this->User);
        $this->tokenType = "bearer";
    }

    public function __construct()
    {
        parent::__construct();
        $this->Array = array(
                                "Empty password" => "",
                                "Invalid password" => "passwordinvalid",
                                "Valid password" => "password",
                                "Long password" => "password11111111111111111111111111111111111",
                                "Short password" => "pa",
                                "Empty name" => "",
                                "Long name" => "test1111111111111111111111111111111111111111111111111111111",
                                "Short name" => "te",
                                "Valid name" => "soyfan"
                            );
        $this->ErrorStatus = 405;
        $this->SuccessfulStatus = 200;
    }



    private function changePassword($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("POST", "api/changepassword", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function changeName($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("POST", "api/changename", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }




    
    //[1] Change password with non authorized user  
    public function testChangePassword1()
    {
        $this->token = null;
        $SendingData = array(
                                "password"      => $this->Array["Empty password"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }




    
    //[2] Change password with empty old password
    public function testChangePassword2()
    {
        $SendingData = array(
                                "password"      => $this->Array["Empty password"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The password field is required."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }




    
    //[3] Change password with empty new password
    public function testChangePassword3()
    {
        $SendingData = array(
                                "password"      => $this->Array["Valid password"],
                                "newPassword"   => $this->Array["Empty password"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password field is required."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }




    
    //[4] Change password with empty new password confirmation
    public function testChangePassword4()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Valid password"],
                                "newPassword_confirmatin"   => $this->Array["Empty password"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password confirmation does not match."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }




    
    //[5] Change password with invalid old password
    public function testChangePassword5()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Invalid password"],
                                "newPassword"               => $this->Array["Valid password"],
                                "newPassword_confirmation"  => $this->Array["Valid password"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The password is invalid."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }



    
    //[6] Change password with different new passwords
    public function testChangePassword6()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => ($this->Array["Valid password"])."invalid",
                                "newPassword_confirmatin"   => $this->Array["Valid password"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password confirmation does not match."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }




    
    //[7] Change password with invalid new password (long password)
    public function testChangePassword60()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Long password"],
                                "newPassword_confirmation"  => $this->Array["Long password"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password may not be greater than 30 characters."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    
    //[8] Change password with invalid new passowrd (short password)
    public function testChangePassword61()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Short password"],
                                "newPassword_confirmation"  => $this->Array["Short password"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password must be at least 5 characters."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    


    
    
    //[9] Successful changing password
    public function testChangePassword7()
    {
        $Status = 200;
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Valid password"],
                                "newPassword_confirmation"  => $this->Array["Valid password"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "You have changed your password"
                                );
        $this->changePassword($this->SuccessfulStatus, $SendingData, $ReceivingData);
        //$User->password = "password";                                       // Why i can't use this line (***)
    }





    
    //[1] Change name with non authorized user
    public function testChangeName1()
    {
        $this->token = null;
        $SendingData = array(
                                "password"      => $this->Array["Valid password"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    //[2] Change name with empty name
    public function testChangeName2()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Empty name"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name field is required."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    //[3] Change name with empty invalid name (long)
    public function testChangeName3()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Long name"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name may not be greater than 50 characters."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    //[4] Change name with invalid name (short)
    public function testChangeName4()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Short name"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name must be at least 3 characters."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    //[5] Successful changing name
    public function testChangeName5()
    {
        $SendingData = array(
                                "newName"       => $this->User->name,
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "You have changed your name"
                                );
        $this->changeName($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }
    
}
