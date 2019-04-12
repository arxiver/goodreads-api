<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
change password
[1] Change password with non authorized user                             Done
[2] Change password with empty old password                              Done
[3] Change password with empty new password                              Done
[4] Change password with empty new password confirmation                 Done
[5] Change password with invalid old password                            Done
[6] Change password with invalid new password (long)                     Done
[7] Change password with invalid new password confirmation (short)       Done
[8] Successful changing password                                         Done


change name
[1] Change name with non authorized user                    Done
[2] Change name with empty password                         Done
[3] Change name with empty invalid password                 Done
[4] Change name with empty invalid name (long)              Done
[5] Change name with invalid name (short)                   Done
[6] Change name with invalid name (non string)              Done
[7] Successful changing name                                Done


change country
[1] Change country with non authorized user                 Done
[2] Change country with empty country                       Done                   
[3] Change country with non string country                  Done                   
[4] Change country with short country                       Done                               
[5] Change country with long country                        Done                               
[6] Successful Changing country                             Done                                       


change city
[1] Change city with non authorized user                     Done
[2] Change city with empty city                              Done                           
[3] Change city with non string city                         Done                               
[4] Change city with short city                              Done                           
[5] Change city with long city                               Done                           
[6] Successful Changing city                                 Done   
    

change birthday
[1] Change birthday with non authorized user                  Done
[2] Change birthday with empty birthday                       Done                           
[3] Change birthday with non string birthday                  Done                               
[4] Change birthday with short birthday                       Done                           
[5] Change birthday with long birthday                        Done                           
[6] Successful Changing birthday                              Done


Who can see my birthday                                                                 
[1] who can see my birthday with unauthonticated user         Done                                                          
[2] who can see my birthday with empty input                  Done                                                  
[3] who can see my birthday with input Only me                Done                                                  
[4] who can see my birthday with Friends                      Done                                              
[5] who can see my birthday with Everyone                     Done                                              

Who can see my country                                                                  
[1] who can see my country with unauthonticated user          Done                                                          
[2] who can see my country with empty input                   Done                                                  
[3] who can see my country with input Only me                 Done                                                  
[4] who can see my country with Friends                       Done                                          
[5] who can see my country with Everyone                      Done                                              

Who can see my city
[1] who can see my city with unauthonticated user             Done                                                      
[2] who can see my city with empty input                      Done                                              
[3] who can see my city with input Only me                    Done                                              
[4] who can see my city with Friends                          Done                                          
[5] who can see my city with Everyone                         Done                                        

