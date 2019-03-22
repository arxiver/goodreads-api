<?php

namespace App\Http\Controllers;
use App\user;

use JWTAuth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
     * "The userName field is required.",
     * "The password field is required.",
     * "The name field is required.",
     * "The gender field is required."
     *]
     *}
     * @response {
     * "status": "true",
     * "user": {
     *    "email": "",
     *    "name": "",
     *    "age": "",
     *    "birthDay": "",
     *    "joinedAt": "",
     *    "username": "",
     *    "gender": "",
     *    "lastActive": "",
     *    "country": "",
     *    "city": "",
     *    "ratingCount": "",
     *    "ratingAvg": "",
     *    "followingCounts": "",
     *    "followersCount": "",
     *    "imageLink": ""
     *},
     * "token": "",
     * "token_type": "",
     * "expires_in": ""
     * }
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
                                "username"      => $ValidationArray["UserName"],
                                "age"           => date("Y") - date("Y", strtotime($request["birthDay"])),
                                "birthday"      => date("Y-n-j", strtotime($request["birthDay"])),
                                "country"       => $request["country"],
                                "city"          => $request["city"],
                                "rating_count"   => 0,
                                "rating_avg"     => 0,
                                "following_count"=>0,
                                "followers_count"=> 0,
                                "book_count"     => 0,
                                "last_active"    => now(),
                                "joined_at"      => date("Y-n-j")
                            );



            User::create($Create);

            $token = JWTAuth::attempt(["email" => $request["email"]  , "password" => $request["password"]]);


            $GettingData = array(
                                    "email" ,
                                    "name" ,
                                    "age" ,
                                    "birthday",
                                    "joined_at",
                                    "username" ,
                                    "gender" ,
                                    "last_active" ,
                                    "country" ,
                                    "city" ,
                                    "rating_count" ,
                                    "rating_avg" ,
                                    "following_count" ,
                                    "followers_count",
                                    "image_link"
                                );
            $Show = User::where("email", $request["email"])->first($GettingData);
            return response(["status" => "true" , "user" => $Show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60]);
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
    }


    /**
     * LogIn
     * @bodyParam email string required .
     * @bodyParam password string required .
     * @response 404 {
     * "status": "false",
     * "errors": [
     * "The email field is required.",
     * "The password field is required."
     *]
     *}
     * @response {
     * "status": "true",
     * "user": {
     *    "email": "",
     *    "name": "",
     *    "age": "",
     *    "birthDay": "",
     *    "joinedAt": "",
     *    "username": "",
     *    "gender": "",
     *    "lastActive": "",
     *    "country": "",
     *    "city": "",
     *    "ratingCount": "",
     *    "ratingAvg": "",
     *    "followingCounts": "",
     *    "followersCount": "",
     *    "imageLink": ""
     *},
     *"token": "",
     *"token_type": "",
     *"expires_in": ""
     *}
     */
    public function logIn(Request $request)
    {
        // response




        $HashedPassword = Hash::make($request["password"]);
        $Validations    = array(
                                    "email"             => "required|email|exists:users,Email" ,
                                    "password"          => "required|max:30|min:5",
                                    "HshedPassword"     => "exists:users,Password",
                                );
        $Messages      = array(
                                    "email.exists"              => "The email or password is invalid",
                                    "HashedPassword.exists"     => "The email or Password is invalid"
                                );
        $Data = validator::make($request->all(), $Validations , $Messages);

        if($Data->fails())
        {
            return response(["status" => "false" , "errors" => $Data->messages()->first()]);
        }
        else
        {
            if($token = JWTAuth::attempt(["email" => $request["email"]  , "password" => $request["password"]]))
            {
                $GettingData = array(
                                        "email" ,
                                        "name" ,
                                        "age" ,
                                        "birthday",
                                        "joined_at",
                                        "username" ,
                                        "gender" ,
                                        "last_active" ,
                                        "country" ,
                                        "city" ,
                                        "rating_count" ,
                                        "rating_avg" ,
                                        "following_count" ,
                                        "followers_count",
                                        "image_link"
                                    );
                $User = User::where("email" , $request["email"])->first();
                $User->last_active=now();
                $User->save();
                $Show = User::where("email" , $request["email"])->first($GettingData);
                return response(["status" => "true" , "user" => $Show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60]);
            }
            else
            {
                return response(["status" => "false" , "errors" => "The email or password is invalid"]);
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
     * @authenticated
     * @response {
     * "status": "true",
     * "message": "You have logged out"
     *}
     * @response {
     * "status": "false",
     * "message": "Unauthorized"
     *}
     */
    public function logOut(Request $request)
    {

        $User = User::find($this->ID);
        $User->last_active = now();
        $User->save();
        auth()->logout();
        return response(["status" => "true" , "message" => "You have loged out"]);
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

    public function showProfile(Request $request)
    {
        /**
        * Checking is the optional paramater is sent or not
        * Case it is not sent : then we list the authenticated-user `s followers
        * other wise we use the given user_id to get profile detailed info  .
        */
        $userId = $request->has(['id']) ? $request->id : $this->ID;
        User::findOrFail($userId);

        $data = User::select('id','name','email','link','image_link',
                             'small_image_link','about','age','gender')
                             ->where('id', $userId)->get();

        return response()->json($data);

    }

}
