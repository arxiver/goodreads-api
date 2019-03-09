<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group following management
 *
 * APIs for managing following process
 */
class followcontroller extends Controller
{
    /**
     * followUser  Start following a user
     *
     * @authenticated
     *
     * @bodyParam USER_ID int required Goodreads user id of user to follow.
     *
     * @response {
     *  "state" : "true"
     * }
     */
    public function followUser()
    {
        // to do ...
    }
    /**
    * unfollowUser Stop following a user
    *
    * @authenticated
    *
    * @bodyParam USER_ID int required Goodreads user id of user to stop following.
    *
    * @response {
    *  "state" : "true"
    * }
    */
    public function unfollowUser()
    {
        //to do ....
    }

    /**
     * user_followers
     * 
     * Get a user's followers
     * 
     * @bodyParam page int optional 1-N (default 1).
     * 
     * @response {
     *  "id_followers" : "123"
     * }
     */
    public function user_followers()
    {
        //to do ....
    }

    /**
     * user_followering
     * 
     * Get a user's followering
     * 
     * @bodyParam page int optional 1-N (default 1).
     * 
     * @response {
     *  "id_following" : "123"
     * }
     */
    public function user_following()
    {
        //to do ....
    }
}
