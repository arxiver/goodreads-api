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
     * @bodyParam password_confirmation string required this is a special filed so it's not in camel case.
     * @bodyParam gender string required must be [Female , Male or Other].
     * @bodyParam location string required .
     * @bodyParam birthday date required .
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
     * Show setting
     * @authenticated
     * @response {
     * "status": "true",
     * "user": {
     *   "userName": "",
     *   "gender": "",
     *   "name": "",
     *   "image" : "",
     *   "location" : "",
     *   "birthday" : "",
     *   "seeMyBirthday" : "",
     *   "seeMyCountry" : "",
     *   "seeMyCity" : ""
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
     * Change Name
     * @authenticated
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
     * Change password
     * @authenticated
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
    public function changePassword(Request $request)
    {
        // body
    }



    /**
     * Change country
     * @authenticated
     * @bodyParam country string required .
     * @response {
     * "status": "true",
     * "message": "You have changed your country"
     *}
     */
    public function changeCountry(Request $request)
    {
        // body
    }

    /**
     * Change city
     * @authenticated
     * @bodyParam city string required .
     * @response {
     * "status": "true",
     * "message": "You have changed your city"
     *}
     */
    public function changeCity(Request $request)
    {
        // body
    }

    /**
     * Change birthday
     * @authenticated
     * @bodyParam birthday date required .
     * @response {
     * "status": "true",
     * "message": "You have changed your birthday"
     *}
     */
    public function changeBirthday(Request $request)
    {
        // body
    }

    /**
     * Who can see my birthday
     * @authenticated
     * @bodyParam seeMyBirthday string required Must be ["onlyMe","everyOne" or "friends"].
     * @response {
     * "status": "true",
     * "message": "You have changed who can see your birthday"
     *}
     */
    public function whoCanSeeMyBirthday(Request $request)
    {
        // body
    }


    /**
     * Who can see my country
     * @authenticated
     * @bodyParam seeMyCountry string required Must be ["onlyMe","everyOne" or "friends"].
     * @response {
     * "status": "true",
     * "message": "You have changed who can see your country"
     *}
     */
    public function whoCanSeeMyCountry(Request $request)
    {
        // body
    }

    /**
     * Who can see my city
     * @authenticated
     * @bodyParam seeMyCity string required Must be ["onlyMe","everyOne" or "friends"].
     * @response {
     * "status": "true",
     * "message": "You have changed who can see your city"
     *}
     */
    public function whoCanSeeMyCity(Request $request)
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
    public function delete(Request $request)
    {
        // body
    }


    /**
     * search for an user
     * @bodyParam userName string required search for a user by his/her userName.
     * @response {"user": {
	 * 		"id": "000000",
	 *		"name": "Salma",
	 *		"image_url": "https://image.jpg",
	 *		"link": "https://www.goodreads.com/user/show/000000-salma"
     *	}
     *}
     */
    public function getUser()
    {
        // to do
    }
    /**
     * Show Profile
     * 
     * @bodyParam id int optional this parameter to show the info of the other user (default authenticated user) .
     * 
     * @authenticated
     * @response {
     * "id": "",
     * "name": "",
     * "user_name": "",
     * "link": "",
     * "image_url": "",
     * "small_image_url": "",
     * "about": "",
     * "age": "",
     * "gender": "",
     * "location": "",
     * "joined": "",
     * "last_active": "",
     * "user_shelves": {
     *   "user_shelf": [
     *   {
     *       "id": {
     *       "_type": "",
     *       "__text": ""
     *       },
     *       "name": "read",
     *       "book_count": {
     *      "_type": "integer",
     *       "__text": ""
     *       }
     *   },
     *   {
     *       "id": {
     *       "_type": "",
     *       "__text": ""
     *       },
     *       "name": "currently-reading",
     *       "book_count": {
     *       "_type": "integer",
     *      "__text": "0"
     *        }
     *   },
     *   {
     *       "id": {
     *       "_type": "",
     *       "__text": ""
     *       },
     *       "name": "to-read",
     *       "book_count": {
     *       "_type": "integer",
     *       "__text": "2"
     *       }
     *   }
     *   ],
     *   "_type": "array"
     * },
     * "updates": []
     * }
     */

    public function showProfile()
    {
        // to do
    }

}
