<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

/**
 * @group User management
 *
 * APIs for managing users (Sofyan)
 */
class UserController extends Controller
{
    //
    /**
     * search for an user
     * @bodyParam username string required search for a user by his/her username.
     */
    /**
	 * Sign Up
     * @bodyParam Email string required .
     * @bodyParam Name string required .
     * @bodyParam Password string required .
     * @bodyParam Password_confirmation string required .
     * @bodyParam Gender string required must be [Female , Male or Other].
     * @response 404 {
     * "Errors": [
     * "The email field is required.",
     * "The password field is required.",
     * "The name field is required.",
     * "The gender field is required."
     *]
     *}
     * @response {
     * "Name" : "",
     * "id" : "",
     * "image" : "",
     * "Gender" : ""
     *}
	 */
    public function SignUp(Request $request)
    {
        
        $Validations    = Array (
                                    "Email"     => "required|email|unique:users" ,
                                    "Password"  => "required|confirmed|max:30|min:5",
                                    "Name"      => "required|string|max:50|min:3" ,
                                    "Gender"    => "required|string", 
                                );
        $Message        = Array (
                                    
                                );
        $NiceName       = Array (
                                     
                                );

        $Data = validator::make($request->all() , $Validations);
       
        if(!($Data->fails()))
        {
            $User = new User;
            $User->Email        = $request["Email"];
            $User->Gender       = $request["Gender"];
            $User->Name         = $request["Name"];
            $User->Password     = $request["Password"];
            $User->api_token    = str_random(60);
            $User->save();
            return response(["Status" => "true" , "User" => $User , "api_token" => $User->api_token]);
        }
        else
        {
            return response(["Status" => "false" , "Errors"=> $Data->messages()->all()]);
        }
        
    }


    /**
	 * LogIn
     * @bodyParam Email string required .
     * @bodyParam Password string required .
     * @response 404 {
     * "Status": "false",
     * "Errors": [
     * "The email field is required.",
     * "The password field is required."
     *]
     *}
     * @response {
     * "Name" : "",
     * "id" : "",
     * "image" : "",
     * "Gender" : ""
     *}
	 */
    public function LogIn(Request $request)
    {
        $Data = $request->all();

        $Validations    = Array (
                                    "Email"     => "required|email|exists:users,Email" ,
                                    "Password"  => "required|max:30|min:5|exists:users,Password",
                                );
        $Message        = Array (
                                    
                                );  
        $NiceName       = Array (
                                    "Email"     => "Account",
                                );
        $Data = $this->validate($request , $Validations , $Message , $NiceName );

        $user = User::where("Email" , $Data["Email"])->where("Password" , $Data["Password"])->first();

        if($user == null)
        {
            return response(["ststus" => false]);
        }
        else
        {
            $user->api_token = str_random(60);
            $user->save();
            return response(["ststus" => true , "user" => $user , "token" =>$user->api_token]);  
        }
    }


    /**
	 * Show Profile
     * @authenticated
     * @response {
     * "Name" : "",
     * "id" : "",
     * "image" : "",
     * "Gender" : "",
     * "Updates" : []
     *}
	 */
    public function Show_Profile(Request $request)
    {
        $Users = User::all();

        for($i =0 ; $i<count($Users) ; $i++)
        {
            echo "<p style = \"color:red ; font-size:130%\">". $Users[$i]->Name ."</p>" ;
            echo "<p>". $Users[$i]->ID ."</p>" ;
            echo "<p>". $Users[$i]->Email ."</p>" ;
            echo "<p>". $Users[$i]->Password ."</p>" ;
            echo "<br><br>";
        }
    }


    /**
	 * Log Out
	 */
    public function LogOut(Request $request)
    {
        // End session
        // redirect to Login page
    }


    /**
     * @authenticated
	 * Change Name
     * @bodyParam Password string required .
     * @bodyParam New_Name string required .
     * @response 404 {
     * "Status": "false",
     * "Errors": [
     * "The Password field is required.",
     * "The New_Name field is required."
     *]
     *}
	 */
    public function ChangeName(Request $request)
    {
        
        // Find the record by id
        // Check if the old password is match with this id
        // Check the new name 
        // Change the name
    }


    /**
     * @authenticated
	 * Change Password
     * @bodyParam Password string required .
     * @bodyParam New_Password string required .
     * @bodyParam New_Password_confirmation string required .
     * @response 404 {
     * "Status": "false",
     * "Errors": [
     * "The password field is required.",
     * "The New_password field is required.",
     * "The New_password_confirmation field is required."
     *]
     *}
	 */
    public function ChangePassword(Request $request)
    {
       
        // Find The record by id 
        // Check if the old password is match with this id 
        // Check the new password
        // Change the password
    }


    /**
	 * Change Image
     * @bodyParam Image string required the URL for the image .
     * @authenticated
	 */
    public function ChangeImage(Request $request)
    {
      
        // Find the record by id
        // Update the $Change with new pic
    }

    
    /**
	 * Delete
     * @bodyParam Password string required .
     * @authenticated
	 */
    public function Delete(Request $request)
    {
       
        // Find the record by id
        // Delete the record
        // return Login.blade.php
    }
}
