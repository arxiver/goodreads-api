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
        $followerId = $this->ID;
        $userId = $request->user_id;
        /**
         *  if the user doesn`t exist .
         */
        $user = User::findOrFail($userId);
        if (Following::where('follower_id', $followerId)->where('user_id', $userId)->count() == 1) {
            $response = array('status' => "false", 'message' => "Something gone wrong .");
            $responseCode = 400;
        } else {
            $following = new Following();
            $following->follower_id = $followerId;
            $following->user_id = $userId;
            $following->save();
            User::find($userId)->increment('followers_count');
            User::find($followerId)->increment('following_count');
            $response = array('status' => "true", 'message' => "Successfully started following" . ' ' . $user->username);
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
        $userId = $request->user_id;

        /**
         *  if the user doesn`t exist .
         */
        $user = User::findOrFail($userId);

        $followerId = $this->ID;
        $following = Following::where('user_id', $userId)->where('follower_id', $followerId);
        $status = $following->delete();
        if ($status == 1) {
                User::find($userId)->decrement('followersCount');
                User::find($followerId)->decrement('followingCount');
            }
        return response()->json(array("status" => 'true', 'message' => "Successfully stopped following" . ' ' . $user->username));
    }

    /**
     * Followers List
     * gets the followers of a user.
     *
     * @authenticated
     *
     * @response 200 {
	 *
	 *    "followers": [
	 *        {
	 *            "id": 1,
	 *            "name": "Miss Madaline Wisozk V",
	 *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "small_image_url": "https:\/\/aufderhar.org\/ipsam-vitae-corrupti-repudiandae-est-reprehenderit-sit-est.html",
	 *            "book_id": 100,
     *            "currently_reading": "dummuybookName",
     *            "book_image": "wolf.info\/molestiae-qui-sed-at-vel",
	 *            "pages": 1312,
	 *            "book_image": "http:\/\/treutel.biz\/"
	 *        },
	 *        {
	 *            "id": 2,
	 *            "name": "Miss Madaline Wisozk V",
	 *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "small_image_url": "https:\/\/aufderhar.org\/ipsam-vitae-corrupti-repudiandae-est-reprehenderit-sit-est.html",
	 *            "book_id": 100,
     *            "currently_reading": "dummuybookName",
     *            "book_image": "wolf.info\/molestiae-qui-sed-at-vel",
	 *            "pages": 1312,
	 *            "book_image": "http:\/\/treutel.biz\/"
	 *        }
	 *    ],
	 *    "_start": 31,
	 *    "_end": 33,
	 *    "_total": 2
     * }
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
        $skipCount = ($page - 1) * $listSize;

        /**
         * Query
         */
        $data =
            DB::select( 'SELECT id , name , imageLink , smallImageUrl ,
                        email , link
                        FROM followings F,users U WHERE user_id = ?
                        AND F.follower_id = U.id limit ? offset ?', [$userId, $listSize, $skipCount]);

        /**
         * Response paramaters and return
         */
        $_start = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + 1;
        $_end = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + sizeof($data);
        return response()->json(['followers' => $data, '_start' => $_start, '_end' => $_end, '_total' => sizeof($data)], 200);
    }

    /**
     * Following List
     * gets the following list of a user .
     *
     * @authenticated
     *
     * @response 200 {
	 *
	 *    "following": [
	 *        {
	 *            "id": 10,
	 *            "name": "Darling V",
	 *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "small_image_url": "https:\/\/aufderhar.org\/ipsam-vitae-corrupti-repudiandae-est-reprehenderit-sit-est.html",
	 *            "book_id": 100,
     *            "currently_reading": "dummuybookName",
     *            "book_image": "wolf.info\/molestiae-qui-sed-at-vel",
	 *            "pages": 1312,
	 *            "book_image": "http:\/\/treutel.biz\/"
	 *        },
	 *        {
	 *            "id": 21,
	 *            "name": "Santa Wisozk V",
	 *            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
	 *            "small_image_url": "https:\/\/aufderhar.org\/ipsam-vitae-corrupti-repudiandae-est-reprehenderit-sit-est.html",
	 *            "book_id": 100,
     *            "currently_reading": "dummuybookName",
     *            "book_image": "wolf.info\/molestiae-qui-sed-at-vel",
	 *            "pages": 1312,
	 *            "book_image": "http:\/\/treutel.biz\/"
	 *        }
	 *    ],
	 *    "_start": 1,
	 *    "_end": 2,
	 *    "_total": 2
     * }
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
        $page = $request->has(['page']) ? $request->page : 1;

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
            DB::select('SELECT id , name , image_link , small_image_link ,
                        email , link ,followers_count
                        FROM followings F,users U WHERE follower_id = ?
                        AND F.user_id = U.id limit ? offset ?', [$userId, $listSize, $skipCount]);
        /**
         * Response paramaters and return
         */
        $_start = sizeof($data) == 0 ? 0 : ($page - 1) * $listSize + 1;
        $_end = sizeof($data) == 0 ? 0 : ($page  - 1) * $listSize + sizeof($data);
        return response()->json(['following' => $data, '_start' => $_start, '_end' => $_end, '_total' => sizeof($data)], 200);
    }
}
