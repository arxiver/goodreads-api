<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Following;
use Illuminate\Http\Request;

/**
 * @group Following
 */
class FollowingController extends Controller
{

    /**
     * Follow User
     * @authenticated
     * [ Start following a user ]
     * @bodyParam user_id int required Goodreads user id of user to follow.
     * @response 201 {
     * "status": "true",
     * "message": "Successfully started following Prof. Nia White V"
     * }
     * @response 400{
     *
     * "status": "false",
     * "message": "Something gone wrong ."
     * }
     *
     * @response 404{
     * }
     */
    public function followUser(Request $request)
    {
        /**
         * Validation Segment to check if there is dublication error could happen
         */
        $userId = $request->has(['user_id']) ? $request->user_id : abort(404) ;
        /**
         *  if the user doesn`t exist .
         */
        $user = User::findOrFail($userId);
        $followerId = $this->ID;

        /**
         * Validate the relationship is not exist before.
         * reponseing 400 if it exist.
         */
        if (Following::where('follower_id', $followerId)->where('user_id', $userId)->count() == 1)
        {
            $response =
             array( 'status' => "false",
             'message' =>"Something gone wrong .");
            $responseCode = 400;
        }
        else
        {
            /**
             * Creating new instance of following model
             */
            $following = new Following();
            $following->follower_id = $followerId;
            $following->user_id = $userId;
            $following->save();
            /**
             * Incrementing followers/following count for each user of them
             */
            User::find($userId)->increment('followers_count');
            User::find($followerId)->increment('following_count');

            $response =
             array('status' =>"true",
             'message'=> "Successfully started following".' '.$user->username) ;
            /**
             * Response 201 for successfully creation
             */
            $responseCode = 201;
        }
    return response()->json($response, $responseCode);
    }

    /**
     * Unfollow User
     * Stop following a user
     *
     * @authenticated
     *
     * @bodyParam user_id int required Goodreads user id of user to stop following.
     *
     * @response 200
     * {
     * "status": "true",
     * "message": "Successfully stopped following Darling White V"
     * }
     *
     * @response 404{
     * }
     */
    public function unfollowUser(Request $request)
    {
        /**
         * Checking the request paramater existance
         */
        $userId = $request->has(['user_id']) ? $request->user_id : abort(404) ;

        /**
         *  if the user doesn`t exist .
         */
        $user = User::findOrFail($userId);

        /**
         * Getting authenticated user-id
         * Deleting the follow-relationship between the given user_id and logged-in user
         */
        $followerId =$this->ID;
        $following = Following::where('user_id', $userId)->where('follower_id', $followerId);
        $status = $following->delete();
        /**
         * Decrement followers/following count for each user of them
         */
        if($status == 1)
        {
            User::find($userId)->decrement('followers_count');
            User::find($followerId)->decrement('following_count');
        }
        else
        {
            abort(404);
        }
        /**
         * Response
         */
        return response()->json(array("status"=>'true','message'=>"Successfully stopped following".' '.$user->username));
    }

