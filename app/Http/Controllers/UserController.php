<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Validator;

/**
 * @group user management
 *
 * APIs for managing users (Sofyan)
 */
class userController extends Controller
{
    //
    /**
	 * Sign Up
     * @bodyParam userName string required .
     * @bodyParam fullName string required .
     * @bodyParam password string required .
     * @bodyParam password_confirmation string required .
     * @bodyParam gender string required must be [Female , Male or Other].
     * @response 404 {
     * "status" : "false",
     * "errors": [
     * "The userName field is required.",
     * "The password field is required.",
     * "The fullName field is required.",
     * "The gender field is required."
     *]
     *}
     * @response {
     * "status": "true",
     * "user": {
     *   "userName": "",
     *   "name": "",
     *   "image" : ""
     *}
     *}
	 */

    public function signUp(Request $request)
    {
        // body
    }


    /**
	 * LogIn
     * @bodyParam userName string required .
     * @bodyParam password string required .
     * @response 404 {
     * "status": "false",
     * "errors": [
     * "The userName field is required.",
     * "The password field is required."
     *]
     *}
     * @response {
     * "status": "true",
     * "user": {
     *   "userName": "",
     *   "name": "",
     *   "image" : ""
     *}
    * }
	 */
    public function logIn(Request $request)
    {
        // body
    }


    /**
	 * Setting
     * @authenticated
    * @response {
     * "status": "true",
     * "user": {
     *   "userName": "",
     *   "gender": "",
     *   "name": "",
     *   "image" : ""
     *}
    * }
	 */
    public function showSetting(Request $request)
    {
        // body
    }


    /**
	 * Log Out
	 */
    public function logOut(Request $request)
    {
        // body
    }


    /**
     * @authenticated
	 * Change Name
     * @bodyParam password string required .
     * @bodyParam newName string required .
     * @response 404 {
     * "status": "false",
     * "errors": [
     * "The password field is required.",
     * "The newName field is required."
     *]
     *}
     * @response {
     * "status": "true",
     * "message": "You have changed your name"
     *}
	 */
    public function changeName(Request $request)
    {
       // body
    }


    /**
     * @authenticated
	 * Change password
     * @bodyParam password string required .
     * @bodyParam newPassword string required .
     * @bodyParam newPassword_confirmation string required this filed is special so it isn't camel case .
     * @response 404 {
     * "status": "false",
     * "errors": [
     * "The password field is required.",
     * "The newPassword field is required.",
     * "The newPassword_confirmation field is required."
     *]
     *}
     * @response {
     * "status": "true",
     * "message": "You have changed your password"
     *}
	 */
    public function chnagePassword(Request $request)
    {
        // body
    }


    /**
	 * Change Image
     * @bodyParam Image string required the URL for the image .
     * @authenticated
     * @response {
     * "status": "true",
     * "message": "You have updated your profile picture"
     *}
	 */
    public function changeImage(Request $request)
    {
      // body
    }

    
    /**
	 * Delete
     * @bodyParam password string required .
     * @authenticated
     * @response 404 {
     * "status": "false",
     * "errors": [
     * "The password is wrong."
     *]
     *}
     * @response {
     * "status": "true",
     * "message": "You have deleted your account"
     *}
	 */
    public function Delete(Request $request)
    {
       // body
    }
    

    /**
     * search for an user
     * @bodyParam userName string required search for a user by his/her userName.
     */
    public function getUser()
    {
        // to do 
    }
}
