<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Following;
use Illuminate\Http\Request;

/**
 * @group Following
 *
 *
 *
 * 
 */
class FollowingController extends Controller
{

    /**
     * followUser
     *
     * Start following a user
     *
     * @authenticated
     *
     * @bodyParam user_id int required Goodreads user id of user to follow.
     *
     * @response {
     *  "state" : 1
     * }
     */
    public function followUser(Request $request)
    {
        /**
         * Validation Segment to check if there is dublication error could happen
         */
        $followerId = 1;//Auth::id();
        $userId = $request->user_id ;
        if (User::where('id', $userId )->count() != 1) {
            $response = array('state' =>0);
            $responseCode = 404;
        } else {
            if (Following::where('follower_id', $followerId)->where('user_id', $userId)->count() == 1) {
                $response = array('state' =>0);
                $responseCode = 400;
            } else {
                $following = new Following();
                $following->follower_id = $followerId;
                $following->user_id = $userId;
                $following->save();
                User::find($userId)->increment('followersCount');
                User::find($followerId)->increment('followingCount');
                $response = array('state' =>1) ;
                $responseCode = 201;
            }
        }
        return response()->json($response, $responseCode);
    }
    /**
     * Unfollowing a user
     *[ unfollowUser method ]
     * @authenticated
     * Stop following a user
     * this method returns "state" : 1 (true) or 0 (false) .
     * 1 for successfull request
     * 0 for un successfull request
     * @bodyParam user_id int required Goodreads user id of user to stop following.
     *
     * @response {
     *  "state" : 1
     * }
     */
    public function unfollowUser(Request $request)
    {
        $userId = $request->user_id;
        $followerId = 1 ;//Auth::id();
        $following = Following::where('user_id', $userId)->where('follower_id', $followerId);
        $state = $following->delete();
        if($state == 1)
        {
            User::find($userId)->decrement('followersCount');
            User::find($followerId)->decrement('followingCount');
        }
        return response()->json(array("state"=>$state));
    }

    /**
     * Authenticated user`s followers
     *
     * List of the logged-in user's followers
     *
     * @authenticated
     * @bodyParam page int optional 1-N (default 1) returns 30 items per page .
     * @bodyParam user_id int optional to get the updates made by a specific user (default authenticated user)
     * @response {
     *    "followers": [
     *   {
     *       "id": 2,
     *       "name": "hassan",
     *       "imageLink": "hassan",
     *       "smallImageUrl": "hassan",
     *       "email": "hassan",
     *       "link": "hassan",
     *       "followersCount": 0
     *   },
     *   {
     *       "id": 3,
     *       "name": "sandy",
     *       "imageLink": "sandy",
     *       "smallImageUrl": "sandy",
     *       "email": "sandy",
     *       "link": "sandy",
     *       "followersCount": 0
     *   },
     *   {
     *       "id": 4,
     *       "name": "asd",
     *       "imageLink": "sandy",
     *       "smallImageUrl": "da",
     *       "email": "das",
     *       "link": "ds",
     *       "followersCount": 0
     *   }
     *  ],
     * "_start": 1 ,
     * "_end" : 4
     * "_total" : 4 
     * }
     */
    public function userFollowers(Request $request)
    {
        /**
        * Checking is the optional paramater is sent or not
        * Case it is not sent : then we list the authenticated-user `s followers
        */
        $userId = $request->has(['user_id']) ? $request->user_id : 3 ; //Auth::id();
        $page = $request->has(['page']) ? $request->page : 1 ;
        /**
         * Page paramater is used to get sub-list of the followers
         * eg: page = 1 it will retreive only 30 followers of the user per page
         */
        $listSize = 30;
        $skipCount = ($page - 1) * $listSize ;

        /**
         * Eloquent query
         */
        $data =
            DB::select( 'SELECT id , name , imageLink , smallImageUrl ,
                        email , link ,followersCount
                        FROM followings F,users U WHERE user_id = ?
                        AND F.follower_id = U.id limit ? offset ?', [$userId,$listSize,$skipCount]);

        /**
         * Response paramaters and return
         */
        $_start = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + 1 ;
        $_end = sizeof($data) == 0 ? 0: ( $page - 1) * $listSize + sizeof($data) ;
        return response()->json(['followers'=>$data,'_start'=>$_start,'_end'=>$_end,'_total'=>sizeof($data)],200);
    }

    /**
     * userFollowering
     *
     * Get a user's followering
     *
     * @authenticated
     *
     * @bodyParam page int optional 1-N (default 1).
     * @bodyParam user_id int optional to get the updates made by a specific user (default authenticated user)
     * @response {
     *"following": {
     *	"user": {
     * 		"id": "000000",
     *		"name": "Salma",
     *		"image_url": "https://image.jpg",
     *		"link": "https://www.goodreads.com/user/show/000000-salma"
     *	},
     *	"_start": "1",
     *	"_end": "1",
     *	"_total": "1"
     * }
     *}
     */
    public function userFollowing(Request $request)
    {
        /**
         * Checking is the optional paramater is sent or not
         * Case it is not sent : then we list the authenticated-user `s followers
         * other wise we use the given user_id to get his/her followers .
         */
        $userId = $request->has(['user_id']) ? $request->user_id : 3; //Auth::id();
        $page = $request->has(['page']) ? $request->page : 1 ;
        /**
         * Page paramater is used to get sub-list of the followers
         * eg: page = 1 it will retreive only 30 followers of the user per page
         */
        $listSize = 30;
        $skipCount = ($page - 1) * $listSize;
    
        /**
         * Eloquent query
         */

        $data =
            DB::select( 'SELECT id , name , imageLink , smallImageUrl ,
                        email , link ,followersCount
                        FROM followings F,users U WHERE follower_id = ?
                        AND F.user_id = U.id limit ? offset ?', [$userId,$listSize,$skipCount]);
        /**
         * Response paramaters and return
         */        
        
        $_start = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + 1;
        $_end = sizeof($data) == 0 ? 0: ($page  - 1) * $listSize + sizeof($data) ;
        return response()->json(['followers'=>$data,'_start'=>$_start,'_end'=>$_end,'_total'=>sizeof($data)],200);
    }
}