    /**
     * Followers List
     * gets the followers of a user.
     *
     * @authenticated
     *
	 *
	 * @response 404 {
	 *}
     * @response
	 *
	 *{
	 *    "followers": [
	 *        {
     *             "id": 1,
     *             "name": "Miss Madaline Wisozk V",
     *             "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
     *             "book_id": 100,
     *             "currently_reading": "dummuybookName",
     *             "book_image": "http:\/\/treutel.biz\/",
     *             "pages": 1200
	 *        },
	 *        {
	 *            "id": 4,
	 *            "name": "Modu Rosenbaum",
     *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "book_id": null,
     *            "currently_reading": null,
     *            "book_image": null,
     *            "pages": null
	 *        },
	 *        {
	 *            "id": 5,
	 *            "name": "Velda Rosenbaum",
	 *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "book_id": 10,
     *            "currently_reading": "dummuybookName",
     *            "book_image": "http:\/\/treutel.biz\/",
     *            "pages": 1200
	 *        }
	 *    ],
	 *    "_start": 1,
	 *    "_end": 3,
	 *    "_total": 3
	 *
	 *}
     * @bodyParam page int optional 1-N (default 1) returns 30 items per page .
     * @bodyParam user_id int optional to get the followers list of a specific user (default authenticated user)
     */
    public function userFollowers(Request $request)
    {
        /**
        * Checking is the optional paramater is sent or not
        * Case it is not sent : then we list the authenticated-user `s followers
        */
        $userId = $request->has(['user_id']) ? $request->user_id : $this->ID;

        /**
         *  if the user doesn`t exist .
         */
        User::findOrFail($userId);

        /**
         * Viewing page index . its divided into pages each page contain 30 (max) items.
         */
        $page = $request->has(['page']) ? $request->page : 1;

        /**
         * Page paramater is used to get sub-list of the followers
         * eg: page = 1 it will retreive only 30 followers of the user per page
         */
        $listSize = 30;
        $skipCount = ($page - 1) * $listSize ;

        /**
         * Query getting followers list with each user has a book currently_reading .
         */
        $data =
            DB::select( '   SELECT  id , name , image_link , book_id , currently_reading, book_image , pages
							FROM
							( SELECT follower_id as id , name , image_link
	                        FROM followings F,users U
	                        WHERE F.user_id = ? and F.follower_id = U.id ) as t1
							LEFT JOIN
							( SELECT  S.user_id as user_id , B.id as book_id , B.title as currently_reading ,
                                       B.img_url as book_image , B.pages_no as pages
							FROM SHELVES S , BOOKS B WHERE S.book_id = B.id  and S.type = 1 ) as t2
                            ON user_id=id GROUP BY id  limit ? offset ?', [$userId,$listSize,$skipCount]);

        /**
         * Response paramaters and return
         */
        $_start = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + 1 ;
        $_end = sizeof($data) == 0 ? 0: ( $page - 1) * $listSize + sizeof($data) ;

        return response()->json(['followers'=>$data,'_start'=>$_start,'_end'=>$_end,'_total'=>sizeof($data)],200);
    }

    /**
     * Following List
     * gets the following list of a user .
     *
     * @authenticated
     *

     * @response
	 *
	 *{
	 *    "following": [
	 *        {
     *             "id": 1,
     *             "name": "Miss Madaline Wisozk V",
     *             "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
     *             "book_id": 100,
     *             "currently_reading": "dummuybookName",
     *             "book_image": "http:\/\/treutel.biz\/",
     *             "pages": 1200
	 *        },
	 *        {
	 *            "id": 4,
	 *            "name": "Modu Rosenbaum",
     *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "book_id": null,
     *            "currently_reading": null,
     *            "book_image": null,
     *            "pages": null
	 *        },
	 *        {
	 *            "id": 5,
	 *            "name": "Velda Rosenbaum",
	 *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "book_id": 10,
     *            "currently_reading": "dummuybookName",
     *            "book_image": "http:\/\/treutel.biz\/",
     *            "pages": 1200
	 *        }
	 *    ],
	 *    "_start": 1,
	 *    "_end": 3,
	 *    "_total": 3
	 *
     *}
      *
     * @response 404 {
     * }
     * @bodyParam page int optional 1-N (default 1) returns 30 items per page .
     * @bodyParam user_id int optional to get the following list of a specific user (default authenticated user)
     */
    public function userFollowing(Request $request)
    {
        /**
        * Checking is the optional paramater is sent or not
        * Case it is not sent : then we list the authenticated-user `s followers
        */
        $userId = $request->has(['user_id']) ? $request->user_id : $this->ID;

        /**
         *  if the user doesn`t exist .
         */
        User::findOrFail($userId);

        /**
         * Viewing page index . its divided into pages each page contain 30 (max) items.
         */
        $page = $request->has(['page']) ? $request->page : 1 ;

        /**
         * Page paramater is used to get sub-list of the followers
         * eg: page = 1 it will retreive only 30 followers of the user per page
         */
        $listSize = 30;
        $skipCount = ($page - 1) * $listSize;

        /**
         * Query returns the following users` details with currently_reading book for each of them.
         */
        $data =
            DB::select(' SELECT  id , name , image_link , book_id , currently_reading, book_image , pages
							FROM
							( SELECT F.user_id as id , name , image_link
	                        FROM followings F,users U
	                        WHERE F.follower_id = ? and F.user_id = U.id ) as t1
							LEFT JOIN
							( SELECT  S.user_id as user_id , B.id as book_id , B.title as currently_reading ,
                                       B.img_url as book_image , B.pages_no as pages
							FROM SHELVES S , BOOKS B WHERE S.book_id = B.id  and S.type = 1 ) as t2 ON user_id=id GROUP BY id limit ? offset ?', [$userId, $listSize, $skipCount]);

        /**
         * Response paramaters and return
         * _start index of the page
         * _end index of the page
         * _total size of items in each page
         *
         */
        $_start = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + 1;
        $_end = sizeof($data) == 0 ? 0: ($page  - 1) * $listSize + sizeof($data) ;
        return response()->json(['following'=>$data,'_start'=>$_start,'_end'=>$_end,'_total'=>sizeof($data)],200);
    }
}