=======================
[1]  DataBase                                                 UnDone




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
    private $YoungerThan;
    private $OlderThan;

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
                                "Only me" => "Only me",
                                "Everyone" => "Everyone",
                                "Friends" => "Friends",

                            );
        $this->ErrorStatus = 405;
        $this->SuccessfulStatus = 200;
        $this->YoungerThan = 100;
        $this->OlderThan = 3;
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
        $response = $this->json("GET", "api/changename", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function changeCountry($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/changecountry", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function changeCity($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/changecity", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function changeBirthday($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/changebirthday", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function whoCanSeeBirthday($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/whocanseemybirthday", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function whoCanSeeCountry($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/whocanseemycountry", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }

    private function whoCanSeeCity($Status, $SendingData, $ReceivingData)
    {
        $response = $this->json("GET", "api/whocanseemycity", $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($ReceivingData);
    }



    /**
     * @group sofyan
     */
    //[1] Change password with non authorized user  
    public function test1()
    {
        $this->token = null;
        $SendingData = array(
                                "password"      => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[2] Change password with empty old password
    public function test2()
    {
        $SendingData = array(
                                "password"      => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The password field is required."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */    
    //[3] Change password with empty new password
    public function test3()
    {
        $SendingData = array(
                                "password"      => $this->Array["Valid password"],
                                "newPassword"   => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password field is required."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[4] Change password with empty new password confirmation
    public function test4()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Valid password"],
                                "newPassword_confirmatin"   => $this->Array["Empty input"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password confirmation does not match."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[5] Change password with invalid old password
    public function test5()
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


    /**
     * @group sofyan
     */
    //[6] Change password with different new passwords
    public function test6()
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


    /**
     * @group sofyan
     */
    //[7] Change password with invalid new password (long password)
    public function test7()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Long input"],
                                "newPassword_confirmation"  => $this->Array["Long input"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password may not be greater than 30 characters."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */    
    //[8] Change password with invalid new passowrd (short password)
    public function test8()
    {
        $SendingData = array(
                                "password"                  => $this->Array["Valid password"],
                                "newPassword"               => $this->Array["Short input"],
                                "newPassword_confirmation"  => $this->Array["Short input"],
                                'token'                     => $this->token ,
                                'token_type'                => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new password must be at least 5 characters."
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    

    /**
     * @group sofyan
     */
    //[9] Successful changing password
    public function test9()
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


    /**
     * @group sofyan
     */
    //[1] Change name with non authorized user
    public function test10()
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

    /**
     * @group sofyan
     */
    //[2] Change name with empty name
    public function test11()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name field is required."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[3] Change name with empty invalid name (long)
    public function test12()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Long input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name may not be greater than 50 characters."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[4] Change name with invalid name (short)
    public function test13()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Short input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name must be at least 3 characters."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[5] Change name with non string name
    public function test14()
    {
        $SendingData = array(
                                "newName"       => $this->Array["Non string input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new name must be a string."
                                );
        $this->changeName($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[6] Successful changing name
    public function test15()
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

    /**
     * @group sofyan
     */
    //[1] Change city with Unauthorized user
    public function test16()
    {
        $this->token = null;
        $SendingData = array(
                                "newCountry"    => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->changeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[2] Change country with empty country
    public function test17()
    {
        $SendingData = array(
                                "newCountry"    => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new country field is required."
                                );
        $this->changeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[3] Change country with non string country
    public function test18()
    {
        $SendingData = array(
                                "newCountry"    => $this->Array["Non string input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'errors' => 'The new country must be a string.'
                                );
        $this->changeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[4] Change country with invalid name (short)
    public function test19()
    {
        $SendingData = array(
                                "newCountry"    => $this->Array["Short input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new country must be at least 3 characters."
                                );
        $this->changeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[5] Change country with invalid name (long)
    public function test20()
    {
        $SendingData = array(
                                "newCountry"    => $this->Array["Long input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'errors' => 'The new country may not be greater than 30 characters.'
                                );
        $this->changeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[6] Successful changing country
    public function test21()
    {
        $SendingData = array(
                                "newCountry"    => $this->User->country,
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "You have changed your country"
                                );
        $this->changeCountry($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[1] Change city with Unauthorized user
    public function test22()
    {
        $this->token = null;
        $SendingData = array(
                                "newCity"    => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->changeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[2] Change city with empty city
    public function test23()
    {
        $SendingData = array(
                                "newCity"    => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new city field is required."
                                );
        $this->changeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[3] Change city with non string city
    public function test24()
    {
        $SendingData = array(
                                "newCity"    => $this->Array["Non string input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'errors' => 'The new city must be a string.'
                                );
        $this->changeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[4] Change city with invalid name (short)
    public function test25()
    {
        $SendingData = array(
                                "newCity"    => $this->Array["Short input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new city must be at least 3 characters."
                                );
        $this->changeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[5] Change city with invalid name (long)
    public function test26()
    {
        $SendingData = array(
                                "newCity"       => $this->Array["Long input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new city may not be greater than 30 characters."
                                );
        $this->changeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[6] Successful changing city
    public function test27()
    {
        $SendingData = array(
                                "newCity"       => $this->User->city,
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "You have changed your city"
                                );
        $this->changeCity($this->SuccessfulStatus, $SendingData, $ReceivingData);
        $this->assertjson(true);
    }




    /**
     * @group sofyan
     */
    //[1] Change birthday with Unauthorized user
    public function test28()
    {
        $this->token = null;
        $SendingData = array(
                                "newBirthday"   => $this->Array["Valid birthday"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->changeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[2] Change birthday with empty birthday
    public function test29()
    {
        $SendingData = array(
                                "newBirthday"    => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The new birthday field is required."
                                );
        $this->changeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[3] Change birthday with non date birthday
    public function test30()
    {
        $SendingData = array(
                                "newBirthday"    => $this->Array["Non date input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    'errors' => 'The new birthday is not a valid date.'
                                );
        $this->changeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[4] Change birthday with invalid birthday (younger)
    public function test31()
    {
        $SendingData = array(
                                "newBirthday"       => $this->Array["Younger birthday"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "You must be older than " . $this->OlderThan
                                );
        $this->changeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[5] Change birthday with invalid birthday (older)
    public function test32()
    {
        $SendingData = array(
                                "newBirthday"       => $this->Array["Older birthday"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "You must be younger than " . $this->YoungerThan 
                                );
        $this->changeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }
    /**
     * @group sofyan
     */
    //[6] Successful changing birthday
    public function test33()
    {
        $SendingData = array(
                                "newBirthday"   => $this->User->birthday,
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "You have changed your birthday"
                                );
        $this->changeBirthday($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[1] who can see my birthday with unauthorized user
    public function test34()
    {
        $this->token = null;
        $SendingData = array(
                                "seeMyBirthday" => $this->Array["Only me"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->whoCanSeeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[2] who can see my birthday with empty input 
    public function test35()
    {
        $SendingData = array(
                                "seeMyBirthday" => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The selected see my birthday is invalid."
                                );
        $this->whoCanSeeBirthday($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[3] who can see my birthday with input [Only Me] 
    public function test36()
    {
        $SendingData = array(
                                "seeMyBirthday" => $this->Array["Only me"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, Just you can see your birthday"
                                );
        $this->whoCanSeeBirthday($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[4] who can see my birthday with input [Everyone] 
    public function test37()
    {
        $SendingData = array(
                                "seeMyBirthday" => $this->Array["Everyone"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, " . $this->Array["Everyone"] ." can see your birthday"
                                );
        $this->whoCanSeeBirthday($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[5] who can see my birthday with input [Friends] 
    public function test38()
    {
        $SendingData = array(
                                "seeMyBirthday" => $this->Array["Friends"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, " . $this->Array["Friends"] ." can see your birthday"
                                );
        $this->whoCanSeeBirthday($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }



    /**
     * @group sofyan
     */
    //[1] who can see my country with unauthorized user
    public function test39()
    {
        $this->token = null;
        $SendingData = array(
                                "seeMyCountry" => $this->Array["Only me"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->whoCanSeeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[2] who can see my country with empty input 
    public function test40()
    {
        $SendingData = array(
                                "seeMyCountry" => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The selected see my country is invalid."
                                );
        $this->whoCanSeeCountry($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[3] who can see my country with input [Only Me] 
    public function test41()
    {
        $SendingData = array(
                                "seeMyCountry" => $this->Array["Only me"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, Just you can see your country"
                                );
        $this->whoCanSeeCountry($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[4] who can see my country with input [Everyone] 
    public function test42()
    {
        $SendingData = array(
                                "seeMyCountry" => $this->Array["Everyone"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, " . $this->Array["Everyone"] ." can see your country"
                                );
        $this->whoCanSeeCountry($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[5] who can see my country with input [Friends] 
    public function test43()
    {
        $SendingData = array(
                                "seeMyCountry" => $this->Array["Friends"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, " . $this->Array["Friends"] ." can see your country"
                                );
        $this->whoCanSeeCountry($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }



    /**
     * @group sofyan
     */
    //[1] who can see my city with unauthorized user
    public function test44()
    {
        $this->token = null;
        $SendingData = array(
                                "seeMyCity" => $this->Array["Only me"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "UnAuthorized"
                                );
        $this->whoCanSeeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }

    /**
     * @group sofyan
     */
    //[2] who can see my city with empty input 
    public function test45()
    {
        $SendingData = array(
                                "seeMyCity" => $this->Array["Empty input"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "errors" => "The selected see my city is invalid."
                                );
        $this->whoCanSeeCity($this->ErrorStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[3] who can see my city with input [Only Me] 
    public function test46()
    {
        $SendingData = array(
                                "seeMyCity" => $this->Array["Only me"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, Just you can see your city"
                                );
        $this->whoCanSeeCity($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[4] who can see my city with input [Everyone] 
    public function test47()
    {
        $SendingData = array(
                                "seeMyCity" => $this->Array["Everyone"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, " . $this->Array["Everyone"] ." can see your city"
                                );
        $this->whoCanSeeCity($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }


    /**
     * @group sofyan
     */
    //[5] who can see my city with input [Friends] 
    public function test48()
    {
        $SendingData = array(
                                "seeMyCity" => $this->Array["Friends"],
                                'token'         => $this->token ,
                                'token_type'    => $this->tokenType
                            );
        $ReceivingData = array(
                                    "message" => "Now, " . $this->Array["Friends"] ." can see your city"
                                );
        $this->whoCanSeeCity($this->SuccessfulStatus, $SendingData, $ReceivingData);
    }
    
}
