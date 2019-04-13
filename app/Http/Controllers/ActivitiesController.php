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
use Illuminate\Http\Request;
use DB;
use Validator;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
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
     * @response {
     *	"notifications": {
     *		"notification": [
     *			{
     *			"id": "1",
     *				"actors" : {
     *				"user": {
     *					"id": "000000",
     *						"name" : "Salma",
     *						"link" : "https://www.goodreads.com/user/show/000000-salma\n",
     *						"image_url" : "\nhttps://images.jpg\n",
     *						"has_image" : "true"
     *				}
     *			},
     *				"new": "true",
     *				"created_at" : "2019-03-08T04:15:46-08:00",
     *				"url" : "https://www.goodreads.com/comment/show/1111111",
     *				"resource_type" : "Comment",
     *				"group_resource_type" : "ReadStatus"
     *			}
     *		]
     *	}
     *}
     */
    public function notifications()
    {

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
	 * @bodyParam type int required type of the resource (0-> review , 1-> shelves , 2-> followings).
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
            "type"      => "required|integer|max:2|min:0",
            "body"      => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( $request['type'] == 0 )
            {
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
            }
            else if ( $request['type'] == 1 )
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
            }
            else
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
            }
            $Create = array(
                "user_id" => $this->ID,
                "resourse_id" => $request["id"],
                "resourse_type"  => $request["type"],
                "body" =>$request["body"],
                'updated_at'=>now(),
                'created_at'=>now()
            );
            Comment::create($Create);
            return response()->json([
                "status" => "true" , "user" => $this->ID, "resourse_id" => $request["id"] , "resourse_type"  => $request["type"]
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
                if ( $comment['resourse_type'] == 0 )
                {
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
                }
                else if ( $comment['resourse_type'] == 1 )
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
                }
                else
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
                }
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
    * list comments
    * lists comments for a specific resource(review,update)
    * @bodyParam id required int id of the commented resource
	* @bodyParam type int required type of the resource (1 for user status and 2 for review)
 	* @response
    * {
	*	"comment": {
    * 	"comments"[
	*		"comment": {
	*			"id": "0000000",
	*			"user": {
	*				"id": "000000",
	*				"name": "aa",
	*				"location": "The United States",
	*				"link": "\nhttps://www.goodreads.com/user/show/000000-aa\n",
	*				"image_url": "\nhttps://s.gr-assets.png\n"
	*				},
	*			"date_added": "Fri Mar 08 16:25:10 -0800 2019",
	*			"date_updated": "Fri Mar 08 16:25:22 -0800 2019",
	*			"link": "\nhttps://www.goodreads.comshow/00000\n",
	*			"body":"a great book"
	*  		}
	* 		]
	*	}
    * }
    */
    public function listComments()
    {

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
	 * @bodyParam type int required type of the resource (0-> review , 1-> shelves , 2-> followings).
     * @authenticated
     * @response {
     * "status": "true",
     * "Message": "Like is Done ",
     * "user": 1,
     * "resourse_id": 1,
     * "resourse_type": 2
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
            "type"      => "required|integer|max:2|min:0",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( $request['type'] == 0 )
            {
                $actualLikeInReview = DB::table('likes')->where([['user_id' , $this->ID],
                ["resourse_id", $request["id"]],["resourse_type", $request["type"]]])->first();
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
            }
            else if ( $request['type'] == 1 )
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
            }
            else
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
            }
            $actualLike = DB::table('likes')->where([['user_id' , $this->ID],
             ["resourse_id", $request["id"]],["resourse_type", $request["type"]]])->first();
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
                    "resourse_type"  => $request["type"],
                    'updated_at'=>now(),
                    'created_at'=>now()
                );
                Likes::create($Create);
                return response()->json([
                    "status" => "true" , "Message" => "Like is Done ", "user" => $this->ID, "resourse_id" => $request["id"] , "resourse_type"  => $request["type"]
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
	public function unlike(Request $request)
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
	}

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
