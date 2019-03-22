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
     * updates
     * Get user's updates from following users
     * @authenticated
     * @bodyParam user_id int optional to get the updates made by a specific user (default all following)
     * @bodyParam max_updates int optional to get the max limit of updates.
     * @responseFile responses/updatesReal.json
     */
    //$user_id,$max_updates
    public function followingUpdates(Request $request)
    {
        $Validations    = array(
            "user_id"         => "integer",
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
        $rev = Review::reviewsUsersArr($followingArr);
        $shelf = Shelf::shelvesUsersArr($followingArr);
        $follow =Following::followingUsersArr($followingArr);
        $likes = Likes::likesUsersArr($followingArr);
        $comments = Comment::commentsUsersArr($followingArr);
        $result = collect();
        $result = $result->merge($rev);
        $result = $result->merge($shelf);
        $result = $result->merge($follow);
        $result = $result->merge($comments);
        $result = $result->merge($likes);
        $result = array_reverse(array_sort($result, function ($value) {
            return $value['updated_at'];
          }));
        if($request->filled('max_updates'))
        {
            $result = array_slice($result,0,$request->input('max_updates'));
        }
        $response = array('status' =>"true",'updates'=>$result) ;
        $responseCode = 201;

    }else{
        
        $response = array( 'status' => "false",'message' =>"Something gone wrong .");
        $responseCode = 400;
    }
    return response()->json($response, $responseCode);
    }
    /**
     * notifications
     * gets a user's notifications
     * @authenticated
	 * @bodyParam page int optional 1-N (default 1).
     * @response
     * {
	 *  "notifications": {
	 *	"notification": [
	 *		{
	 *			"id": "1",
	 *			"actors": {
	 *				"user": {
	 *					"id": "000000"
	 *					"name": "Salma",
	 *					"link": "https://www.goodreads.com/user/show/000000-salma\n",
	 *					"image_url":"\nhttps://images.jpg\n",
	 *					"has_image": "true"
	 *				}
	 *			},
	 *			"new": "true",
	 *			"created_at": "2019-03-08T04:15:46-08:00",
	 *			"url": "https://www.goodreads.com/comment/show/1111111",
	 *			"resource_type": "Comment",
	 *			"group_resource_type": "ReadStatus"
	 *		},
	 *		}
	 *	  ]
	 *  }
     * }
     */
    public function notifications()
    {

    }
    /**
     * comment
     * @bodyParam id int required id of the commented resource.
	 * @bodyParam type int required type of the resource (1 for user status and 2 for review).
     * @bodyParam body string required the body of the comment .
     * @authenticated.
     * @response {
     * "status": "true",
     * "user": 1,
     * "resourseId": "1",
     * "resourseType": "2",
     * "bodyOfReview": "it 's very good to follow me XD"
	 * }
     * @response {
     * {
     *   "status": "false",
     *   "errors": "The body is required to make a comment."
     * }
     */
    public function makeComment(Request $request)
    {
        //To DO ->check for the resource to be inside the database or not and update the number of
        // comments on the review or user status
        $Validations    = array(
            "id"        => "required|integer",
            "type"      => "required|integer|max:2|min:1",
            "body"      => "required|string"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            $Create = array(
                "user_id" => $this->ID,
                "resourse_id" => $request["id"],
                "resourse_type"  => $request["type"],
                "body" =>$request["body"]
            );
            Comment::create($Create);
            return response()->json([
                "status" => "true" , "user" => $this->ID, "resourse_id" => $request["id"] , "resourse_type"  => $request["type"]
                ,"review_body" => $request["body"]
            ]);
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
	}
	/**
     * delete comment
     * @bodyParam id int required comment id
     * @authenticated
     * @response {
     * "status": "true",
     * "Message": "the comment is deleted"
	 * }
     */
	public function deleteComment(Request $request)
	{
        //To DO -> update (decrement) the number of comments on the review or user status
        $Validations    = array(
            "id"        => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Comment::find($request["id"]) )
            {
                $comment = Comment::findOrFail($request["id"]);
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
     * like
     * @bodyParam id int required id of the liked resource
	 * @bodyParam type int required type of the resource (1 for user status and 2 for review)
     * @response {true}
     */
    public function makeLike(Request $request)
    {
        //To DO ->check for the resource to be inside the database or not and update the number of
        // likes on the review or user status
        $Validations    = array(
            "id"        => "required|integer",
            "type"      => "required|integer|max:2|min:1",
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            $Create = array(
                "user_id" => $this->ID,
                "resourse_id" => $request["id"],
                "resourse_type"  => $request["type"]
            );
            Likes::create($Create);
            return response()->json([
                "status" => "true" , "user" => $this->ID, "resourse_id" => $request["id"] , "resourse_type"  => $request["type"]
            ]);
        }
        else
        {
            return response(["status" => "false" , "errors"=> $Data->messages()->first()]);
        }
	}

    /**
     * unlike
     * @bodyParam id int required like id
     * @authenticated
     * @response {state:true}
     */
	public function unlike(Request $request)
	{
        //To DO -> update (decrement) the number of likes on the review or user status
        $Validations    = array(
            "id"        => "required|integer"
        );
        $Data = validator::make($request->all(), $Validations);
        if (!($Data->fails())) {
            if ( Likes::find($request["id"]) )
            {
                $like = Likes::findOrFail($request["id"]);
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
