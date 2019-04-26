<?php

namespace Tests\Unit;


use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class signupTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    /**
     * sign up without email                        Done                        
     * sign up without password                     Done                        
     * sign up without password_confirmation        Done                                        
     * sign up without name                         Done                            
     * sign up without country                      Done                                        
     * sign up without city                         Done                        
     * sign up without date                         Done                            
     * sign up without gender                       Done                                
     * 
     * //email
     * sign up with exsisting email                 Done                        
     * sign up with non-email                       Done                    
     * 
     * //password
     * sign up with long password                   Done                    
     * sign up with short password                  Done                            
     * sign up with different passwords             Done                    
     * 
     * //name 
     * sign up with long name                       Done                        
     * sign up with short name                      Done                            
     * sign up with non-stirng name                 Done                
     * 
     * //gender 
     * sign up with non-stirng gender               Done    
     * 
     * //birthday 
     * sign up with birthday younger than 3 years   Done                                
     * sign up with birthday older than 100 years   Done                                        
     * sign up with non-date type                   Done                    
     * 
     * //country 
     * sign up with non-string country              Done        
     * 
     * //city 
     * sign up with non-string city                 Done                            
     * 
     * 
     * //successful sign up
     * sign up with non-authonticated               Done                                                   
     * sign up with alredy authonticated            Done                                 
     */

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
        $this->Random = rand(3, 3);
        $this->User = User::find($this->Random);
        $this->token = null;
        $this->tokenType = "bearer";
    }

    public function __construct()
    {
        parent::__construct();
        $this->Array = array(
                                "Empty input" => "",
                                "Non email" => "email",
                                "Long password" => "password11111111111111111111111111111111111",
                                "Short password" => "pa",
                                "Long name" => "test1111111111111111111111111111111111111111111111111111111",
                                "Short name" => "te",
                                "Non string name" => 111,
                                "Non string gender" => 111,
                                "Younger birthday" => date("Y-n-j"),
                                "Older birthday" => date("Y-n-j" , strtotime("1910-2-21")),
                                "Non date birthday" => 111,
                                "Non string country" => 111,
                                "Non string city" => 111,
                                "Valid password" => "password",
                                "Valid country" => "Egypt",
                                "Valid city" => "Giza",
                                "Valid birthday" => date("Y-n-j" , strtotime("1998-2-21")),
                                "Valid gender" => "felame",
                                "Valid email" => "test1000@yahoo.com",
                                "Valid name" => "test1000"
                            );
        $this->ErrorStatus = 405;
        $this->SuccessfulStatus = 200;
    }


    
    private function signUpFailed($SendingData , $RecievingData , $Status)
    {
        $response = $this->json("POST" , "api/signup" , $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJson($RecievingData);
    }



    private function signUpSuccessed($SendingData , $RecievingData , $Status)
    {
        $response = $this->json("POST" , "api/signup" , $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJsonFragment($RecievingData);
        
        $this->user = User::where("email" , "test1000@yahoo.com")->first();
        $this->assertAuthenticatedAs($this->user);
    }



    private function Database($SendingData , $RecievingData , $table)
    {
            $this->assertDatabaseHas($table, $RecievingData);
    }

    /**
     * @group sofyan
     */
    // sign up without email 
    public function testWithoutEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email"         => $this->Array["Empty input"],
                                "token"         => $this->token,
                                "token_type"    => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The email field is required.",
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without password
    public function testWithoutPassowrd()
    {
        $Status = 405;
        $SendingData = array(
                                "email"         => $this->Array["Valid email"],
                                "password"      => $this->Array["Empty input"],
                                "token"         => $this->token,
                                "token_type"    => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The password field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without password_confirmation
    public function testWithoutPassword_confirmation()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Empty input"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The password confirmation does not match."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without name
    public function testWithoutName()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Empty input"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The name field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without gender
    public function testWithoutGender()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                =>$this->Array["Empty input"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The gender field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without birthday
    public function testWithoutBirthday()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                =>$this->Array["Valid gender"],
                                "birthday"              =>$this->Array["Empty input"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The birthday field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without country
    public function testWithoutCountry()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                =>$this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Empty input"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The country field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up without city
    public function testWithoutCity()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                =>$this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Empty input"],

                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The city field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }

    /**
     * @group sofyan
     */
    //sign up with exsisting email
    public function testWithExsistingEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email" => $this->User["email"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The email has already been taken."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    // sign up with non-email
    public function testWithNonEmailType()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Non email"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The email must be a valid email address."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    // sign up with long password 
    public function testWithLongPassword()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Long password"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The password may not be greater than 30 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    // sign up with short password
    public function testWithShortPassword()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Short password"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The password must be at least 5 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    // sign up with different passwords
    public function testWithDifferentPasswords()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"]."invalid",
                                "name"                  => $this->Array["Empty input"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The password confirmation does not match."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }

    
    /**
     * @group sofyan
     */
    // sign up with long name 
    public function testWithLongEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Long name"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The name may not be greater than 50 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    // sign up with short name
    public function testWithShortEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Short name"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The name must be at least 3 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    // sign up with non-stirng name
    public function testWithNonStringName()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Non string name"] ,
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The name must be a string."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up with non-stirng gender
    public function testWithNonStringGender()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Non string gender"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The gender must be a string."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    /**
     * @group sofyan
     */
    //sign up with birthday olderer than 100 years
    public function testWithOlderBirthday()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Valid city"],
                                "birthday"              => $this->Array["Older birthday"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "You must be younger than 100"
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }   


    /**
     * @group sofyan
     */
    //sign up with birthday younger than 3 years
    public function testWithYoungerBirthday()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Younger birthday"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "You must be older than 3"
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }

    /**
     * @group sofyan
     */
    //sign up with non-date type
    public function testWithNonDateType()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Non date birthday"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array(
                                    "errors" => "The birthday is not a valid date."
                                );
        $this->signUpFailed($SendingData, $RecievingData, $Status);
    }

    /**
     * @group sofyan
     */
    //sign up with non-string country 
    public function testWithNonStringCountry()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Non string country"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The country must be a string."
                                );
        $this->signUpFailed($SendingData, $RecievingData, $Status);
    }                     
    
    

    /**
     * @group sofyan
     */
    //sign up with non-string city
    public function testWithNonStringCity()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Non string city"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "The city must be a string."
                                );
        $this->signUpFailed($SendingData, $RecievingData, $Status);
    }            
    
    /**
     * @group sofyan
     */    
    // Successful signup
    public function testWithNonAuthonticated()
    {
        $Status = 200;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Valid city"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array(
                                "token_type"    => "bearer" ,
                                "name"          => $this->Array["Valid name"] ,
                                "expires_in"    => 3600 * 24 ,
                            );
        $this->signUpSuccessed($SendingData, $RecievingData, $Status);
    }

    /**
     * @group sofyan
     */
    // signup with already authonticated user
    public function alreadyAuthonticated()
    {
        $this->token = JWTAuth::fromUser($this->User);
        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Valid city"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "errors" => "Alredy authorized"
                                );
        $response = $this->json("POST" , "api/signup" , $SendingData);
        $this->signUpSuccessed($SendingData, $RecievingData, $Status);
    }  
    /**
     * @group sofyan
     */
    public function testDatabase()
    {
        $Status = 200;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Valid city"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
                        
        $hashedPassword = Hash::make($this->Array["Valid password"]);
        $RecievingData = array  (
                                "email" => $this->Array["Valid email"],
                                "name" => $this->Array["Valid name"],
                                //"password" => "Hash::make($hashedPassword)",
                                "gender" => $this->Array["Valid gender"],
                                "birthday" => $this->Array["Valid birthday"],
                                "country" => $this->Array["Valid country"],
                                "city" => $this->Array["Valid city"],
                            );
        $table = "users";
        $this->Database($SendingData, $RecievingData , $table);
        $User = User::where("email" , $this->Array["Valid email"]);
        $User->delete();
    }
    
    /**
     * @group sofyan
     */    
    // Login with authorized user
    public function testWithAuthonticated()
    {
        // [1] Now in the function above , i signup and then try to sign up again and it return [already authorized]
        // and i now need to test this authorized without using sign up , so i used the function actingAs and it make 
        // error with me 

        // [2] I need to delete this user in ever test , so i want to use the function [setup] or [constructor] and it make 
        // error with me 

        // [3] when you solve the error in the point [2] try to make the intry data be dynamic with array 

        // [4] You must understand you it make the auth in the test function 

        // [5] The test of the middleware

        
        $this->token = JWTAuth::fromUser($this->User);

        $Status = 405;
        $SendingData = array(
                                "email"                 => $this->Array["Valid email"],
                                "password"              => $this->Array["Valid password"],
                                "password_confirmation" => $this->Array["Valid password"],
                                "name"                  => $this->Array["Valid name"],
                                "gender"                => $this->Array["Valid gender"],
                                "birthday"              => $this->Array["Valid birthday"],
                                "country"               => $this->Array["Valid country"],
                                "city"                  => $this->Array["Valid city"],
                                "token" => $this->token,
                                "token_type" => $this->tokenType
                            );
        $RecievingData = array  (
                                    "error" => "You are already loged in"
                                );
        $response = $this->json("POST" , "api/signup" , $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJsonFragment($RecievingData);
        
        //$this->assertJson(true);
    }
}
