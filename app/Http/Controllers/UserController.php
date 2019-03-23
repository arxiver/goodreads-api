<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/**
 * I belong to UserController.php
 */

/**
 * I belong to a userController
 */



/**
 * @group User 
 *
 * APIs for managing users (Sofyan)
 */
class userController extends Controller
{
    public $name;

    public function setName($name)
    {
        $this->name = "$name";
    }
    public function getname()
    {
        return $this->name;
    }


    //
    /**
     * Sign Up
     * @bodyParam email string required .
     * @bodyParam password string required .
     * @bodyParam password_confirmation string required this is a special filed so it's not in camel case.
     * @bodyParam name string required .
     * @bodyParam gender string required must be [Female , Male or Other].
     * @bodyParam birthday date required .
     * @bodyParam country string required .
     * @bodyParam city string required .
     * @response 404 {
     * "status" : "false",
     * "errors": [
     * "The email field is required.",
     * "The username field is required.",
     * "The password field is required.",
     * "The name field is required.",
     * "The gender field is required."
     *]
     *}
     * @response 200{
     * "status": "true",
     * "user": {   
     *    "name": "", 
     *    "username": "",
     *    "image_link": ""
     *},
     *"token": "",
     *"token_type": "",
     *"expires_in": ""
     *}
     */

    public function signUp(Request $request)
    {
        $olderThan = 3;
        $youngerThan = 100;

        $Validations    = array(
                                    "email"         => "required|email|unique:users" ,
                                    "password"      => "required|confirmed|max:30|min:5",
                                    "name"          => "required|string|max:50|min:3" ,
                                    "gender"        => "required|string",
                                    "birthDay"      => "required|date|string|after:-" .$youngerThan."years|before:-" . $olderThan . "years",
                                    "birthday"      => "required|date|string|after:-" .$youngerThan."years|before:-" . $olderThan . "years",
                                    "country"       => "required|string",
                                    "city"          => "required|string"
                                );
        $Messages       = array(
                                    "birthday.before" => "You must be older than ". $olderThan,
                                    "birthday.after" => "You must be younger than ". $youngerThan
                                );



        $Data = validator::make($request->all(), $Validations, $Messages);
        if (!($Data->fails())) {
            $UserName = strstr($request["email"], '@', 2);
            $ValidationArray    = array("Username" => $UserName);
            $ValidationUserName = array("Username" => "unique:users");
            $AdditionalString = 1;
            while ((validator::make($ValidationArray, $ValidationUserName))->fails()) {
                $ValidationArray["Username"].=$AdditionalString;
                $AdditionalString+=1;
            }
            $Create = array(
                                "email"         => $request["email"],
                                "password"      => $request["password"],
                                "name"          => $request["name"],
                                "gender"        => $request["gender"],
                                "username"      => $ValidationArray["Username"],
                                "age"           => date("Y") - date("Y", strtotime($request["birthday"])),
                                "birthday"      => date("Y-n-j", strtotime($request["birthday"])),
                                "country"       => $request["country"],
                                "city"          => $request["city"]
                            );



            User::create($Create);

            $token = JWTAuth::attempt(["email" => $request["email"]  , "password" => $request["password"]]);


            $gettingData = array(
                                    "name" ,
                                    "username" ,
                                    "image_link"
                                );
            $Show = User::where("email", $request["email"])->first($gettingData);
            return response()->json(["user" => $Show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60],200);
        } 
        else 
        {
            return response()->json(["errors"=> $Data->messages()->first()], 405);
        } 
    }
    /**
     * LogIn
     * 
     * Login : Take the request has [email , password] and check that the email is email type and exists in database and also the password
     * then , if all is correct return a response with status 200 and json file has [name , username , image_link] 
     * and if there are eny errors, return a response with status 405 has the message describe the error
     * 
     * @bodyParam email string required .
     * @bodyParam password string required .
     * @response 405 {
     * "errors": [
     * "The email field is required.",
     * "The password field is required."
     *]
     *}
     * @response 405 {
     * "errors": "Already Authorized ."
     *}
     * @response 200{
     * "status": "true",
     * "user": {   
     *    "name": "", 
     *    "username": "",
     *    "image_link": ""
     *},
     *"token": "",
     *"token_type": "",
     *"expires_in": ""
     *}
     */
    public function logIn(Request $request)
    {
        $hashedPassword = Hash::make($request["password"]);
        $validations    = array(
                                    "email"             => "required|email|exists:users,email" ,
                                    "password"          => "required",
                                    "hashedPassword"    => "exists:users,password",
                                );
        $messages      = array(
                                    "email.exists"              => "The email or password is invalid.",
                                    "hashedPassword.exists"     => "The email or Password is invalid."
                                );
        $data = validator::make($request->all(), $validations , $messages);

        if($data->fails())
        {
            return response(["errors" => $data->messages()->first()],405);
        }
        else
        {
            if($token = JWTAuth::attempt(["email" => $request["email"]  , "password" => $request["password"]]))
            {
                $gettingData = array(
                                        "name" ,
                                        "username" ,
                                        "image_link"
                                    );
                $user = User::where("email" , $request["email"])->first();
                $user->save();
                $show = User::where("email" , $request["email"])->first($gettingData);
                return response()->json(["user" => $show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60 * 24],200);
            }
            else
            {
                return response(["errors" => "The email or password is invalid."],405);
            }
        }
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
        
        
    }


