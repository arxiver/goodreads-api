<?php
//use App\Controller\AppController;
namespace App\Http\Controllers;
use App\Following;
use App\User;
use App\Review;
use App\Shelf;
use App\Book;
use App\Comment;
use App\Likes;
use App\Notifications\likesNotification;
use App\Notifications\commentsNotification;
use App\Notification as n;
use Notification;
use Illuminate\Http\Request;
use DB;
use Validator;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use App\Events\notify;
/**
 * @group Activities
 *
 * APIs for users activities
 */
class ActivitiesController extends Controller
{

    /**
     * @group [Activities].Updates
     * updates function
     * 
     * Get user's updates from following users
     * 
     * first the function validates the sent parameters if any if it isn't valid 
     * an error response returns with 400 status code
     * 
     * if there is no parameters sent the default is to return all updates that would be shown to the authenticated user
     * get all the users followed by the authenticated user then all the activities made by them
     * those activities are retrieved from five different database tables that store these info 
     * (shelves,reviews,likes,comments,followings) then the data is merged into one array and sorted 
     * by updated_at date descendingly in order to show the user the user the latest updates first
     * 
     * if a valid user id is sent then all activities made by this specific user are retrieved the same 
     * way explained earlier in order to show it in this user's profile
     * 
     * if a valid max updates is sent then this value is retrieved from the array after sorting
     * 
     * @authenticated
     * @bodyParam user_id int optional to get the updates made by a specific user (default all following)
     * @bodyParam max_updates int optional to get the max limit of updates.
     * @responseFile responses/updatesReal.json
     */
    public function followingUpdates(Request $request)
    { 
        $url = $this ->GetUrl();
        $Validations    = array(
            "user_id"         => "integer|min:0",
            "max_updates"     => "integer|min:1"

    );
    $Data = validator::make($request->all(), $Validations);
    if(!($Data->fails())) 
    {
        $result = collect();
        $auth_id = $this->ID;
        if($request->filled('user_id'))
        {
            if($request->input('user_id')==0)
                $followingArr = [$this->ID]; 
            else
                $followingArr = [$request->input('user_id')];
        }else {
            $following = DB::table('followings')->where('follower_id','=',$auth_id)->select('user_id')->get();
            $followingArr= json_decode( json_encode($following), true);
            $followingArr = Arr::flatten($followingArr);
            
        }
        $rev = Review::reviewsUsersArr($followingArr,$this->ID);
        $shelf = Shelf::shelvesUsersArr($followingArr,$this->ID);
        $follow =Following::followingUsersArr($followingArr,$this->ID);
        $likes = Likes::likesUsersArr($followingArr,$this->ID);
        $comments = Comment::commentsUsersArr($followingArr,$this->ID);
        $result = collect();
        $result = $result->merge($rev);
        $result = $result->merge($shelf);
        $result = $result->merge($follow);
        $result = $result->merge($comments);
        $result = $result->merge($likes);
        foreach($result as $r)
        {
            $temp = $r->pull('image_link');
            $r ->put('image_link',$url . "/" .$temp );
            if($r->has('followed_image_link'))
            {
                $temp = $r->pull('followed_image_link');
                $r ->put('followed_image_link',$url . "/" .$temp );
            }
            if($r->has('rev_user_imageLink'))
            {
                $temp = $r->pull('rev_user_imageLink');
                $r ->put('rev_user_imageLink',$url . "/" .$temp );
            }
        }
        $result = array_reverse(array_sort($result, function ($value) {
            return $value['updated_at'];
          }));
        if($request->filled('max_updates'))
        {
            $result = array_slice($result,0,$request->input('max_updates'));
        }
        $response = $result ;
        $responseCode = 201;

    }else{
        
        $response = array('message'=>"Something gone wrong .");
        $responseCode = 400;
    }
    return response()->json($response, $responseCode);
    }
    /**
     * @group [Activities].Notification
     * notifications
     * gets a user's notifications
     * @authenticated
	 * @bodyParam page int optional 1-N (default 1).
     * @responseFile responses/notifications.json
     */
    public function notifications(Request $request)
    {
        $Validations    = array(
            "page"     => "integer|min:1"

    );
    $Data = validator::make($request->all(), $Validations);
    if(!($Data->fails())) 
    { 
        $result = \App\Notification::where('notifiable_id',$this->ID)->select('n_id','read','data')->where('read_at',null)->get();
        $result1 = \App\Notification::where('notifiable_id',$this->ID)->select('n_id','read','data')->where('read_at','!=',null)
        ->orderBy('read_at','desc')->get();
        $r = collect();
        $r = $r->merge($result);
        $r = $r->merge($result1);
        /*foreach($r as $x)
        {
            $x->data['user_image_link']=$this ->GetUrl()."/".$x->data['user_image_link'] ;
            $x->data->save();
            if(array_key_exists('review_user_id',$x->data))
            {
                if($x->data['review_user_id']==$this->ID)
                {
                    $x->data['review_user_id']=0;
                    $x->data->save();
                }
            }
            //$x->save();
            /*$temp = $r->pull('image_link');
            $r ->put('image_link',$url . "/" .$temp );
            if($r->has('followed_image_link'))
            {
                $temp = $r->pull('followed_image_link');
                $r ->put('followed_image_link',$url . "/" .$temp );
            }
            if($r->has('rev_user_imageLink'))
            {
                $temp = $r->pull('rev_user_imageLink');
                $r ->put('rev_user_imageLink',$url . "/" .$temp );
            }
        }*/
        $response = $r;
        $responseCode = 201;

    }else{
        
        $response = array( "Something went wrong .");
        $responseCode = 400;
    }
    return response()->json($response, $responseCode);

    }

/**
     * @group [Activities].Notification
     * markNotification
     * marks a user notification as read
     * @authenticated
	 * @bodyParam id int required.
     * @response 201{
     * "The notification was marked as read successfully."
     * }
     * @response 401{
     * "There is no notification with this id."
     * }
     * @response 400
     * {
     * "Something went wrong ."
     * }
     * 
     */
    public function markNotification(Request $request)
    {
        $Validations    = array(
            "id"     => "required|integer|min:1"

    );
    $Data = validator::make($request->all(), $Validations);
    if(!($Data->fails())) 
    { 
        $n = n::where('n_id',$request->input('id'))->where('notifiable_id',$this->ID)->first();
        if($n)
        {
            $n->update(['read_at' => now()]);
            $n->update(['read' => 1]);
            $response = array( "The notification was marked as read successfully.");
            $responseCode = 201;
        }else
        {
            $response = array( "There is no notification with this id.");
            $responseCode = 401;

        }
    }else{
        
        $response = array( "Something went wrong .");
        $responseCode = 400;
    }
    return response()->json($response, $responseCode);

    }


    
    /**
     * @group [Activities].Make Comment
     * makeComment function
     * 
     * make a validation on the input to check that is satisfing the conditions. 
     * 
     * if tha input is valid it will continue in the code otherwise it will response with error.
     * 
     * you can make comment on three types only (review,follow,add book to shelf)
     * 
     * the function check that the comment is on one of the three type then make the comment 
     * 
     * increment the number of comments in the review or follow or  add to shelf 
     * 
     * @bodyParam id int required id of the commented resource.
     * @bodyParam body string required the body of the comment .
     * @authenticated.
     * 
     * @response {
     * "status": "true",
     * "user": 1,
     * "resourse_id": 1,
     * "resourse_type": 2,
     * "comment_body": "it 's very good to follow me XD"
	 * }
     * @response 204{
     *   "status": "false",
     *   "errors": "The body is required to make a comment."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a comment on this review becouse this review doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a comment on this shelf becouse this shelf doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a comment on this follow becouse this follow doesn't exists."
     * }
     * @response 406 {
     *   "status": "false",
     *   "errors": "The id must be an integer."
     * }
     */
    public function makeComment(Request $request)
    {
        $Validations    = array(
            "id"        => "required|integer",
            "body"      => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Review::find($request["id"]) )
            {
                $wantedReview=Review::find($request["id"]);
                $number=$wantedReview['comments_count']+1;
                DB::table('reviews')
                    ->updateOrInsert(
                        ['id' => $request["id"]],
                        [ 'comments_count' => $number ]
                    );
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "can't make a comment on this review becouse this review doesn't exists"
                ]);
            }
            /*else if ( $request['type'] == 1 )
            {
                if ( Shelf::find($request["id"]) )
                {
                    $wantedShelf=Shelf::find($request["id"]);
                    $number=$wantedShelf['comments_count']+1;
                    DB::table('shelves')
                        ->updateOrInsert(
                            ['id' => $request["id"]],
                            [ 'comments_count' => $number ]
                        );
                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "can't make a comment on this shelf becouse this shelf doesn't exists"
                    ]);
                }
            }*/
            /*else
            {
                if ( Following::find($request["id"]) )
                {
                    $wantedFollow=Following::find($request["id"]);
                    $number=$wantedFollow['comments_count']+1;
                    DB::table('followings')
                        ->updateOrInsert(
                            ['id' => $request["id"]],
                            [ 'comments_count' => $number ]
                        );
                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "can't make a comment on this follow becouse this follow doesn't exists"
                    ]);
                }
            }*/
            $Create = array(
                "user_id" => $this->ID,
                "resourse_id" => $request["id"],
                "body" =>$request["body"],
                'updated_at'=>now(),
                'created_at'=>now()
            );
            //send notification
            $x = Comment::where('resourse_id',$request["id"])->select('user_id')->get();
            $x1= Review::find($request["id"])->select('user_id')->first();
             
            $r = collect();
            $r = $r->merge($x);
            $r = $r->merge($x1);
            
            $users = User::whereIn('id',$r)->get();
            //echo $r;
            //end of part1 notifications
            Comment::create($Create);
            //rest of notification
            $l = Comment::where('resourse_id',$request["id"])->where('user_id',$this->ID)->first();
            Notification::send($users, new commentsNotification($l->id));
            $n = \App\Notification::orderby('n_id', 'desc')->first(); 
            //event (new notify($n->data,$n->notifiable_id));
            
            return response()->json([
                "status" => "true" , "user" => $this->ID, "resourse_id" => $request["id"] 
                ,"comment_body" => $request["body"]
            ]);
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
	}
	/**
     * @group [Activities].Delete Comment
     * deleteComment function
     * 
     * make a validation on the input to check that is satisfing the conditions. 
     * 
     * if tha input is valid it will continue in the code otherwise it will response with error.
     * 
     * check that the authenticated user is  the one who create the comment to allow to him to delete it.
     * 
     * delete the comment and decrement the number of comments in review or shelf or follow 
     * 
     * @bodyParam id int required comment id
     * @authenticated
     * @response {
     * "status": "true",
     * "Message": "the comment is deleted"
	 * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't delete comment on this review becouse this review doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't delete comment on this shelf becouse this shelf doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't delete comment on this follow becouse this follow doesn't exists."
     * }
     * @response 406 {
     *   "status": "false",
     *   "errors": "The id must be an integer."
     * }
     */
	public function deleteComment(Request $request)
	{
        $Validations    = array(
            "id"        => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Comment::find($request["id"]) )
            {
                $comment = Comment::findOrFail($request["id"]);
                if ( Review::find($comment["resourse_id"]) )
                {
                    $wantedReview=Review::find($comment["resourse_id"]);
                    $number=$wantedReview['comments_count']-1;
                    DB::table('reviews')
                        ->updateOrInsert(
                            ['id' => $comment["resourse_id"]],
                            [ 'comments_count' => $number ]
                        );
                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "can't delete a comment on this review becouse this review doesn't exists"
                    ]);
                }
                /*else if ( $comment['resourse_type'] == 1 )
                {
                    if ( Shelf::find($comment["resourse_id"]) )
                    {
                        $wantedShelf=Shelf::find($comment["resourse_id"]);
                        $number=$wantedShelf['comments_count']-1;
                        DB::table('shelves')
                            ->updateOrInsert(
                                ['id' => $comment["resourse_id"]],
                                [ 'comments_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't delete a comment on this shelf becouse this shelf doesn't exists"
                        ]);
                    }
                }*/
                /*else
                {
                    if ( Following::find($comment["resourse_id"]) )
                    {
                        $wantedFollow=Following::find($comment["resourse_id"]);
                        $number=$wantedFollow['comments_count']-1;
                        DB::table('followings')
                            ->updateOrInsert(
                                ['id' => $comment["resourse_id"]],
                                [ 'comments_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't delete a comment on this follow becouse this follow doesn't exists"
                        ]);
                    }
                }*/
                $comment->delete();
                return response()->json([
                    "status" => "true" , "Message" => "the comment is deleted"
                ]);
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "This comment doesn't exist in the database."
                ]);
            }
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
	}

    /**
    * @group [Activities].List Comments
    * list comments
    *
    * lists comments for a specified review for all users 
    * and determine if the authenticated have this comment or Not having it
    * 
    * the resopnse wil contain an id it will represent the comment id 
    *
    * Please, save this id to send it back when you want to delet the comment 
    * @authenticated 
    *
    * @bodyParam id int required id of the commented resource
    * 
    * @response 200
    * {
    * "0": [
    * {
    *    "username": "test",
    *    "image_link": "default.jpg",
    *    "id": 1,
    *    "body": "I agree with you",
    *    "created_at": "2019-04-27 02:38:27",
    *    "updated_at": "2019-04-27 02:38:27",
    *    "have_the_comment": "Yes"
    * },
    * {
    *    "username": "test",
    *    "image_link": "default.jpg",
    *    "id": 2,
    *    "body": "I agree with you",
    *    "created_at": "2019-04-27 02:38:28",
    *    "updated_at": "2019-04-27 02:38:28",
    *    "have_the_comment": "Yes"
    * },
    * {
    *    "username": "test",
    *    "image_link": "default.jpg",
    *    "id": 3,
    *    "body": "I agree with you",
    *    "created_at": "2019-04-27 02:38:30",
    *    "updated_at": "2019-04-27 02:38:30",
    *    "have_the_comment": "Yes"
    * },
    * {
    *     "username": "ta7a",
    *     "image_link": "default.jpg",
    *     "id": 4,
    *     "body": "ahmed",
    *     "created_at": "2019-04-30 00:00:00",
    *     "updated_at": "2019-04-10 00:00:00",
    *     "have_the_comment": "No"
    * }
    *  ],
    *     "status": "true"
    * }
    * @response 200
    * {
    *    "status": "true",
    *    "Message": "There is no comments on this review"
    * }
    * @response 404
    * {
    *    "status": "false",
    *    "Message": "can't List the comments of this review becouse this review doesn't exists"
    * }
    * @response 404
    * {
    *    "status": "false",
    *    "errors": "The id field is required."
    * }
    */
    public function listComments(Request $request)
    {
        $Validations    = array(
            "id"        => "required|integer",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Review::find($request["id"]) )
            {

                $results=Db::select('SELECT U.name,U.username,U.email,U.image_link,C.id,C.body,C.created_at,C.updated_at,C.have_the_comment FROM users AS U , comments AS C WHERE U.id=C.user_id AND C.resourse_id =?',[$request['id']]);

                if($results != NULL){
                    DB::table('comments')
                    ->where('user_id', $this->ID)
                    ->update(array('have_the_comment' => 'Yes'));
                    $results=Db::select('SELECT U.id,U.username,U.image_link,C.id,C.body,C.created_at,C.updated_at,C.have_the_comment FROM users AS U , comments AS C WHERE U.id=C.user_id AND C.resourse_id =?',[$request['id']]);
                    DB::table('comments')
                    ->where('user_id', $this->ID)
                    ->update(array('have_the_comment' => 'No'));
                    return response()->json([$results,"status" => "true"]);
                }
                else{
                    return response()->json([
                        "status" => "true" , "Message" => "There is no comments on this review"
                    ]);
                }
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "can't List the comments of this review becouse this review doesn't exists"
                ]);
            }
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
    }
    /**
     * @group [Activities].Like/Unlike
     * like/Unlike function
     * 
     * make a validation on the input to check that is satisfing the conditions. 
     * 
     * if tha input is valid it will continue in the code otherwise it will response with error.
     * 
     * you can make like on three types only (review,follow,add book to shelf)
     * 
     * the function check that the like is on one of the three type then make the like
     * 
     * increment the number of likes in the review or follow or  add to shelf
     *  
     * But if the user already make a like the function will act as unlike
     * 
     * decrement the number of likes in review or shelf or follow 
     * @bodyParam id int required id of the liked resource
     * 
     * @authenticated
     * @response {
     * "status": "true",
     * "Message": "Like is Done ",
     * "user": 1,
     * "resourse_id": 1,
     * "resourse_type": 0
	 * }
     * @response{
     * "status": "true",
     * "Message": "unLike is Done "
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a like on this review becouse this review doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a like on this shelf becouse this shelf doesn't exists."
     * }
    * @response 204{
     *   "status": "false",
     *   "errors": "can't make a like on this follow becouse this follow doesn't exists."
     * }
     * @response 406 {
     *   "status": "false",
     *   "errors": "The id must be an integer."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a unlike on this review becouse this review doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a unlike on this shelf becouse this shelf doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a unlike on this follow becouse this follow doesn't exists."
     * }
     * @response 406{
     *   "status": "false",
     *   "errors": "The id must be an integer."
     * }
     */
    public function makeLikeOrUnlike(Request $request)
    {
        $Validations    = array(
            "id"        => "required|integer",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            $actualLikeInReview = DB::table('likes')->where([['user_id' , $this->ID],
            ["resourse_id", $request["id"]]])->first();
            if (!empty($actualLikeInReview))
            {
                if ( Review::find($request["id"]) )
                {
                    $wantedReview=Review::find($request["id"]);
                    $number=$wantedReview['likes_count']-1;
                    DB::table('reviews')
                        ->updateOrInsert(
                            ['id' => $request["id"]],
                            [ 'likes_count' => $number ]
                        );
                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "can't make a unlike on this review becouse this review doesn't exists"
                    ]);
                }
            } 
            else{
                if ( Review::find($request["id"]) )
                {
                    $wantedReview=Review::find($request["id"]);
                    $number=$wantedReview['likes_count']+1;
                    DB::table('reviews')
                        ->updateOrInsert(
                            ['id' => $request["id"]],
                            [ 'likes_count' => $number ]
                        );
                }
                else{
                    return response()->json([
                        "status" => "false" , "Message" => "can't make a like on this review becouse this review doesn't exists"
                    ]);
                }
            }
            /*else if ( $request['type'] == 1 )
            {
                $actualLikeInAddToShelf = DB::table('likes')->where([['user_id' , $this->ID],
                ["resourse_id", $request["id"]],["resourse_type", $request["type"]]])->first();
                if (!empty($actualLikeInAddToShelf))
                {
                    if ( Shelf::find($request["id"]) )
                    {
                        $wantedShelf=Shelf::find($request["id"]);
                        $number=$wantedShelf['likes_count']-1;
                        DB::table('shelves')
                            ->updateOrInsert(
                                ['id' => $request["id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a unlike on this shelf becouse this shelf doesn't exists"
                        ]);
                    }
                } 
                else{
                    if ( Shelf::find($request["id"]) )
                    {
                        $wantedShelf=Shelf::find($request["id"]);
                        $number=$wantedShelf['likes_count']+1;
                        DB::table('shelves')
                            ->updateOrInsert(
                                ['id' => $request["id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a like on this shelf becouse this shelf doesn't exists"
                        ]);
                    }
                }
            }*/
            /*else
            {
                $actualLikeOnFollow = DB::table('likes')->where([['user_id' , $this->ID],
                ["resourse_id", $request["id"]],["resourse_type", $request["type"]]])->first();
                if (!empty($actualLikeOnFollow))
                {
                    if ( Following::find($request["id"] ))
                    {
                        $wantedFollow=Following::find($request["id"]);
                        $number=$wantedFollow['likes_count']-1;
                        DB::table('followings')
                            ->updateOrInsert(
                                ['id' => $request["id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a unlike on this follow becouse this follow doesn't exists"
                        ]);
                    }
                } 
                else{
                    if ( Following::find($request["id"]) )
                    {
                        $wantedFollow=Following::find($request["id"]);
                        $number=$wantedFollow['likes_count']+1;
                        DB::table('followings')
                            ->updateOrInsert(
                                ['id' => $request["id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a like on this follow becouse this follow doesn't exists"
                        ]);
                    }
                }
            }*/
            $actualLike = DB::table('likes')->where([['user_id' , $this->ID],
             ["resourse_id", $request["id"]]])->first();
            if (!empty($actualLike))
            {
                $like = Likes::findOrFail($actualLike->id);
                $like->delete();
                return response()->json([
                    "status" => "true" , "Message" => "unLike is Done "
                ]);
            } 
            else{
                $Create = array(
                    "user_id" => $this->ID,
                    "resourse_id" => $request["id"],
                    'updated_at'=>now(),
                    'created_at'=>now()
                );
                //send notification
                $x = Comment::where('resourse_id',$request["id"])->select('user_id')->get();
                $x1= Review::find($request["id"])->select('user_id')->first();
                 
                $r = collect();
                $r = $r->merge($x);
                $r = $r->merge($x1);
                
                $users = User::whereIn('id',$r)->get();
                //echo $r;
                //end of part1 notifications
                Likes::create($Create);
                //rest of notification
                $l = Likes::where('resourse_id',$request["id"])->where('user_id',$this->ID)->first();
                Notification::send($users, new likesNotification($l->id));
                $n = \App\Notification::orderby('n_id', 'desc')->first(); 
                //event (new notify($n->data,$n->notifiable_id));
                return response()->json([
                    "status" => "true" , "Message" => "Like is Done ", "user" => $this->ID, "resourse_id" => $request["id"] 
                ]);
            }
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
	}

    /**
     * @group [Activities].Unlike
     * unLike function
     * 
     * make a validation on the input to check that is satisfing the conditions. 
     * 
     * if tha input is valid it will continue in the code otherwise it will response with error.
     * 
     * check that the authenticated user is  the one who make like to allow to him to unlike it.
     * 
     * unlike and decrement the number of likes in review or shelf or follow 
     * 
     * @bodyParam id int required like id
     * @authenticated
     * @response {
     * "status": "true",
     * "Message": "unLike "
	 * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a unlike on this review becouse this review doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a unlike on this shelf becouse this shelf doesn't exists."
     * }
     * @response 204{
     *   "status": "false",
     *   "errors": "can't make a unlike on this follow becouse this follow doesn't exists."
     * }
     * @response 406{
     *   "status": "false",
     *   "errors": "The id must be an integer."
     * }
     */
	/*public function unlike(Request $request)
	{
        $Validations    = array(
            "id"        => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Likes::find($request["id"]) )
            {
                $like = Likes::findOrFail($request["id"]);
                if ( $like['resourse_type'] == 0 )
                {
                    if ( Review::find($like["resourse_id"]) )
                    {
                        $wantedReview=Review::find($like["resourse_id"]);
                        $number=$wantedReview['likes_count']-1;
                        DB::table('reviews')
                            ->updateOrInsert(
                                ['id' => $like["resourse_id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a unlike on this review becouse this review doesn't exists"
                        ]);
                    }
                }
                else if ( $like['resourse_type'] == 1 )
                {
                    if ( Shelf::find($like["resourse_id"]) )
                    {
                        $wantedShelf=Shelf::find($like["resourse_id"]);
                        $number=$wantedShelf['likes_count']-1;
                        DB::table('shelves')
                            ->updateOrInsert(
                                ['id' => $like["resourse_id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a unlike on this shelf becouse this shelf doesn't exists"
                        ]);
                    }
                }
                else
                {
                    if ( Following::find($like["resourse_id"]) )
                    {
                        $wantedFollow=Following::find($like["resourse_id"]);
                        $number=$wantedFollow['likes_count']-1;
                        DB::table('followings')
                            ->updateOrInsert(
                                ['id' => $like["resourse_id"]],
                                [ 'likes_count' => $number ]
                            );
                    }
                    else{
                        return response()->json([
                            "status" => "false" , "Message" => "can't make a unlike on this follow becouse this follow doesn't exists"
                        ]);
                    }
                }
                $like->delete();
                return response()->json([
                    "status" => "true" , "Message" => "unLike "
                ]);
            }
            else{
                return response()->json([
                    "status" => "false" , "Message" => "This like doesn't exist in the database."
                ]);
            }
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
	}*/

    /**
     * list likes
     * lists likes for a specific resource(review,update)
     * @bodyParam id int required id of the liked resource
	 * @bodyParam type int required type of the resource (1 for user status and 2 for review)
     * @authenticated
     * @response
     * {
     * likes[
	 *"like": {
	 *	"id": "0000000",
	 *	"user": {
	 *		"id": "000000",
	 *		"name": "aa",
	 *		"location": "The United States",
	 *		"link": "\nhttps://www.goodreads.com/user/show/000000-aa\n",
	 *		"image_url": "\nhttps://s.gr-assets.png\n",
	 *		"has_image": "false"
	 *	},
	 *
	 *	"date_added": "Fri Mar 08 16:25:10 -0800 2019",
	 *	"date_updated": "Fri Mar 08 16:25:22 -0800 2019",
	 *	"link": "\nhttps://www.goodreads.comshow/00000\n",
	 *  }
     * ]
     *}
     */
    public function listLikes()
    {

    }
}
