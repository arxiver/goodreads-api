<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        // body
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
        // body
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
     */
    public function ChangePassword(Request $request)
    {
        // body
    }


    /**
     * Change Image
     * @bodyParam Image string required the URL for the image .
     * @authenticated
     */
    public function ChangeImage(Request $request)
    {
        // body
    }

    
    /**
     * Delete
     * @bodyParam Password string required .
     * @authenticated
     */
    public function Delete(Request $request)
    {
        // body
    }
    

    /**
     * search for an user
     * @bodyParam username string required search for a user by his/her username.
     */
    public function getUser()
    {
        // to do
    }
    /**
     * list all users of the given name
     * @bodyParam name string required list all users of the same name.
     */
    public function getAllUsers()
    {
        // to do
    }
}