    /**
     * Log Out
     * 
     * log out : Take the request has [Authorization] in the header and this paramater is checked in middleware 
     * and if it valid one the function return it into invalid and return response with status 200 with message [you have logged out]
     * and if this [Authorization] is invalid the middleware return a response with status 405 has a message [UnAuthorized].
     * @authenticated
     * 
     * 
     * @response 200{
     * "message": "You have logged out"
     *}
     * @response 405{
     * "message": "Unauthorized"
     *}
     */
    public function logOut(Request $request)
    {
        auth()->logout();
        return response()->json(["message" => "You have loged out"],200);
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
     * @group [User].Show Profile
     * 
     * showProfile function
     * 
     * checking the request given paramaters if user_id exists 
     * 
     * it returns his profile-details
     * 
     * other-wise it returns authenticated user`s profile from database user table .
     * 
     * @bodyParam id int optional this parameter to show the info of the other user (default authenticated user) .
     *
     * @authenticated
     * 
     * @response 200
     *  {
     *     "id": 1,
     *     "name": "Jeromy Heidenreich",
     *     "username": "Dr. Zaria Witting I",
     *     "email": "anna29@example.net",
     *     "email_verified_at": "2019-03-21 20:42:11",
     *     "link": "http://kozey.com/excepturi-nemo-nemo-sequi-corrupti",
     *     "image_link": "https://lorempixel.com/640/480/?23657",
     *     "small_image_link": "https://lorempixel.com/100/100/?36683",
     *     "about": "weRmt2re2n",
     *     "age": 65,
     *     "gender": "N/A",
     *     "country": "Egupt",
     *     "city": "Cairo",
     *     "joined_at": "1981-11-16",
     *     "last_active": "2019-03-23 12:17:09",
     *     "followers_count": 2,
     *     "following_count": 5,
     *     "rating_avg": 2,
     *     "rating_count": 6,
     *     "books_count": null,
     *     "birthday": null,
     *     "created_at": null,
     *     "updated_at": null
     * }
     */

    public function showProfile(Request $request)
    {
        /**
        * Checking is the optional paramater is sent or not
        * Case it is not sent : then we list the authenticated-user `s followers
        * other wise we use the given user_id to get profile detailed info  .
        */
        $userId = $request->has(['id']) ? $request->id : $this->ID;
        User::findOrFail($userId);

        /**
         * Query finding user data
         */      
        $data = User::where('id',$userId)->get()[0];
  
        /**
         * Return response
         */
        return response()->json($data);

    }

}
