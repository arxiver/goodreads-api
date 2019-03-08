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
	 * Sign Up
     * @bodyParam UserName string required .
     * @bodyParam Full_Name string required .
     * @bodyParam Password string required .
     * @bodyParam Password_confirmation string required .
     * @bodyParam Gender string required must be [Female , Male or Other].
     * @response 404 {
     * "status" : "false",
     * "Errors": [
     * "The Username field is required.",
     * "The password field is required.",
     * "The Full_Name field is required.",
     * "The gender field is required."
     *]
     *}
     * @response {
     * "Status": "true",
     * "User": {
     *   "UserName": "",
     *   "Name": "",
     *   "Image" : ""
     *}
     *}
	 */

    public function SignUp(Request $request)
    {
        // body
    }


    /**
	 * LogIn
     * @bodyParam UserName string required .
     * @bodyParam Password string required .
     * @response 404 {
     * "Status": "false",
     * "Errors": [
     * "The User_Name field is required.",
     * "The Password field is required."
     *]
     *}
     * @response {
     * "Status": "true",
     * "User": {
     *   "UserName": "",
     *   "Name": "",
     *   "Image" : ""
     *}
    * }
	 */
    public function LogIn(Request $request)
    {
        // body
    }


    /**
	 * Setting
     * @authenticated
    * @response {
     * "Status": "true",
     * "User": {
     *   "User_Name": "",
     *   "Gender": "",
     *   "Name": "",
     *   "Image" : ""
     *}
    * }
	 */
    public function Setting(Request $request)
    {
        // body
    }


    /**
	 * Log Out
	 */
    public function LogOut(Request $request)
    {
        // body
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
     * @response {
     * "Status": "true",
     * "Messages": "You have changed your name"
     *}
	 */
    public function ChangeName(Request $request)
    {
       // body
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
     * @response {
     * "Status": "true",
     * "Messages": "You have changed your password"
     *}
	 */
    public function ChangePassword(Request $request)
    {
        // body
    }


    /**
	 * Change Image
     * @bodyParam Image string required the URL for the image .
     * @authenticated
     * @response {
     * "Status": "true",
     * "Messages": "You have updated your profile picture"
     *}
	 */
    public function ChangeImage(Request $request)
    {
      // body
    }

    
    /**
	 * Delete
     * @bodyParam Password string required .
     * @authenticated
     * @response 404 {
     * "Status": "false",
     * "Errors": [
     * "The password is wrong."
     *]
     *}
     * @response {
     * "Status": "true",
     * "Messages": "You have deleted your account"
     *}
	 */
    public function Delete(Request $request)
    {
       // body
    }
}
