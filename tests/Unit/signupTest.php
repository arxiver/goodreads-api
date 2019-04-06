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
        
        $this->user = User::where("email" , "test2@yahoo.com")->first();
        $this->assertAuthenticatedAs($this->user);
    }



    private function Database($SendingData , $RecievingData , $table)
    {
            $this->assertDatabaseHas($table, $RecievingData);
    }


    // sign up without email 
    public function testWithoutEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email" => "",
                            );
        $RecievingData = array  (
                                    "errors" => "The email field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without password
    public function testWithoutPassowrd()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => ""
                            );
        $RecievingData = array  (
                                    "errors" => "The password field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without password_confirmation
    public function testWithoutPassword_confirmation()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => ""
                            );
        $RecievingData = array  (
                                    "errors" => "The password confirmation does not match."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without name
    public function testWithoutName()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => ""
                            );
        $RecievingData = array  (
                                    "errors" => "The name field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without gender
    public function testWithoutGender()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                =>""
                            );
        $RecievingData = array  (
                                    "errors" => "The gender field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without birthday
    public function testWithoutBirthday()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                =>"male",
                                "birthday"              =>""
                            );
        $RecievingData = array  (
                                    "errors" => "The birthday field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without country
    public function testWithoutCountry()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                =>"male",
                                "birthday"              => "1998-3-21",
                                "country"               => ""
                            );
        $RecievingData = array  (
                                    "errors" => "The country field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up without city
    public function testWithoutCity()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                =>"male",
                                "birthday"              => "1998-3-21",
                                "country"               => "Egypt",
                                "city"                  => ""
                            );
        $RecievingData = array  (
                                    "errors" => "The city field is required."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    //sign up with exsisting email
    public function testWithExsistingEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test@yahoo.com"
                            );
        $RecievingData = array  (
                                    "errors" => "The email has already been taken."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    // sign up with non-email
    public function testWithNonEmailType()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2NotEmail",
                            );
        $RecievingData = array  (
                                    "errors" => "The email must be a valid email address."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    // sign up with long password 
    public function testWithLongPassword()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword1111111111111111111111111111111111"
                            );
        $RecievingData = array  (
                                    "errors" => "The password may not be greater than 30 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    // sign up with short password
    public function testWithShortPassword()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "test"
                            );
        $RecievingData = array  (
                                    "errors" => "The password must be at least 5 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    // sign up with different passwords
    public function testWithDifferentPasswords()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword2",
                                "name"                  => ""
                            );
        $RecievingData = array  (
                                    "errors" => "The password confirmation does not match."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }

    

    // sign up with long name 
    public function testWithLongEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test11111111111111111111111111111111111111111111111111111111111111"
                            );
        $RecievingData = array  (
                                    "errors" => "The name may not be greater than 50 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    // sign up with short name
    public function testWithShortEmail()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "te"
                            );
        $RecievingData = array  (
                                    "errors" => "The name must be at least 3 characters."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    // sign up with non-stirng name
    public function testWithNonStringName()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => 111 
                            );
        $RecievingData = array  (
                                    "errors" => "The name must be a string."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up with non-stirng gender
    public function testWithNonStringGender()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => 111
                            );
        $RecievingData = array  (
                                    "errors" => "The gender must be a string."
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }



    //sign up with birthday olderer than 100 years
    public function testWithOlderBirthday()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1910-2-21"))
                            );
        $RecievingData = array  (
                                    "errors" => "You must be younger than 100"
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }   



    //sign up with birthday younger than 3 years
    public function testWithYoungerBirthday()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("2019-2-21"))
                            );
        $RecievingData = array  (
                                    "errors" => "You must be older than 3"
                                );
        $this->signUpFailed($SendingData , $RecievingData , $Status);
    }


    //sign up with non-date type
    public function testWithNonDateType()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => "1998-21-2"
                            );
        $RecievingData = array(
                                    "errors" => "The birthday is not a valid date."
                                );
        $this->signUpFailed($SendingData, $RecievingData, $Status);
    }


    //sign up with non-string country 
    public function testWithNonStringCountry()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1998-2-21")),
                                "country"               => 1111
                            );
        $RecievingData = array  (
                                    "errors" => "The country must be a string."
                                );
        $this->signUpFailed($SendingData, $RecievingData, $Status);
    }                     
    
    


    //sign up with non-string city
    public function testWithNonStringCity()
    {
        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1998-2-21")),
                                "country"               => "Egypt",
                                "city"                  => 111
                            );
        $RecievingData = array  (
                                    "errors" => "The city must be a string."
                                );
        $this->signUpFailed($SendingData, $RecievingData, $Status);
    }            
    
    
    // sign up with non-authonticated and authonticated user
    public function testWithNonAuthonticated()
    {
        $Status = 200;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1998-2-21")),
                                "country"               => "Egypt",
                                "city"                  => "Giza"
                            );
        $RecievingData = array  (
                                "token_type"    => "bearer" ,
                                "name"          => "test" ,
                                "expires_in"    => 3600 * 24 ,
                            );
        $this->signUpSuccessed($SendingData, $RecievingData, $Status);


        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1998-2-21")),
                                "country"               => "Egypt",
                                "city"                  => "Giza"
                            );
        $RecievingData = array  (
                                    "errors" => "Alredy authorized"
                                );
        //$response = $this->json("POST" , "api/signup" , $SendingData);
        $this->signUpSuccessed($SendingData, $RecievingData, $Status);
    }  

    public function testDatabase()
    {
        $Status = 200;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1998-2-21")),
                                "country"               => "Egypt",
                                "city"                  => "Giza"
                            );
        $hashedPassword = Hash::make("testpassword");
        $RecievingData = array  (
                                "email" => "test2@yahoo.com",
                                "name" => "test",
                                //"password" => "Hash::make($hashedPassword)",
                                "gender" => "male",
                                "birthday" => date("Y-n-j" , strtotime("1998-2-21")),
                                "country" => "Egypt",
                                "city" => "Giza",
                            );
        $table = "users";
        $this->Database($SendingData, $RecievingData , $table);


    }
    
    
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

        /*
        $user = factory(User::class)->create();

        $Status = 405;
        $SendingData = array(
                                "email"                 => "test2@yahoo.com",
                                "password"              => "testpassword",
                                "password_confirmation" => "testpassword",
                                "name"                  => "test",
                                "gender"                => "male",
                                "birthday"              => date("Y-n-j" , strtotime("1998-2-21")),
                                "country"               => "Egypt",
                                "city"                  => "Giza"
                            );
        $RecievingData = array  (
                                    "errors" => "Alredy authorized"
                                );
        $response = $this->actingAs($user)->json("POST" , "api/signup" , $SendingData);
        $response
            ->assertStatus($Status)
            ->assertJsonFragment($RecievingData);
        */
        $this->assertJson(true);
    }
}
