<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Following;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use App\Mail\VerifiedAccount;
use App\Mail\testmail;
use Crypt;

/**
 * [2] The verification
 *      [1] I will use the same column for the token of the verification and reset password
 * 
 * [3] Guest
 *      [1] I will divide all function into 3 types and make the common type without middleware and return with every response a paramater determine if it is guest or user 
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
    private $PublicUrl = "storage/";
    private $PrivateUrl = "";
    private $AvatarDirectory = "avatars/";
    private $DefaultImage = "default.jpg";
    private $ForgotPasswordRoute = "api/checktoken?token=";
    private $VerifyRoute = "api/checktokenverify?token=";
    private $ForgotPasswordRouteFront = "http://localhost:4200/#/forgetPassword?token=";
    private $VerifyRouteFront="";
    private $TokenLife = 60*60;     // The life of the token
    
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
                                "city"          => $request["city"],
                                "image_link"    => $this->DefaultImage
                            );
            $user = User::create($Create);
            $token = JWTAuth::attempt(["email" => $request["email"]  , "password" => $request["password"]]);
            $gettingdata = array(
                                    "name" ,
                                    "username" ,
                                    "image_link",
                                    "verified",
                                    "id"
                                );
            $show = User::find($user->id,$gettingdata);
            $show["image_link"] = asset($this->PublicUrl . $this->AvatarDirectory . $show["image_link"]);
            return response()->json(["user" => $show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60],200);
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
                                        "image_link",
                                        "verified",
                                        "id"
                                    );
                $user = User::where("email" , $request["email"])->first();
                $show = User::find($user->id,$gettingdata);
                $show["image_link"] = asset($this->PublicUrl . $this->AvatarDirectory . $show["image_link"]);
                return response()->json(["user" => $show , "token" => $token , "token_type" => "bearer" , "expires_in" => auth()->factory()->getTTL() * 60 ],200);
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
     * "id",
     * "name",
     * "username",
     * "email",
     * "email_verified_at",
     * "password",
     * "link",
     * "image_link",
     * "small_image_link",
     * "about",
     * "age",
     * "gender",
     * "country",
     * "city",
     * "joined_at",
     * "followers_count",
     * "following_count",
     * "rating_avg",
     * "rating_count",
     * "book_count",
     * "birthday",
     * "see_my_birthday",
     * "see_my_country",
     * "see_my_city"
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
                                "see_my_city",
                                "verified"
                            );
        $show = User::find($this->ID,$gettingData);
        $show["image_link"] = asset($this->PublicUrl . $this->AvatarDirectory . $show["image_link"]);
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
        $validation = array (
                                "password"                  => "required",
                                "newPassword"               => "required|confirmed|max:30|min:5",
                                "newPassword_confirmation"  => "required"
                            );
        $valid = validator::make($request->all() , $validation);
        if(!$valid->fails())
        {
            if(Auth::attempt(["id" => $this->ID , "password" => $request["password"]]))
            {
                $user = User::find($this->ID);
                $user->password = $request["newPassword"];
                $user->save();
                return response()->json(["message" => "You have changed your password"],200);
            }
            else
            {
                return response()->json(["errors" => "The password is invalid."],405);
            }
        }
        else
        {
            return response()->json(["errors"=> $valid->messages()->first()], 405);
        }
    }



    /**
     * Change country
     * @authenticated
     * @bodyParam newCountry string required .
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
        $validation = array("newCountry" => "required|string|min:3|max:30");
        $valid = validator::make($request->all() , $validation);
        if(!$valid->fails())
        {
            $user = User::find($this->ID);
            $user->country = $request["newCountry"];
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
     * @bodyParam newCity string required .
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
        $validation = array("newCity" => "required|string|min:3|max:30");
        $valid = validator::make($request->all() , $validation);
        if(!$valid->fails())
        {
            $user = User::find($this->ID);
            $user->city = $request["newCity"];
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
     * @bodyParam newBirthday date required .
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
        
        $validation = array("newBirthday" => "required|date|after:-" . $this->youngerThan . "years|before:-" . $this->olderThan . "years");
        $messages       = array(
                                    "newBirthday.before" => "You must be older than ". $this->olderThan,
                                    "newBirthday.after" => "You must be younger than ". $this->youngerThan
                                );

        $valid = validator::make($request->all() , $validation, $messages);
        if(!$valid->fails())
        {
            $user = User::find($this->ID);
            $user->birthday = date("Y-n-j" , strtotime($request["newBirthday"]));
            $user->age = date("Y") - date("Y" , strtotime($request["newBirthday"]));
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
        $Validation = array("seeMyBirthday" => "in:onlyMe,Everyone,Friends");
        $Valid = validator::make($request->all() , $Validation);
        if(!$Valid->fails())
        {
            $user = User::find($this->ID);
            $user->see_my_birthday = $request["seeMyBirthday"];
            $user->save();
            if($user->see_my_birthday == "onlyMe")
            return response()->json(["message" => "Now, Just you can see your birthday"],200);
            else
            return response()->json(["message" => "Now, " .$request["seeMyBirthday"]. " can see your birthday"],200);
        }
        else
        {
            return response()->json(["errors" => $Valid->messages()->first()],405);
        }
        

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
        $Validation = array("seeMyCountry" => "in:onlyMe,Everyone,Friends");
        $Valid = validator::make($request->all() , $Validation);
        if(!$Valid->fails())
        {
            $user = User::find($this->ID);
            $user->see_my_country = $request["seeMyCountry"];
            $user->save();
            if($user->see_my_country == "onlyMe")
            return response()->json(["message" => "Now, Just you can see your country"],200);
            else
            return response()->json(["message" => "Now, " .$request["seeMyCountry"]. " can see your country"],200);
        }
        else
        {
            return response()->json(["errors" => $Valid->messages()->first()],405);
        }
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
        $Validation = array("seeMyCity" => "in:onlyMe,Everyone,Friends");
        $Valid = validator::make($request->all() , $Validation);
        if(!$Valid->fails())
        {
            $user = User::find($this->ID);
            $user->see_my_city = $request["seeMyCity"];
            $user->save();
            if($user->see_my_city == "onlyMe")
            return response()->json(["message" => "Now, Just you can see your city"],200);
            else
            return response()->json(["message" => "Now, " .$request["seeMyCity"]. " can see your city"],200);
        }
        else
        {
            return response()->json(["errors" => $Valid->messages()->first()],405);
        }
    }


    /**
     * Change Image
     * @bodyParam Image string required the URL for the image .
     * @authenticated
     * @response {
     * "message": "You have updated your profile picture"
     *}
     */
    public function changeImage(Request $request)
    {
        $Validatoin = array 
                            (
                                "image" => "required|image"
                            );
        $Messages = array
                        (
                            "image.required"    => "You haven't uploaded your photo",
                            "image.image"       => "You must select only photos"
                        );
        $Valid = validator::make($request->all() , $Validatoin , $Messages);
        if(!$Valid->fails())
        {
            $ID = str_random(30);
            $Extension = $request->file("image")->extension();
            $URL = $ID . "." . $Extension;
            Storage::disk("public")->putFileAs($this->PrivateUrl . $this->AvatarDirectory , $request->file('image') , $URL);
            $User = User::find($this->ID);
            $OldUrl = $User->image_link;
            $User->image_link = $URL;
            $User->save();
            if($OldUrl != "default.jpg")
            {
                Storage::disk("public")->delete($this->PrivateUrl . $this->AvatarDirectory . $OldUrl);
            }
            return response()->json(["message" => "You have changed your profile picture"]);
        }
        else
        {
            return response()->json(["errors" => $Valid->messages()->first()],405);
        }
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
            $User = User::find($this->ID); 
            if($User->image_link != "default.jpg")
            {
                storage::disk("public")->delete($this->PrivateUrl . $this->AvatarDirectory .$User->image_link);
            }
            $User->delete();
            return response()->json(["message" => "You have deleted your account"],200);
        }
        else
        {
            return response()->json(["errors" => "The password is invalid."],405);
        }  
    }




    /**
     * forgot Password
     * @bodyParam email string required .
     * @response 200 {
     * "message":"Now , You can go to You email to reset the password"
     *}
     * @response 405{
     * "error": "The email is invalid"
     *}
     */
    public function forgotPassword(Request $request)
    {

        $Validation = array (
                                "email" => "required|exists:users,email"
                            );

        $Messages = array   (
                                "email.exists" => "The email is invalid"
                            );
        $Validate = validator::make($request->all() , $Validation , $Messages);
        if(!$Validate->fails())
        {
            $token = Crypt::encryptString(time());
            $User = User::where("email" , $request["email"])->first();
            $User->forgot_password_token = $token;
            $User->save();
            $Url = asset($this->ForgotPasswordRouteFront . $token . "&type=forgot");
            Mail::to($request["email"])->send(new ForgotPassword($Url));
            return response()->json(["message" => "Now , you can go to " .$request["email"]. " to reset your password"],200);
        }
        else
        {
            return response()->json(["error" => $Validate->messages()->first()],405);
        }
    }





    /**
     * check token forgot password
     * @bodyParam token string required .
     * @response 200 {
     * "userId": ""
     *}
     * @response 405{
     * "error": "This url is old , please try to reset your password again"
     *}
     */
    public function checkToken(Request $request)
    {
        $Validation = array (
                                "token" => "required|exists:users,forgot_password_token"
                            );
        $Validate = validator::make($request->all() , $Validation);
        if(!$Validate->fails())
        {
            $token = Crypt::decryptString($request["token"]);
            if(time() - $token < $this->TokenLife)
            {
                $User = User::where("forgot_password_token" , $request["token"])->first();
                $User->forgot_password_token = null;
                $User->save();
                return response()->json(["userID"=>$User->id],200);
            }
            else
            {
                return response()->json(["error" => "This url is old , please try to reset your password again"],405);
            }
        }
        else
        {
            return response()->json(["error" => "This url is old , please try to reset your password again"] , 405);
        }
    }


    /**
     * reset password
     * @bodyParam password string required .
     * @bodyParam password_confirmation string required .
     * @bodyParam userId integer required .
     * @response 200 {
     * "message": "You have reseted your password"
     *}
     * @response 405{
     * "error": "The password field is required"
     *}
     */
    public function resetPassword(Request $request)
    {
        $Validation = array (
                                "password"      => "required|max:30|min:5|confirmed",
                            );
        $Validate = validator::make($request->all() , $Validation);
        if(!$Validate->fails())
        {
            $User = User::find($request["userId"]);
            $User->password = $request["password"];
            $User->save();
            return response()->json(["message"=>"You have reseted your password"],200);
        }
        else
        {
            return response()->json(["error" => $Validate->messages()->first()],405);
        }
    }



    /**
     * verify account
     * @authenticated
     * @response 200 {
     * "message":"Now , You can go to your account to reset the password"
     *}
     */
    public function verify(Request $request)
    {
        //return response()->json(["message"=>"mariam"],200);
        $token = Crypt::encryptString(time());
        $User = User::find($this->ID);
        $User->verified_token = $token;
        $User->save();
        $Url = asset($this->ForgotPasswordRouteFront . $token . "&type=verify");
        Mail::to($User->email)->send(new VerifiedAccount($Url));
        return response()->json(["message" => "Now , you can go to " .$User->email. " to verify your account"],200);
    }





    /**
     * check token verify
     * @bodyParam token string required .
     * @authenticated
     * @response 200 {
     * "error":"You have verified your account"
     *}
     * @response 405{
     * "error": "This url is old , please try to verify your account again"
     *}
     */
    public function checkTokenVerify(Request $request)
    {
        $Validation = array (
                                "token" => "required|exists:users,verified_token"
                            );
        $Validate = validator::make($request->all() , $Validation);
        if(!$Validate->fails())
        {
            $token = Crypt::decryptString($request["token"]);
            if(time() - $token < $this->TokenLife)
            {
                $User = User::where("verified_token" , $request["token"])->first();
                $User->verified_token = null;
                $User->verified = 1;
                $User->save();
                return response()->json(["message" => "You have verified your account"],200);
            }
            else
            {
                return response()->json(["error" => "This url is old , please try to verify your account again"],405);
            }
        }
        else
        {
            return response()->json(["error" => "This url is old , please try to verify your account again"],405);
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
     *     "updated_at": null,
	 *     "is_followed":1
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
        if( $request->has(['id']) && ( $request->id != $this->ID ) )
         $data->is_followed = Following::where('follower_id', $this->ID)->where('user_id', $userId)->count();
         $data->image_link = $this->GetUrl() . "/" . $data->image_link;

        /**
         * Return response
         */
        return response()->json($data);

    }


/**
     * @group [User].Search by name
     *
     * searchByName function
     *
     *
     * @bodyParam name string required name of person you`r looking for .
     * it filters users with names that like the given name paramater
     * E.G searching by name="o" it reponses all users have name contains 'o'.
     * @authenticated
     *
     * @response 200
     *  {
     *    "users": [
     *        {
     *            "id": 4,
     *            "username": "Nour",
     *            "name": "Nour",
     *            "image_link": "http://127.0.0.1:8000/storage/avatars/default.jpg",
     *            "gender": "female",
     *            "country": "Egypt",
     *            "city": "Cairo",
     *            "followers_count": 0,
     *            "following_count": 0
     *        },
     *        {
     *            "id": 7,
     *            "username": "Mido",
     *            "name": "Mohamed",
     *            "image_link": "http://127.0.0.1:8000/storage/avatars/default.jpg",
     *            "gender": "male",
     *            "country": "Egypt",
     *            "city": "Cairo",
     *            "followers_count": 0,
     *            "following_count": 0
     *        }
     *    ]
     *}
     **/
    public function searchByName(Request $request)
    {
        $name = $request->has(['name']) ? $request->name : abort(404);
        $query = "select id , username , name ,image_link , gender , country ,
                    city ,followers_count ,following_count from users where name like "."'%".$name."%'" ;
        $data = DB::select($query);
        $i = 0;
        while ($i < sizeof($data)) {
                $data[$i]->image_link = $this->GetUrl() . "/" . $data[$i]->image_link;
            $i++;
        }

        return response()->json(['users' => $data,], 200);

    }
    /**
     * @group [User].Search by username
     *
     * searchByName function
     *
     *
     * @bodyParam username string required username of person you`r looking for .
     * it filters users with usernames that like the given username paramater
     * E.G searching by username="o" it reponses all users have name contains 'o'.
     * @authenticated
     *
     * @response 200
     *  {
     *    "users": [
     *        {
     *            "id": 4,
     *            "username": "Nour",
     *            "name": "Nour",
     *            "image_link": "http://127.0.0.1:8000/storage/avatars/default.jpg",
     *            "gender": "female",
     *            "country": "Egypt",
     *            "city": "Cairo",
     *            "followers_count": 0,
     *            "following_count": 0
     *        },
     *        {
     *            "id": 6,
     *            "username": "LoLo",
     *            "name": "TheLeader",
     *            "image_link": "http://127.0.0.1:8000/storage/avatars/default.jpg",
     *            "gender": "male",
     *            "country": "Egypt",
     *            "city": "Cairo",
     *            "followers_count": 0,
     *            "following_count": 0
     *        },
     *        {
     *            "id": 7,
     *            "username": "Mido",
     *            "name": "Mohamed",
     *            "image_link": "http://127.0.0.1:8000/storage/avatars/default.jpg",
     *            "gender": "male",
     *            "country": "Egypt",
     *            "city": "Cairo",
     *            "followers_count": 0,
     *            "following_count": 0
     *        }
     *    ]
     *}
     **/
    public function searchByUsername(Request $request)
    {
        $username = $request->has(['username']) ? $request->username : abort(404);
        $query = "select id , username , name ,image_link , gender , country ,
                    city ,followers_count ,following_count from users where username like " . "'%" . $username . "%'";
        $data = DB::select($query);
        $i = 0;
        while ($i < sizeof($data)) {
            $data[$i]->image_link = $this->GetUrl() . "/" . $data[$i]->image_link;
            $i++;
        }
        return response()->json(['users' => $data,], 200);

    }
    /**
     * @group [User].Search by name or username
     *
     * searchByName function
     *
     *
     * @bodyParam name string required name/username of person you`r looking for .
     * it filters users with names that like the given name paramater
     * E.G searching by name="mo" it reponses all users have name or usernames contains 'mo'.
     * @authenticated
     *
     * @response 200
     *{
     *    "users": [
     *        {
     *            "id": 7,
     *            "username": "Mido",
     *            "name": "Mohamed",
     *            "image_link": "http://127.0.0.1:8000/storage/avatars/default.jpg",
     *            "gender": "male",
     *            "country": "Egypt",
     *            "city": "Cairo",
     *            "followers_count": 0,
     *            "following_count": 0
     *        }
     *    ]
     *}
     **/
    public function searchByNameOrUsername(Request $request)
    {
        $name = $request->has(['name']) ? $request->name : abort(404);
        $query = "select id , username , name ,image_link , gender , country ,
                    city ,followers_count ,following_count from users
                    where name like " . "'%" . $name . "%' or username like "."'%".$name."%' " ;
        $data = DB::select($query);
        $i = 0;
        while ($i < sizeof($data)) {
            $data[$i]->image_link = $this->GetUrl() . "/" . $data[$i]->image_link;
            $i++;
        }
        return response()->json(['users' => $data,], 200);
    }


    public function test(Request $request)
    {
        echo phpinfo();
    }

}
