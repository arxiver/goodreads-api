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
    private $youngerThan = 100;
    private $olderThan = 3;
    
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
        $validations    = array(
                                    "email"         => "required|email|unique:users" ,
                                    "password"      => "required|max:30|min:5|confirmed",
                                    "name"          => "required|max:50|min:3|string" ,
                                    "gender"        => "required|string",
                                    "birthday"      => "required|date|after:-" .$this->youngerThan."years|before:-" . $this->olderThan . "years",
                                    "country"       => "required|string|min:2|max:30",
                                    "city"          => "required|string|min:2|max:30"
                                );
        $messages       = array(
                                    "birthday.before" => "You must be older than ". $this->olderThan,
                                    "birthday.after" => "You must be younger than ". $this->youngerThan
                                );

        $data = validator::make($request->all(), $validations, $messages);
        if (!($data->fails())) {
            $userName = strstr($request["email"], '@', 2);
            $validationArray    = array("username" => $userName);
            $validationuserName = array("username" => "unique:users");
            $additionalString = 1;
            while ((validator::make($validationArray, $validationuserName))->fails()) {
                $validationArray["username"].=$additionalString;
                $additionalString+=1;
            }
            $Create = array(
                                "email"         => $request["email"],
                                "password"      => $request["password"],
                                "name"          => $request["name"],
                                "gender"        => $request["gender"],
                                "username"      => $validationArray["username"],
                                "age"           => date("Y") - date("Y", strtotime($request["birthday"])),
                                "birthday"      => date("Y-n-j", strtotime($request["birthday"])),
                                "country"       => $request["country"],
                                "city"          => $request["city"]
                            );
            $user = User::create($Create);
            $token = JWTAuth::attempt(["email" => $request["email"]  , "password" => $request["password"]]);
            $gettingdata = array(
                                    "name" ,
                                    "username" ,
                                    "image_link"
                                );
            $show = User::find($user->id,$gettingdata);
            return response()->json(["user" => $show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60 * 24],200);
        } 
        else 
        {
            return response()->json(["errors"=> $data->messages()->first()], 405);
        } 
    }




    /**
     * @group [User].Login
     * logIn function
     * 
     * Take the request has [email , password] and check that the email is email type and exists in database and also the password
     * 
     * if all is correct return a response with status 200 and json file has [name , username , image_link] 
     * 
     * if there are any errors, return a response with status 405 has the message describe the error
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
                $gettingdata = array(
                                        "name" ,
                                        "username" ,
                                        "image_link"
                                    );
                $user = User::where("email" , $request["email"])->first();
                $show = User::find($user->id,$gettingdata);
                return response()->json(["user" => $show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60 * 24],200);
            }
            else
            {
                return response(["errors" => "The email or password is invalid."],405);
            }
        }
    }


    /**
     * show setting
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
     *}
     */
    public function showSetting(Request $request)
    {
        $gettingData = array
                            (   
                                "id",
                                "name",
                                "username",
                                "email",
                                "email_verified_at",
                                "password",
                                "link",
                                "image_link",
                                "small_image_link",
                                "about",
                                "age",
                                "gender",
                                "country",
                                "city",
                                "joined_at",
                                "followers_count",
                                "following_count",
                                "rating_avg",
                                "rating_count",
                                "book_count",
                                "birthday",
                                "see_my_birthday",
                                "see_my_country",
                                "see_my_city"
                            );
        $show = User::find($this->ID,$gettingData);
        return response()->json(["user" => $show],200);
    }


    /**
     * @group [User].Logout
     * logOut function
     * 
     * Take the request has [Authorization] in the header and this paramater is checked in middleware 
     * 
     * if it valid one the function return it into invalid and return response with status 200 with message [you have logged out]
     * 
     * if this [Authorization] is invalid the middleware return a response with status 405 has a message [UnAuthorized].
     * 
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
     * @response 405 {
     * "errors": [
     * "The password field is required.",
     * "The newName field is required."
     *]
     *}
     * @response 200{
     * "message": "You have changed your name"
     *}
     */
    public function changeName(Request $request)
    {
        $validation = array("newName" => "required|max:50|min:3|string");
        if(Auth::attempt(["id" => $this->ID , "password" => $request["password"]]))
        {
            $valid = validator::make($request->all() , $validation);
            if(!$valid->fails())
            {
                $user = User::find($this->ID);
                $user->name = $request["newName"];
                $user->save();
                return response()->json(["message" => "You have changed your name"],200);
            }
            else
            {
                return response()->json(["errors"=> $valid->messages()->first()], 405);
            }
        }
        else
        {
            return response()->json(["errors" => "The password is invalid."],405);
        }
    }


    /**
     * Change password
     * @authenticated
     * @bodyParam password string required .
     * @bodyParam newPassword string required .
     * @bodyParam newPassword_confirmation string required this filed is special so it isn't camel case .
     * @response 405 {
     * "errors": [
     * "The password field is required.",
     * "The newPassword field is required.",
     * "The newPassword_confirmation field is required."
     *]
     *}
     * @response 200{
     * "message": "You have changed your password"
     *}
     */
    public function changePassword(Request $request)
    {
        $validation = array("newPassword" => "required|max:30|min:5|confirmed");
        if(Auth::attempt(["id" => $this->ID , "password" => $request["password"]]))
        {
            $valid = validator::make($request->all() , $validation);
            if(!$valid->fails())
            {
                $user = User::find($this->ID);
                $user->password = $request["newPassword"];
                $user->save();
                return response()->json(["message" => "You have changed your password"],200);
            }
            else
            {
                return response()->json(["errors"=> $valid->messages()->first()], 405);
            }
        }
        else
        {
            return response()->json(["errors" => "The password is invalid."],405);
        }
    }



    /**
     * Change country
     * @authenticated
     * @bodyParam country string required .
     * @response 200{
     * "message": "You have changed your country"
     *}
     * @response 405{
     * "errors" : "UnAuthorized"
     *}
     * @response 405 {
     * "errors": [
     * "The country field is required."
     *]
     *}
     */
    public function changeCountry(Request $request)
    {
        $validation = array("country" => "required|string|min:2|max:30");
        $valid = validator::make($request->all() , $validation);
        if(!$valid->fails())
        {
            $user = User::find($this->ID);
            $user->country = $request["country"];
            $user->save();
            return response()->json(["message" => "You have changed your country"] , 200);
        }
        else
        {
            return response()->json(["errors"=> $valid->messages()->first()] , 405);
        }
        
    }

    /**
     * Change city
     * @authenticated
     * @bodyParam city string required .
     * @response 200{
     * "message": "You have changed your city"
     *}
     * @response 405{
     * "errors" : "UnAuthorized"
     *}
     * @response 405 {
     * "errors": [
     * "The city field is required."
     *]
     *}
     */
    public function changeCity(Request $request)
    {
        $validation = array("city" => "required|string|min:2|max:30");
        $valid = validator::make($request->all() , $validation);
        if(!$valid->fails())
        {
            $user = User::find($this->ID);
            $user->country = $request["city"];
            $user->save();
            return response()->json(["message" => "You have changed your city"] , 200);
        }
        else
        {
            return response()->json(["errors"=> $valid->messages()->first()] , 405);
        }
    }

    /**
     * Change birthday
     * @authenticated
     * @bodyParam birthday date required .
     * @response 200{
     * "message": "You have changed your birthday"
     *}
     * @response 405{
     * "errors" : "UnAuthorized"
     *}
     * @response 405 {
     * "errors": [
     * "The country field is birthday."
     *]
     *}
     */
    public function changeBirthday(Request $request)
    {
        
        $validation = array("birthday" => "required|date|after:-" . $this->youngerThan . "years|before:-" . $this->olderThan . "years");
        $messages       = array(
                                    "birthday.before" => "You must be older than ". $this->olderThan,
                                    "birthday.after" => "You must be younger than ". $this->youngerThan
                                );

        $valid = validator::make($request->all() , $validation, $messages);
        if(!$valid->fails())
        {
            $user = User::find($this->ID);
            $user->birthday = date("Y-n-j" , strtotime($request["birthday"]));
            $user->age = date("Y") - date("Y" , strtotime($request["birthday"]));
            $user->save();
            return response()->json(["message" => "You have changed your birthday"] , 200);
        }
        else
        {
            return response()->json(["errors"=> $valid->messages()->first()] , 405);
        }
    }

    /**
     * Who can see my birthday
     * @authenticated
     * @bodyParam seeMyBirthday string required Must be ["Only Me","Everyone" or "Friends"].
     * @response {
     * "message": "You have changed who can see your birthday"
     *}
     */
    public function whoCanSeeMyBirthday(Request $request)
    {
        $user = User::find($this->ID);
        $user->see_my_birthday = $request["seeMyBirthday"];
        $user->save();
        return response()->json(["message" => "Now, " .$request["seeMyBirthday"]. " can see your birthday"],200);

    }


    /**
     * Who can see my country
     * @authenticated
     * @bodyParam seeMyCountry string required Must be ["Only Me","Everyone" or "Friends"].
     * @response {
     * "message": "You have changed who can see your country"
     *}
     */
    public function whoCanSeeMyCountry(Request $request)
    {
        $user = User::find($this->ID);
        $user->see_my_country = $request["seeMyCountry"];
        $user->save();
        return response()->json(["message" => "Now, " .$request["seeMyCountry"]. " can see your country"],200);
    }

    /**
     * Who can see my city
     * @authenticated
     * @bodyParam seeMyCity string required Must be ["Onlyme","Everyone" or "Friends"].
     * @response {
     * "message": "You have changed who can see your city"
     *}
     */
    public function whoCanSeeMyCity(Request $request)
    {
        $user = User::find($this->ID);
        $user->see_my_city = $request["seeMyCity"];
        $user->save();
        return response()->json(["message" => "Now, " .$request["seeMyCity"]. " can see your city"],200);
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
     * @response 405 {
     * "errors": [
     * "The password is invalid."
     *]
     *}
     * @response 200{
     * "message": "You have deleted your account"
     *}
     */
    public function delete(Request $request)
    {
        if(Auth::attempt(["id" => $this->ID , "password" => $request["password"]]))
        {
            auth()->logout();
            User::find($this->ID)->delete();
            return response()->json(["message" => "You have deleted your account"],200);
        }
        else
        {
            return response()->json(["errors" => "The password is invalid."],405);
        }  
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
     * @group [User].show Profile
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
