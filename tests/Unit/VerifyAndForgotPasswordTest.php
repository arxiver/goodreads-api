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
[1] forgot password with authorized user                             Done
[3] forgot password with empty new email                             Done
[5] forgot password with invalid email                               Done
[8] Successful forgot password                                       Done

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
        $response = $this->json("GET", "api/resetpassword", $SendingData);
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
                                    "errors" => "You are not loged in"
                                );
        $this->changePassword($this->ErrorStatus, $SendingData, $ReceivingData);
    }
}
